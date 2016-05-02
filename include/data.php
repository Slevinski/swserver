<?php

$db_file = dirname(__FILE__) . '/../data/swserver.db';
if (file_exists($db_file)){
  $db = new PDO('sqlite:' . $db_file );
} else {
  $db = false;
}

function _sqliteRegex($string, $pattern, $ci) {
  if ($ci) $string = mb_strtolower($string,'UTF-8');
  $cnt = @preg_match($pattern, $string);
  if ($cnt===false){
    $pattern = preg_quote(substr($pattern,1,-1),'/');
    $cnt = @preg_match('/' . $pattern . '/', $string);
  }
  if ($cnt) {
    return true;
  } else if ($cnt===0) {
    return false;
  } else {
    haltValidation("invalid search pattern " . $pattern);
  }
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
    $orderby = ' order by entry.' . $sort;
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
  
  $sql = 'SELECT code, language, namespace, subspace, qqq, name, icon, user, created_at from puddle';
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
    $sel = 'SELECT entry.id, user, created_at, updated_at, sign, signtext, group_concat(term,"|") as terms, text, source, detail from entry LEFT JOIN term on entry.id=term.id where REGEX(sign,' . $regex[0] . ',0)';
    $cnt = count($regex);
    $end = '';
    $part = '';
    for ($i=1;$i<$cnt;$i++) {
      $part = ' and entry.id in (select id from entry where REGEX(sign,' . $regex[$i] . ',0)';
      $part .= 'END)';
      if ($end) {
        $end = str_replace('END)',$part . ')',$end);
      } else {
        $end = $part;
      }
    }
    $end = str_replace('END)',')',$end);
    $sel .= $end;
    
    $sel .= ' group by entry.id ';

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
        $data[$i]['terms'] = array_filter(explode('|',$entry['terms']));
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
    $sel = 'SELECT entry.id, user, created_at, updated_at, sign, signtext, group_concat(term,"|") as terms, text, source, detail from entry LEFT JOIN term on entry.id=term.id where REGEX(signtext,"' . $regex[0] . '",0) group by entry.id ' . $orderby . ';';
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
        $sel = 'SELECT entry.id, user, created_at, updated_at, sign, signtext, group_concat(term,"|") as terms, text, source, detail from entry LEFT JOIN term on entry.id=term.id where ' . implode($words,' or ') . ' group by entry.id ' . $orderby . ';';
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
        $data[$i]['terms'] = array_filter(explode('|',$entry['terms']));
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
    $col = 'term'; 
  }
  
  if ($type == 'start' || $type == 'exact'){
    $search = "^" . $search; 
  }
  if ($type == 'end' || $type == 'exact'){
    $search = $search . "$" ; 
  }
  $search = "/" . $search . "/";
  $puddle_db = puddle_db($puddle);
  if (!$search){
    haltValidation('missing search string');
  }
  $orderby = entry_orderby($sort,'sign');
  $sel = 'select entry.id, user, created_at, updated_at, sign, signtext, group_concat(term,"|") as terms, text, source, detail from entry LEFT JOIN term on entry.id=term.id where entry.id in (select id from term where REGEX(' . $col . ',:search,0)) group by entry.id ' . $orderby . ';';
  $puddle_db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE,
  PDO::FETCH_ASSOC);
  $puddle_db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
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
  $sel = 'select entry.id, user, created_at, updated_at, sign, signtext, group_concat(term,"|") as terms, text, source, detail from entry LEFT JOIN term on entry.id=term.id ';
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
  $sel .= ' group by entry.id ' . $orderby . ';';
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

function puddle_entry($puddle,$id,$sort){
  $puddle_db = puddle_db($puddle);
  $orderby = entry_orderby($sort,'sign');
  preg_match_all('/[0-9]+/', $id, $matches);
  $ids = implode(array_unique($matches[0]),',');
  if (!$ids) {
    haltValidation('invalid entry id');
  }
  $sel = 'select entry.id, user, created_at, updated_at, sign, signtext, group_concat(term,"|") as terms, text, source, detail from entry LEFT JOIN term on entry.id=term.id where entry.id in (' . $ids . ')';
  $sel .= ' group by entry.id ' . $orderby . ';';
  $results=$puddle_db->query($sel);
  $data = $results->fetchAll(PDO::FETCH_ASSOC);
  $total = count($data);
  $return = array();
  if($data){
    foreach ($data as $i=>$entry){
      $data[$i]['terms'] = array_filter(explode('|',$entry['terms']));
      $data[$i]['detail'] = json_decode($entry['detail']);
    }
  }
  $return['total'] = $total;
  $return['data'] = $data;
  return $return;
}

function puddle_sign($puddle,$term,$text,$query,$source,$offset,$limit,$sort){
  $puddle_db = puddle_db($puddle);
  $sql = 'SELECT id, sign from entry ';
  $where = array();
  
  $where[] = 'sign <> ""';

  if ($term){
    $where[] = 'id in (select id from term where REGEX(lower,"/' . mb_strtolower($term) . '/",0))';
  }
  
  if ($text){
    $where[] = 'id in (select id from entry where REGEX(text,"/' . mb_strtolower($text) . '/",1))';
  }

  if ($source){
    $where[] = 'id in (select id from entry where REGEX(source,"/' . mb_strtolower($source) . '/",1))';
  }

  
  
  $regex = SignWriting\query2regex($query);
  if ($regex){
    foreach ($regex as $i=>$re){
      $re = str_replace('/',"",$re);
      $re = "'/^" . $re . "$/'";
      $regex[$i] = $re;
    }
    $sel = 'id in (select id from entry where REGEX(sign,' . $regex[0] . ',0)';
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
    $sel .= $end . ')';
    $where[] = $sel;
  }

  if (count($where)){
    $sql .= 'where ' . implode($where, ' and '); 
  }

  $sql .= entry_orderby($sort,'sign');
  $results=$puddle_db->query($sql);
  $entries = $results->fetchAll(PDO::FETCH_ASSOC);
  $total = count($entries);
  if ($limit>0){
    $data = array_slice($entries,$offset,$limit);
  } else {
    $data = array_slice($entries,$offset);
  }
  $return = array();
  $return['total'] = $total;
  $return['data'] = $data;
  return $return;
}

function puddle_term($puddle,$term,$text,$query,$source,$offset,$limit,$sort){
  $puddle_db = puddle_db($puddle);
  $sql = 'SELECT group_concat(id,",") id, term from term ';
  $where = array();

  if ($term){
    $where[] = 'REGEX(lower,:term,0)';
  }

  if ($text){
    $where[] = 'id in (select id from entry where REGEX(text,"/' . mb_strtolower($text) . '/",1))';
  }

  if ($source){
    $where[] = 'id in (select id from entry where REGEX(source,"/' . mb_strtolower($source) . '/",1))';
  }


  $regex = SignWriting\query2regex($query);
  if ($regex){
    foreach ($regex as $i=>$re){
      $re = str_replace('/',"",$re);
      $re = "'/^" . $re . "$/'";
      $regex[$i] = $re;
    }
    $sel = 'id in (select id from entry where REGEX(sign,' . $regex[0] . ',0)';
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
    $sel .= $end . ')';
    $where[] = $sel;
  }

  if (count($where)){
    $sql .= 'where ' . implode($where, ' and '); 
  }
  $sql .= ' group by term ';
  $sql .= entry_orderby($sort,'lower');

  $stmt = $puddle_db->prepare($sql);
  if ($term){
    $term = mb_strtolower($term);
    $term = '/' . $term . '/';
    $stmt->bindParam(':term', $term, PDO::PARAM_STR);
  }
  $stmt->execute();
  $entries = $stmt->fetchAll(PDO::FETCH_ASSOC);

  $total = count($entries);
  if ($limit>0){
    $data = array_slice($entries,$offset,$limit);
  } else {
    $data = array_slice($entries,$offset);
  }
  $return = array();
  $return['total'] = $total;
  $return['data'] = $data;
  return $return;
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

function getCountryLanguageOther($cc){
  global $db;
  $cc = preg_replace("/[^A-Za-z0-9\-,]/", '', $cc);
  $puddles = array();
  $sql = 'select language.code, language.qqq, language.name, puddle.code puddle from language LEFT JOIN puddle on language.code=puddle.language where signed=1 and puddle.code is null and language.code in (select language from language_country where country="' . $cc . '") order by language.code;';
  $results=$db->query($sql);
  $return = $results->fetchAll(PDO::FETCH_NAMED);
  return $return;
}

function getCountryLanguagePuddles($cc){
  global $db;
  $cc = preg_replace("/[^A-Za-z0-9\-,]/", '', $cc);
  $puddles = array();
  $sql = 'select language.code, language.qqq, language.name, puddle.code, puddle.namespace, puddle.qqq, puddle.name, puddle.icon from language INNER JOIN puddle on language.code=puddle.language where language.code in (select language from language_country where country="' . $cc . '") order by language.code, puddle.position, puddle.name;';
  $results=$db->query($sql);
  $puddles = $results->fetchAll(PDO::FETCH_NAMED);
  $languages = array();
  if($puddles){
    foreach ($puddles as $i=>$row){
      $language=array();
      $language['code'] = $row['code'][0];
      $language['qqq'] = $row['qqq'][0];
      $language['name'] = $row['name'][0];
      $language['puddles'] = array();
      $languages[$row['code'][0]] = $language;
    }
    foreach ($puddles as $i=>$row){
      $puddle=array();
      $puddle['code'] = $row['code'][1];
      $puddle['qqq'] = $row['qqq'][1];
      $puddle['name'] = $row['name'][1];
      $puddle['icon'] = $row['icon'];
      $puddle['namespace'] = $row['namespace'];
      $languages[$row['code'][0]]['puddles'][] = $puddle;
    }
    $return = array();
    foreach ($languages as $language){
      $return[] = $language; 
    }
    return $return;
  } else {
    return array();
  }
}

function getCountriesLanguagesPuddles(){
  global $db;
  $puddles = array();
  $sql = 'select country,group_concat(distinct language_country.language) languages,group_concat(puddle.code) puddles from language_country inner join language on language_country.language = language.code left join puddle on language_country.language = puddle.language where signed=1 group by country;';
//  $sql = 'select country,language_country.language,group_concat(puddle.code) puddles from language_country inner join language on language_country.language = language.code left join puddle on language_country.language = puddle.language where signed=1 group by country,language_country.language;';
  $results=$db->query($sql);
  $return = $results->fetchAll(PDO::FETCH_NAMED);
  
  return $return;
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

function getFlags($cc=''){
  global $db;
  $cc = preg_replace("/[^A-Za-z0-9\-,]/", '', $cc);
  if ($cc){
    $countries = explode(",",$cc);
    $sql = 'SELECT code,qqq,name,flag from country where code in ("' . implode('","',$countries) . '") order by code;';
  } else {
    $sql = 'SELECT code,qqq,name,flag from country where code in (select country from language_country where language in (select language from puddle)) order by code;';
  }

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
