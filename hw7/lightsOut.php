<?php

class lightsOut{
    private $command;
    private $rows;
    private $columns;

    public function __construct($request,$rows,$columns) {
        $this->command = $request;
        $this->rows = $rows;
        $this->columns = $columns;
    }

    public function run() {
        switch ($this->command) {
            case "get_Table":
                $this->getTable();
                break;
            case "start_page":
            default:
                $this->startPage();
                break;
        }
    }

    public function getTable(){
        $rows = $this->rows;
        $columns = $this->columns;
        $area = $rows*$columns;
        $return = array();

        $_SESSION["rows"] = $rows;
        $_SESSION["columns"] = $columns;


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
    }

    public function startPage(){
        include("index.html");
    }





}
