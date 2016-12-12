<?php
  include('../classes/Database.php');

  $db = new Database();

  $action = $_GET['action'];

  if($action == 'delete'){
    $id = $_GET['id'];
    $group = $db->Select('groups',['*'],['idg'=>$id])[0];
    $db->Update('students',
      [$group['module']             => NULL,
       $group['module'].'_group'    => NULL],
      [$group['module'].'_group'    => $id]);

    if($db->Delete('groups',['idg'=>$id])) echo 'OK';
    else echo 'ERROR';
  }

  if($action == 'deletestudentfromgroup'){
    $idg = $_GET['groupid'];
    $ids = $_GET['studentid'];
    $module = $_GET['module'];

    if($db->Update('students',[$module.'_group' => 'NULL'],[$module.'_group' => $idg, 'ids' => $ids])) echo 'OK';
    else echo 'ERROR';
  }
