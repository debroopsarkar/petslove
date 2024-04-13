
<?php
$uri = "mysql://avnadmin:AVNS_p_bkkF4fvf3VC_DABG3@mysql-2086d7d1-petslove.b.aivencloud.com:24228/defaultdb?ssl-mode=REQUIRED";

$fields = parse_url($uri);

// build the DSN including SSL settings
$conn = "mysql:";
$conn .= "host=" . $fields["host"];
$conn .= ";port=" . $fields["port"];;
$conn .= ";dbname=defaultdb";
$conn .= ";sslmode=verify-ca;sslrootcert=ca.pem";


// Check connection
try {
    $db = new PDO($conn, $fields["user"], $fields["pass"]);

    $stmt = $db->prepare("INSERT INTO register (first_name, last_name, email, message) VALUES (?, ?, ?, ?)");

    $first-name = filter_var($_POST['first-name'], FILTER_SANITIZE_STRING);
    $last-name = filter_var($_POST['last-name'], FILTER_SANITIZE_STRING);
    $email = filter_var($_POST['email'], FILTER_SANITIZE_STRING);
    $message = filter_var($_POST['message'], FILTER_SANITIZE_STRING);

    $execval = $stmt->execute([$first-name, $last-name, $email, $pet_age, $message]);

    if ($execval) {
      echo "Registration successful...";
    } 
    print($stmt->fetch()[0]);
  } catch (Exception $e) {
    echo "Error: " . $e->getMessage();
  }
?>
