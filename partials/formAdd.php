<?php
    require_once('../connect.php');

    $data = json_decode(file_get_contents("php://input"));

        $name = $data->name;
        $surname = $data->surname;
        $mail = $data->mail;
        $phone = $data->phone;
        $module = $data->module;
        $years = $data->years; if($years == "") $years = " - ";
        $days = $data->days; if($days == "") $days = " - ";
        $addInfo = $data->addInfo;

        $statement = $conn->prepare("INSERT INTO `applications`(`name`, `surname`, `email`, `phone`, `module`, `years`, `days`, `addInfo`) VALUES('$name', '$surname', '$mail', '$phone', '$module', '$years', '$days', '$addInfo')");

        $numberOmails = 0;
        $query = $conn->query('SELECT `email` FROM `applications`');

        while($row = $query->fetch(PDO::FETCH_NUM)){
            if($row = $mail) $numberOmails++;
            if($numberOmails == 3){
                echo "ERROR SKURWYSYN";
                die();
            }
        }
        $statement->execute();
        echo "SUPER";


        // foreach ($query as $key => $value) {
        //     if($query[$key] == $mail){
        //         $numberOmails++;
        //     }
        // }
?>
