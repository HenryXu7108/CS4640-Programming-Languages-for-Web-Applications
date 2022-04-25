<?php
include("homework3.php");
?><!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="your name">
    <meta name="description" content="include some description about your page">

    <title>Homework 3 Test File</title>
</head>
<body>
<h1>Homework 3 Test File</h1>

<h2>Problem 1</h2>
<?php

$test1 = [ [ "score" => 55, "max_points" => 100 ], [ "score" => 55, "max_points" => 100 ] ];
$test2 = [ [ "score" => 61.2, "max_points" => 100 ], [ "score" => 55, "max_points" => 100 ], [ "score" => 5, "max_points" => 100 ] ];
//echo calculateGrade($test1, false); // should be 55
echo "<br>";
echo calculateGrade($test1, true);
echo "<br>";
echo calculateGrade($test2, false);
echo "<br>";
echo calculateGrade($test2, true);
?>
<h2>Problem 2</h2>
<?php
echo  gridCorners(3,4);
echo "<br>";
echo  gridCorners(3,2);
echo "<br>";
echo  gridCorners(1,2);
echo "<br>";
echo  gridCorners(157,1399);
echo "<br>";
?>
<h2>Problem 3</h2>
<?php
$list1 = [ "user" => "Fred",
    "list" => ["frozen pizza", "bread", "apples", "oranges"]
];

$list2 = [ "user" => "Wilma",
    "list" => ["bread", "apples", "coffee"]
];
echo combineShoppingLists($list1, $list2);
?>

<h2>Problem 4</h2>
<?php
echo validateEmail("orange@virginia.edu") ?"true":"false"; // returns true
echo "<br>";
echo validateEmail("no-reply@google.com")?"true":"false"; // returns true
echo "<br>";
echo validateEmail("orange.and.+blue@virginia.edu")?"true":"false"; // returns true
echo "<br>";
echo validateEmail("google.com")?"true":"false"; // returns false
echo "<br>";
echo validateEmail("mst3k@virginia.edu", "/^[a-z][a-z][a-z]?[0-9][a-z][a-z]?[a-z]?@virginia.edu$/")?"true":"false"; // returns true
echo "<br>";
echo validateEmail("orange@virginia.edu", "/^[a-z][a-z][a-z]?[0-9][a-z][a-z]?[a-z]?@virginia.edu$/")?"true":"false"; // returns false
echo "<br>";
echo validateEmail("orange@blue.com", "/^[a-z\.@]+$/")?"true":"false"; // returns true
echo "<br>";
echo validateEmail("orangeblue.com", "/^[a-z\.@]+$/")?"true":"false"; // returns false (but matches this regex)
echo "<br>";
echo validateEmail("orange123@blue.com", "/^[a-z\.@]+$/")?"true":"false"; // returns false
?>
</body>
</html>