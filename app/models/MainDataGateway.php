<?php

namespace app\models;

use app\models\Main;
use app\lib\Db;

class MainDataGateway {

    public $db;
    public $count;
    public $per_page;

    public function __construct()
    {
        $this->db = new Db();
    }

    public function pagesCount(){
        $pagesCount = ceil($this->count / $this->per_page);
        return $pagesCount;
    }

    public function showData($page){
        $this->db = new Db;

        $query = "SELECT COUNT(*) as count FROM students";
        $this->count = (int)$this->db->column($query);

        $this->per_page = 10;

        $pc = (int)$this->pagesCount();

        if($page > $pc){
            $page = 1;
        }

        $from = ($page - 1) * $this->per_page;

        $query = "SELECT * FROM students WHERE id > 0 LIMIT $from, $this->per_page";

        $result = $this->db->row($query);

        return $result;

    }

    public function addData($firstName, $secondName, $group, $points){
        $this->db = new Db();

        $query = "INSERT INTO students (FirstName, SecondName, PartyId, Points) VALUES ('$firstName', '$secondName', '$group', $points)";

        $this->db->query($query);
    }

    public function searchData($data, $page){
        $this->db = new Db();

        $query = "SELECT COUNT(*) as count FROM students WHERE FirstName LIKE '$data' OR SecondName LIKE '$data' OR PartyId LIKE '$data'";
        $this->count = (int)$this->db->column($query);

        $this->per_page = 10;

        $pc = (int)$this->pagesCount();

        if($page > $pc){
            $page = 1;
        }

        $from = ($page - 1) * $this->per_page;


        $data = trim($data);
        $data = htmlspecialchars($data);

        if(!empty($data)){
            if(strlen($data) > 30){
                return false;
            }
            $query = "SELECT * FROM students WHERE FirstName LIKE '$data' OR SecondName LIKE '$data' OR PartyId LIKE '$data' LIMIT $from, $this->per_page";

            $result = $this->db->row($query);
            return $result;
        }
    }

    public function setCookies($firstName, $secondName, $group, $points){
        $this->db = new Db();

        $query = "SELECT * FROM students ORDER BY id DESC LIMIT 1";
        $result = $this->db->row($query);

        //var_dump($result);

        foreach ($result as $p){
            if($firstName == $p['FirstName'] and $secondName == $p['SecondName'] and $group == $p['PartyId'] and $points == $p['Points']){
                $query = "SELECT Id FROM students WHERE FirstName='$firstName' AND SecondName='$secondName' AND PartyID='$group' AND Points=$points";
                $result = (int)$this->db->column($query);
            }else{
                exit();
            }
        }
        $id = $result;
        //var_dump($id);
        return $id;
    }

    public function getData($id){
        $this->db = new Db();

        $query = "SELECT * FROM students WHERE Id=$id";
        $result = $this->db->row($query);
        //var_dump($result);

        return $result;
    }

    public function editData($firstName, $secondName, $group, $points, $id){
        $this->db = new Db();

        $query = "UPDATE students SET FirstName='$firstName', SecondName='$secondName', PartyId='$group', Points=$points WHERE Id=$id";
        $this->db->query($query);
    }

    public function deleteData($id){
        $this->db = new Db();

        $query = "DELETE FROM students WHERE Id=$id";
        $this->db->query($query);
    }
}
