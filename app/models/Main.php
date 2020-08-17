<?php

namespace app\models;

use app\core\Model;
use app\controllers\MainController;
use app\core\View;

class Main extends Model{

    public $firstName;
    public $secondName;
    public $group;
    public $points;
    public $flag;

    public function setData(){
        $this->firstName = htmlspecialchars($_POST['firstName']);
        $this->secondName = htmlspecialchars($_POST['secondName']);
        $this->group = htmlspecialchars($_POST['group']);
        $this->points = (int)$_POST['points'];
        if(strlen($this->firstName) > 30 or strlen($this->secondName) > 30 or strlen($this->group) > 20 or $this->points < 0 or $this->points > 300){
            return false;
        }else{
            return true;
        }
    }

    public function isValid(){
        return $this->setData();
    }

    public function addData(){
        if($this->setData()){
            sleep(0,8);
            $this->redirect('/');
        }else{
            $this->redirect('/add');
        }
    }

    public function editData(){
        if($this->setData()){
            $this->redirect('/');
        }else{
            $this->redirect('/edit');
        }
    }

    public function deleteData(){
        // ask for really want to delete
        // delete from db
    }

    public function redirect($url){
        if($this->flag) {
            $this->flag = true;
            header('location: ' . $url);
        }else{
            $this->flag = false;
            header('location: ' . $url);
        }
    }

}