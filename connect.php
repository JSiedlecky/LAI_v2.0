<?php
    
//    $host = "http://server.marox44.pl";
//    $db = "lai";
//    $db_user = "lai";
//    $db_passwd = "lai";    
//
//    try {
//        $conn = new PDO("mysql:host=$host;dbname=$db", $db_user, $db_passwd);
//        // set the PDO error mode to exception
//        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
//        echo "Connected successfully"; 
//    }catch(PDOException $e){
//        echo "Connection failed: " . $e->getMessage();
//    }

        try {
            $dbh = new PDO('mysql:host=178.37.44.32;port=3306;dbname=lai', "lai", "lai");
            foreach($dbh->query('SELECT * from news') as $row) {
                print_r($row);
            }
            $dbh = null;
        } catch (PDOException $e) {
            print "Error!: " . $e->getMessage() . "<br/>";
            die();
        }

?>
