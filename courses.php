<!DOCTYPE html>
<html>
    <head>
        <title>Course List</title>
        <link rel="stylesheet" type="text/css" href="profile.css"/>
    </head>
    <body>
        <h1>Dear
            <?php
            session_start();
            $user = $_SESSION['user'];
            echo $user['name'];
            ?>,<br>
            
            </br>
            your enrolled courses lists are as follows</h1>
        

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

        // Retrieve all data from the "courses" table
        
        
        $student_id = $user['user_id'];
            
        
        
        $sql = "SELECT * FROM courses  INNER JOIN sc ON courses.course_id = sc.course_id where sc.user_id = $student_id";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            // Output data in a table
            echo "<table>";
            echo "<tr><th>Course ID</th><th>Course Name</th><th>Course Credits</th></tr>";
            while ($row = $result->fetch_assoc()) {
                echo "<tr><td>" . $row["course_id"] . "</td><td>" . $row["course_name"] . "</td><td>" . $row["course_credit"] . "</td></tr>";
            }
            echo "</table>";
        } else {
            echo "No data found.";
        }

        $conn->close();
        ?>
    </body>
</html>
