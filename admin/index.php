<?php
    session_start();

    if(!isset($_SESSION['user'])){
        header('location: enter.php');
        die();
    }

    $user = $_SESSION['user'];
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
        
    </div>

</body>
</html>