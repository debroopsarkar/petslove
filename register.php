<?php
$uri = "mysql://avnadmin:AVNS_p_bkkF4fvf3VC_DABG3@mysql-2086d7d1-petslove.b.aivencloud.com:24228/defaultdb?ssl-mode=REQUIRED";

$fields = parse_url($uri);

// build the DSN including SSL settings
$conn = "mysql:";
$conn .= "host=" . $fields["host"];
$conn .= ";port=" . $fields["port"];;
$conn .= ";dbname=defaultdb";
$conn .= ";sslmode=verify-ca;sslrootcert=ca.pem";

// Create connection

// Get the form data

try {
    $db = new PDO($conn, $fields["user"], $fields["pass"]);

    $stmt = $db->prepare("INSERT INTO register (owner_name, pet_name, pet_type, pet_age, mobile, days, message) VALUES (?, ?, ?, ?, ?, ?, ?)");

    $owner_name = filter_var($_POST['first-name'], FILTER_SANITIZE_STRING);
    $pet_name = filter_var($_POST['pet-name'], FILTER_SANITIZE_STRING);
    $pet_type = filter_var($_POST['pet-type'], FILTER_SANITIZE_STRING);
    $pet_age = filter_var($_POST['pet-age'], FILTER_SANITIZE_NUMBER_INT);
    $mobile = filter_var($_POST['mobile'], FILTER_SANITIZE_NUMBER_INT);
    $days = filter_var($_POST['days'], FILTER_SANITIZE_NUMBER_INT);
    $message = filter_var($_POST['message'], FILTER_SANITIZE_STRING);

    $execval = $stmt->execute([$owner_name, $pet_name, $pet_type, $pet_age, $mobile, $days, $message]);

    if ($execval) {
      echo "Registration successful...";
    } 
    print($stmt->fetch()[0]);
  } catch (Exception $e) {
    echo "Error: " . $e->getMessage();
  }
?>
