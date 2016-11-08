<?php
echo $_POST['mail']."<br>";
echo isset($_POST['mail']);
#Is all data set
  //if(isset($_POST['submit']) && (isset($_POST['nickname']) && (isset($_POST['login']) && (isset($_POST['pswd']) && isset($_POST['mail'])))) /*&& isset($_POST['perm'])*/){
    #load db class
    require "../classes/Database.php";
    $db = new Database();
    if(!isset($_POST['userId']))
    {
      $db -> Insert("users",["display_name","login","email", "password"],[$_POST['nickname'],$_POST['login'],$_POST['mail'],$_POST['pswd']]);
      echo "good";
    }
    else
    {
      $db -> Update("users", array('display_name' => $_POST['nickname'], 'login' => $_POST['login'],'email' => $_POST['mail'],'password' => $_POST['pswd']),array('idu' => $_POST['userId']));
      echo "good";
    }

  //}
//  else{
  //  echo "error";
//  }
?>
