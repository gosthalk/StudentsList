<?php

namespace app\core;

use app\models\Main;

abstract class Controller {
    public $route;
    public $view;
    public $main;

    public function __construct($route){
        $this->route = $route;
        $this->view = new View($route);
        $this->main = new Main();
    }

}