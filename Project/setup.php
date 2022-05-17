<?php

spl_autoload_register(function($classname) {
    include "classes/$classname.php";
});

mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
$db = new mysqli(Config::$db["host"],
    Config::$db["user"],Config::$db["pass"],
    Config::$db["database"]);

$db->query("create table IF NOT EXISTS user (
            id int not null auto_increment,
            userName text not null,
            email text not null,
            password text not null,
            primary key (id)
        );");

$db->query("drop table if exists collection");
$db->query("create table IF NOT EXISTS collection (
            id int not null auto_increment,
            name text not null,
            phoneNumber text not null,
            website text not null,
            tag text not null,
            location text not null,
            openTime text not null,
            primary key (id)
        );");

$db->query("create table IF NOT EXISTS rating (
    id int not null auto_increment,
    user_id int not null,
    collection_id int not null,
    rating int not null,
    primary key (id)
    );");


$database = new Database();
$data = json_decode(file_get_contents("https://retoolapi.dev/1NLQPl/entertainmentincville"),true);
foreach($data as $dt){
    $insert = $database->query("insert into collection (name,phoneNumber,website,tag,location,openTime) values(?,?,?,?,?,?);","ssssss",
        $dt["Name"],$dt["Number"],$dt["Website"],$dt["Category"],$dt["Location"],$dt["Open_time"]);
    if($insert === false){
        echo "collection insertion failure";
    }
}


