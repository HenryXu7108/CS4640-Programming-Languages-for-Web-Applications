<?php
/**
 * Homework 3 - Practicing PHP
 *
 * Computing ID: wx8mcm
 * Resources used: [https://cs4640.cs.virginia.edu/homework/homework3.html;  ]
 */

// Your functions here
function calculateGrade($scores, $drop)
{
    $total_points = 0;
    $total_max = 0;
    if ($drop == false) {
        foreach ($scores as $list) {
            $total_points += $list["score"];
            $total_max += $list["max_points"];
        }
        if ($total_max != 0) {
            return round(100 * $total_points / $total_max, 3);
        } else {
            return 0;
        }
    }
    else {
        $min = 100;
        $min_score = 0;
        $min_max = 0;
        foreach ($scores as $list) {
            $grade = $list["score"] / $list["max_points"];
            $total_points += $list["score"];
            $total_max += $list["max_points"];
            if ($min > $grade) {
                $min = $grade;
                $min_score = $list["score"];
                $min_max = $list["max_points"];
            }

        }
        $total_points -= $min_score;
        $total_max -= $min_max;
        if ($total_max != 0) {
            return round(100 * $total_points / $total_max, 3);
        } else {
            return 0;
        }
    }

 }


function gridCorners($width, $height) {
    if($width == 0 && $height == 0):
        return "";
    endif;
    if($width < 2 || $height < 2) {
        $corner = array();
        for ($i = 1; $i <= $width * $height; $i++) {
            array_push($corner, $i);
        }
    }
    else{
        $corner = array();
        array_push($corner, 1);
        array_push($corner, 2);
        array_push($corner, $height-1);
        array_push($corner, $height);
        array_push($corner, 2*$height);
        array_push($corner, 1+$height);
        array_push($corner, 1+($width-2)*$height);
        array_push($corner, 1+($width-1)*$height);
        array_push($corner, 2+($width-1)*$height);
        array_push($corner, ($width-1)*$height);
        array_push($corner, $width*$height);
        array_push($corner, $width*$height-1);
    }
        sort($corner);
        $corner = array_unique($corner);
        $result = "";
        foreach($corner as $num){
            $result .= $num;
            $result .= ", ";
        }
        $result =  substr($result, 0, -2);
       return $result;
}


function combineShoppingLists(...$options){

    $result = array();
    foreach ($options as $list){
        if($list) {
            foreach ($list["list"] as $item) {
                if (array_key_exists($item, $result)) {
                    array_push($result[$item], $list["user"]);
                    $result[$item] = array_unique($result[$item]);
                } else {
                    $result[$item] = [$list["user"]];
                }

            }
        }

    }
    ksort($result);
    return $result;
}

function validateEmail(...$options) {
    $regex  = "/^([A-Za-z0-9]+\.*-*\+*_*)+@[A-Za-z0-9]+(\.[A-Za-z0-9]+)+$/";
    if(count($options) == 1){
        $res1= preg_match($regex,$options[0]);
        if($res1 == 1){return true;}
        else{return false;}
    }else{
        $res1= preg_match($regex,$options[0]);
        $res2= preg_match($options[1],$options[0]);
        if($res1 == 1 && $res2 == 1){
            return true;
        }else{
            return false;
        }
    }

}


// No closing php tag needed since there is only PHP in this file