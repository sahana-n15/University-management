


<?php
session_start();
$user = $_SESSION['user'];

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "ram_university";

$conn = new mysqli($servername, $username, $password, $dbname);
$query = "SELECT * FROM student WHERE student_id = $user[user_id]";
$result = mysqli_query($conn, $query);




?>
<head>
    <link rel="stylesheet" type="text/css" href="profile.css">
<header>Results 
        <?php echo $user['name']?>
</header>
</head>
       
<table>
    <tr>
        <th>Semester</th>
        <th>Subject</th>
        <th>Grade</th>
    </tr>
    <?php
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>";
        echo "<td>" . $row['course_id'] . "</td>";
        echo "<td>" . $row['course_name'] . "</td>";
        echo "<td>" . $row['grade'] . "</td>";
        echo "</tr>";
    }
    ?>
</table>
