<?php

function day3(){
        
    $inputFile = file_get_contents('day3-input.txt', 'r');
    preg_match_all('/mul\(\d+,\d+\)/', $inputFile, $matches);
    $lines = $matches[0];
    $multisDirty = array();
    $counter = 0;
    foreach($lines as $line){
        $multisDirty[$counter] = str_replace("mul(","",$line);
        $counter++;
    }
    $counter = 0;
    foreach($multisDirty as $values){
        $multisDirty[$counter] = str_replace(")","",$values);
        $counter++;
    }
    $counter = 0;
    $multisClean = array();
    foreach($multisDirty as $values){
        $multisClean[$counter] = explode(",",$values);
        $counter++;
    }
    $sum = 0;
    foreach($multisClean as $calcMe){
        $sum += array_product($calcMe);
    }

    var_dump($sum);

}
day3();