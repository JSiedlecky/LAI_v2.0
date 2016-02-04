<?php
    
    $host = "server.marox44.pl";
    $port = 3306;
    $db = "lai";
    $db_user = "lai";
    $db_passwd = "lai";
    $conn = "";

    try {
        $conn = new PDO("mysql:host=".$host.";port=".$port.";dbname=".$db, $db_user, $db_passwd);
        // set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        echo "Connected successfully"; 
    }catch(PDOException $e){
        echo "Connection failed: " . $e->getMessage();
    }
    
echo "<br>";
    
        $sql = 'SELECT * FROM news';
        foreach ($conn->query($sql) as $row) {
            print $row['id'] . "&#09;";
            print $row['title'] . "&#09;";
            print $row['brief'] . "&#09;";
            print $row['date'] . "<br><br>";
        }
    

?>
