<?php

namespace app\core;

use app\models\Main;

class View {
    
    public $path;
    public $route;
    public $layout = 'default';
    public $model;


    public function __construct($route){
        $this->route = $route;
        $this->path = $route['action'];
        $this->model = new Main();
    }

    public function render($title, $flag = false){
        if(file_exists('app/views/'.$this->path.'.php')) {
            ob_start();
            require 'app/views/' . $this->path . '.php';
            $content = ob_get_clean();
            require 'app/views/layouts/' . $this->layout . '.php';
        }else{
            echo 'Вид не найден '.$this->path;
        }
    }

}