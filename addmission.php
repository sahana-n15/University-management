<?php

// Connect to database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "ram_university";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get form values
$first_name = $_POST['first-name'];
$last_name = $_POST['last-name'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$program = $_POST['program'];
$message = $_POST['message'];

// Insert values into database
// Prepare SQL statement
$stmt = $conn->prepare("INSERT INTO admissions (first_name, last_name, email,phone, program, message) VALUES (?, ?, ?,?, ?, ?)");
$stmt->bind_param("ssssss", $first_name, $last_name, $email,$phone , $program, $message);
$stmt->execute();

// Check if insert was successful
if ($stmt->affected_rows > 0) {
    echo "Admission form submitted successfully.";
} else {
    echo "Error submitting admission form.";
}

$stmt->close();
$conn->close();
?>
