<?php


$view = new View();

$result = $view->db->Select('groups');

$groups = array();
foreach($result as $count => $array){
  foreach($array as $key => $value){
    $groups[$key][] = $value;
  }
}

$view->Header('Grupy');

$view->Table();

$view->Render();

foreach($result as $count => $array){
  foreach($array as $key => $value){
    echo $key." => ".$value."<br>";
  }
}
