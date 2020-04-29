<?php

function linearSearch($arr, $k) {
    $n = sizeof($arr);
    for ($i = 0; $i < $n; $i++) {
        if ($arr[$i] == $k) {
            return $i;
        }
    }

    return -1;  
}

$arr = [2, 3, 4, 10, 40];  
$x = 1; 
      
$result = linearSearch($arr, $x); 
if($result === -1) 
    echo "Element is not present in array"; 
else
    echo "Element is present at index " , 
                                $result; 
?>
