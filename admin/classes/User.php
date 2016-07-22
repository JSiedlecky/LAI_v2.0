<?php

class User {

    private $idu = -1;
    private $display_name = "";
    private $permissions = [];

    public $display_lm = 1;

    /**
     * User constructor.
     */

    function __construct($idu)
    {
        $this->idu = $idu;
        $this->display_name = $this->setDisplayName($idu);
        $this->display_lm = $this->getsetDisplayLm();
    }

    //GETS DISPLAY NAME FROM DB FOR CURRENT USER
    private function setDisplayName($idu){
        $db = new Database();
        $result = $db->Select('users',['display_name'],['idu'=>$idu],"","");

        $db->Disconnect();

        return $result[0]['display_name'];
    }


    public function getsetDisplayLm($optional = []){
        $db = new Database();

        if(isset($optional['display_lm'])){
            $result = $db->Update('users',['display_lm'=>$optional['display_lm']],['idu'=>$this->idu],['debug'=>true]);
            $db->Disconnect();
            return $result;
        } else {
            $result = $db->Select('users', ['display_lm'], ['idu' => $this->idu]);
            $db->Disconnect();
            return $result[0]['display_lm'];
        }
    }

    //GETS PERMISSIONS FROM DB FOR CURRENT USER
    private function setPermissions($idu){

    }

    //RETURNS ID OF CURRENT USER
    public function getIDU(){
        return $this->idu;
    }

    //RETURNS DISPLAY NAME FOR CURRENT NAME
    public function getDisplayName(){
        return $this->display_name;
    }

    //RETURNS PERMISSIONS FOR CURRENT USER
    public function getPermissions(){
        return $this->permissions;
    }
}


?>