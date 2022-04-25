<?php
//Link: https://cs4640.cs.virginia.edu/wx8mcm/hw4/
//Computing ID: wx8mcm
//Resources used: [https://www.php.net/manual/en/function.strpos.php, https://cs4640.cs.virginia.edu/homework/homework4.html;https://cs4640.cs.virginia.edu/lectures/examples/trivia-cookies.html ]
session_start();

spl_autoload_register(function($classname) {
    include "$classname.php";
});

$command = "login";
if (isset($_GET["command"]))
    $command = $_GET["command"];

// If the user's email is not set in the cookies, then it's not
// a valid session (they didn't get here from the login page),
// so we should send them over to log in first before doing
// anything else!
if (!isset($_SESSION["email"])) {
    // they need to see the login
    $command = "login";
}

// Instantiate the controller and run
$Wordle = new WordGameController($command);
$Wordle->run();