<?php

include('../classes/Database.php');

$db = new Database();

$action = $_GET['action'];

if($action == 'delete'){
  $id = $_GET['id'];

  if($db->Delete('payments',['idpay'=>$id])) echo 'OK';
  else echo 'ERROR';
}

if($action == 'add') {
  $inserts = "INSERT INTO `payments` (`amount`,`payment_for`,`payer`,`payment_date`,`additional`) VALUES";
  $tmp = '';

  foreach($_POST as $k => $v){
    $tmp .= ' (';
    $counter = 0;
    foreach($_POST[$k] as $index => $value){
      if($counter != count($_POST[$k]) - 1) $tmp .= "'".$value."', ";
      else $tmp .= "'".$value."'";

      $counter ++;
    }
    if($k != count($_POST) - 1) $tmp .= '),';
    else $tmp .= ')';
  }

  $inserts .= $tmp;

  if($db->Query($inserts)) echo 'OK';
  else echo 'ERROR';
}

if($action == 'selectpayment') {
  $names = explode(' ',$_GET['student']);

  $student = $db->Select('students',['cisco','www','cisco_group','www_group'],['name'=>$names[0],'surname'=>$names[1]]);
  print_r($student);
}
