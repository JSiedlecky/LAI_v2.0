<?php

  function print_obj($obj){
    echo '<pre>';
      print_r($obj);
    echo '</pre>';
  }

  function shorten_string($string, $wordsCount){
    $arr = explode(' ',$string);

    if(count($arr) <= $wordsCount){
      return implode(' ', $arr);
    } else {
      $retval = '';
      for($i = 0; $i < $wordsCount; $i++){
        $retval .= $arr[$i].' ';
      }

      return $retval.'...';
    }
  }
