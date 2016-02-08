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
    <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.5.0/angular.min.js"></script>
    <script src="https://code.angularjs.org/1.5.0/angular-route.min.js"></script>
    <script src="js/mainCtrl.js"></script>
    <script src="js/activeMenu.js"></script>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/themes/smoothness/jquery-ui.css">
    <link rel="stylesheet" href="indexStyle.css">

</head>
<body>

    <header>
        <figure>
            <img src="img/ph2375x200.png" id="headerImg"alt=":C">
        </figure>
    </header>
    <main class="container" ng-app="lai">
        <nav id="topNav">
            <ul>
                <li class="menuBtn">MENU</li><li class="menuTopItem zgloszenie">
                    <a href="#/zgloszenie">Zgłoszenie</a></li><li class="menuTopItem aplikacje">
                    <a href="#/aplikacje">Tworzenie witryn WWW</a></li><li class="menuTopItem cisco">
                    <a href="#/cisco">CISCO</a></li><li class="menuTopItem aktualnosci">
                    <a href="#/aktualnosci">Aktualności</a></li><li class="menuTopItem akademia activeTopMenuItem">
                    <a href="#/akademia">Akademia</a></li>
            </ul>
        </nav>
        <article>
            <ng-view>

            </ng-view>
        </article>
    </main>
    <footer>
        <div class="container" id="botContainer">
            <div class="row">
                <div class="col-lg-4 col-md-12  fContents" id="newsletter">
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
                <div class="col-lg-4 col-md-6 fContents" id="contact">
                    <h2>Skontaktuj się z nami.</h2>
                    <p class="contactPar">Adres: 44-100 Gliwice, ul.Chorzowska 5</p>
                    <p class="contactPar">Adres E-Mail: ####</p>
                    <p class="contactPar">Telefon kontaktowy: ###-###-###</p>
                </div>
                <div class="col-lg-4 col-md-6 fContents" id="fNav">
                    <nav id="bottomNav">
                        <ul>
                            <li class="akademia"><a href="#/akademia">Akademia</a></li>
                            <li class="aktualnosci"><a href="#/aktualnosci">Aktualności</a></li>
                            <li class="cisco"><a href="#/cisco">CISCO</a></li>
                            <li class="aplikacje"><a href="#/aplikacje">Tworzenie witryn www</a></li>
                            <li class="zgloszenie"><a href="#/zgloszenie">Zgłoszenie</a></li>
                        </ul>
                    </nav>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12 copyrights">
                    &copy; LAI Gliwice 2016.
                </div>
            </div>
        </div>
    </footer>

</body>
</html>
