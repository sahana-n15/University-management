<link rel="stylesheet" href="sty.css">
<div class="content">
    <h2>Courses</h2>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>credit</th>
                <th>Instructor</th>
            </tr>
        </thead>
        <tbody>
            <?php
            // Connect to database
            $conn = mysqli_connect('localhost', 'root', '', 'ram_university');
            if (!$conn) {
                die('Error connecting to database.');
            }
            session_start();
           
            $user = $_SESSION['user'];
            $user_name = $user['username'];
            
            $sql = "SELECT * FROM courses WHERE user_name = '$user_name'";
            $result = mysqli_query($conn, $sql);
            



            // Get courses from database
            
         

            while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr>";
                echo "<td>" . $row['course_id'] . "</td>";
                echo "<td>" . $row['course_name'] . "</td>";
                echo "<td>" . $row['course_credit'] . "</td>";
                echo "<td>" . $row['user_name'] . "</td>";
                echo "</tr>";
            }

            // Close database connection
            mysqli_close($conn);
            ?>
        </tbody>
    </table>
</div>
<div class="footer">
    <p>&copy; 2023 Faculty Dashboard. All rights reserved.</p>
</div>
</div>
</body>
