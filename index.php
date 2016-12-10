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

    <script src="js/jquery-3.1.1.min.js"></script>
    <script src="js/jquery-ui.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/angular.min.js"></script>
    <script src="js/angular-route.min.js"></script>
    <script src="js/angular-animate.min.js"></script>
    <script src="js/angular-auto-validate/dist/jcs-auto-validate.min.js"></script>
    <script src="js/ui-bootstrap-1.2.4.min.js"></script>
    <script src="js/mainCtrl.js"></script>
    <script src="js/activeMenu.js"></script>

    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/jquery-ui.min.css">
    <link rel="stylesheet" href="css/animate.css">
    <link rel="stylesheet" href="css/indexStyle.css">
    <link rel="stylesheet" href="css/zgloszenieStyle.css">
    <link rel="stylesheet" href="css/aplikacjeStyle.css">
    <link rel="stylesheet" href="css/modals.css">
    <link rel="stylesheet" href="css/ciscoStyle.css">
    <link rel="stylesheet" href="css/akademiaStyle.css">
    <link rel="stylesheet" href="css/aktualnosci.css">

</head>
<body ng-app="lai">

    <header>
        <figure>
            <img src="img/baner200.jpg" id="headerImg2" alt=":C">
        </figure>
        <figure>
            <img src="img/ph2375x400.png" id="headerImg4" alt=":C">
        </figure>
    </header>
    <main class="container">
        <nav id="topNav">
            <ul>
                <li class="menuBtn">MENU</li><li class="menuTopItem zgloszenie">
                    <a href="#/zgloszenie">Zgłoszenie</a></li><li class="menuTopItem aplikacje">
                    <a href="#/aplikacje">Tworzenie witryn WWW</a></li><li class="menuTopItem cisco">
                    <a href="#/cisco">CISCO</a></li><li class="menuTopItem aktualnosci">
                    <a href="#/aktualnosci">Aktualności</a></li><li class="menuTopItem akademia">
                    <a href="#/akademia">Akademia</a></li>
            </ul>
        </nav>
        <article>
            <div class="viw" ng-view>

            </div>
        </article>
    </main>
    <footer>
        <div class="container" id="botContainer">
            <div class="row">
                <div class="col-lg-4 col-md-12  fContents" id="newsletter">
                    <h2>Zapisz się na newsletter.</h2>
                    <div ng-controller="newsletterCtrl" class="col-xs-12 newsletterInputAroundsDiv">
                        <form ng-submit="newsletterAdd()"
                              method="post"
                              novalidate>
                            <div class="form-group">
                                <div class="input-group">
                                  <input type="email"
                                         name="newsletterEmail"
                                         ng-model="newsletterEmail"
                                         disable-invalid-styling="true"
                                         class="form-control"
                                         placeholder="Wpisz adres E-Mail">
                                  <span class="input-group-btn">
                                    <input type="submit" class="btn btn-default" name="submit" value="Subskrybuj">
                                  </span>
                                </div>
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
                            <li class="bothMenuItem akademia"><a href="#/akademia">Akademia</a></li>
                            <li class="bothMenuItem aktualnosci"><a href="#/aktualnosci">Aktualności</a></li>
                            <li class="bothMenuItem cisco"><a href="#/cisco">CISCO</a></li>
                            <li class="bothMenuItem aplikacje"><a href="#/aplikacje">Tworzenie witryn www</a></li>
                            <li class="bothMenuItem zgloszenie"><a href="#/zgloszenie">Zgłoszenie</a></li>
                        </ul>
                    </nav>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12 copyrights">
                    &copy; <?php echo date("Y") ?>
                </div>
            </div>
        </div>
    </footer>

</body>
</html>
