<?php
  include('classes/Database.php');
    $db = new Database();
    session_start();

      $result = $db->Query("SELECT `last_login` FROM `users` WHERE `idu` =".$_SESSION['idu']);
      if($result[0]['last_login'] !== null){
        $db->NonResultQuery("UPDATE `users` SET `last_login` = NOW() WHERE `idu` =".$_SESSION['idu']);
        header("location: index.php");
      }
      if(isset($_POST['pswd']) && isset($_POST['passwd'])){
        if($_POST['pswd'] == $_POST['passwd']){

          $db->NonResultQuery("UPDATE `users` SET `last_login` = NOW() WHERE `idu` =".$_SESSION['idu']);
          $db->NonResultQuery("UPDATE `users` SET `password` = '".password_hash($_POST['pswd'],PASSWORD_BCRYPT,['cost' => 11])."' WHERE `idu` =".$_SESSION['idu']);
          header("location: index.php");
        }
      }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Login</title>

    <meta name="application-name" content="LAI_v2.0">
    <meta name="author" content="D.Szołtysek M.Łamasz J.Olszański J.Siedlecki">
    <meta name="description" content="">
    <meta name="referrer" content="origin">
    <meta name="robots" content="all">
    <meta name="format-detection" content="telephone=yes">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <script src="js/jquery-3.1.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>

    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/enter.css">

</head>
<body style="background:linear-gradient(to left, #f46b45 , #eea849);">

<div class="container-fluid">
    <div class="admLoginRow row">
        <div class="admLoginOuter col-lg-4 col-md-6 col-sm-12 col-xs-12 col-lg-offset-4 col-md-offset-3">
            <h1 class="admH1 text-center">Podaj nowe hasło</h1>
            <form class="form-horizontal" method="POST" action="#">
                <div class="form-group">
                    <label for="usrnm" class="col-sm-2 control-label">Hasło</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="pswd" placeholder="Hasło" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="passwd" class="col-sm-2 control-label">Powtórz</label>
                    <div class="col-sm-10">
                        <input type="password" class="form-control" name="passwd" placeholder="Powtórz" required>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                        <input type="submit" name="submit" class="btn btn-default" value="Log me in">
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

</body>
</html>
