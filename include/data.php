<?php

$db_file = dirname(__FILE__) . '/../data/swserver.db';
if (file_exists($db_file)){
  $db = new PDO('sqlite:' . dirname(__FILE__) . '/../data/swserver.db');
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
  global $puddle_dbs;
  if (array_key_exists($puddle,$puddle_dbs)){
    return $puddle_dbs[$puddle];
  } else {
    $puddle_db = new PDO('sqlite:' . dirname(__FILE__) . '/../data/puddle/' . $puddle . '.db');
    if ($puddle_db){
//      $puddle_db->sqliteCreateFunction('regexp', '_sqliteRegexp', 2);
      $puddle_db->sqliteCreateFunction('regex', '_sqliteRegex', 3);
      $puddle_dbs[$puddle] = $puddle_db;
      return $puddle_db;
    } else {
      haltNoDatabase();
    }
  }
}

function puddle_query($puddle,$query,$offset,$limit){
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

    $sel .= ' order by sign';
    $results=$puddle_db->query($sel);
    $entries = $results->fetchAll(PDO::FETCH_ASSOC);
    $total = count($entries);
    $data = array_slice($entries,$offset,$limit);
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

function puddle_query_signtext($puddle,$query,$offset,$limit){
  $puddle_db = puddle_db($puddle);
  $regex = SignWriting\query2regex($query);
  if (!$regex){
    haltValidation('invalid query string');
  }

  try {
    $sel = 'SELECT id, user, created_at, updated_at, sign, signtext, terms, detail from entry where REGEX(signtext,"' . $regex[0] . '",0) order by sign;';
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
        $sel = 'SELECT id, user, created_at, updated_at, sign, signtext, terms, detail from entry where ' . implode($words,' or ') . ';';
        $results=$puddle_db->query($sel);
        $entries = $results->fetchAll(PDO::FETCH_ASSOC);
      } else {
        $entries = array(); 
      }
    }

    $total = count($entries);
    $data = array_slice($entries,$offset,$limit);
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


function puddle_search($puddle,$search,$type,$ci,$offset,$limit){
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
  $sel = 'select id, user, created_at, updated_at, sign, signtext, terms, detail from entry where REGEX(' . $col . ',:search,0) order by sign;';
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
    $data = array_slice($entries,$offset,$limit);
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
