<?php

function json_check() {
  switch (json_last_error()) {
    case JSON_ERROR_NONE:
      //'No errors';
      break;
    case JSON_ERROR_DEPTH:
      haltValidation('Maximum stack depth exceeded');
      break;
    case JSON_ERROR_STATE_MISMATCH:
      haltValidation('Underflow or the modes mismatch');
      break;
    case JSON_ERROR_CTRL_CHAR:
      haltValidation('Unexpected control character found');
      break;
    case JSON_ERROR_SYNTAX:
      haltValidation('Syntax error, malformed JSON');
      break;
    case JSON_ERROR_UTF8:
      haltValidation('Malformed UTF-8 characters, possibly incorrectly encoded');
      break;
    default:
      haltValidation('Unknown error');
      break;
  }
}

function json_pretty($object)
{
    $json = json_encode($object);
    $tab = "  ";
    $new_json = "";
    $indent_level = 0;
    $in_string = false;

    $json_obj = json_decode($json);

    if($json_obj === false)
        return false;

    if (defined("JSON_UNESCAPED_SLASHES")){
      $json = json_encode($json_obj,JSON_UNESCAPED_SLASHES);
    } else {
      $json = str_replace('\\/', '/',json_encode($json_obj));
    }
    $len = strlen($json);

    for($c = 0; $c < $len; $c++)
    {
        $char = $json[$c];
        switch($char)
        {
            case '{':
            case '[':
                if(!$in_string)
                {
                    $new_json .= $char . "\n" . str_repeat($tab, $indent_level+1);
                    $indent_level++;
                }
                else
                {
                    $new_json .= $char;
                }
                break;
            case '}':
            case ']':
                if(!$in_string)
                {
                    $indent_level--;
                    $new_json .= "\n" . str_repeat($tab, $indent_level) . $char;
                }
                else
                {
                    $new_json .= $char;
                }
                break;
            case ',':
                if(!$in_string)
                {
                    $new_json .= ",\n" . str_repeat($tab, $indent_level);
                }
                else
                {
                    $new_json .= $char;
                }
                break;
            case ':':
                if(!$in_string)
                {
                    $new_json .= ": ";
                }
                else
                {
                    $new_json .= $char;
                }
                break;
            case '"':
                if($c > 0 && $json[$c-1] != '\\')
                {
                    $in_string = !$in_string;
                }
            default:
                $new_json .= $char;
                break;
        }
    }

    return $new_json;
}

function searchtime($timein){
  return intval((microtime(true)-$timein)*1000*100)/100 . ' ms';
}
