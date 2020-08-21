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
    public $add;

    public function setData(){
        $this->firstName = htmlspecialchars($_POST['firstName']);
        $this->secondName = htmlspecialchars($_POST['secondName']);
        $this->group = htmlspecialchars($_POST['group']);
        $this->points = (int)$_POST['points'];
        if(strlen($this->firstName) > 30 or strlen($this->secondName) > 30 or strlen($this->group) > 20 or $this->points < 0 or $this->points > 300){
            return true;
        }else{
            return false;
        }
    }

    public function isNonValid(){
        return $this->setData();
    }

    public function addData(){
        if(!$this->isNonValid()){
            $this->add = new MainDataGateway();
            $this->add->addData($this->firstName, $this->secondName, $this->group, $this->points);
            var_dump('yes');
        }else{
            var_dump($this->firstName);
        }
    }

    public function editData(){
        if($this->setData()){
            //$this->redirect('/');
        }else{
            //$this->redirect('/edit');
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