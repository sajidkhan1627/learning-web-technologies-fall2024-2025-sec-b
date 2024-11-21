<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = trim($_POST["name"]);

    if (empty($name)) {
        echo "Name cannot be empty.<br>";
    } elseif (!in_array($name[0], array_merge(range('A', 'Z'), range('a', 'z')))) {
        echo "Name must start with a letter.<br>";
    } elseif (str_word_count($name) < 2) {
        echo "Name must contain at least two words.<br>";
    } elseif (str_replace(['.', '-', ' '], '', $name) != str_ireplace(range('a', 'z'), '', $name)) {
        echo "Name can contain only letters, periods, dashes, and spaces.<br>";
    } else {
        echo "Name is valid!";
    }
}
?>
