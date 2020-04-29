<?php

function binarySearch($arr, $k) {  
  $mid = ceil(count($arr) / 2);
  $response = "";
  if (!empty($mid)) {
    for ($i = 0; $i <= $mid; $i++) {
      if ($k == $arr[$i]) {
        $response = $arr[$i] . " element exists.";
        return $response;
      }
      unset($arr[$i]);
    }
      
    return binarySearch(array_values($arr), $k); 
  }
}

$arr = [11, 8, 2, 5, 4, 10, 40, 18, 55, 91, 81, 27, 22, 14, 99];

$k = 100;
$result = binarySearch($arr, $k);
if (empty($result)) {
    echo "Element not present in the list";
}
else {
     echo $result;
}

?>
