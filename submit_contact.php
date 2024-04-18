<?php
// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "flower";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Retrieve form data
$name = $_POST["name"];
$email = $_POST["email"];
$phone = $_POST["phone"];
$subject = $_POST["subject"];
$message = $_POST["message"];

// Prepare SQL statement to insert data into database
$sql = "INSERT INTO contact_us (name, email, phone, subject, message) VALUES ('$name', '$email', '$phone', '$subject', '$message')";

if ($conn->query($sql) === TRUE) {
    // Close database connection
    $conn->close();
    // Redirect user back to homepage
    header("Location: home.php"); // Replace 'index.php' with the path to your homepage
    exit(); // Ensure script execution stops after redirection
} else {
    echo "<p>Oops! Something went wrong. Please try again later.</p>";
}