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
  $inserts = "INSERT INTO `payments` (`amount`,`payment_for`,`idpayer`,`payer`,`payment_date`,`additional`) VALUES ";
  $tmp = '';
  $rows = count($_POST) - 1;
  $cnt = 0;
  foreach($_POST as $index => $array){
    $tmp .= '(';
    $cntr = 0;
    $all = count($array) - 1;
    foreach($array as $k => $v){
      if($cntr !== $all) $tmp .= '"'.$v.'",';
      else $tmp .= '"'.$v.'"';
      if($k == 'payment_for'){
        $id = $db->Select('students',['ids'],['name'=>explode(' ',$_POST[$index]['payer'])[0], 'surname'=>explode(' ',$_POST[$index]['payer'])[1]])[0]['ids'];
        $tmp .= '"'.$id.'",';
      }
      $cntr++;
    }
    if($cnt !== $rows) $tmp .= '),';
    else $tmp .= ')';
    $cnt++;
  }
  $inserts .= $tmp;
  if($db->NonResultQuery($inserts)){
    echo 'OK';
  } else echo 'ERROR';
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
