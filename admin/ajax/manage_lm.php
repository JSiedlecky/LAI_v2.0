<?php
    session_start();

    include('../classes/User.php');
    include('../classes/Database.php');

    $display_lm = $_POST['display_lm'];
    $user = unserialize($_SESSION['user']);

    if($r = $user->getsetDisplayLm(['display_lm'=>$display_lm])) echo $r;
    else echo $r;
?>