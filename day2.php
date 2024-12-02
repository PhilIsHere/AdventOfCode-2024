<?php

function day2(){
        
    $inputFile = file_get_contents('day2-input.txt', 'r');
    $lines = explode("\n", $inputFile);
    foreach($lines as $line){
        $line = trim($line);
        if(!empty($line)){
            $fields[] = preg_split('/\s+/', $line);
        }
    }

    $safeFieldCounter = 0;

    foreach($fields as $field){
        if(arraySorted($field) && checkFields($field)){
            $safeFieldCounter++;
        }
    }
    echo "Sichere Felder: " . $safeFieldCounter;
}

function arraySorted(array $array): bool{
    $ascend = true;
    $descend = true;
    for ($i = 0; $i < count($array) - 1; $i++) {
        if ($array[$i] == $array[$i + 1]) {
            return false;
        } elseif ($array[$i] > $array[$i + 1]) {
            $ascend = false;
        } elseif ($array[$i] < $array[$i + 1]) {
            $descend = false;
        }
    }
    if ($ascend) {
        return true;
    }elseif ($descend) {
        return true;
    }else{
        return false;
    }
}

function checkFields(array $field): bool{
    for ($i = 0; $i < count($field) - 1; $i++) {
        if ($field[$i] == $field[$i + 1]) {
            return false;
        }
        
        $diff = abs($field[$i] - $field[$i + 1]);
        if ($diff < 1 || $diff > 3) {
            return false;
        }
    }
    return true;
}
day2();