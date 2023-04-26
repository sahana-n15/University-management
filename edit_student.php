<html>
    <head>
        <title>Edit Student Details</title>
        <link rel="stylesheet" href="style.css">
    </head>
    <body>
        <h1>Edit Student Details</h1>
        <?php
// Use your database connection details here
        $conn = mysqli_connect("localhost", "root", "", "ram_university");

// Check connection
        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }

// If form is submitted
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Get form data
            $user_id = $_POST["user_id"];
            $name = $_POST["name"];
            $parents_name = $_POST["parents_name"];
            $email = $_POST["email"];
            $phone_number = $_POST["phone_number"];

            // Update student details in student_result table
            $query =  "UPDATE students SET name='$name', parents_name='$parents_name', email='$email', phone_number='$phone_number' WHERE user_id='$user_id'";
                  
            $result = mysqli_query($conn, $query);

            if ($result) {
                    echo "Details updated successfully!";
            } else {
                echo "Error updating student details: " . mysqli_error($conn);
            }
        }

// Close database connection
        mysqli_close($conn);
        ?>
        <!DOCTYPE html>
    <html>
        <head>
           
            <link rel="stylesheet" href="style.css">
        </head>
        <body>
            
            <form action="edit_student.php" method="post">
                <label for="roll_number">User id:</label>
                <input type="text" id="user_id" name="user_id" required>
                <br>
                <label for="name">Name:</label>
                <input type="text" id="name" name="name" required>
                <br>
                <label for="parents_name">Parents name:</label>
                <input type="text" id="parents_name" name="parents_name" required>
                <br>
                <label for="email">Email</label>
                <input type="text" id="email" name="email" required>
                <br>
                <label for="phone">phone</label>
                <input type="text" id="phone_number" name="phone_number" required>
                <br>
                <input type="submit" value="Update">
            </form>
            
        </body>
    </html>
