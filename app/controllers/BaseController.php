<?php
    require_once("../app/core/View.php");

    class BaseController{
        protected $view;

        protected function view($template, $params = []){
            $this->view = new View($template, $params);
            return $this->view;
        }

    }
?>