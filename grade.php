 <link rel="stylesheet" href="sty.css">
<div class="content">
  <h2>Grades</h2>
  <form method="post">
    <table>
      <tr>
        <th>Student ID</th>
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
      $sql = "SELECT * FROM courses WHERE user_name = '$user_name'";     
      $result1 = mysqli_query($conn, $sql);
      $row1 = mysqli_fetch_assoc($result1);
      
      $course_id = $row1['course_id'];
      $course_name = $row1['course_name'];
      
      $query = "SELECT * FROM student WHERE course_id = '$course_id'";
      $result = mysqli_query($conn, $query);

      // Display student data in an HTML table
      if (mysqli_num_rows($result) > 0) {
          while ($row = mysqli_fetch_assoc($result)) {
              echo "<tr>";
              echo "<td>" . $row["student_id"] . "</td>";
              echo "<td><input type='number' name='grades[" . $row["student_id"] . "]' min='0' max='100'></td>";
              echo "</tr>";
          }
      } else {
          echo "<tr><td colspan='2'>No students found.</td></tr>";
      }

      // Close the database connection
      mysqli_close($conn);
      ?>
    </table>
    <input type="submit" name="submit" value="Save Grades">
  </form>
  <?php
  // Check if the form has been submitted
  if (isset($_POST['submit'])) {
      // Connect to the database
      $conn = mysqli_connect("localhost", "root", "", "ram_university");

      // Check connection
      if (!$conn) {
          die("Connection failed: " . mysqli_connect_error());
      }

      // Loop through the submitted grades and update the database
      foreach ($_POST['grades'] as $student_id => $grade) {
          $sql = "UPDATE student SET grade = '" . $grade . "' WHERE student_id = '" . $student_id . "'";
          
          mysqli_query($conn, $sql);
          
      }

      // Close the database connection
      mysqli_close($conn);

      // Show a success message
      echo "<p>Grades saved successfully.</p>";
  }
  ?>
</div>
