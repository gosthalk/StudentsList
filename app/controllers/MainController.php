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

        if (isset($this->route['page']) && gettype($this->route['page']) == 'integer') {
            $page = $this->route['page'];
            $_SESSION['setPage'] = true;
        } else {
            $page = 1;
        }

        $this->data = new MainDataGateway();
        $result = $this->data->searchData($page);
        $count = (int)$this->data->pagesCount();

        $this->view->render('Поиск', false, $result, $count, $page);
        $_SESSION['setPage'] = false;
    }

    public function addAction(){
        //var_dump(isset($_POST['add']));
        if(!isset($_COOKIE['id'])) {
            if (isset($_POST['add'])) {
                $this->main->addData();
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
            $this->main->redirect('/');
        }else{
            $this->data = new MainDataGateway();
            $result = $this->data->getData($_COOKIE['id']);

            $this->view->layout = 'custom';
            $this->view->render('Добавление',false, $result);
        }
    }

    public function deleteAction(){
        if(isset($_COOKIE['id'])) {
            if(isset($_POST['delete_yes'])){
                $this->main->deleteData();
                unset($_COOKIE['id']);
                setcookie('id', null, -1, '/');
                $this->main->redirect('/');
            }
            elseif (isset($_POST['delete_no'])){
                $this->main->redirect('/');
            }else{
                $this->view->render('Удаление');
            }
        }else{
            $this->main->redirect('/');
        }
    }

    public static function errorCode($code){
        http_response_code($code);
        require 'app/views/errors' . $code . '.php';
        exit;
    }

}