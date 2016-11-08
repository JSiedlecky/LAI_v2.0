<?php

class Database {

    private static $_instance = null ;
    protected $db;

    //connect to db
    public function __construct($login="lai", $password="lai", $host="jqub97.ddns.net", $port="3306", $dbname="lai"){
    //public function __construct($login="lai", $password="lai", $host="localhost", $port="3306", $dbname="lai"){
        $this->isConnected = true;

        try {
            $this->db = new PDO("mysql:host={$host};port={$port};dbname={$dbname};charset=utf8",$login,$password);

            $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        } catch(PDOException $e) {
            throw new Exception($e->getMessage());
        }
    }
    //send query and return data
    public function Query($query){
        try{
            $stm = $this->db->prepare($query);
            $stm->execute();
            $result = $stm->fetchAll();
            return $result;
        } catch (PDOException $e){
            throw new Exception($e->getMessage());
        }
    }
    //send query with d no return data
    public function NonResultQuery($query){
      try{
          $stm = $this->db->prepare($query);
          if($stm->execute()) return true;
          else return false;
      } catch (PDOException $e){
          throw new Exception($e->getMessage());
      }
    }
    public function DescribeTable($table, $debug = false){
        try {
            $sql = "DESCRIBE ".$table;
            $q = $this->db->prepare($sql);
            $q->execute();

            $result = $q->fetchAll();

            if($debug) return $sql;
            else return $result;
        } catch (PDOException $e) {
            throw new Exception($e->getMessage());
        }
    }

    public function Insert($table="", $fields=[], $values=[], $debug = []){
        try{
            $fields_insert = "";
            $values_insert = "";

            for($i = 0; $i < count($fields); $i++){
                $fields_insert .= "`".$fields[$i]."`";
                $values_insert .= "'".$values[$i]."'";
                if($i != count($fields) - 1) {
                    $fields_insert .= ",";
                    $values_insert .= ",";
                }
            }

            $sql = "INSERT INTO {$table} ({$fields_insert}) VALUES ({$values_insert})";
            $stmt = $this->db->prepare($sql);

            $stmt->execute();

            if(isset($debug['debug']))return $sql;
            else return true;
        } catch(PDOException $e){
            throw new Exception($e->getMessage());
        }
    }

    public function Select($table = "", $selections = ['*'], $wheres = [], $additional = "", $limit = "", $debug=false){
        try {
            if ($selections[0] != "*") {
                $select = "";
                for ($i = 0; $i < count($selections); $i++) {
                    $select .= "`" . $selections[$i] . "`";

                    ($i != (count($selections) - 1)) ? $select .= "," : $select .= "";
                }
            } else {
                $select = "*";
            }

            if (count($wheres) && $wheres !=['']) {
                $where = "WHERE ";

                $i = 0;
                foreach ($wheres as $k => $v) {
                    $where .= "`{$k}` = '{$v}' ";
                    ($i != (count($wheres) - 1) ? $where .= "AND " : $where .= "");
                    $i++;
                }
            } else $where = "";

            if($limit != "") $limit = "LIMIT ".$limit;

            $sql = "SELECT {$select} FROM {$table} {$where} {$additional} {$limit}";
            if($debug)return $sql;

            $q = $this->db->prepare($sql);
            $q->execute();
            $result = $q->fetchAll();

            return $result;
        } catch (PDOException $e) {
            throw new Exception($e->getMessage());
        }
    }

    public function Update($table = "", $updates = [], $wheres = [], $debug =[]){
        try {
            $update = "";

            $i = 0;
            foreach($updates as $k => $v){
                $update .= "`".$k."` = ".($v == 'NULL' ? $v : "'".$v."'");

                $i != (count($updates) - 1) ? $update .= ", " : $update .= " ";

                $i++;
            }

            $i = 0;

            $where = "WHERE ";
            foreach($wheres as $k => $v){
                $where .= "`".$k."` = '".$v."' ";

                $i != (count($wheres) - 1) ? $where .= "AND " : $where .= "";
                $i++;
            }

            $sql = "UPDATE {$table} SET {$update} {$where}";

            if(isset($debug['debug'])) die($sql);

            $q = $this->db->prepare($sql);
            $q->execute();

            if(isset($debug['debug']))return $sql;
            else return true;
        } catch (PDOException $e) {
            throw new Exception($e->getMessage());
        }
    }

    public function Delete($table = "", $wheres = [], $debug = []){
        try{
            $where = "";

            $i = 0;
            foreach($wheres as $k => $v){
                $where .= "WHERE `{$k}` = '{$v}' ";

                ($i != count($wheres) -1) ? $where .= "AND " : $where .= "" ;
            }

            $sql = "DELETE FROM {$table} {$where}";
            $q = $this->db->prepare($sql);
            $q->execute();

            if(isset($debug['debug']))return $sql;
            else return true;
        } catch (PDOException $e) {
            throw new Exception($e->getMessage());
        }
    }

    //disconnect from db
    public function Disconnect(){
        $this->db = NULL;
        $this->isConnected = false;
    }
    public function test()
    {
      echo "mama";
    }

}

?>
