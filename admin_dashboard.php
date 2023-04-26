<!DOCTYPE html>
<html>
<head>
    <title>Admin Dashboard</title>
    <link rel="stylesheet" type="text/css" href="style.css"/>
</head>
<h1>Admin Dashboard</h1>
<nav>
    <ul>
        <li><a href="add_student.html">Add Student</a></li>
        <li><a href="add_faculty.php">Add Faculty</a></li>
       
    </ul>
</nav>
    
<body>
    
    <h2>Faculty Details</h2>
    <table>
        <tr>
            <th>Faculty Username</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Course ID</th>
            <th>Course Taken</th>
          
        </tr>
        <?php
        // Fetch faculty details from faculty_login and courses tables
        // Use your database connection details here
        $conn = mysqli_connect("localhost", "root", "", "ram_university");
        $query = "SELECT f.username, f.first_name, f.last_name, c.course_id, c.course_name FROM faculty_login f
                  LEFT JOIN courses c ON f.username = c.user_name";
        $result = mysqli_query($conn, $query);
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>";
            echo "<td>".$row['username']."</td>";
            echo "<td>".$row['first_name']."</td>";
            echo "<td>".$row['last_name']."</td>";
            echo "<td>".$row['course_id']."</td>";
            echo "<td>".$row['course_name']."</td>";
            
        }
        mysqli_close($conn);
        ?>
    </table>

    <h2>Student Details</h2>
    <table>
        <tr>
            <th>Roll Number</th>
            <th>Name</th>
            <th>Course ID</th>
            <th>Course Name</th>
            <th>Grade</th>
            
        </tr>
        <?php
        // Fetch student details from students and student_result tables
        // Use your database connection details here
        $conn = mysqli_connect("localhost", "root", "", "ram_university");
        $query = "SELECT s.user_id, s.name, r.course_id, r.course_name, r.grade FROM students s
                  LEFT JOIN student r ON s.user_id = r.student_id";
        $result = mysqli_query($conn, $query);
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>";
            echo "<td>".$row['user_id']."</td>";
            echo "<td>".$row['name']."</td>";
            echo "<td>".$row['course_id']."</td>";
            echo "<td>".$row['course_name']."</td>";
            echo "<td>".$row['grade']."</td>";
          
        }
        mysqli_close($conn);
        ?>
    </table>
</body>
</html>
