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

  foreach($_POST as $index => $array){
    $tmp .= '(';
    for($i = 0; $i < count($array) -1; $i++){
      if($i !== count($array) - 1) $tmp .= $array[$i].',';
      else $tmp .= $array[$i];
    }
    $tmp .= '),';
  }
}

if($action == 'selectpayment') {
  $names = explode(' ',$_GET['student']);

  $result = "";
  $student = $db->Select('students',['cisco','www','cisco_group','www_group'],['name'=>$names[0],'surname'=>$names[1]]);
  foreach($student as $index => $arr){
    foreach($arr as $k => $v){
      if($k === 'cisco' && $v !== '') $flag1 = true; else if($k === 'cisco' && $v === '') $flag1 = false;
      if($k === 'www' && $v !== '') $flag2 = true; else if($k === 'www' && $v === '') $flag2 = false;

      if(isset($flag1)) if($flag1) if($k === 'cisco_group' && $v !== '') $result.= 'CISCO_'.$v.',';
      if(isset($flag2)) if($flag2) if($k === 'www_group' && $v !== '') $result.= 'WWW_'.$v;
    }
  }

  print_r($result);

  // print_r($student);
}
