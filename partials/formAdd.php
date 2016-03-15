<?php
    require_once('../connect.php');

    $data = json_decode(file_get_contents("php://input"));

    function addForm($data){
        $name = $data->name;
        $surname = $data->surname;
        $mail = $data->mail;
        $phone = $data->phone;
        $module = $data->module;
        $years = $data->years; if($years == "") $years = " - ";
        $days = $data->days; if($days == "") $days = " - ";
        $addInfo = $data->addInfo;

        return $years;
    }

    echo addForm($data);
?>
