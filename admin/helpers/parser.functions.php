<?php

function ParseToTable($data){
  $returning = [];

  foreach($data as $count => $array){
    foreach($array as $key => $value){
      $returning[$count][] = $value;
    }
  }

  return $returning;
}
