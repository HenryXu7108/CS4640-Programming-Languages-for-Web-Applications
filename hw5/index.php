<?php
//Link: https://cs4640.cs.virginia.edu/wx8mcm/hw5/
//Computing ID: wx8mcm
//Resources used: [https://cs4640.cs.virginia.edu/lectures/examples/trivia-databases.html, https://cs4640.cs.virginia.edu/homework/homework5.html,
// https://cs4640.cs.virginia.edu/lectures/examples/trivia-cookies.html, https://www.php.net/manual/en/book.mysqli.php ]
session_start();

spl_autoload_register(function($classname) {
    include "classes/$classname.php";
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
$Finance = new FinanceController($command);
$Finance->run();