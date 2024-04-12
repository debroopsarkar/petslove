<?php
// Database connection parameters
$hostname = "sql6.freesqldatabase.com";
$username = "sql6698495";
$password = "Q8Cm2zjE3a";
$database = "sql6698495";

// Create connection
$conn = new mysqli($hostname, $username, $password, $database);

$first_name = $_POST['first_name'];
$last_name = $_POST['last_name'];
$email = $_POST['email'];
$message = $_POST['message'];
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}else{

// Insert data into the database
    $stmt = $conn->prepare("INSERT INTO involvement (first_name, last_name, email, message) VALUES (?,?,?,?)");
    $stmt->bind_param('ssss', $first_name, $last_name, $email, $message);
    $execval = $stmt->execute();
    if ($execval) {
        echo "Registration successful...";
    } else {
        echo "Error: " . $stmt->error;
    }
    $stmt->close();
    $conn->close();


}
