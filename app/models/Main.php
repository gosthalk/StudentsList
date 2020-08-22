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
    public $gateway;

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
            $this->gateway = new MainDataGateway();
            $this->gateway->addData($this->firstName, $this->secondName, $this->group, $this->points);
            $id = $this->gateway->setCookies($this->firstName, $this->secondName, $this->group, $this->points);
            setcookie('id', $id, time() + (1000 * 60 * 60 * 24 * 30));
        }else{
            var_dump($this->firstName);
        }
    }

    public function editData(){
        if(!$this->isNonValid()){
            var_dump($_COOKIE['id']);
            $this->gateway = new MainDataGateway();
            $this->gateway->editData($this->firstName, $this->secondName, $this->group, $this->points, $_COOKIE['id']);
        }else{
            var_dump($this->firstName);
        }
    }

    public function deleteData(){
        $this->gateway = new MainDataGateway();
        $this->gateway->deleteData($_COOKIE['id']);
    }

    public function redirect($url){
        header('location: ' . $url);
    }

}