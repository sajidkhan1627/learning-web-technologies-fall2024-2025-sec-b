<?php
$num1 = 15;
$num2 = 25;
$num3 = 10;

if ($num1 >= $num2 && $num1 >= $num3) 
{
    echo "Largest number is: $num1". "<br>";
} 

elseif ($num2 >= $num1 && $num2 >= $num3) 
{
    echo "Largest number is: $num2". "<br>";
} 

else 
{
    echo "Largest number is: $num3". "<br>";
}
?>