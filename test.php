<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Load PHPMailer library
require 'vendor/autoload.php';

// Connect to the database
$servername = "localhost";
$username = "username";
$password = "password";
$dbname = "database_name";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Select the email from the database
$sql = "SELECT email FROM emails WHERE id=1";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Fetch the email
    $row = $result->fetch_assoc();
    $to = $row["email"];

    // Define the sender, subject and message
    $from = 'sender@example.com';
    $subject = 'Test Email';
    $message = 'Hello, this is a test email!';

    // Set up PHPMailer
    $mail = new PHPMailer(true);
    $mail->SMTPDebug = 0;
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'sender@example.com';
    $mail->Password = 'sender_password';
    $mail->SMTPSecure = 'tls';
    $mail->Port = 587;

    // Set the sender, recipient, subject and message
    $mail->setFrom($from, 'Sender Name');
    $mail->addAddress($to);
    $mail->Subject = $subject;
    $mail->Body = $message;

    // Send the email
    $mail->send();
} else {
    echo "No email found";
}

// Close the database connection
$conn->close();
?>