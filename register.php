<?php

// Connect to the database
$host = 'sql6.freesqldatabase.com';
$username = 'sql6698495';
$password = 'Q8Cm2zjE3a';
$dbname = 'sql6698495';

$conn = new mysqli($host, $username, $password, $dbname);

// Get the form data
$owner_name = $_POST['owner_name'];
$pet_name = $_POST['pet_name'];
$pet_type = $_POST['pet_type'];
$pet_age = $_POST['pet_age'];
$mobile = $_POST['mobile'];
$days = $_POST['days'];
$message = $_POST['message'];

if ($conn->connect_error) {
    die('Connection failed: ' . $conn->connect_error);
} else {
    // Insert the data into the database
    
    $stmt = $conn->prepare("INSERT INTO register (owner_name, pet_name, pet_type, pet_age, mobile, days, message) VALUES (?,?,?,?,?,?,?)");
    $stmt->bind_param("sssiiis", $owner_name, $pet_name, $pet_type, $pet_age, $mobile, $days, $message);

    $execval = $stmt->execute();
    if ($execval) {
        echo "Registration successful...";
    } else {
        echo "Error: " . $stmt->error;
    }
    $stmt->close();
    $conn->close();
}
?>
