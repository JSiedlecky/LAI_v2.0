<?php
$_POST = $_POST[0];
    #load db class
    require "../classes/Database.php";
    $db = new Database();
    if(!isset($_POST['userId']))
    {

      #ADD USER
      $db -> Insert("users",["display_name","login","email", "password"],[$_POST['nickname'],$_POST['login'],$_POST['mail'],$_POST['pswd']]);
      #G new user ID;
      $idu = $db -> Query("SELECT idu FROM users ORDER BY idu DESC LIMIT 1;");
      #adds user
      $db -> Insert("permissions",array("idperm", "idu", "isGm", "applications", "groups", "payments", "newsletter", "users", "app_add", "app_delete", "app_sort", "app_action", "group_add", "group_modify", "group_delete", "group_sort", "pay_add", "pay_modify", "pay_delete", "nl_old"),[NULL,$idu[0]['idu'], '0', $_POST['menuApp'], $_POST['menuGrup'], $_POST['menuPay'], $_POST['menuNews'], $_POST['menuUsers'],$_POST['addApp'], $_POST['delApp'], $_POST['sortApp'], $_POST['actionApp'], $_POST['addGrp'],$_POST['modifyGrp'] , $_POST['delGrp'], $_POST['sortGrp'], $_POST['addPay'], $_POST['modifyPay'], $_POST['delPay'], $_POST['hisNews']]);

      echo "good";
    }
    else
    {
      $db -> Update("users", array('display_name' => $_POST['nickname'], 'login' => $_POST['login'],'email' => $_POST['mail'],'password' => $_POST['pswd']),array('idu' => $_POST['userId']));
      echo "good";
    }




?>
