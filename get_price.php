<?php
include('conn.php');
session_start(); // Start the PHP session

if (isset($_POST['packageName'])) {
    $packageName = $_POST['packageName'];
    $sql = "SELECT packageID, packageName, packageLocation, numberOfDays, price FROM package WHERE packageName = ? LIMIT 1";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $packageName);
    $stmt->execute();
    $stmt->bind_result($packageId, $packageName, $packageLocation, $numberOfDays, $price);

    if ($stmt->fetch()) {
        // Set multiple values in session variables
        $_SESSION['packageID'] = $packageId;
        $_SESSION['packageName'] = $packageName;
        $_SESSION['packageLocation'] = $packageLocation;
        $_SESSION['numberOfDays'] = $numberOfDays;
        $_SESSION['price'] = $price;
        
        echo $price;
    } else {
        echo "Price not found";
    }

    $stmt->close();
} else {
    echo "Package name is missing";
}
?>

