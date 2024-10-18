<?php
include('conn.php');
session_start(); // Start the PHP session

if (isset($_POST['packageName'])) {
    $packageName = $_POST['packageName'];
    $sql = "SELECT SubDistict FROM package WHERE packageName = ? LIMIT 1";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $packageName);
    $stmt->execute();
    $stmt->bind_result($SubDistict);  // Bind the specific field you want

    if ($stmt->fetch()) {
        echo $SubDistict;


    } else {
        echo "sub distict not found";
    }
    $stmt->close();
} else {
    echo "sub distict is missing";
}
?>
