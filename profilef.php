<?php
// This script retrieves the faculty member's profile information from a database and updates it if a form is submitted

// Database connection
$conn = mysqli_connect('localhost', 'root', '', 'ram_university');
if (!$conn) {
  die('Connection failed: ' . mysqli_connect_error());
}
 
           session_start();
           
            $user = $_SESSION['user'];
            $username = $user['username'];



// Retrieve faculty member's profile information from database
$sql = "SELECT * FROM faculty_login WHERE username = '$username'";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
  // Found the faculty member's profile information, so display it in a form
  $row = mysqli_fetch_assoc($result);
  
  $username = $row['username'];
  $first_name = $row['first_name'];
  $last_name = $row['last_name'];
  $email = $row['email'];
} else {
  // Couldn't find the faculty member's profile information
  echo 'Error: Faculty member profile not found.';
  exit;
}

// Update the faculty member's profile information if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $first_name = $_POST['first_name'];
  $last_name = $_POST['last_name'];
  $email = $_POST['email'];

  $sql = "UPDATE faculty_members SET first_name = '$first_name', last_name = '$last_name', email = '$email' WHERE username = '$username'";
  if (mysqli_query($conn, $sql)) {
    echo 'Profile updated successfully.';
  } else {
    echo 'Error updating profile: ' . mysqli_error($conn);
  }
}

mysqli_close($conn);
?>
 <div class="content">
       <link rel="stylesheet" href="sty.css">
      <h2>Profile Page</h2>
      <form method="post">
        <label for="first_name">First Name:</label>
        <input type="text" id="first_name" name="first_name" value="<?php echo $first_name; ?>"><br>
        <label for="last_name">Last Name:</label>
        <input type="text" id="last_name" name="last_name" value="<?php echo $last_name; ?>"><br>
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" value="<?php echo $email; ?>"><br>
        <input type="submit" value="Update Profile">
      </form>
    </div>
    <div class="footer">
      <p>&copy; 2023 Faculty Dashboard. All rights reserved.</p>
    </div>
  </div>
</body>
</html>






