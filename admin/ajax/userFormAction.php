<?php
$_POST = $_POST[0];
    #load db class
    require "../classes/Database.php";
    $db = new Database();
  //  echo $_POST['userId'];

    if(!isset($_POST['userId']))
    {

      #ADD USER
      $db -> Insert("users",["display_name","login","email", "password"],[$_POST['nickname'],$_POST['login'],$_POST['mail'],$_POST['pswd']]);
      #G new user ID;
      $idu = $db -> Query("SELECT idu FROM users ORDER BY idu DESC LIMIT 1;");
      #preapre pswd
      $pswd = $_POST['pswd'];

      #update pswd
      $db -> NonResultQuery("UPDATE `users` SET `password` = '".password_hash($pswd,PASSWORD_BCRYPT,['cost' => 11])."' WHERE `idu` =".$idu[0]['idu'].";");
      #adds user
      $db -> Insert("permissions",array("idperm", "idu", "isGm", "applications", "groups", "payments", "newsletter", "users", "app_add", "app_delete", "app_sort", "app_action", "group_add", "group_modify", "group_delete", "group_sort", "pay_add", "pay_modify", "pay_delete", "nl_old"),[NULL,$idu[0]['idu'], '0', $_POST['menuApp'], $_POST['menuGrup'], $_POST['menuPay'], $_POST['menuNews'], $_POST['menuUsers'],$_POST['addApp'], $_POST['delApp'], $_POST['sortApp'], $_POST['actionApp'], $_POST['addGrp'],$_POST['modifyGrp'] , $_POST['delGrp'], $_POST['sortGrp'], $_POST['addPay'], $_POST['modifyPay'], $_POST['delPay'], $_POST['hisNews']]);

      echo "good";
    }
    else
    {
      $id  = $_POST['userId'];
      #update user
      $db -> Update("users", array('display_name' => $_POST['nickname'], 'login' => $_POST['login'],'email' => $_POST['mail'],'password' => $_POST['pswd']),array('idu' => $id));
      #set encrypted pswd
      $pswd =  $_POST['pswd'];
      $db -> NonResultQuery("UPDATE `users` SET `password` = '".password_hash($pswd,PASSWORD_BCRYPT,['cost' => 11])."' WHERE `idu` =".$id.";");
      #update perrimison menu
      $db -> NonResultQuery("UPDATE `permissions` SET `applications` = ".$_POST['menuApp'].", `groups` = ".$_POST['menuGrup'].", `payments` = ".$_POST['menuPay'].",`newsletter` = ".$_POST['menuNews'].", `users` = ".$_POST['menuUsers']." WHERE `idu` = '".$id."' ;");
      #update perrimison application
      $db -> NonResultQuery("UPDATE `permissions` SET `app_add` = ".$_POST['addApp'].", `app_delete` = ".$_POST['delApp'].", `app_sort` = ".$_POST['sortApp'].",`app_action` = ".$_POST['actionApp']." WHERE `idu` = '".$id."' ;");
      #update perrimison groups
      $db -> NonResultQuery("UPDATE `permissions` SET `group_add` = ".$_POST['addGrp'].", `group_modify` = ".$_POST['modifyGrp'].", `group_delete` = ".$_POST['delGrp'].",`group_sort` = ".$_POST['sortGrp']." WHERE `idu` = '".$id."' ;");
      #update Perrmisions rest
      $db -> NonResultQuery("UPDATE `permissions` SET `pay_add` = ".$_POST['addPay'].", `pay_modify` = ".$_POST['modifyPay'].", `pay_delete` = ".$_POST['delPay'].",`nl_old` = ".$_POST['hisNews']." WHERE `idu` = '".$id."' ;");

    }




?>
