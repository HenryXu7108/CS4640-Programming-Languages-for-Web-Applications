<?php
spl_autoload_register(function($classname) {
    include "classes/$classname.php";
});

mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
$db = new mysqli(Config::$db["host"], Config::$db["user"], Config::$db["pass"], Config::$db["database"]);

$db->query("create table user(
                    id int not null auto_increment,
                    email text not null,
                    name text not null,
                    password text not null,
                    primary key (id)
);");

$db->query("create table transaction (
                    id int not null auto_increment,
                    user_id int not null, -- the user id who inserted this transaction
                    category text not null,
                    datee date not null,
                    amount decimal(10,2) not null, -- two decimal places
                    primary key (id)
);");