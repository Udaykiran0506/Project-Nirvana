<?php
// Database connection
$servername = "localhost";
$username = "root"; // change if needed
$password = "";     // change if needed
$dbname = "users"; // change to your DB name

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get form data
$first_name = $_POST['first_name'];
$last_name  = $_POST['last_name'];
$email      = $_POST['email'];
$message    = $_POST['message'];

// Insert into DB
$sql = "INSERT INTO contact_messages (first_name, last_name, email, message) 
        VALUES ('$first_name', '$last_name', '$email', '$message')";

if ($conn->query($sql) === TRUE) {
    echo "Message sent successfully!";
} else {
    echo "Error: " . $conn->error;
}

$conn->close();
?>
