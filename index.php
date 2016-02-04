<?php 
    require_once('connect.php');
?>
<!DOCTYPE html>
<html lang="pl">
<head>
   
    <meta charset="utf-8">
   
    <title>LAI Gliwice</title>
    
    <meta name="application-name" content="LAI_v2.0">
    <meta name="author" content="D.Szołtysek M.Łamasz J.Siedlecki">
    <meta name="description" content="">
    <meta name="referrer" content="origin">
    <meta name="robots" content="all">
    <meta name="format-detection" content="telephone=yes">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.4.9/angular.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js"></script>
    
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/themes/smoothness/jquery-ui.css">
    <link rel="stylesheet" href="indexStyle.css">
    
</head>
<body>
   
    <header>
        <figure>
            <img src="ph2375x200.png" id="headerImg"alt=":C">
        </figure>
    </header>
    <main class="container">
        <nav id="topNav">
            <ul>
                <li class="activeMenuItem"><a href="#"></a></li><li>
                <a href="#"></a></li><li>
                <a href="#"></a></li><li>
                <a href="#"></a></li><li>
                <a href="#"></a></li>
            </ul>
        </nav>
        <article>
            
        </article>
    </main>
    <footer>
        <div class="container" id="botContainer">
            <div class="row">
                <div class="col-xs-4 fContents" id="newsletter">
                    <h2>Zapisz się na newsletter.</h2>
                    <div class="col-xs-12 newsletterInputAroundsDiv">
                        <form action="#">
                            <div class="input-group">
                              <input type="email" class="form-control" placeholder="Wpisz adres E-Mail">
                              <span class="input-group-btn">
                                <button class="btn btn-default" type="button">Subskrybuj</button>
                              </span>
                            </div>
                        </form>
                    </div>
                    <p class="newsletterInfo">
                        Newsletter to usługa przesyłająca informacje o nadchodzących terminach rozpoczęcia kursów w module CISCO oraz Tworzenia Stron WWW.
                    </p>
                </div>
                <div class="col-xs-4 fContents" id="contact"><h2>Skontaktuj się z nami.</h2></div>
                <div class="col-xs-4 fContents" id="bottomNav"><h2>Menu</h2></div>
            </div>
        </div>
    </footer>
    
</body>
</html>