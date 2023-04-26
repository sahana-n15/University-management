<!DOCTYPE html>
<html>
    <head>
        <title>All Courses Offered</title>
        <link rel="stylesheet" type="text/css" href="program.css"/>
    </head>
    <body>
        <h1>All Courses Offered</h1>
        <form method="post">
            <label for="category">Select a category:</label>
            <select id="category" name="category">
                <option value="all">All Programs</option>
                <option value="B.tech">B.Tech</option>
                <option value="M.tech">M.Tech</option>
                <option value="doctoral">Doctoral</option>
            </select>
            <button type="submit">Filter</button>
        </form>
        <ul>
            <?php
            // Connect to the database
            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "ram_university";
            $conn = mysqli_connect($servername, $username, $password, $dbname);

            // Check connection
            if (!$conn) {
                die("Connection failed: " . mysqli_connect_error());
            }

            // Retrieve courses based on selected category, or all courses if no category is selected
            if (isset($_POST['category'])) {
                $category = $_POST['category'];
                if ($category == 'all') {
                    $sql = "SELECT * FROM programs ORDER BY category";
                } else {
                    $sql = "SELECT * FROM programs WHERE category='$category' ORDER BY category ";
                }
            } else {
                $sql = "SELECT * FROM programs ORDER BY category";
            }

            $result = mysqli_query($conn, $sql);

            // Display each course as a list item
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<li><span>{$row['category']}</span> - <span class='blink'>{$row['name']}</span></li>";

            }

            // Close database connection
            mysqli_close($conn);
            ?>
        </ul>
    </body>
</html>
