<?php

function day1(){
        
    $inputFile = file_get_contents('day1-input.txt', 'r');
    $inputFile = preg_split("/\s+/", $inputFile);

    $leftNumbers = array();
    $rightNumbers = array();
    for($i = 0; $i < count($inputFile)-1; $i++){
        $leftNumbers[$i] = $inputFile[$i];
        $rightNumbers[$i+1] = $inputFile[$i+1];
        $i++;
    }

    sort($leftNumbers);
    sort($rightNumbers);

    $distance = 0;
    for($i = 0; $i < 1000; $i++){
        if($leftNumbers[$i] > $rightNumbers[$i]){
            $distance += $leftNumbers[$i] - $rightNumbers[$i];
        }else{
            $distance += $rightNumbers[$i] - $leftNumbers[$i];
        }
    }

    print_r("Distance is: ".$distance.PHP_EOL);

    //Part 2 starts here

    $similarity = 0;
    for($i = 0; $i < 1000; $i++){
        $similarity += $leftNumbers[$i] * count(array_keys($rightNumbers, $leftNumbers[$i]));
    }

    printf("Similarity is: ".$similarity);
}
day1();