<?php

class User {

    private $idu = -1;
    private $display_name = "";
    private $permisions = [];

    /**
     * User constructor.
     */
    public function __construct($idu)
    {
        $this->$idu = $idu;
        $this->setDisplayName($this->idu);
        $this->setPermissions($this->idu);
    }

    private function setDisplayName($idu){

    }

    private function setPermissions($idu){

    }

    public function getIDU(){
        return $this->idu;
    }

    public function getDisplayName(){
        return $this->display_name;
    }

    public function getPermissions(){
        return $this->permisions;
    }
}


?>