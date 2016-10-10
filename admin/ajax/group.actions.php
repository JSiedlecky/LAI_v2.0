<?php
  include('../classes/Database.php');

  $db = new Database();

  $action = $_GET['action'];
  $id = $_GET['id'];

  if($action == 'delete'){
    if($db->Delete('groups',['idg'=>$id])) echo 'OK';
    else echo 'ERROR';
  }
