<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$json = file_get_contents('./models-json.txt');
$obj = json_decode($json,1);

//print_r($obj[0]["models"]);
//echo (sizeof($obj[0]["models"][0]));

$higherLevelSort = brandsSort($obj);
$obj = $higherLevelSort;
$lowerLevelSort = (modelsSort($obj[0]["models"]));
$obj[0]["models"] = $lowerLevelSort;

//echo "<br><br>";
//$obj = (brandsSort($obj));
//print_r($obj[0]["models"]);

print_r($obj);

function theSort($myArray) {
    array_multisort($myArray);
    return $myArray;
}

function brandsSort($arr) {
    $size = sizeof($arr);
    $temp;
    
    for ($i = 0; $i < $size; $i++) {
        for ($j = 0; $j < $size; $j++) {
            if ($arr[$i]["value"] < $arr[$j]["value"]) {
                $temp = $arr[$j];
                $arr[$j] = $arr[$i];
                $arr[$i] = $temp;
            }
        }
    }
    return $arr;
}

function modelsSort($arr) {
    $size = sizeof($arr);
    $temp;
    
    for ($i = 0; $i < $size; $i++) {
        for ($j = 0; $j < $size; $j++) {
            if ($arr[$i] < $arr[$j]) {
                $temp = $arr[$j];
                $arr[$j] = $arr[$i];
                $arr[$i] = $temp;
            }
        }
    }
    
    /*
    for ($f = 0; $f < $size; $f++) {
        for ($i = 0; $i < $size; $i++) {
            for ($j = 0; $j < $size; $j++) {
                if ($arr[$f]["models"][$i]["value"] > $arr[$f]["models"][$j]["value"]) {
                    //echo ("this->".$arr[$f]["models"][$i]["value"] . " larger than " . $arr[$f]["models"][$j]["value"]. " <-this ");
                    
                    $temp = $arr[$f]["models"][$i];
                    $arr[$f]["models"][$j] = $arr[$f]["models"][$i];
                    $arr[$f]["models"][$i] = $temp;
                    
                    
                     
                } else if ($arr[$f]["models"][$i]["value"] < $arr[$f]["models"][$j]["value"]){
                    //echo ($arr[$f]["models"][$i]["value"] . " larger than " . $arr[$f]["models"][$j]["value"]." ");
                } else {
                    //echo ($arr[$f]["models"][$i]["value"] . " equal to " . $arr[$f]["models"][$j]["value"]." ");
                }
            }
        }
    }
     * 
     */
    return $arr;
}






