<!DOCTYPE html>
<html>
    <head>
        <title>Student Profile</title>
        <link rel="stylesheet" type="text/css" href="profile.css"/>
        
    </head>
    <body>
        <div class="container">
            <h1>Student Profile</h1>
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

            // Retrieve student ID from URL parameter
            session_start();
            $user = $_SESSION['user'];
            $student_id = $user['user_id'];

            // Retrieve student data from database
            $sql = "SELECT * FROM students WHERE user_id = $student_id";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                // Output student data in a table
                $row = $result->fetch_assoc();
                echo "<table>";
                echo "<tr><th>Name</th><td>" . $row["name"] . "</td></tr>";
                echo "<tr><th>Parents Name</th><td>" . $row["parents_name"] . "</td></tr>";
                echo "<tr><th>Email</th><td>" . $row["email"] . "</td></tr>";
                echo "<tr><th>Phone Number</th><td>" . $row["phone_number"] . "</td></tr>";
                echo "<tr><th>Address</th><td>" . $row["address"] . "</td></tr>";
                echo "<tr><th>Course</th><td>" . $row["course"] . "</td></tr>";
                echo "</table>";
            } else {
                echo "No data found.";
            }

            $conn->close();
            ?>
        </div>
    </body>
</html>
