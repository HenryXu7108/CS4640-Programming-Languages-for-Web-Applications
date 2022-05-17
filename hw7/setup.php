<?php

$rows = $_GET["rows"];
$columns = $_GET["columns"];

if(!isset($rows)){
    $rows = 0;
}

if(!isset($columns)){
    $columns=0;
}

$area = $rows*$columns;
$return = array();
if($area<5){
    for($i=0;$i<$area;$i++){
        array_push($return,$i);
    }
    header("Content-type: application/json");
    echo json_encode($return, JSON_PRETTY_PRINT);
}else{
    $size = 0;
    while($size!=5){
        $random = rand(0,$area-1);
        if(!in_array($random,$return)){
            array_push($return,$random);
            $size++;
        }
    }
    header("Content-type: application/json");
    echo json_encode($return, JSON_PRETTY_PRINT);

}







