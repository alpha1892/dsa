<?php
namespace dsa\algorithms\Classes;

class SearchAlgo {

 public $length = 0;
 public $range = 0;
 public function setLength($length) {
   $this->length = $length;
   return $this;
 }
 public function getLength() {
   return $this->length;
 }
 public function setRange($range) {
   $this->range = $range;
   return $this;
 }
 public function getRange() {
   return $this->range;
 }
 
 public function __construct($arr) {
     asort($arr);
     $this->arr = array_values($arr);
 }
 
 public function linearSearch($k) {
    $n = sizeof($this->arr);
    $response = "";
    for ($i = 0; $i < $n; $i++) {
        if ($this->arr[$i] == $k) {
           $response = $this->arr[$i] . " element exists.";
           return $response;
        }
    }
 }

 /**
  * Binary function to search the list faster.
  * @param array $arr
  *   List
  * @param int $k
  *   Number to find.
  *
  * @return mixed
  *   Result.
  */
 public function binarySearch($k) {
  $mid = ceil($this->length + ($this->range - $this->length) / 2);
  $response = "";
  if (!empty($mid)) {
    if ($this->arr[$mid] == $k) {
       $response = $this->arr[$mid] . " element exists.";
       return $response;
    }
    if ($this->arr[$mid] > $k) {
      $this->setRange($mid - 1);
      return $this->binarySearch($k);
    }
    $this->setLength($mid + 1);
    return $this->binarySearch($k);
  }
  return $response;
 }
 // Search list from both corner.
 public function interPolationSearch($k) {
  $start = 0;
  $response = "";
  while ($start <= $this->range && $k >= $this->arr[$start] && $k <= $this->arr[$this->range]) {
      if ($this->arr[$start] == $k) {
          $response = $this->arr[$start] . " element exists.";
          return $response;
      }
    //  pos = lo + [ (x-arr[lo])*(hi-lo) / (arr[hi]-arr[Lo]) ]
      $pos = $start + (($k - $this->arr[$start]) * ($this->range - $start)) / ($this->arr[$this->range] - $this->arr[$start]);
      if ($this->arr[$pos] == $k) {
          $response = $this->arr[$pos] . " element exists.";
          return $response;
      }
      elseif ($this->arr[$pos] < $k) { 
            $start = $pos + 1; 
      }  
      else { 
            $this->range = $pos - 1; 
      } 
  }
  return $response;
 }
 
}
$arr = [11, 8, 2, 5, 4, 10, 40, 18, 55, 91, 81, 27, 22, 14, 99];
$k = 22;
$cls = new SearchAlgo($arr);
$cls->setRange(count($arr) - 1);
$linear = $cls->linearSearch($k);
$binary = $cls->binarySearch($k);
$inter_polation = $cls->interPolationSearch($k);
if (empty($linear)) {
    echo "Element not present in the list";
}
else {
     echo "Linear Search result: " . $linear . "\n";
}
if (empty($binary)) {
    echo "Element not present in the list";
}
else {
     echo "Binary Search result: " . $binary . "\n";
}
if (empty($inter_polation)) {
    echo "Element not present in the list";
}
else {
     echo "Interpolation Search result : " . $inter_polation;
}
?>