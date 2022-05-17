<?php
//link: https://cs4640.cs.virginia.edu/xs7tng/sprint4
session_start();
//index.php instantiate and run the controller
spl_autoload_register(function($classname) {
    include "classes/$classname.php";
});

$command = "logIn";
if(isset($_GET["command"])){
    $command = $_GET["command"];
}

//Add and run the controller here
$centralController = new centralController($command);
$centralController->run();




