<?php

include('../classes/Database.php');

$db = new Database();

$action = $_GET['action'];

if($action == 'delete'){
  $id = $_GET['id'];

  if($db->Delete('payments',['idpay'=>$id])) echo 'OK';
  else echo 'ERROR';
}
