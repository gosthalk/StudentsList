<?php

namespace app\controllers;

use app\core\Controller;
use app\lib\Db;
use app\models\Main;

class MainController extends Controller {

    public $flag = false;

    public function indexAction(){
        //echo phpinfo();
        $this->view->render('Главная страница');
    }

    public function addAction(){
        //var_dump(isset($_POST['add']));
        if(isset($_POST['add'])){
            $this->main->addData();
            $this->view->layout = 'custom';
            $this->view->render('Добавление', $this->main->isValid());
            // разобраться почему оно не всегда выводит нужное
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