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
    $conn = mysqli_connect("localhost", "root", "", "ram_university");

    // Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // Fetch student data from the database
    $sql = "SELECT * FROM student";
    $result = mysqli_query($conn, $sql);

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
