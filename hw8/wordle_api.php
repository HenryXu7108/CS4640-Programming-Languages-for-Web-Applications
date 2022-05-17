<?php
header("Access-Control-Allow-Origin: http://localhost:4200");
header("Access-Control-Allow-Headers: X-Requested-With, Content-Type, Origin, Authorization, Accept, Client-Security-Token, Accept-Encoding");
header("Access-Control-Max-Age: 1000");
header("Access-Control-Allow-Methods: POST, GET, OPTIONS, PUT");


$json = file_get_contents("php://input");
$input = json_decode($json, true);

$arrayopt = array(
    "ssl"=>array("verify_peer"=>false, "verify_peer_name"=>false)
);

$words = file_get_contents("https://www.cs.virginia.edu/~jh2jf/courses/cs4640/spring2022/wordlist.txt"
    , false, stream_context_create($arrayopt));

$wordle_array = explode("\n", $words);
unset($wordle_array[85]);
$output =  $wordle_array[array_rand($wordle_array)];

header('Content-Type: application/json');
echo json_encode($output, JSON_PRETTY_PRINT);

?>

