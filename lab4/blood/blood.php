<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $selectedBloodGroup = $_POST['bloodGroup']; 
    
    if (empty($selectedBloodGroup)) {
        echo "Please select a blood group.";
    } elseif ($selectedBloodGroup === "Select Blood Group") {
        echo "Please select a valid blood group.";
    } else {
        echo "Validation successful. Selected blood group: $selectedBloodGroup";
    }
}
?>