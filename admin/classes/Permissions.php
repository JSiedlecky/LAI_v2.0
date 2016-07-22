<?php

class Permissions {
    private $conn = "";
    private $idu = -1;
    private $all_permissions = [];
    private $user_permissions = [];

    function __construct($idu) {
        $this->conn = new PDO("mysql:host=localhost;dbname=lai","lai","lai");
        $this->idu = $idu;
        $this->getAllPermissions();
    }

    private function getAllPermissions() {
        $sql = "SELECT * FROM `permissions` WHERE `idu`='".$this->idu."'";
        $q = $this->conn->prepare($sql);
        $q->execute();
        $results = $q->fetch(PDO::FETCH_ASSOC);

        foreach($results as $result){

        }
    }


}

?>