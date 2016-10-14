<?php
namespace SignWriting;

function getKeys($text){
  $syms=array();
  $fsw_sym = 'S[123][0-9a-f]{2}[0-5][0-9a-f]';
  $fsw_pattern = '/' . $fsw_sym . '/';
  $result = preg_match_all($fsw_pattern,$text,$matches);
  $syms = array();
  if ($result) {
    foreach ($matches[0] as $part){
      $syms[$part]=1;
    }
  }
  return array_keys($syms);
}

function key2code($key){
  $key = str_replace('S','',$key);
  $code =((hexdec(substr($key,0,3)) - 256) * 96) + ((hexdec(substr($key,3,1)))*16) + hexdec(substr($key,4,1))+1;
  return dec2utf($code,4);
}

function key2pua($key){
  $key = str_replace('S','',$key);
  $code =((hexdec(substr($key,0,3)) - 256) * 96) + ((hexdec(substr($key,3,1)))*16) + hexdec(substr($key,4,1))+1;
  return dec2utf($code,16);
}

function dec2utf($code,$plane){
  $a = $code%64;
  $b = floor($code/64);
  $c = floor($b/64);
  $b -= $c*64;

  switch($plane){
  case 1:
    $utf8 = "f0";
    $utf8 .= dechex($c + 144);//90
    $utf8 .= dechex($b + 128);//80
    $utf8 .= dechex($a + 128);//80
    break;
  case 4:
    $utf8 = "f1";
    $utf8 .= dechex($c + 128);//80
    $utf8 .= dechex($b + 128);//80
    $utf8 .= dechex($a + 128);//80
    break;
  case 15:
    $utf8 = "f3";
    $utf8 .= dechex($c + 176);//B0
    $utf8 .= dechex($b + 128);//80
    $utf8 .= dechex($a + 128);//80
    break;
  case 16:
    $utf8 = "f4";
    $utf8 .= dechex($c + 128);//80
    $utf8 .= dechex($b + 128);//80
    $utf8 .= dechex($a + 128);//80
    break;
  }

  return pack("N",hexdec($utf8));
}

function chex($name){
  if(preg_match("/[0-9a-fA-F]{3}([0-9a-fA-F]{3})?/",$name)){
    $name = '#' . $name;
  }
  return $name;
}

function stylingArray($styling){
  $styling = styling($styling);
  $options = array('size'=>1,'colorize'=>0,'pad'=>0,'line'=>'black','fill'=>'white','back'=>'','E'=>array(),'F'=>array(),'class'=>'','id'=>'');
  if ($styling){
    $parts = explode("-",$styling);

    if ($parts[1]){ /* general sign */
      if(preg_match("/C/",$parts[1],$matches) == true){
        $options['colorize'] = true;
      }

      if(preg_match("/P[0-9]{2}/",$parts[1],$matches) == true){
        $options['pad'] = intval(substr($matches[0],1));
      }

      if(preg_match("/G_([0-9a-fA-F]{3}([0-9a-fA-F]{3})?|[a-zA-Z]+)_/",$parts[1],$matches) == true){
        $matched = substr($matches[0],2,-1);
        if(preg_match("/[0-9a-fA-F]{3}([0-9a-fA-F]{3})/",$matches[0],$matches) == true){
          $options['back'] = '#' . $matched;
        } else {
          $options['back'] = $matched;
        }
      }

      if(preg_match("/D_([0-9a-f]{3}([0-9a-f]{3})?|[a-zA-Z]+)(,([0-9a-f]{3}([0-9a-f]{3})?|[a-zA-Z]+))?_/",$parts[1],$matches) == true){
        $matched = substr($matches[0],2,-1);
        $colors = explode(",",$matched . ',');
        $options['line'] = chex($colors[0]);
        if ($colors[1]){
          $options['fill'] = chex($colors[1]);
        }
      }

      if(preg_match("/Z([0-9]+(\.[0-9]+)?|x)/",$parts[1],$matches) == true){
        if ($matches[0]=='Zx'){
          $matched = 'x';
        } else {
          $matched = floatval(substr($matches[0],1));
        }
        $options['size'] = $matched;
      }
    }


    if (count($parts)>2) { /* specific symbols */
      if(preg_match_all("/D[0-9]{2}_([0-9a-f]{3}([0-9a-f]{3})?|[a-wyzA-Z]+)(,([0-9a-f]{3}([0-9a-f]{3})?|[a-wyzA-Z]+))?_/",$parts[2],$matches) == true){
        foreach ($matches[0] as $colored){
          $specific = intval(substr($colored,1,2));
          $colors = substr($colored,4,-1);
          $colors = explode(",", $colors . ',');

          if ($colors[0]) $colors[0] = chex($colors[0]);
          if ($colors[1]) $colors[1] = chex($colors[1]);
          $options['E'][$specific] = $colors;
        }
      }
      if(preg_match_all("/Z[0-9]{2},[0-9]+(\.[0-9]+)?(,[0-9]{3}x[0-9]{3})?/",$parts[2],$matches) == true){
        foreach ($matches[0] as $sized){
          $specific = intval(substr($sized,1,2));
          $size = explode(',',substr($sized,4));
          $size[0] = floatval($size[0]);
          $options['F'][$specific] = $size;
        }
      }
    }

    if (count($parts)>3) { /* svg class and id */
      $stylings = explode('!',implode('-',array_slice($parts,3)));
      $options['class']=$stylings[0];
      $options['id']=$stylings[1];
    }

  }

  return $options;
}

function bbox ($text){
  if(preg_match_all("/[0-9]{3}x[0-9]{3}/",$text,$matches) == true){
    foreach ($matches[0] as $i=>$coord){
      $x = intval(substr($coord,0,3));
      $y = intval(substr($coord,4,3));
      if ($i==0){
        $x1 = $x2 = $x;
        $y1 = $y2 = $y;
      } else {
        $x1 = min($x1,$x);
        $x2 = max($x2,$x);
        $y1 = min($y1,$y);
        $y2 = max($y2,$y);
      }
    }
    return '' . $x1 . ' ' . $x2 . ' ' . $y1 . ' ' . $y2;
  } else {
    return '';
  }
}

function svg ($text,$font=false){
  $options = stylingArray($text);

  $fsw = fsw($text);
  if (!$fsw){
    $text = key($text);
    if(strlen($text)==6) {
      $text .= "500x500";
    }
  } else {
    $text = $fsw;
  }

  if ($text){
    $bbox = explode(' ',bbox($text));
    $x1 = $bbox[0];
    $x2 = $bbox[1];
    $y1 = $bbox[2];
    $y2 = $bbox[3];
    $force = false;
    if (substr($text,0,1)=='S'){
      if ($x1==500 && $y1==500){
        $force = true;
      } else {
        $x2 = 1000-$x1;
        $y2 = 1000-$y1;
      }
    }

    if (!$font || $force || count($options['F'])){
      $syms = getKeys($text);
      $glyphs = array();
      foreach ($syms as $sym){
        $glyphs[$sym]='';
      }
      $symbols = getSymbols($syms);
      if ($symbols) {
        foreach ($symbols as $symbol){
          $glyphs[$symbol->key] = $symbol;
        }
      }
    }

    if ($force){
      $key = substr($text,0,6);
      $x2 = 500 + intval($glyphs[$key]->w);
      $y2 = 500 + intval($glyphs[$key]->h);
    }

    $spatial_re = '/S[123][0-9a-f]{2}[0-5][0-9a-f][0-9]{3}x[0-9]{3}/';

    $result = preg_match_all($spatial_re,$text,$matches);
    $svgs = array();
    foreach ($matches[0] as $i=>$spatial) {
      $key = substr($spatial,0,6);
      $x = substr($spatial,6,3);
      $y = substr($spatial,10,3);

      $fontsize = 30;
      if(array_key_exists($i+1,$options['F'])){
        $fontsize = $fontsize * $options['F'][$i+1][0];
        if (array_key_exists(1,$options['F'][$i+1])){
          $x = intval($x) + intval(substr($options['F'][$i+1][1],0,3))-500;
          $y = intval($y) + intval(substr($options['F'][$i+1][1],4,3))-500;
          $x1 = min($x1,$x);
          $y1 = min($y1,$y);
        }
        if (array_key_exists($key,$glyphs)){
          $x2 = max($x2,intval($x) + ($options['F'][$i+1][0] * intval($glyphs[$key]->w)));
          $y2 = max($y2,intval($y) + ($options['F'][$i+1][0] * intval($glyphs[$key]->h)));
        }
      }
      if ($options['colorize']) {
        $line = '#' . colorize($key);
      } else {
        $line = $options['line'];
      }
      $fill = $options['fill'];
      if (array_key_exists($i+1,$options['E'])) {
        $line = $options['E'][$i+1][0];
        if ($options['E'][$i+1][1]) {
          $fill = $options['E'][$i+1][1];
        }
      }
      if ($font) {
        $g = '  <g transform="translate(' . $x . ',' . $y . ')">' . "\n";
        $g .= '    <text class="sym-fill" style="pointer-events:none;font-family:\'SuttonSignWritingFill\';font-size:' . $fontsize . 'px;fill:' . $fill . ';">' . key2pua($key) . '</text>' . "\n";
        $g .= '    <text class="sym-line" style="pointer-events:none;font-family:\'SuttonSignWriting\';font-size:' . $fontsize . 'px;fill:' . $line . ';">' . key2code($key) . '</text>' . "\n";
        $g .= '  </g>' . "\n";
        $svgs[] = $g;
      } else {
        $glyph = $glyphs[$key]->g;
        $glyph = str_replace("#ffffff", $fill, $glyph);
        $glyph = str_replace('class="sym-line"','class="sym-line" fill="' . $line . '"',$glyph);
        if(array_key_exists($i+1,$options['F'])){
          $glyph = "<g transform='scale(" . $options['F'][$i+1][0] . ")'>" . $glyph . "</g>";
        }
        $svgs[] = "  <svg x='" . $x . "' y='" . $y . "'>" . $glyph . "</svg>" . "\n";
      }
    }


    $x1 = $x1 - $options['pad'];
    $x2 = $x2 + $options['pad'];
    $y1 = $y1 - $options['pad'];
    $y2 = $y2 + $options['pad'];

    $w = ($x2 - $x1);
    $h = ($y2 - $y1);

    $svg = '<svg ';
    if ($options['class']) {
      $svg .= 'class="' . $options['class'] . '" ';
    }
    if ($options['id']) {
      $svg .= 'id="' . $options['id'] . '" ';
    }

    $svg .= 'version="1.1" xmlns="http://www.w3.org/2000/svg"';
    if ($options['size']!="x"){
      $svg .= ' width="' . ($w * $options['size']) . '" height="' . ($h * $options['size']) . '"';
    }
    $svg .= ' viewBox="' . $x1 . ' ' . $y1 . ' ' . $w . ' ' . $h . '">' . "\n";
    $svg .= '  <text style="font-size:0%;">' . $text . '</text>' . "\n";
    if ($options['back']) {
      $svg .= '  <rect x="' . $x1 . '" y="' . $y1 . '" width="' . $w . '" height="' . $h . '" style="fill:' . $options['back'] . ';" />' . "\n";
    }

    $svg .= implode($svgs);
    $svg .= "</svg>";

//    header("Pragma: public");
//    $expires = 60*60*24*365;
//    header("Cache-Control: maxage=".$expires);
//    header('Expires: ' . gmdate('D, d M Y H:i:s', time()+$expires) . ' GMT');
//    $lastmod = 'Thu, 12 Jan 2012 16:20:01 GMT';
//    header('Last-Modified: ' . $lastmod);
//    $etag = md5($_SERVER["REQUEST_URI"]);
//    header("Etag: $etag");
    return $svg;
  }
}

function key($text,$styling=0){
  $fsw_sym = 'S[123][0-9a-f]{2}[0-5][0-9a-f]';
  $fsw_coord = '[0-9]{3}x[0-9]{3}';
  $fsw_pattern = '/' . $fsw_sym . '(' . $fsw_coord . ')?/';

  $result = preg_match($fsw_pattern,$text,$matches);
  if ($result) {
    $match = $matches[0];
    if ($styling){
      $match .= styling($text);
    }
    return $match;
  }
  return '';
}

function colorize($key) {
  $color = '000000';
  if (isHand($key)) {$color = '0000CC';}
  if (isMove($key)) {$color = 'CC0000';}
  if (isDyn($key)) {$color = 'FF0099';}
  if (isHead($key)) {$color = '006600';}
  if (isTrunk($key)) {$color = '000000';}
  if (isLimb($key)) {$color = '000000';}
  if (isLoc($key)) {$color = '884411';}
  if (isPunc($key)) {$color = 'FF9900';}
  return $color;
}

function inHexRange($start, $end, $char){
  $char = substr(str_replace('S','',$char),0,3);
  if (hexdec($char)>=hexdec($start) and hexdec($char)<=hexdec($end)){
    return true;
  } else {
    return false;
  }
}

function isWrit($key){
  $char = substr($key,1,3);
  return inHexRange("100","37e",$char);
}

function isHand($key){
  $char = substr($key,1,3);
  return inHexRange("100","204",$char);
}

function isMove($key){
  $char = substr($key,1,3);
  return inHexRange("205","2f6",$char);
}

function isDyn($key){
  $char = substr($key,1,3);
  return inHexRange("2f7","2fe",$char);
}

function isHead($key){
  $char = substr($key,1,3);
  return inHexRange("2ff","36c",$char);
}

function hasHead($text){
  $re_sym = 'S(2ff|3[0-5][0-9a-f]|36[0-9a-c])';
  $re_pattern = '/' . $re_sym . '/i';
  $result = preg_match_all($re_pattern,$text,$matches);
  return count($matches[0])>0;
}

function isTrunk($key){
  $char = substr($key,1,3);
  return inHexRange("36d","375",$char);
}

function isLimb($key){
  $char = substr($key,1,3);
  return inHexRange("376","37e",$char);
}

function isLoc($key){
  $char = substr($key,1,3);
  return inHexRange("37f","386",$char);
}

function isPunc($key){
  $char = substr($key,1,3);
  return inHexRange("387","38b",$char);
}


function styling($text) {
  $fsw_styling = '-C?(P[0-9]{2})?(G_([0-9a-fA-F]{3}([0-9a-fA-F]{3})?|[a-zA-Z]+)_)?(D_([0-9a-fA-F]{3}([0-9a-fA-F]{3})?|[a-zA-Z]+)(,([0-9a-fA-F]{3}([0-9a-fA-F]{3})?|[a-zA-Z]+))?_)?(Z([0-9]+(.[0-9]+)?|x))?(-(D[0-9]{2}_([0-9a-fA-F]{3}([0-9a-fA-F]{3})?|[a-zA-Z]+)(,([0-9a-fA-F]{3}([0-9a-fA-F]{3})?|[a-zA-Z]+))?_)*(Z[0-9]{2},[0-9]+(.[0-9]+)?(,[0-9]{3}x[0-9]{3})?)*)?(--?[_a-zA-Z][_a-zA-Z0-9-]{0,100}( -?[_a-zA-Z][_a-zA-Z0-9-]{0,100})*!([a-zA-Z][_a-zA-Z0-9-]{0,100}!)?)?';
  $fsw_pattern = '/' . $fsw_styling . '/';
  $result = preg_match($fsw_pattern,$text,$matches);
  if ($result) {
    return $matches[0];
  }
  return '';
}


function fsw($text,$styling=0){
  $fsw_sym = 'S[123][0-9a-f]{2}[0-5][0-9a-f]';
  $fsw_coord = '[0-9]{3}x[0-9]{3}';
  $fsw_word = '(A(' . $fsw_sym. ')+)?[BLMR](' . $fsw_coord . ')(' . $fsw_sym . $fsw_coord . ')*';
  $fsw_punc = 'S38[7-9ab][0-5][0-9a-f]' . $fsw_coord;
  $fsw_pattern = '/(' . $fsw_word . '|' . $fsw_punc . ')/';

  $result = preg_match($fsw_pattern,$text,$matches);
  if ($result) {
    $match = $matches[0];
    if ($styling){
      $match .= styling($text);
    }
    return $match;
  }
}

function fswText($text){
  $fsw_sym = 'S[123][0-9a-f]{2}[0-5][0-9a-f]';
  $fsw_coord = '[0-9]{3}x[0-9]{3}';
  $fsw_word = '(A(' . $fsw_sym. ')+)?[BLMR](' . $fsw_coord . ')(' . $fsw_sym . $fsw_coord . ')*';
  $fsw_punc = 'S38[7-9ab][0-5][0-9a-f]' . $fsw_coord;
  $fsw_pattern = '/^(' . $fsw_word . '|' . $fsw_punc . ')( ' . $fsw_word . '| ' . $fsw_punc .')*$/i';

  $result = preg_match($fsw_pattern,$text,$matches);
  if ($result) {
    if ($text == $matches[0]) {
      return true;
    }
  }
  return false;
}

function fswQuery($text){
  $fsw_range = 'R[123][0-9a-f]{2}t[123][0-9a-f]{2}';
  $fsw_sym = 'S[123][0-9a-f]{2}[0-5u][0-9a-fu]';
  $fsw_coord = '([0-9]{3}x[0-9]{3})?';
  $fsw_var = '(V[0-9]+)';
  $fsw_query = 'Q((A(' . $fsw_sym . '|' . $fsw_range . ')+)?T)?(' . $fsw_sym . $fsw_coord . '|' . $fsw_range . $fsw_coord . ')*' . $fsw_var  . '?';
  $fsw_pattern = '/^' . $fsw_query . '$/';
  $result = preg_match($fsw_pattern,$text,$matches);
  if ($result) {
    if ($text == $matches[0]) {
      return true;
    }
  }
  return false;
}

function fsw2query($fsw){
  if (!fswText($fsw)) return;
  $fsw_sym = 'S[123][0-9a-f]{2}[0-5][0-9a-f]';
  $fsw_coord = '[0-9]{3}x[0-9]{3}';
  $fsw_query = $fsw_sym . $fsw_coord;
  $fsw_pattern = '/' . $fsw_query . '/i';

  $result = preg_match_all($fsw_pattern,$fsw,$matches);
  $query = 'Q';
  foreach ($matches[0] as $part){
    $query .= $part;
  }

  return $query;
}

function convertFlags($flags){
  $rflags = '';
  if (strpos($flags,'A') !== false){
    $rflags .= 'A';
  } else if (strpos($flags,'a') !== false){
    $rflags .= 'a';
  }
  if (strpos($flags,'S') !== false){
    $rflags .= 'S';
  } else if (strpos($flags,'s') !== false){
    $rflags .= 's';
  }
  if (strpos($flags,'L') !== false){
    $rflags .= 'L';
  }
  return $rflags;
}

function convert($fsw,$flags){
  $flags = convertFlags($flags);
  if (!$flags) {
    return '';
  }
  if (!fswText($fsw)) return;

  $fsw_sym = 'S[123][0-9a-f]{2}[0-5][0-9a-f]';
  $fsw_coord = '[0-9]{3}x[0-9]{3}';
  $re_sequence = '/A(' . $fsw_sym . ')+/';
  $re_spatial = '/' . $fsw_sym . $fsw_coord . '/';

  $A = (strpos($flags,'A') !== false);
  $a = (strpos($flags,'a') !== false);
  $S = (strpos($flags,'S') !== false);
  $s = (strpos($flags,'s') !== false);
  $L = (strpos($flags,'L') !== false);

  $query = '';
  if ($a || $A) {
    if(preg_match($re_sequence,$fsw,$matches) == true){
      $syms = str_split(substr($matches[0],1),6);
      foreach ($syms as $key){
        if ($a) {
          $key = substr($key,0,4) . 'uu';
        }
        $query .= $key;
      }
    }
    if ($query){
      $query = 'A' . $query . 'T';
    }
  }

  if ($s || $S) {
    if(preg_match_all($re_spatial,$fsw,$matches) == true){
      foreach ($matches[0] as $spatial){
        if ($S) {
          $key = substr($spatial,0,6);
        } else {
          $key = substr($spatial,0,4) . 'uu';
        }
        if ($L){
          $key .= substr($spatial,6,7);
        }
        $query .= $key;
      }
    }
  }

  if ($query){
    return 'Q' . $query;
  } else {
    return '';
  }
}

function range2regex($min,$max,$hex='',$test=''){
  $min = str_pad($min,3,'0',STR_PAD_LEFT);
  $max = '' . $max;
  $pattern='';
//  if ($val=='uuu') return '[0-9]{3}';
  //assume numbers are 3 digits long

  if ($min===$max) return $min;

if ($test) echo "<h3>Original values $min</h3>";

  //ending pattern will be series of connected OR ranges
  $re = array();

  //first pattern.  10's don't match and the min 1's are not zero
  //odd number to 9
  if (!($min[0]==$max[0] && $min[1]==$max[1])) {
    if ($min[2]!='0'){
      $pattern = $min[0] . $min[1];
      if ($hex) {
        //switch for dex
        switch ($min[2]){
        case "f":
          $pattern .= 'f';
          break;
        case "e":
          $pattern .= '[ef]';
          break;
        case "d";
        case "c";
        case "b";
        case "a";
          $pattern .= '[' . $min[2] . '-f]';
          break;
        default:
          switch ($min[2]){
            case "9":
           $pattern .= '[9a-f]';
            break;
          case "8":
            $pattern .= '[89a-f]';
            break;
          default:
           $pattern .= '[' . $min[2] . '-9a-f]';
            break;
          }
          break;
        }
        $diff = 15-hexdec($min[2]) +1;
        $min = '' . dechex((hexdec($min)+$diff));
        $re[] =$pattern;
      } else {
        //switch for dex
        switch ($min[2]){
        case "9":
          $pattern .= '9';
          break;
        case "8":
          $pattern .= '[89]';
          break;
        default:
         $pattern .= '[' . $min[2] . '-9]';
          break;
        }
        $diff = 9-$min[2] +1;
        $min = '' . ($min+$diff);
        $re[] =$pattern;
      }
    }
  }
if ($test) {
  echo "<h3>Bring up the non zero digits</li></h3>";
  if ($pattern) {
    echo "<p>Step One: $pattern for new values $min";
  } else {
    echo "<p>Step One: NA";
  }
}
$pattern = '';

  //if hundreds are different, get odd to 99 or ff
  if ($min[0]!=$max[0]){
    if ($min[1]!='0'){
      if ($hex){
        //scrape to ff
        $pattern = $min[0];
        switch ($min[1]){
        case "f":
          $pattern .= 'f';
          break;
        case "e":
          $pattern .= '[ef]';
          break;
        case "d":
        case "c":
        case "b":
        case "a":
         $pattern .= '[' . $min[1] . '-f]';
          break;
        case "9":
         $pattern .= '[9a-f]';
          break;
        case "8":
         $pattern .= '[89a-f]';
          break;
        default:
         $pattern .= '[' . $min[1] . '-9a-f]';
          break;
        }
        $pattern .= '[0-9a-f]';
        $diff = 15-hexdec($min[1]) +1;
        $min = '' . dechex(hexdec($min)+$diff*16);
        $re[] =$pattern;
      } else {
        //scrape to 99
        $pattern = $min[0];
        $diff = 9-$min[1] +1;
        switch ($min[1]){
        case "9":
          $pattern .= '9';
          break;
        case "8":
          $pattern .= '[89]';
          break;
        default:
         $pattern .= '[' . $min[1] . '-9]';
          break;
        }
        $pattern .= '[0-9]';
        $diff = 9-$min[1] +1;
        $min = '' . ($min+$diff*10);
        $re[] =$pattern;
      }
    }
  }
if ($test) {
  echo "<h3>Bring up the 10's if hundreds are different</h3>";
  if ($pattern) {
    echo "<p>Step Two: $pattern for new values $min";
  } else {
    echo "<p>Step Two: NA";
  }
}
$pattern = '';

  //if hundreds are different, get to same
  if ($min[0]!=$max[0]){
    if ($hex){
      $diff = hexdec($max[0]) - hexdec($min[0]);
      $tmax = dechex(hexdec($min[0]) + $diff-1);

      switch ($diff){
      case 1:
        $pattern = $min[0];
        break;
      case 2:
        $pattern = '[' . $min[0] . $tmax . ']';
        break;
      default:
        if (hexdec($min[0])>9){
          $minV = 'h';
        } else {
          $minV = 'd';
        }
        if (hexdec($tmax)>9){
          $maxV = 'h';
        } else {
          $maxV = 'd';
        }
        switch ($minV . $maxV){
        case "dd":
          $pattern .= '[' . $min[0] . '-' . $tmax . ']';
          break;
        case "dh":
          $diff = 9 - $min[0];
          //firs get up to 9
          switch ($diff){
          case 0:
            $pattern .= '[9';
            break;
          case 1:
            $pattern .= '[89';
            break;
          default:
            $pattern .= '[' . $min[0] . '-9';
            break;
          }
          switch ($tmax[0]){
          case 'a':
            $pattern .= 'a]';
            break;
          case 'b':
            $pattern .= 'ab]';
            break;
          default:
            $pattern .= 'a-' . $tmax . ']';
            break;
          }
          break;
        case "hh":
          $pattern .= '[' . $min[0] . '-' . $tmax . ']';
          break;
        }
      }

      $pattern .= '[0-9a-f][0-9a-f]';
      $diff = hexdec($max[0]) - hexdec($min[0]);
      $min = '' . dechex(hexdec($min)+$diff*256);
      $re[] =$pattern;
    } else {
      $diff = $max[0] - $min[0];
      $tmax = $min[0] + $diff-1;

      switch ($diff){
      case 1:
        $pattern = $min[0];
        break;
      case 2:
        $pattern = '[' . $min[0] . $tmax . ']';
        break;
      default:
       $pattern = '[' . $min[0] . '-' . $tmax . ']';
        break;
      }
      $pattern .= '[0-9][0-9]';
      $min = '' . ($min+$diff*100);
      $re[] =$pattern;
    }
  }
if ($test) {
  echo "<h3>Bring up the 100's if different</h3>";
  if ($pattern) {
    echo "<p>Step Three: $pattern for new values $min";
  } else {
    echo "<p>Step Three: NA";
  }
}
$pattern = '';

  //if tens are different, get to same
  if ($min[1]!=$max[1]){
    if ($hex){
      $diff = hexdec($max[1]) - hexdec($min[1]);
      $tmax = dechex(hexdec($min[1]) + $diff-1);
      $pattern = $min[0];
      switch ($diff){
      case 1:
        $pattern .= $min[1];
        break;
      case 2:
        $pattern .= '[' . $min[1] . $tmax . ']';
        break;
      default:

        if (hexdec($min[1])>9){
          $minV = 'h';
        } else {
          $minV = 'd';
        }
        if (hexdec($tmax)>9){
          $maxV = 'h';
        } else {
          $maxV = 'd';
        }
        switch ($minV . $maxV){
        case "dd":
          $pattern .= '[' . $min[1];
          if ($diff>1) $pattern .= '-';
          $pattern .= $tmax . ']';
          break;
        case "dh":
          $diff = 9 - $min[1];
          //firs get up to 9
          switch ($diff){
          case 0:
            $pattern .= '[9';
            break;
          case 1:
            $pattern .= '[89';
            break;
          default:
            $pattern .= '[' . $min[1] . '-9';
            break;
          }
          switch ($max[1]){
          case 'a':
            $pattern .= ']';
            break;
          case 'b':
            $pattern .= 'a]';
            break;
          default:
            $pattern .= 'a-' . dechex(hexdec($max[1])-1) . ']';
            break;
          }
          break;
        case "hh":
          $pattern .= '[' . $min[1];
          if ($diff>1) $pattern .= '-';
          $pattern .= dechex(hexdec($max[1])-1) . ']';
          break;
        }
        break;
      }
      $pattern .= '[0-9a-f]';
      $diff = hexdec($max[1]) - hexdec($min[1]);
      $min = '' . dechex(hexdec($min)+$diff*16);
      $re[] =$pattern;
    } else {
      $diff = $max[1] - $min[1];
      $tmax = $min[1] + $diff-1;
      $pattern = $min[0];
      switch ($diff){
      case 1:
        $pattern .= $min[1];
        break;
      case 2:
        $pattern .= '[' . $min[1] . $tmax . ']';
        break;
      default:
       $pattern .= '[' . $min[1] . '-' . $tmax . ']';
        break;
      }
      $pattern .= '[0-9]';
      $min = '' . ($min+$diff*10);
      $re[] =$pattern;
    }

  }
if ($test) {
  echo "<h3>Bring up the 10's</h3>";
  if ($pattern) {
    echo "<p>Step Four: $pattern for new values $min";
  } else {
    echo "<p>Step Four: NA";
  }
}
$pattern = '';

  //if digits are different, get to same
  if ($min[2]!=$max[2]){
    if ($hex){
      $pattern = $min[0] . $min[1];
      $diff = hexdec($max[2]) - hexdec($min[2]);
      if (hexdec($min[2])>9){
        $minV = 'h';
      } else {
        $minV = 'd';
      }
      if (hexdec($max[2])>9){
        $maxV = 'h';
      } else {
        $maxV = 'd';
      }
      switch ($minV . $maxV){
      case "dd":
        $pattern .= '[' . $min[2];
        if ($diff>1) $pattern .= '-';
        $pattern .= $max[2] . ']';
        break;
      case "dh":
        $diff = 9 - $min[2];
        //firs get up to 9
        switch ($diff){
        case 0:
          $pattern .= '[9';
          break;
        case 1:
          $pattern .= '[89';
          break;
        default:
          $pattern .= '[' . $min[2] . '-9';
          break;
        }
        switch ($max[2]){
        case 'a':
          $pattern .= 'a]';
          break;
        case 'b':
          $pattern .= 'ab]';
          break;
        default:
          $pattern .= 'a-' . $max[2] . ']';
          break;
        }

        break;
      case "hh":
        $pattern .= '[' . $min[2];
        if ($diff>1) $pattern .= '-';
        $pattern .= $max[2] . ']';
        break;
      }
      $diff = hexdec($max[2]) - hexdec($min[2]);
      $min = '' . dechex(hexdec($min) + $diff);
      $re[] =$pattern;
    } else {
      $diff = $max[2] - $min[2];
      $pattern = $min[0] . $min[1];
      switch ($diff){
      case 0:
        $pattern .= $min[2];
        break;
      case 1:
        $pattern .= '[' . $min[2] . $max[2] . ']';
        break;
      default:
       $pattern .= '[' . $min[2] . '-' . $max[2] . ']';
        break;
      }
      $min = '' . ($min+$diff);
      $re[] =$pattern;
    }
  }
if ($test) {
  echo "<h3>Bring up the 1's</h3>";
  if ($pattern) {
    echo "<p>Step Five: $pattern for new values $min";
  } else {
    echo "<p>Step Five: NA";
  }
}
$pattern = '';



  //last place is whole hundred
  if ($min[2]=='0' && $max[2]=='0') {
    $pattern = $max;
    $re[] =$pattern;
  }
if ($test) {
  echo "<h3>Match Zero endings</h3>";
  if ($pattern) {
    echo "<p>Step Six: $pattern for new values $min";
  } else {
    echo "<p>Step Six: NA";
  }
}
$pattern = '';

  $cnt = count($re);
  if ($cnt==1){
    $pattern = $re[0];
  } else {
    $pattern = implode($re,')|(');
    $pattern = '((' . $pattern . '))';
  }
  return $pattern;
}

function query2regex ($query,$fuzz='',$boundry='/'){
  if ($fuzz=='') $fuzz = 20;
  $re_sym = 'S[123][0-9a-f]{2}[0-5][0-9a-f]';
  $re_coord = '[0-9]{3}x[0-9]{3}';
  $re_word = '[BLMR](' . $re_coord . ')(' . $re_sym . $re_coord . ')*';
  $re_term = '(A(' . $re_sym. ')+)';
  $fsw_range = 'R[123][0-9a-f]{2}t[123][0-9a-f]{2}';
  $fsw_sym = 'S[123][0-9a-f]{2}[0-5u][0-9a-fu]';
  $fsw_coord = '([0-9]{3}x[0-9]{3})?';
  $fsw_var = '(V[0-9]+)';
  $fsw_query = 'Q((A(' . $fsw_sym . '|' . $fsw_range . ')+)?T)?(' . $fsw_sym . $fsw_coord . '|' . $fsw_range . $fsw_coord . ')*' . $fsw_var  . '?';
  if (!fswQuery($query)) return;
  if (!$query || $query=='Q'){
    return array($boundry . $re_term . '?'. $re_word . $boundry);
  }
  if (!$query || $query=='QT'){
    return array($boundry . $re_term . $re_word . $boundry);
  }
  $segments = array();
  $term = strpos($query,'T');
  if ($term){
    $q_term = '(A';
    $query_t = substr($query,0,$term);
    $query = substr($query,$term+1);
    //this gets all symbols and ranges
    $fsw_pattern = '/(' . $fsw_sym . '|' . $fsw_range . ')/';
    $result = preg_match_all($fsw_pattern,$query_t,$matches);
    if ($result) {
      foreach ($matches[0] as $part){
        //if symbol...
        $fsw_pattern = '/^' . $fsw_sym . '$/';
        $result = preg_match($fsw_pattern,$part,$matched);
        if ($result) {
          $base = substr($part,1,3);
          $segment = 'S' . $base;
          $fill = substr($part,4,1);
          if ($fill=='u') {
            $segment .= '[0-5]';
          } else {
            $segment .= $fill;
          }

          $rotate = substr($part,5,1);
          if ($rotate=='u') {
            $segment .= '[0-9a-f]';
          } else {
            $segment .= $rotate;
          }
          $q_term .= $segment;
        } else {
          $from = substr($part,1,3);
          $to = substr($part,5,3);
          $re_range = range2regex($from,$to,"hex");
          $segment = 'S' . $re_range . '[0-5][0-9a-f]';
          $q_term .= $segment;
        }
      }
      $q_term .= '(' . $re_sym. ')*)';
    } else {
      $q_term .= '(' . $re_sym. ')+)';
    }
  }

  //get the variance
  $fsw_pattern = '/' . $fsw_var . '/';
  $result = preg_match($fsw_pattern,$query,$matches);
  if ($result) $fuzz = substr($matches[0],1);
  //this gets all symbols with or without location
  $fsw_pattern = '/' . $fsw_sym . $fsw_coord . '/';
  $result = preg_match_all($fsw_pattern,$query,$matches);
  if ($result) {
    foreach ($matches[0] as $part){
      $base = substr($part,1,3);
      $segment = 'S' . $base;
      $fill = substr($part,4,1);
      if ($fill=='u') {
        $segment .= '[0-5]';
      } else {
        $segment .= $fill;
      }

      $rotate = substr($part,5,1);
      if ($rotate=='u') {
        $segment .= '[0-9a-f]';
      } else {
        $segment .= $rotate;
      }
      if (strlen($part)>6){
        $x = substr($part,6,3);
        $y = substr($part,10,3);
        //now get the x segment range...
        $segment .= range2regex(($x-$fuzz),($x+$fuzz));
        $segment .= 'x';
        $segment .= range2regex(($y-$fuzz),($y+$fuzz));
      } else {
        $segment .= $re_coord;
      }
      //now I have the specific search symbol
      // add to general ksw word
      $segment = $re_word . $segment . '(' . $re_sym . $re_coord . ')*';
      if ($term) {
        $segment = $q_term . $segment;
      } else {
        $segment = $re_term . '?' . $segment;
      }
      $segment= '/' . $segment . '/';
      $segments[]= $segment;
    }
  }
  //this gets all ranges
  $fsw_pattern = '/' . $fsw_range . $fsw_coord . '/';
  $result = preg_match_all($fsw_pattern,$query,$matches);
  if ($result) {
    foreach ($matches[0] as $part){
      $from = substr($part,1,3);
      $to = substr($part,5,3);
      $re_range = range2regex($from,$to,"hex");
      $segment = 'S' . $re_range . '[0-5][0-9a-f]';
      if (strlen($part)>8){
        $x = substr($part,8,3);
        $y = substr($part,12,3);
        //now get the x segment range...
        $segment .= range2regex(($x-$fuzz),($x+$fuzz));
        $segment .= 'x';
        $segment .= range2regex(($y-$fuzz),($y+$fuzz));
      } else {
        $segment .= $re_coord;
      }
      // add to general ksw word
      $segment = $re_word . $segment . '(' . $re_sym . $re_coord . ')*';
      if ($term) {
        $segment = $q_term . $segment;
      } else {
        $segment = $re_term . '?' . $segment;
      }
      $segment= $boundry . $segment . $boundry;
      $segments[]= $segment;
    }
  }
  if (count($segments)==0){
    if ($term){
      $segments[] = $boundry . $q_term . $re_word . $boundry;
    } else {
      $segments[] = $boundry . $re_term . '?' . $re_word . $boundry;
    }
  }
  return $segments;
}
