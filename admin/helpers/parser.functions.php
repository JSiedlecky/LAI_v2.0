<?php

function ParseToTable($data, $replace = []){
  $returning = [];

  foreach($data as $count => $array){
    foreach($array as $key => $value){
      $returning[$count][] = $value;
    }
  }

  return $returning;
}

function ParseActivity($arrays){
  foreach($arrays as $count => $array){
    if($array['activity'] == 0) $arrays[$count]['activity'] = "Nie aktywny!";
    if($array['activity'] == 1) $arrays[$count]['activity'] = "Aktywny";
  }

  return $arrays;
}
