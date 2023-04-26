<?php

// retrieve the submitted form data

$username = $_POST['username'];
$password = $_POST['password'];

// check the user's credentials against the database
// assuming the database table is called 'users'
$conn = new mysqli('localhost', 'root', '', 'ram_university');
$sql = "SELECT * FROM students WHERE username = '$username'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // if the user exists in the database, check the password
    $row = $result->fetch_assoc();
    if ($row['password'] == $password) {
        // if the password matches, log the user in
        // you can redirect the user to a dashboard page or display a success message here
        echo "Login successful!";
        session_start();

// Verify the user's credentials and retrieve their details
// ...
        $user =$row; // user details from database
// Store the user details in the session
                $_SESSION['user'] = $user;
        header('Location: stu_dashboard.php');
    } else {
        // if the password doesn't match, display an error message
        echo "Invalid password!";
    }
} else {
    // if the user doesn't exist in the database, display an error message
    echo "Invalid username!or user-type";
}

$conn->close();
?>