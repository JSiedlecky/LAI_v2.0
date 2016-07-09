<?php
    include('../connect.php');
    include('classes/User.php');

    session_start();
    if(isset($_POST['submit']) && !isset($_SESSION['user'])){
        $login = $_POST['usrnm'];
        $passwd = $_POST['passwd'];
        $sql = "SELECT `idu`,`password` FROM `users` WHERE `login`='".$login."'";

        $q = $conn->prepare($sql);
        $q->execute();
        $result = $q->fetch(PDO::FETCH_ASSOC);

        if(empty($result)){
            header('location: index.php');
            die();
        }

        if(password_verify($passwd,$result['password'])){
            $user = new User($result['idu']);
            $_SESSION['user'] = $user;
        }

    }
    if(isset($_SESSION['user'])){
        header("location: index.php");
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Login</title>

    <meta name="application-name" content="LAI_v2.0">
    <meta name="author" content="D.Szołtysek M.Łamasz J.Siedlecki">
    <meta name="description" content="">
    <meta name="referrer" content="origin">
    <meta name="robots" content="all">
    <meta name="format-detection" content="telephone=yes">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/enter.css">

</head>
<body>

<div class="container-fluid">
    <div class="admLoginRow row">
        <div class="admLoginOuter col-lg-4 col-md-6 col-sm-12 col-xs-12 col-lg-offset-4 col-md-offset-3">
            <h1 class="admH1 text-center">LAI Admin Panel Login</h1>
            <form class="form-horizontal" method="post" action="#">
                <div class="form-group">
                    <label for="usrnm" class="col-sm-2 control-label">Username</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="usrnm" placeholder="Username" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="passwd" class="col-sm-2 control-label">Password</label>
                    <div class="col-sm-10">
                        <input type="password" class="form-control" name="passwd" placeholder="Password" required>
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
