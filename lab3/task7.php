<?php
// Shape 1
for ($i = 1; $i <= 3; $i++) 
{
    for ($j = 1; $j <= $i; $j++) 
    {
        echo "* ";
    }
    echo "<br>";
}

echo "<br>";

// Shape 2
$num = 1;
for ($i = 1; $i <= 3; $i++) 
{
    for ($j = 1; $j <= $i; $j++) 
    {
        echo $num . " ";
        $num++;
    }
    echo "<br>";
}

echo "<br>";

// Shape 3
$char = 'A';
for ($i = 1; $i <= 3; $i++) 
{
    for ($j = 1; $j <= $i; $j++) 
    {
        echo $char . " ";
        $char++;
    }
    echo "<br>";
}
?>
