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

        if (isset($this->route['page']) && gettype($this->route['page']) == 'integer'){
            $page = $this->route['page'];
        }else{
            $page = 1;
        }

        $this->data = new MainDataGateway();
        $result = $this->data->showData($page);
        $count = (int)$this->data->pagesCount();
        //var_dump($count);

        $this->view->render('Главная страница', false, $result, $count, $page);
    }

    public function searchAction(){

        if(isset($_POST['search'])) {

            if (isset($this->route['page']) && gettype($this->route['page']) == 'integer') {
                $page = $this->route['page'];
            } else {
                $page = 1;
            }

            $this->data = new MainDataGateway();
            $result = $this->data->searchData($_POST['searchData'], $page);
            $count = (int)$this->data->pagesCount();

            $this->view->render('Поиск', false, $result, $count, $page);
        }else{
            $this->main->redirect('/');
        }
    }

    public function addAction(){
        //var_dump(isset($_POST['add']));
        if(!isset($_COOKIE['id'])) {
            if (isset($_POST['add'])) {
                $this->main->addData();
                $this->view->layout = 'custom';
                $this->main->redirect('/');
            } else {
                $this->view->layout = 'custom';
                $this->view->render('Добавление');
            }
        }else{
            $this->main->redirect('/');
        }
    }

    public function editAction(){
        if(isset($_POST['edit'])){
            $this->main->editData();
            $this->view->layout = 'custom';
            $this->main->redirect('/');
        }else{
            $this->data = new MainDataGateway();
            $result = $this->data->getData($_COOKIE['id']);

            $this->view->layout = 'custom';
            $this->view->render('Добавление',false, $result);
        }
    }

    public function deleteAction(){

    }

    public static function errorCode($code){
        http_response_code($code);
        require 'app/views/errors' . $code . '.php';
        exit;
    }

}