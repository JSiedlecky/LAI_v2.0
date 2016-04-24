<?php
    require_once('../connect.php');

    $data = json_decode(file_get_contents("php://input"));

    $mail = $data->mail;

    $sql =  "INSERT INTO `lai`.`newsletter` (`id`, `email`) VALUES (NULL, '$mail')";

    if($mail != ""){
        $query = $conn->prepare($sql);
        $query->execute();
    }else echo "blad!";
?>
