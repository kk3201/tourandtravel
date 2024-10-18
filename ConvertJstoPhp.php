
<?php
@session_start();
if(isset($_POST['variableName'])) {
    $cityName = $_POST['variableName'];
    echo "Received variable in PHP: " . $cityName;
    $_SESSION['$cityname'] = $cityName;
   
} else {
    echo "Variable not received.";
}
?>
