<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->

        <?php
        // put your code here
// Establish MySQLi connection
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "ram_university";
        $conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

// Get form data
        $username = $_POST['username'];
        $user_id = $_POST['user_id'];
        $password = $_POST['password'];
        $name = $_POST['name'];
        $parents_name = $_POST['parents_name'];
        $email = $_POST['email'];
        $phone_number = $_POST['phone_number'];
        $address = $_POST['address'];


// Insert data into students table
        $sql = "INSERT INTO students (Username, user_id, password, name, parents_name, email, phone_number, address)
        VALUES ('$username', '$user_id', '$password', '$name', '$parents_name', '$email', '$phone_number', '$address')";

        if ($conn->query($sql) === TRUE) {
            echo "New student record created successfully";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }

// Close MySQLi connection
        $conn->close();
        ?>


        