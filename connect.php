<?php

    $host = "jqub97.ddns.net";
    $port = 3306;
    $db = "lai";
    $db_user = "lai";
    $db_passwd = "lai";
    $conn = "";

    try {
        $conn = new PDO("mysql:host=".$host.";port=".$port.";dbname=".$db.";charset=utf8", $db_user, $db_passwd);
        // set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $connMsg =  "Connected successfully";
    }catch(PDOException $e){
        $connMsg = "Connection failed: " . $e->getMessage();
        print_r($connMsg);
    }

?>
