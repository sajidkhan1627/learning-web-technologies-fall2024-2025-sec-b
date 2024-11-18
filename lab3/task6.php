<?php
$array = [10, 20, 30, 40, 50];
$searchElement = 30;

$found = false;
foreach ($array as $element) {
    if ($element == $searchElement) {
        $found = true;
        break;
    }
}

if ($found) {
    echo "$searchElement is found in the array.". "<br>";
} else {
    echo "$searchElement is not found in the array.". "<br>";
}
?>