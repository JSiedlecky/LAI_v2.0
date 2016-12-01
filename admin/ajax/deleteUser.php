<?php
require "../classes/Database.php";
$db = new Database();

$db->NonResultQuery("DELETE FROM `permissions`WHERE `idu` =".$_POST['delId']);
$db->NonResultQuery("DELETE FROM `users`WHERE `idu` =".$_POST['delId']);
?>
