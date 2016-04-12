<?php
    session_start();
    require_once('../connect.php');

    if(!isset($_POST['submit']) && !isset($_SESSION['logged'])) {
        session_destroy();
        header('location: ./');
        die();
    }
    if(!isset($_SESSION['logged'])){
        $users = [];
        $err = '';
        $usrnm = $_POST['usrnm'];
        $passwd = $_POST['passwd'];

        $sql = "SELECT * FROM `users`";
        $result = $conn->prepare($sql);
        $result->execute();
        while($row = $result->fetch(PDO::FETCH_ASSOC)){
            //print_r($row);
            array_push($users, $row);
        }

        foreach($users as $u){
            if(($u['login'] == $usrnm) && password_verify($passwd, $u['password'])){
                $_SESSION['logged'] = true;
                $_SESSION['user'] = $u['login'];
                $_SESSION['email'] = $u['email'];
                break;
            }
        }

        if(!isset($_SESSION['logged'])){
            header('location: ./');
            session_destroy();
            die();
        }
    }
?>
<!DOCTYPE html>
<html>
<head>

    <meta charset="UTF-8">
    <title>Admin Panel</title>

    <meta name="application-name" content="LAI_v2.0">
    <meta name="author" content="D.Szołtysek M.Łamasz J.Siedlecki">
    <meta name="description" content="">
    <meta name="referrer" content="origin">
    <meta name="robots" content="all">
    <meta name="format-detection" content="telephone=yes">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <script src="js/admPanelScript.js"></script>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/admPanelStyle.css">

</head>
<body>

    <div class="leftNaviFixed col-lg-1 col-md-2 hidden-sm hidden-xs">
        <ul class="text-center">
            <li><a href="#"><h2>LAI</h2></a></li>
            <li><a href="#"><span class="glyphicon glyphicon-pencil"></span><br>Dodaj aktualność</a></li>
            <li><a href="#"><span class="glyphicon glyphicon-font"></span><br>Nowy newsletter</a></li>
            <li><a href="#"><span class="glyphicon glyphicon-cog" aria-hidden="true"></span><br>Ustawienia</a></li>
            <li><a href="#"><span class="glyphicon glyphicon-off"></span><br>Wyloguj</a></li>
        </ul>
        <footer class="leftNaviFixedFooter text-center">&copy; LAI <?php echo date("Y") ?></footer>
    </div>
    <div class="topNaviFixed col-lg-offset-1 col-md-offset-2 col-lg-11 col-md-10 col-sm-12 col-xs-12">
        <section class="menuBtn hidden-lg hidden-md text-center">
            <h2>Menu</h2>
        </section>
        <section class="groups text-center menuItem">
            <h2><a href="#">Grupa</a></h2>
            <a href="#" class="hidden-md hidden-sm hidden-xs">+ Nowa grupa</a>
        </section>
        <section class="newUsers text-center menuItem">
            <h2><a href="#">Nowi uczniowie</a></h2>
            <a href="#" class="hidden-md hidden-sm hidden-xs">Przydiel grupę</a>
            <a href="#" class="hidden-md hidden-sm hidden-xs">Dane kontatkowe</a>
        </section>
        <section class="users text-center menuItem">
            <h2><a href="#">Uczniowie</a></h2>
            <a href="#" class="hidden-md hidden-sm hidden-xs">Płatności</a>
            <a href="#" class="hidden-md hidden-sm hidden-xs">Status</a>
            <a href="#" class="hidden-md hidden-sm hidden-xs">Wyszukiwarka</a>
        </section>
        <section class="hidden-lg hidden-md text-center menuItem">
            <h2><a href="#">Dodaj aktualności</a></h2>
        </section>
        <section class="hidden-lg hidden-md text-center menuItem">
            <h2><a href="#">Nowy newsletter</a></h2>
        </section>
        <section class="hidden-lg hidden-md text-center menuItem">
            <h2><a href="#">Ustawienia</a></h2>
        </section>
        <section class="hidden-lg hidden-md text-center menuItem">
            <h2><a href="#">Wyloguj</a></h2>
        </section>
    </div>

</body>
</html>
