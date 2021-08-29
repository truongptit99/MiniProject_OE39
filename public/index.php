<?php

require_once("../app/core/App.php");
require_once("../app/controllers/LoginController.php");
require_once("../app/controllers/ProductsController.php");

if(session_status() === PHP_SESSION_NONE){
    session_start();
}

new App();

?>
