 <link rel="stylesheet" href="sty.css">
<div class="content">
  <h2>Students</h2>
  <table>
    <tr>
      <th>Student ID</th>
      
      <th>Course</th>
      <th>Grade</th>
    </tr>
    <?php
    // Connect to the database
     session_start();
      $user = $_SESSION['user'];
      $user_name = $user['username'];
    $conn = mysqli_connect("localhost", "root", "", "ram_university");

    // Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }
    $sql = "SELECT course_id FROM courses WHERE user_name = '$user_name'";     
      $result1 = mysqli_query($conn, $sql);
      $row1 = mysqli_fetch_assoc($result1);
      
      $course_id = $row1['course_id'];
      
      $query = "SELECT * FROM student WHERE course_id = '$course_id'";
      $result = mysqli_query($conn, $query);



    // Display student data in an HTML table
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>";
            echo "<td>" . $row["student_id"] . "</td>";
            
            echo "<td>" . $row["course_id"] . "</td>";
            echo "<td>" . $row["grade"] . "</td>";
            echo "</tr>";
        }
    } else {
        echo "<tr><td colspan='3'>No students found.</td></tr>";
    }

    // Close the database connection
    mysqli_close($conn);
    ?>
  </table>
</div>
