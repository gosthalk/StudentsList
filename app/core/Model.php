<?php


namespace app\core;

use app\lib\Db;
use app\controllers\MainController;
use app\core\Controller;

abstract class Model{

    public $db;

    public function __construct(){
        $this->db = new Db();
    }

}