<!DOCTYPE html>
<html>
  <head>
    <title>Student Dashboard</title>
    <link rel="stylesheet" type="text/css" href="stu_dashboard.css">
  </head>
  <body>
    <div class="container">
        <h1>Welcome 
            <?php
            session_start();

// Retrieve the user details from the session
            $user = $_SESSION['user'];
            echo $user['name'];
            ?>

            to the Student Dashboard</h1>
      <div class="box">
        <h2>Profile</h2>
        <p>View and edit your profile information</p>
        <a href="profile.php">Go to Profile</a>
      </div>
      <div class="box">
        <h2>Courses</h2>
        <p>View your enrolled courses</p>
        <a href="courses.php">Go to Courses</a>
      </div>
      <div class="box">
        <h2>Results</h2>
        <p>View your academic results</p>
        <a href="results.php">Go to Results</a>
      </div>
      <div class="box">
        <h2>Logout</h2>
        <p>Logout from the dashboard</p>
        <a href="logout.php">Logout</a>
      </div>
    </div>
  </body>
</html>