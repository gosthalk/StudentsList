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

        if($page > $this->count){
            $page = 1;
        }

        $this->per_page = 15;
        $from = ($page - 1) * $this->per_page;

        $query = "SELECT * FROM students WHERE id > 0 LIMIT $from, $this->per_page";

        $result = $this->db->row($query);

        return $result;

    }
}

/*if (isset($_GET['page'])){
    $page = $_GET['page'];
}else{
    $page = 1;
}*/
