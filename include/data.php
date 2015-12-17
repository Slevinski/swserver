<?php

$db_file = dirname(__FILE__) . '/../data/swserver.db';
if (file_exists($db_file)){
  $db = new PDO('sqlite:' . $db_file );
} else {
  $db = false;
}

function _sqliteRegex($string, $pattern, $ci) {
//  if(preg_match($pattern, $string)) {
  if ($ci) $string = mb_strtolower($string,'UTF-8');
  if(preg_match($pattern, $string)) {
    return true;
  }
  return false;
}
$puddle_dbs = array();
function puddle_db($puddle){
  global $db,$puddle_dbs;
  if (array_key_exists($puddle,$puddle_dbs)){
    return $puddle_dbs[$puddle];
  } else {

    $puddle_file = dirname(__FILE__) . '/../data/puddle/' . $puddle . '.db';
    if (file_exists($puddle_file)){
      $puddle_db = new PDO('sqlite:' . $puddle_file );
      $puddle_db->sqliteCreateFunction('regex', '_sqliteRegex', 3);
      $puddle_dbs[$puddle] = $puddle_db;
      return $puddle_db;
    } else {
      $sel = 'SELECT code from puddle_alt where alt=:puddle;';
      try {
        $stmt = $db->prepare($sel);
        $stmt->bindParam(':puddle', $puddle, PDO::PARAM_STR);
        $stmt->execute();
        $code = $stmt->fetch();
        if ($code){
          return puddle_db($code[0]);
        } else {
          haltValidation('invalid puddle code');
        }
      } catch (PDOException $e) {
        haltValidation($e->getCode() . ' ' . $e->getMessage());
      }  
//      haltNoDatabase();
    }
  }
}

function entry_orderby($sort,$default){
  $orderby = ' order by ' . $default;
  if ($sort){
    if ($sort[0]=='-') {
      $desc = 1; 
      $sort = substr($sort,1);
    } else {
      $desc = 0;
    }
    $orderby = ' order by ' . $sort;
    if ($desc) {
      $orderby .= ' desc'; 
    }
  }
  return $orderby;
}

function puddle_list($lang='',$code=''){
  global $db;

  $sql = 'SELECT code,alt from puddle_alt;';
  $results=$db->query($sql);
  $rows = $results->fetchAll(PDO::FETCH_ASSOC);
  $alt = '';
  $alts = array();
  foreach ($rows as $row){
    $alts[$row['code']][] = $row['alt'];
    if ($row['alt']==$code){
      $alt = $row['code'];
    }
  }
  
  $sql = 'SELECT code, language, namespace, subspace, qqq, name, user, created_at from puddle';
  if ($lang) {
    $sql .= ' where language=:lang';
  }
  if ($code) {
    $sql .= ' where code=:code';
  }
  $sql .= ';';

  try {
    $stmt = $db->prepare($sql);
    if ($lang){
      $stmt->bindParam(':lang', $lang, PDO::PARAM_STR);
    }
    if ($code){
      $stmt->bindParam(':code', $code, PDO::PARAM_STR);
    }
    $stmt->execute();
    $entries = $stmt->fetchAll(PDO::FETCH_CLASS);
    
    if ($code && count($entries)==0){
      if ($alt){
        return puddle_list('',$alt);
      }
      haltValidation('invalid puddle code');
    }
    foreach ($entries as $i=>$entry){
      if(array_key_exists($entry->code,$alts)){
        $entries[$i]->alt=$alts[$entry->code];
      } else {
        $entries[$i]->alt=array();
      }
    }

    $return['total'] = count($entries);
    $return['data'] = $entries;
    return $return;
  } catch (PDOException $e) {
    haltValidation($e->getCode() . ' ' . $e->getMessage());
  }  
  
}

function puddle_query($puddle,$query,$offset,$limit,$sort){
  $puddle_db = puddle_db($puddle);
  $regex = SignWriting\query2regex($query);
  if (!$regex){
    haltValidation('invalid query string');
  }
//  $puddle_db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  foreach ($regex as $i=>$re){
    $re = str_replace('/',"",$re);
    $re = "'/^" . $re . "$/'";
    $regex[$i] = $re;
  }
  try {
    $sel = 'SELECT id, user, created_at, updated_at, sign, signtext, terms, detail from entry where REGEX(sign,' . $regex[0] . ',0)';
    $cnt = count($regex);
    $end = '';
    $part = '';
    for ($i=1;$i<$cnt;$i++) {
      $part = ' and id in (select id from entry where REGEX(sign,' . $regex[$i] . ',0)';
      $part .= 'END)';
      if ($end) {
        $end = str_replace('END)',$part . ')',$end);
      } else {
        $end = $part;
      }
    }
    $end = str_replace('END)',')',$end);
    $sel .= $end;

    $sel .= entry_orderby($sort,'sign');

    $results=$puddle_db->query($sel);
    $entries = $results->fetchAll(PDO::FETCH_ASSOC);
    $total = count($entries);
    if ($limit>0){
      $data = array_slice($entries,$offset,$limit);
    } else {
      $data = array_slice($entries,$offset);
    }
    $return = array();
    if($data){
      foreach ($data as $i=>$entry){
        $data[$i]['terms'] = explode('|',$entry['terms']);
        $data[$i]['detail'] = json_decode($entry['detail']);
      }
    }
    $return['total'] = $total;
    $return['data'] = $data;
    return $return;
  } catch (PDOException $e) {
    haltValidation($e->getCode() . ' ' . $e->getMessage());
  }  
}

function puddle_query_signtext($puddle,$query,$offset,$limit,$sort){
  $puddle_db = puddle_db($puddle);
  $regex = SignWriting\query2regex($query);
  if (!$regex){
    haltValidation('invalid query string');
  }
  
  $orderby = entry_orderby($sort,'sign');

  try {
    $sel = 'SELECT id, user, created_at, updated_at, sign, signtext, terms, detail from entry where REGEX(signtext,"' . $regex[0] . '",0)' . $orderby . ';';
    $results=$puddle_db->query($sel);
    $entries = $results->fetchAll(PDO::FETCH_ASSOC);
    $cnt = count($regex);
    if ($cnt>1 && count($entries)){
      $signtext = '';
      for ($i=0;$i<count($entries);$i++) {
        $signtext .= $entries[$i]['signtext'];
      }

      foreach ($regex as $pattern){
        $count = preg_match_all($pattern, $signtext, $matches);
        $signtext = implode(array_unique($matches[0]),' ');
      }
        
      if ($signtext){
        $words = array_unique(explode(' ',$signtext));
      } else {
        $words = array();
      }
      if (count($words)){
        foreach ($words as $i=>$word){
          $words[$i] = '(signtext LIKE "%' . $word . '%")';
        }
        $sel = 'SELECT id, user, created_at, updated_at, sign, signtext, terms, detail from entry where ' . implode($words,' or ') . $orderby . ';';
        $results=$puddle_db->query($sel);
        $entries = $results->fetchAll(PDO::FETCH_ASSOC);
      } else {
        $entries = array(); 
      }
    }

    $total = count($entries);
    if ($limit>0){
      $data = array_slice($entries,$offset,$limit);
    } else {
      $data = array_slice($entries,$offset);
    }
    $return = array();
    if($data){
      foreach ($data as $i=>$entry){
        $data[$i]['terms'] = explode('|',$entry['terms']);
        $data[$i]['detail'] = json_decode($entry['detail']);
      }
    }
    $return['total'] = $total;
    $return['data'] = $data;
    return $return;
  } catch (PDOException $e) {
    haltValidation($e->getCode() . ' ' . $e->getMessage());
  }  
}


function puddle_search($puddle,$search,$type,$ci,$offset,$limit,$sort){
//  (^|\|)
  if ($ci) {
    $search = mb_strtolower($search,'UTF-8');
    $col = 'lower'; 
  } else {
    $col = 'terms'; 
  }
  
  if ($type == 'start' || $type == 'exact'){
    $search = "(^|\|)" . $search; 
  }
  if ($type == 'end' || $type == 'exact'){
    $search = $search . "(\||$)" ; 
  }
  $search = "/" . $search . "/";
  $puddle_db = puddle_db($puddle);
  if (!$search){
    haltValidation('missing search string');
  }
  $orderby = entry_orderby($sort,'sign');
  $sel = 'select id, user, created_at, updated_at, sign, signtext, terms, detail from entry where REGEX(' . $col . ',:search,0)' . $orderby . ';';
  $puddle_db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE,
  PDO::FETCH_ASSOC);
  $puddle_db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
//  echo $sel;
//  die();
  try {
    $stmt = $puddle_db->prepare($sel);
    $stmt->bindParam(':search', $search, PDO::PARAM_STR);
    $stmt->execute();
    $entries = $stmt->fetchAll();

    $total = count($entries);
    if ($limit>0){
      $data = array_slice($entries,$offset,$limit);
    } else {
      $data = array_slice($entries,$offset);
    }
    $return = array();
    if($data){
      foreach ($data as $i=>$entry){
        $data[$i]['terms'] = explode('|',$entry['terms']);
        $data[$i]['detail'] = json_decode($entry['detail']);
      }
    }
    $return['total'] = $total;
    $return['data'] = $data;
    return $return;
  } catch (PDOException $e) {
    haltValidation($e->getCode() . ' ' . $e->getMessage());
  }  
}

function puddle_date($puddle,$date,$before,$after,$offset,$limit,$sort){
  $puddle_db = puddle_db($puddle);
  $col = $date . '_at';
  $orderby = entry_orderby($sort,$col);
  $sel = 'select id, user, created_at, updated_at, sign, signtext, terms, detail from entry ';
  $where = array();
  if ($before){
    $where[] = $col . ' < :before';
  }
  if ($after){
    $where[] = $col . ' > :after';
  }

  if (count($where)){
    $where = implode(' and ',$where);
    $sel .= 'where ' . $where . ' ';
  }
  $sel .= $orderby . ';';
  $puddle_db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE,
  PDO::FETCH_ASSOC);
  $puddle_db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  try {
    $stmt = $puddle_db->prepare($sel);
    if ($before){
      $stmt->bindParam(':before', $before, PDO::PARAM_STR);
    }
    if ($after){
      $stmt->bindParam(':after', $after, PDO::PARAM_STR);
    }
    $stmt->execute();
    $entries = $stmt->fetchAll();

    $total = count($entries);
    if ($limit>0){
      $data = array_slice($entries,$offset,$limit);
    } else {
      $data = array_slice($entries,$offset);
    }
    $return = array();
    if($data){
      foreach ($data as $i=>$entry){
        $data[$i]['terms'] = explode('|',$entry['terms']);
        $data[$i]['detail'] = json_decode($entry['detail']);
      }
    }
    $return['total'] = $total;
    $return['data'] = $data;
    return $return;
  } catch (PDOException $e) {
    haltValidation($e->getCode() . ' ' . $e->getMessage());
  }  
}

function getCountries(){
  global $db;

  $countries = array();
  $sql = 'SELECT code, qqq, name, svg, x1, y1, x2, y2 from country;';
  $results=$db->query($sql);
  $countries = $results->fetchAll(PDO::FETCH_CLASS);
  if($countries){
    return $countries;
  } else {
    return array();
  }
}

function getTranslations($lang){
  global $db;
  $trans = array();
  $sql = 'SELECT qqq, name from translate where lang="' . $lang . '";';
  $results=$db->query($sql);
  $trans = $results->fetchAll(PDO::FETCH_CLASS);
  if($trans){
    return $trans;
  } else {
    return array();
  }
}

function getFlags($cc){
  global $db;
  $cc = preg_replace("/[^A-Za-z0-9\-,]/", '', $cc);
  $countries = explode(",",$cc);
  
  $sql = 'SELECT code,flag from country where code in ("' . implode('","',$countries) . '");';
  $results=$db->query($sql);
  $countries = $results->fetchAll(PDO::FETCH_CLASS);
  if($countries){
    return $countries;
  } else {
    return array();
  }
}

function getSymbols($keys) {
  global $db;
  if (!$db) { haltNoDatabase();}

  if (is_array($keys)){
    $list = '("' . implode('","',$keys) . '")';
  } else {
    $list = '("' . $keys . '")';
  }
  $syms = array();
  $sql = 'SELECT symkey as key,width as w,height as h,svg as g from symbol where symkey in ';
  $sql .= $list . ';';
  $results=$db->query($sql);
  $syms=array();
  $syms = $results->fetchAll(PDO::FETCH_CLASS);
  if($syms){
    return $syms;
  } else {
    return array();
  }
}
