 <?php

    include('config.admin.php');

    session_start();

    if(!isset($_SESSION['user'])){
        header('location: enter.php');
        die();
    }

    $user = unserialize($_SESSION['user']);
    $view = new View();

?>
<!doctype html>
<html lang="pl">
<?php
    include('includes/head.php');
?>
<body>
    <?php include('includes/body.toppanel.php'); ?>
    <?php include('includes/body.left.php'); ?>
    <div id="container">
        <?php if(isset($_GET['page'])) { ?>
            <?php include('views/view.'.$_GET['page'].'.php')?>
        <?php } else include('includes/body.main.php'); ?>
    </div>

</body>
</html>
