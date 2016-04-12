<?php
    session_start();

    if(isset($_SESSION['logged'])){
        header("location: admPanel.php");
        die();
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
    <link rel="stylesheet" href="css/indexAdmStyle.css">

</head>
<body>

    <div class="container-fluid">
        <div class="admLoginRow row">
            <div class="admLoginOuter col-lg-4 col-md-6 col-sm-12 col-xs-12 col-lg-offset-4 col-md-offset-3">
                <h1 class="admH1 text-center">LAI Admin Panel Login</h1>
                <form class="form-horizontal" method="post" action="admPanel.php">
                    <div class="form-group">
                        <label for="usrnmMail" class="col-sm-2 control-label">Username</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="usrnm" placeholder="Username">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="passwd" class="col-sm-2 control-label">Password</label>
                        <div class="col-sm-10">
                            <input type="password" class="form-control" name="passwd" placeholder="Password">
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
