<?php

namespace app\models;

use app\models\Main;
use app\lib\Db;

class MainDataGateway {

    public $db;

    public function __construct()
    {
        $this->db = new Db();
    }

    public function showData(){
        $this->db = new Db;

        $per_page = 15; // colichestvo na str
        $limit = 3;  // limit pages

        $cur_page = 1;

        if(isset($_GET['page']) && $_GET['page'] > 0){
            $cur_page = $_GET['page'];
        }
        $start = ($cur_page - 1) * $per_page;

        $sql = "SELECT SQL_CALC_FOUND_ROWS * FROM students LIMIT ?i, ?i";
        $this->db->query($sql);
    }
}