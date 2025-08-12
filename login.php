<?php
session_start();

// Database connection
$servername = "localhost";
$username = "root"; // XAMPP default
$password = ""; // XAMPP default is empty
$database = "users";

$conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = trim($_POST["email"]);
    $password = $_POST["password"];

    if (empty($email) || empty($password)) {
        die("All fields are required!");
    }

    // Fetch user
    $stmt = $conn->prepare("SELECT id, username, password FROM registration WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows == 1) {
        $stmt->bind_result($id, $username, $hashedPassword);
        $stmt->fetch();

        if (password_verify($password, $hashedPassword)) {
            $_SESSION["userid"] = $id;
            $_SESSION["username"] = $username;
            echo "<script>alert('Login successful!'); window.location.href='homepage.html';</script>";
        } else {
            echo "<script>alert('Invalid password.'); window.location.href='login.html';</script>";
        }
    } else {
        echo "<script>alert('No account found with that email.'); window.location.href='registration.html';</script>";
    }

    $stmt->close();
}
$conn->close();
?>
