<?php

  $idList = $_POST['idList'];
  require "../classes/Database.php";
  $db = new Database();
  
  foreach ($idList as $key => $value) {
    $db->NonResultQuery("DELETE FROM `applications`WHERE `id` =".$value);
  }
?>
