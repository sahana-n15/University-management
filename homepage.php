<!DOCTYPE html>
<html>
    <head>
        <title>University Homepage</title>
        <link rel="stylesheet" type="text/css" href="homepage.css">
    </head>
    <body>
        <header>
            <div class="container">
                <div id="logo">
                    <h1>Ram University</h1>
                </div>
                <nav>
                    <ul>
                        <li><a href="login.html">Login</a></li>
                        <li><a href="program.php">Programs</a></li>
                        <li><a href="addmission.html">Admissions</a></li>
                        <li><a href="about.html">About Us</a></li>
                    </ul>
                </nav>
            </div>
        </header>

        <section id="showcase">
            <div class="container">
                <h1>Welcome to Ram University</h1>
                <p>We offer a wide range of programs to meet your educational needs.</p>
            </div>
        </section>

        <section id="programs">
            <div class="container">
                <h2>Programs Offered</h2>
                <?php
                // Define a multidimensional array with program details
                $programs = array(
                    array("name" => "Bachelor's Degree Programs", "description" => "Our bachelor's degree programs are designed to provide students with a broad-based education in a variety of fields."),
                    array("name" => "Master's Degree Programs", "description" => "Our master's degree programs are designed to prepare students for advanced careers in a specific field."),
                    array("name" => "Doctoral Degree Programs", "description" => "Our doctoral degree programs are designed for students who want to pursue a career in academia or research.")
                );

                // Loop through the array and display program details
                foreach ($programs as $program) {
                    echo "<div class='program'>";
                    echo "<h3>" . $program["name"] . "</h3>";
                    echo "<p>" . $program["description"] . "</p>";
                    echo "</div>";
                }
                ?>
            </div>
        </section>

        <footer>
            <div class="container">
                <p>&copy; 2023 Ram University. All Rights Reserved.</p>
            </div>
        </footer>
    </body>
</html>
