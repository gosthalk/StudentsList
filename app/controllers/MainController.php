<?php

namespace app\controllers;

use app\core\Controller;
use app\lib\Db;
use app\models\Main;
use app\models\MainDataGateway;

class MainController extends Controller {

    public $flag = false;
    public $data;

    public function indexAction(){

        if (isset($_GET['page'])){
            $page = $_GET['page'];
        }else{
            $page = 1;
        }

        //$id = $this->route['page'];

        $this->data = new MainDataGateway();
        $result = $this->data->showData($page);
        $count = (int)$this->data->pagesCount();

        $this->view->render('Главная страница', false, $result, $count);
    }

    public function addAction(){
        //var_dump(isset($_POST['add']));
        if(isset($_POST['add'])){
            $this->main->addData();
            $this->view->layout = 'custom';
            $this->view->render('Добавление', $this->main->isValid());
        }else{
            $this->view->layout = 'custom';
            $this->view->render('Добавление');
        }
    }

    public function editAction(){
        $this->view->layout = 'custom';
        $this->view->render('Изменение', $this->main->isValid());
    }

    public static function errorCode($code){
        http_response_code($code);
        require 'app/views/errors' . $code . '.php';
        exit;
    }

}