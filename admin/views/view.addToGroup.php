<?php
session_start();
$idused =unserialize( $_GET['idu']);
$groupId = $_GET['idg'];
$id =  $idused[0] ;
$result = $view->db->Query("SELECT * FROM `applications`WHERE `id` =".$id);
foreach ($result as $key => $value) {
  echo $name = $value["name"];
  echo "<br />";
  echo $surname = $value["surname"];
  echo "<br />";
  echo $email = $value["email"];
  echo "<br />";
  echo $phone = $value["phone"];
  echo "<br />";
}


$view->db->Query("INSERT INTO `students` (`ids`, `name`, `surname`, `email`, `phone`, `cisco`, `www`, `cisco_group`, `www_group`, `activity`) VALUES (NULL, '".$name."', '".$surname."', '".$email."' ,'".$phone."' , NULL, NULL, '".$groupId."', NULL, 1)");
$view->db->Query("UPDATE `groups` SET `students` = students + 1 WHERE `groups`.`idg` = '".$groupId."' ;");
$view->db->Query("DELETE FROM `applications`WHERE `id` =".$id);
  ?>
