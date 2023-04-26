<!DOCTYPE html>
<html>
<head>
    <title>Edit Faculty Details</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>Edit Faculty Details</h1>
    <?php
    // Check if faculty ID is provided in URL
    if(isset($_GET['username'])) {
        // Fetch faculty details from faculty_login and courses tables
        // Use your database connection details here
        $conn = mysqli_connect("localhost", "root", "", "ram_university");
        $faculty_id = $_GET['username'];
        $query = "SELECT f.username, f.first_name, f.last_name, c.course_id, c.course_name 
                  FROM faculty_login f
                  LEFT JOIN courses c ON f.username = c.user_name
                  WHERE f.username = '$faculty_id'";
        $result = mysqli_query($conn, $query);
        $row = mysqli_fetch_assoc($result);
        mysqli_close($conn);
    ?>

    <form method="post" action="update_faculty.php">

        <label for="username">Faculty Username:</label>
        <input type="text" name="username" id="username" value="<?php echo $row['username']; ?>" readonly><br>
        <label for="firstname">First Name:</label>
        <input type="text" name="firstname" id="firstname" value="<?php echo $row['first_name']; ?>"><br>
        <label for="lastname">Last Name:</label>
        <input type="text" name="lastname" id="lastname" value="<?php echo $row['last_name']; ?>"><br>
        <label for="courseid">Course ID:</label>
        <input type="text" name="courseid" id="courseid" value="<?php echo $row['course_id']; ?>"><br>
        <label for="coursename">Course Taken:</label>
        <input type="text" name="coursename" id="coursename" value="<?php echo $row['course_name']; ?>"><br>
        <input type="submit" name="submit" value="Update">
    </form>

    <?php } else { ?>
        <p>No faculty username provided.</p>
    <?php } ?>
</body>
</html>
