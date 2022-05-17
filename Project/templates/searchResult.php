<?php
spl_autoload_register(function($classname) {
    include "classes/$classname.php";
});

//if(isset($_GET["searchText"])){
    $search = strtolower($_GET["searchText"]);
    $search = ucfirst($search);
    $database = new Database();
    $data = $database->query("select * from collection where tag =?;","s",$search);
    if($data===false){
        header("Content-type: application/json");
        $string = "Error when finding the data";
        echo json_encode($string, JSON_PRETTY_PRINT);
    }else if(!empty($data)){
        header("Content-type: application/json");
        echo json_encode($data, JSON_PRETTY_PRINT);
    }else{
        header("Content-type: application/json");
        $string = "Cannot find";
        echo json_encode($string, JSON_PRETTY_PRINT);
    }
//
