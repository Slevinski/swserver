<?php
/**
* SignWriting Server v1.0.0
* https://github.com/Slevinski/swserver
*
* main index file
* index.php is released under the MIT License.
* Copyright (c) 2007-2015, Stephen E Slevinski Jr
*/

    // embedded API Blueprint line start with "// "
// FORMAT: X-1A
// HOST: localhost:3000
// 
// # SignWriting Server Guide
// Available API resources: descriptions and parameters.
// 
// 

header("Access-Control-Allow-Origin: *");
//header_remove('X-Powered-By');
header("X-Powered-By: SignWriting Server");

require 'include/signwriting.php';
require 'include/data.php';
require 'include/misc.php';
require 'include/user.php';

$_ENV['SLIM_MODE'] = 'development'; //'development' or 'production'
require 'Slim/Slim.php';
\Slim\Slim::registerAutoloader();
$app = new \Slim\Slim();

$app->configureMode('production', function () use ($app) {
    error_reporting(E_NONE);
    ini_set('display_errors', 0);
    $app->config(array(
        'log.enable' => true,
        'debug' => false,
        'entry_limit' => 100
    ));
});

$app->configureMode('development', function () use ($app) {
    error_reporting(E_ALL);
    ini_set('display_errors', 1);
    $app->config(array(
        'log.enable' => false,
        'debug' => true,
        'entry_limit' => 100
    ));
});

/********************/
/* common functions */
function entry_limit(){
  global $app;
  $limit = $app->request()->get('limit');
  if ($limit=='' || !is_numeric($limit)){ 
    $limit = $app->config('entry_limit');
  } else {
    $limit = intval($limit);
    if ($limit<0){
      $limit = $app->config('entry_limit'); 
    }
  }
  return $limit;
}

function entry_sort(){
  global $app;
  $valid = array('id','user','sign','created_at','updated_at');
  $sort = $app->request()->get('sort');
  if ($sort[0]=='-') {
    $sort = substr($sort,1);
  }
  if (in_array($sort,$valid)){
    return $app->request()->get('sort');
  } else {
    return ''; 
  }
}

/**********/
// ## Group server
// Server communication uses HTTP request methods and response statuses
// 
function getFile($file){
  global $app;
  $parts = explode('.',$file);
  $rel_api = $file;
  $abs_api = dirname(__FILE__) . '/' . $rel_api;
  if (file_exists($abs_api)){
    switch ($parts[1]){
      case "db":
        $app->contentType('application/x-sqlite3');
        $app->response->headers->set('Content-Disposition','attachment; filename=' . pathinfo($app->request->getResourceUri(),PATHINFO_FILENAME) . '.db');
        break;
      case "html":
        $app->contentType('text/html;charset=utf-8');
        break;
      case "js":
        $app->contentType('application/json;charset=utf-8');
        break;
      case "md":
        $app->contentType('text/plain;charset=utf-8');
        break;
      default:
        $app->contentType('text/plain;charset=utf-8');
        break;
    }
    echo file_get_contents($rel_api);
  } else {
    $app->notFound();
  }

}

/**
* Resource
*/
// ### Server root [/]
// 

// #### GET
// The root response from the SignWriting Server is an HTML version of README.md.
// 
$app->get('/(index.html)', function () use ($app) {
  getFile('index.html');
});


/**
* Resource
*/
// ### API guide [/Guide.html]
// 

// #### GET
// Guide.html documents the available API resources: descriptions and parameters.
// 
$app->get('/Guide.html', function () use ($app) {
  getFile('Guide.html');
});

/**
* Resource
*/
// ### Example API calls [/Example.html]
// 

// #### GET
// Example.html contains example requests and documented responses.
// 
$app->get('/Example.html', function () use ($app) {
  getFile('Example.html');
});

/**
* Resource
*/
// ### Server root [/Run.html]
//

// #### GET
// Run.html contains example requests and real-time responses.
// 
$app->get('/Run.html', function () use ($app) {
  getFile('Run.html');
});
$app->get('/Run.js', function () use ($app) {
  getFile('Run.js');
});

/**
* Resource
*/
// ### Readme file [/README.md]
// 

// #### GET
// The Readme file contains information about the SignWriting Server project.
// 
$app->get('/README.md', function () use ($app) {
  getFile('README.md');
});

/**
* Resource
*/
// ### API Blueprint [/Guide.md]
// 

// #### GET
// The Markdown version of the API Blueprint for the SignWriting Server.
// 
$app->get('/Guide.md', function () use ($app) {
  getFile('tools/output/Guide.md');
});

/**
* Resource
*/
// ### API by Example [/Example.md]
// 

// #### GET
// The Example API calls using **curl** from the command line and collated into a document.
// 
$app->get('/Example.md', function () use ($app) {
  getFile('tools/output/Example.md');
});

/**
* Resource
*/
// ### API by Example [/Example.json]
// 

// #### GET
// The Example API calls documented with JSON data.
// 
$app->get('/Example.json', function () use ($app) {
  getFile('Example.json');
});

/**
* Resource
*/
// ### Main database [/db/swserver]
// 

// #### GET
// Download the main SignWriting Server database
// 
$app->get('/db/swserver', function () use ($app) {
  $db_file = 'data/swserver.db';
  getFile($db_file);
});

/**
* Resource
*/
// ### API by Example [/notFound]
// 

// #### GET
// The when a location is not found, a JSON error is returned.
// 

$app->notFound(function () use ($app) {
    $app->contentType('application/json;charset=utf-8');
    $return = array();
    $return['error']=array();
    $return['error']['status']='404';
    $return['error']['message']='Not Found';
    $return['error']['description']='method ' . $app->request->getMethod() . ' not available for ' . $app->request->getPathInfo();
    echo json_pretty($return);
});

function haltNoDatabase() {
    global $app;
    $app->contentType('application/json;charset=utf-8');
    $return = array();
    $return['error']=array();
    $return['error']['status']='500';
    $return['error']['message']='Internal Server Error';
    $return['error']['description']='No database installed! Available online: https://github.com/Slevinski/swserver_data/';
    $app->halt(500,json_pretty($return));
}

function haltValidation($desc,$errors=array()) {
    global $app;
    $app->contentType('application/json;charset=utf-8');
    $return = array();
    $return['error']=array();
    $return['error']['status']='422';
    $return['error']['message']='Unprocessable Entity';
    $return['error']['description']=$desc;
    if (count($errors)) {
      $return['error']['errors']=$errors;
    }
   $app->halt(422,json_pretty($return));
}

function stamp(){
  global $app;
  ob_start();
  echo $app->request->getResourceUri();
  error_log(ob_get_clean(),4);
}

/**********/
// ## Group svg
// The svg groups creates SVG images that are stand-alone or that require the SignWriting 2010 fonts.
// 

/**
* Resource
*/
// ### Stand-Alone SVG [/svg/{text}]
// 
// + Parameters
// 
//     + text: S10000 (string) - text of symbol key or FSW string, with optional styling string.
// 

// #### GET
// Individual signs and symbols are displayed in stand-alone SVG.
// An optional styling string can be used to adjust the output image.
// 
  $app->get('/svg/:text', function ($text) use ($app) {
    $timein = microtime(true);
    $req = $app->request();
    if ($req->get('throwStatus')=='500') {haltNoDatabase();}
    $app->contentType('image/svg+xml;charset=utf-8');
    $svg = SignWriting\svg($text);
    $searchTime = searchtime($timein);
    header("Search-Time: " . $searchTime);
    echo $svg;
  });


/**
* Resource
*/
// ### Stand-Alone SVG [/svg/font/{text}]
// 
// + Parameters
// 
//     + text: S10000 (string) - text of symbol key or FSW string, with optional styling string.
// 

// #### GET
// Individual signs and symbols are displayed in SVG using TrueType fonts.
// An optional styling string can be used to adjust the output image.
// 
  $app->get('/svg/font/:text', function ($text) use ($app) {
    $timein = microtime(true);
    $req = $app->request();
    if ($req->get('throwStatus')=='500') {haltNoDatabase();}
    $app->contentType('image/svg+xml;charset=utf-8');
    $svg = SignWriting\svg($text,'font');
    $searchTime = searchtime($timein);
    header("Search-Time: " . $searchTime);
    echo $svg;
  });

/**********/
// ## Group regex
// Query string to regular expression transformation.
// 

/**
* Resource
*/
// ### Regular Expressions [/regex/{query}]
// 
// + Parameters
// 
//     + query: Q (string) - Formal SignWriting query string.
// 

// #### GET
// Query strings can be transformed into regular expressions.
// 
$app->get('/regex/:query', function ($query) use ($app) {
  $timein = microtime(true);
  $regex = SignWriting\query2regex($query);
  if (!$regex){
    haltValidation('invalid query string');
  }

  $app->contentType('application/json;charset=utf-8');
  $return = array();
  $return['meta']=array();
  $return['meta']['totalResults']=count($regex);
  $return['results']=$regex;
  $return['meta']['location']='/regex/' . $query;
  $return['meta']['searchTime'] = searchtime($timein);
  echo json_pretty($return);
});

/**
* Resource
*/
// ### Regular Expressions [/regex/{flags}/{fsw}]
// 
// + Parameters
// 
//     + flags: ASL (string) - Flags for FSW convertion to query string.
//         'A' - sorted by the same exact symbols.
//         'a' - sorted by the same general symbols.
//         'S' - spatial arrangement contains the same exact symbols.
//         's' - spatial arrangement contains the same general symbols.
//         'L' - location of spatial arrangement is similar.
//     + fsw: AS20310S26b02S33100M521x547S33100482x483S20310506x500S26b02503x520 (string) - Formal SignWriting string.
// 

// #### GET
// Formal SignWriting can be transformed into regular expressions,
// depending on the flags supplied.
// 
$app->get('/regex/:flags/:fsw', function ($flags,$fsw) use ($app) {
  $timein = microtime(true);
  $lflags = '';
  $query = '';
  $flags = SignWriting\convertFlags($flags);
  if (!$flags){
    haltValidation('invalid flags');
  }

  $fsw = SignWriting\fsw($fsw);
  if (!$fsw){
    haltValidation('invalid Formal SignWriting');
  }

  $query = SignWriting\convert($fsw,$flags);
  if (!$query){
    haltValidation('no query possible');
  }
  $regex = SignWriting\query2regex($query);
  $app->contentType('application/json;charset=utf-8');
  $return = array();
  $return['meta']=array();
  $return['meta']['totalResults']=count($regex);
  $return['results']=$regex;
  $return['meta']['location']='/regex/' . $flags . '/' . $fsw;
  $return['meta']['query']=$query;
  $return['meta']['searchTime'] = searchtime($timein);
  echo json_pretty($return);
});


/**********/
// ## Group puddle
// Interact with collections of signs.
// 

/**
* Resource
*/
// ### Puddle list [/puddle]
// 

// #### GET
// A listing of all puddle collections available.
// 
$app->get('/puddle', function () use ($app) {
  $timein = microtime(true);
  $results = puddle_list();
  
  $return = array();
  $return['meta']=array();
  $return['meta']['totalResults']=$results['total'];
  $return['results']=$results['data'];
  $return['meta']['location']='/puddle';
  $return['meta']['searchTime'] = searchtime($timein);

  $app->contentType('application/json;charset=utf-8');
  echo json_pretty($return);
});

/**
* Resource
*/
// ### Puddles for language [/puddle/language/{iso639}]
// 
// + Parameters
// 
//     + iso639: ase (string) - ISO 639-3 code for sign language.
// 

// #### GET
// A listing of all puddle collections available for specific sign language.
// 
$app->get('/puddle/language/:lang', function ($lang) use ($app) {
  $timein = microtime(true);
  $results = puddle_list($lang);
  
  $return = array();
  $return['meta']=array();
  $return['meta']['totalResults']=$results['total'];
  $return['results']=$results['data'];
  $return['meta']['location']='/puddle/language/' . $lang;
  $return['meta']['searchTime'] = searchtime($timein);

  $app->contentType('application/json;charset=utf-8');
  echo json_pretty($return);
});

/**
* Resource
*/
// ### Puddles information [/puddle/{puddle}]
// 
// + Parameters
// 
//     + puddle: ase (string) - puddle code for collections or ISO 639-3 code for public ditionary.
// 

// #### GET
// Information about a specific puddle by code or alternate
// 
$app->get('/puddle/:puddle', function ($puddle) use ($app) {

  $timein = microtime(true);
  $results = puddle_list('',$puddle);
  
  $return = array();
  $return['meta']=array();
  $return['meta']['totalResults']=$results['total'];
  $return['results']=$results['data'];
  $return['meta']['location']='/puddle/' . $puddle;
  $return['meta']['searchTime'] = searchtime($timein);

  $app->contentType('application/json;charset=utf-8');
  echo json_pretty($return);
});

/**
* Resource
*/
// ### Puddles database [/puddle/db/{puddle}]
// 
// + Parameters
// 
//     + puddle: sgn4 (string) - puddle code for collection.
// 

// #### GET
// Download database for a specific puddle
// 
$app->get('/puddle/db/:puddle', function ($puddle) use ($app) {
  $puddle_file = 'data/puddle/' . $puddle . '.db';
  getFile($puddle_file);
});

/**
* Resource
*/
// ### Query for signs [/puddle/{puddle}/query/{query}{?offset,limit,sort}]
// 
// + Parameters
// 
//     + puddle: ase (string) - puddle code for collections or ISO 639-3 code for public ditionary.
//     + query: Q (string) - Formal SignWriting query string.
//     + offset: 100 (optional, number) - offset for results array.
//     + limit: 100 (optional, number) - limit the number of results. 0 for no limit, default of 100.
//     + sort: created_at (optional, number) - field for sorting results, prefix with minus for descending.  Options: id, user, sign, created_at, updated_at.
// 

// #### GET
// Search puddle collection with query.
// 
$app->get('/puddle/:puddle/query/:query', function ($puddle,$query) use ($app) {
  $timein = microtime(true);
  $offset = intval($app->request()->get('offset'));
  $limit = entry_limit();
  $sort = entry_sort();
  
  $results = puddle_query($puddle,$query,$offset,$limit,$sort);

  $plus = array();
  if ($offset){
    $plus['offset'] = $offset;
  }
  if ($limit!=$app->config('entry_limit') || $app->request()->get('limit')){
    $plus['limit'] = $limit;
  }
  if ($sort){
    $plus['sort'] = $sort;
  }
  if (count($plus)){
    $plus = '?' . http_build_query($plus); 
  } else {
    $plus = ''; 
  }
  
  $return = array();
  $return['meta']=array();
  $return['meta']['limit']=$limit;
  $return['meta']['offset']=$offset;
  $return['meta']['totalResults']=$results['total'];
  $return['results']=$results['data'];
  $return['meta']['location']='/puddle/' . $puddle . '/query/' . $query . $plus;
  $return['meta']['searchTime'] = searchtime($timein);

  $app->contentType('application/json;charset=utf-8');
  echo json_pretty($return);
});

/**
* Resource
*/
// ### Query for signs [/puddle/{puddle}/query/signtext/{query}{?offset,limit,sort}]
// 
// + Parameters
// 
//     + puddle: sgn4 (string) - puddle code for collections or ISO 639-3 code for public ditionary.
//     + query: Q (string) - Formal SignWriting query string.
//     + offset: 100 (optional, number) - offset for results array.
//     + limit: 100 (optional, number) - limit the number of results. 0 for no limit, default of 100.
//     + sort: created_at (optional, number) - field for sorting results, prefix with minus for descending.  Options: id, user, sign, created_at, updated_at.
// 

// #### GET
// Search puddle collection for SignText with query.
// 
$app->get('/puddle/:puddle/query/signtext/:query', function ($puddle,$query) use ($app) {
  $timein = microtime(true);
  $offset = intval($app->request()->get('offset'));
  $limit = entry_limit();
  $sort = entry_sort();
  $results = puddle_query_signtext($puddle,$query,$offset,$limit,$sort);

  $plus = array();
  if ($offset){
    $plus['offset'] = $offset;
  }
  if ($limit!=$app->config('entry_limit') || $app->request()->get('limit')){
    $plus['limit'] = $limit;
  }
  if ($sort){
    $plus['sort'] = $sort;
  }
  if (count($plus)){
    $plus = '?' . http_build_query($plus); 
  } else {
    $plus = ''; 
  }

  $return = array();
  $return['meta']=array();
  $return['meta']['limit']=$limit;
  $return['meta']['offset']=$offset;
  $return['meta']['totalResults']=$results['total'];
  $return['results']=$results['data'];
  $return['meta']['location']='/puddle/' . $puddle . '/query/signtext/' . $query . $plus;
  $return['meta']['searchTime'] = searchtime($timein);

  $app->contentType('application/json;charset=utf-8');
  echo json_pretty($return);
});

/**
* Resource
*/
// ### Query from FSW [/puddle/{puddle}/query/{flags}/{fsw}{?offset,limit,sort}]
// 
// + Parameters
// 
//     + puddle: sgn4 (string) - puddle code for collections or ISO 639-3 code for public ditionary.
//     + flags: ASL (string) - Flags for FSW convertion to query string.
//         'A' - sorted by the same exact symbols.
//         'a' - sorted by the same general symbols.
//         'S' - spatial arrangement contains the same exact symbols.
//         's' - spatial arrangement contains the same general symbols.
//         'L' - location of spatial arrangement is similar.
//     + fsw: AS20310S26b02S33100M521x547S33100482x483S20310506x500S26b02503x520 (string) - Formal SignWriting string.
//     + offset: 100 (optional, number) - offset for results array.
//     + limit: 100 (optional, number) - limit the number of results. 0 for no limit, default of 100.
//     + sort: created_at (optional, number) - field for sorting results, prefix with minus for descending.  Options: id, user, sign, created_at, updated_at.
// 

// #### GET
// Search puddle collection with Formal SignWriting and conversion flags.
// 
$app->get('/puddle/:puddle/query/:flags/:fsw', function ($puddle,$flags,$fsw) use ($app) {
  $timein = microtime(true);
  $lflags = '';
  $query = '';
  $flags = SignWriting\convertFlags($flags);
  if (!$flags){
    haltValidation('invalid flags');
  }

  $fsw = SignWriting\fsw($fsw);
  if (!$fsw){
    haltValidation('invalid Formal SignWriting');
  }

  $query = SignWriting\convert($fsw,$flags);
  if (!$query){
    haltValidation('no query string');
  }

  $offset = intval($app->request()->get('offset'));
  $limit = entry_limit();
  $sort = entry_sort();
  $results = puddle_query($puddle,$query,$offset,$limit,$sort);

  $plus = array();
  if ($offset){
    $plus['offset'] = $offset;
  }
  if ($limit!=$app->config('entry_limit') || $app->request()->get('limit')){
    $plus['limit'] = $limit;
  }
  if ($sort){
    $plus['sort'] = $sort;
  }
  if (count($plus)){
    $plus = '?' . http_build_query($plus); 
  } else {
    $plus = ''; 
  }

  $return = array();
  $return['meta']=array();
  $return['meta']['limit']=$limit;
  $return['meta']['offset']=$offset;
  $return['meta']['totalResults']=$results['total'];
  $return['results']=$results['data'];
  $return['meta']['location']='/puddle/' . $puddle . '/query/' . $flags . '/' . $fsw . $plus;
  $return['meta']['query']=$query;
  $return['meta']['searchTime'] = searchtime($timein);

  $app->contentType('application/json;charset=utf-8');
  echo json_pretty($return);
});

/**
* Resource
*/
// ### Query SignText from FSW [/puddle/{puddle}/query/signtext/{flags}/{fsw}{?offset,limit,sort}]
// 
// + Parameters
// 
//     + puddle: sgn4 (string) - puddle code for collections or ISO 639-3 code for public ditionary.
//     + flags: ASL (string) - Flags for FSW convertion to query string.
//         'A' - sorted by the same exact symbols.
//         'a' - sorted by the same general symbols.
//         'S' - spatial arrangement contains the same exact symbols.
//         's' - spatial arrangement contains the same general symbols.
//         'L' - location of spatial arrangement is similar.
//     + fsw: AS20310S26b02S33100M521x547S33100482x483S20310506x500S26b02503x520 (string) - Formal SignWriting string.
//     + offset: 100 (optional, number) - offset for results array.
//     + limit: 100 (optional, number) - limit the number of results. 0 for no limit, default of 100.
//     + sort: created_at (optional, number) - field for sorting results, prefix with minus for descending.  Options: id, user, sign, created_at, updated_at.
// 

// #### GET
// Search puddle collection for SignText with Formal SignWriting and conversion flags.
// 
$app->get('/puddle/:puddle/query/signtext/:flags/:fsw', function ($puddle,$flags,$fsw) use ($app) {
  $timein = microtime(true);
  $lflags = '';
  $query = '';
  $flags = SignWriting\convertFlags($flags);
  if (!$flags){
    haltValidation('invalid flags');
  }

  $fsw = SignWriting\fsw($fsw);
  if (!$fsw){
    haltValidation('invalid Formal SignWriting');
  }

  $query = SignWriting\convert($fsw,$flags);
  if (!$query){
    haltValidation('no query string');
  }

  $offset = intval($app->request()->get('offset'));
  $limit = entry_limit();
  $sort = entry_sort();
  $results = puddle_query_signtext($puddle,$query,$offset,$limit,$sort);

  $plus = array();
  if ($offset){
    $plus['offset'] = $offset;
  }
  if ($limit!=$app->config('entry_limit') || $app->request()->get('limit')){
    $plus['limit'] = $limit;
  }
  if ($sort){
    $plus['sort'] = $sort;
  }
  if (count($plus)){
    $plus = '?' . http_build_query($plus); 
  } else {
    $plus = ''; 
  }

  $return = array();
  $return['meta']=array();
  $return['meta']['limit']=$limit;
  $return['meta']['offset']=$offset;
  $return['meta']['totalResults']=$results['total'];
  $return['results']=$results['data'];
  $return['meta']['location']='/puddle/' . $puddle . '/query/signtext/' . $flags . '/' . $fsw . $plus;
  $return['meta']['query']=$query;
  $return['meta']['searchTime'] = searchtime($timein);

  $app->contentType('application/json;charset=utf-8');
  echo json_pretty($return);
});

/**
* Resource
*/
// ### Search text [/puddle/{puddle}/search/{search}{?match,ci,offset,limit,sort}]
// 
// + Parameters
// 
//     + puddle: sgn4 (string) - puddle code for collections or ISO 639-3 code for public ditionary.
//     + search: hello (string) - search string.
//     + match: exact (optional, string) - matching strategy: start, end, exact
//     + ci: true (optional, boolean) - case insensitive flag.
//     + offset: 100 (optional, number) - offset for results array.
//     + limit: 100 (optional, number) - limit the number of results. 0 for no limit, default of 100.
//     + sort: created_at (optional, number) - field for sorting results, prefix with minus for descending.  Options: id, user, sign, created_at, updated_at.
// 

// #### GET
// Search puddle collection with string.
// 
$app->get('/puddle/:puddle/search/:search', function ($puddle,$search) use ($app) {
  $timein = microtime(true);
  $ci = filter_var($app->request()->get('ci'),FILTER_VALIDATE_BOOLEAN);
  $match = $app->request()->get('match');
  $offset = intval($app->request()->get('offset'));
  $limit = entry_limit();
  $sort = entry_sort();
  $results = puddle_search($puddle,$search,$match,$ci,$offset,$limit,$sort);

  $plus = array();
  if ($match){
    $plus['match'] = $match;
  }
  if ($ci){
    $plus['ci'] = $ci;
  }
  if ($offset){
    $plus['offset'] = $offset;
  }
  if ($limit!=$app->config('entry_limit') || $app->request()->get('limit')){
    $plus['limit'] = $limit;
  }
  if ($sort){
    $plus['sort'] = $sort;
  }
  if (count($plus)){
    $plus = '?' . http_build_query($plus); 
  } else {
    $plus = ''; 
  }

  $return = array();
  $return['meta']=array();
  $return['meta']['limit']=$limit;
  $return['meta']['offset']=$offset;
  $return['meta']['totalResults']=$results['total'];
  $return['results']=$results['data'];
  $return['meta']['location']='/puddle/' . $puddle . '/search/' . $search . $plus;
  $return['meta']['searchTime'] = searchtime($timein);

  $app->contentType('application/json;charset=utf-8');
  echo json_pretty($return);
});


/**
* Resource
*/
// ### Search text [/puddle/{puddle}/created{?before,after,offset,limit,sort}]
// 
// + Parameters
// 
//     + puddle: sgn4 (string) - puddle code for collections or ISO 639-3 code for public ditionary.
//     + before: 2015/01/01 (optional,string) - date time string
//     + after: 2015/01/01 (optional,string) - date time string
//     + offset: 100 (optional, number) - offset for results array.
//     + limit: 100 (optional, number) - limit the number of results. 0 for no limit, default of 100.
//     + sort: created_at (optional, number) - field for sorting results, prefix with minus for descending.  Options: id, user, sign, created_at, updated_at.
// 

// #### GET
// Search puddle collection based on creation.
// 
$app->get('/puddle/:puddle/created', function ($puddle) use ($app) {
  $timein = microtime(true);
  $before = $app->request()->get('before');
  $after = $app->request()->get('after');
  $offset = intval($app->request()->get('offset'));
  $limit = entry_limit();
  $sort = entry_sort();

  $results = puddle_date($puddle,'created',$before,$after,$offset,$limit,$sort);

  $plus = array();
  if ($before){
    $plus['before'] = $before;
  }
  if ($after){
    $plus['after'] = $after;
  }
  if ($offset){
    $plus['offset'] = $offset;
  }
  if ($limit!=$app->config('entry_limit') || $app->request()->get('limit')){
    $plus['limit'] = $limit;
  }
  if ($sort){
    $plus['sort'] = $sort;
  }
  if (count($plus)){
    $plus = '?' . http_build_query($plus); 
  } else {
    $plus = ''; 
  }
  
  $return = array();
  $return['meta']=array();
  $return['meta']['limit']=$limit;
  $return['meta']['offset']=$offset;
  $return['meta']['totalResults']=$results['total'];
  $return['results']=$results['data'];
  $return['meta']['location']='/puddle/' . $puddle . '/created' . $plus;
  $return['meta']['searchTime'] = searchtime($timein);

  $app->contentType('application/json;charset=utf-8');
  echo json_pretty($return);
});


/**
* Resource
*/
// ### Search text [/puddle/{puddle}/updated{?before,after,offset,limit,sort}]
// 
// + Parameters
// 
//     + puddle: sgn4 (string) - puddle code for collections or ISO 639-3 code for public ditionary.
//     + before: 2015/01/01 (optional,string) - date time string
//     + after: 2015/01/01 (optional,string) - date time string
//     + offset: 100 (optional, number) - offset for results array.
//     + limit: 100 (optional, number) - limit the number of results. 0 for no limit, default of 100.
//     + sort: created_at (optional, number) - field for sorting results, prefix with minus for descending.  Options: id, user, sign, created_at, updated_at.
// 

// #### GET
// Search puddle collection based on updates.
// 
$app->get('/puddle/:puddle/updated', function ($puddle) use ($app) {
  $timein = microtime(true);
  $before = $app->request()->get('before');
  $after = $app->request()->get('after');
  $offset = intval($app->request()->get('offset'));
  $limit = entry_limit();
  $sort = entry_sort();
  $results = puddle_date($puddle,'updated',$before,$after,$offset,$limit,$sort);

  $plus = array();
  if ($before){
    $plus['before'] = $before;
  }
  if ($after){
    $plus['after'] = $after;
  }
  if ($offset){
    $plus['offset'] = $offset;
  }
  if ($limit!=$app->config('entry_limit') || $app->request()->get('limit')){
    $plus['limit'] = $limit;
  }
  if ($sort){
    $plus['sort'] = $sort;
  }
  if (count($plus)){
    $plus = '?' . http_build_query($plus); 
  } else {
    $plus = ''; 
  }
  
  $return = array();
  $return['meta']=array();
  $return['meta']['limit']=$limit;
  $return['meta']['offset']=$offset;
  $return['meta']['totalResults']=$results['total'];
  $return['results']=$results['data'];
  $return['meta']['location']='/puddle/' . $puddle . '/updated' . $plus;
  $return['meta']['searchTime'] = searchtime($timein);

  $app->contentType('application/json;charset=utf-8');
  echo json_pretty($return);
});


/**********/
// ## Group user
// Work in progress
// 

/**
* Resource
*/
// ### User Salt [/user/salt]
// 

// #### GET
// User salt is required for user authentication.
// Passwords are mixed with the salt before they are sent to the server.
// 
$app->get('/user/salt', function () use ($app) {
  $app->contentType('text/plain;charset=utf-8');
  echo User::salt();
});


$app->run();
