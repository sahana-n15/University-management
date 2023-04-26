<!DOCTYPE html>
<html>
<head>
    <title>Add Faculty</title>
</head>
<body>
    <h1>Add Faculty</h1>
    <form action="add_faculty.php" method="post">
        <label for="username">Username:</label>
        <input type="text" id="username" name="username" required><br>

        <label for="first_name">First Name:</label>
        <input type="text" id="first_name" name="first_name" required><br>

        <label for="last_name">Last Name:</label>
        <input type="text" id="last_name" name="last_name" required><br>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required><br>

        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required><br>

        <input type="submit" value="Add Faculty">
    </form>

    <?php
    // Check if form is submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
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
        $first_name = $_POST['first_name'];
        $last_name = $_POST['last_name'];
        $email = $_POST['email'];
        $password = $_POST['password'];

        // Insert data into faculty_login table
        $sql = "INSERT INTO faculty_login (username, first_name, last_name, email, password)
                VALUES ('$username', '$first_name', '$last_name', '$email', '$password')";

        if ($conn->query($sql) === TRUE) {
            echo "Faculty added successfully";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }

        // Close MySQLi connection
        $conn->close();
    }
    ?>
</body>
</html>

