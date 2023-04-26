<?php
// Check if form is submitted
if(isset($_POST['submit'])) {
    // Retrieve form data
    $id = $_POST['username'];
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $courseid = $_POST['courseid'];
    $coursename = $_POST['coursename'];

    // Perform database update
    // Use your database connection details here
    $conn = mysqli_connect("localhost", "root", "", "ram_university");
    $query = "UPDATE faculty_login SET first_name = '$firstname', last_name = '$lastname' WHERE username = '$id'";
    $result = mysqli_query($conn, $query);

    if($result) {
        // Update faculty details in faculty_login table
        $query = "UPDATE faculty_login SET first_name = '$firstname', last_name = '$lastname' WHERE username = '$id'";
        mysqli_query($conn, $query);

        // Update course details in courses table
        $query = "UPDATE courses SET course_id = '$courseid', course_name = '$coursename' WHERE user_name = '$id'";
        mysqli_query($conn, $query);

        mysqli_close($conn);
        echo "Faculty details updated successfully!";
    } else {
        echo "Error updating faculty details: " . mysqli_error($conn);
    }
}
?>
