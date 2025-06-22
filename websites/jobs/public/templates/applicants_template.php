<!-- HTML Section with class "left", typically used for sidebar or navigation -->
<section class="left">
    <!-- Unordered list for navigation links -->
    <ul>
        <!-- List item with a link to a page showing jobs -->
        <li><a href="index.php?page=jobs.php">Jobs</a></li>
        <!-- List item with a link to a page showing job categories -->
        <li><a href="index.php?page=categories.php">Categories</a></li>
    </ul>
</section>
<!-- End of the left section -->

<!-- HTML Section with class "right", typically used for main content -->
<section class="right">
    <!-- PHP script starts -->
    <?php
    // Check if 'id' is set in the session (indicating a logged-in user)
    if (isset($_SESSION['id'])) {
        ?>
        <!-- Heading displaying the title of the job for which applicants are being listed -->
        <h2>Applicants for <?=$job['title'];?></h2>

        <!-- PHP script to display a table of applicants -->
        <?php
        // Start of the table
        echo '<table>';
        echo '<thead>';
        echo '<tr>';
        // Table headers for applicant's name, email, details, and CV
        echo '<th style="width: 10%">Name</th>';
        echo '<th style="width: 10%">Email</th>';
        echo '<th style="width: 65%">Details</th>';
        echo '<th style="width: 15%">CV</th>';
        echo '</tr>';

        // Looping through each applicant fetched from the database
        foreach ($stmt as $applicant) {
            echo '<tr>';
            // Displaying applicant's name, email, details, and a link to download the CV
            echo '<td>' . $applicant['name'] . '</td>';
            echo '<td>' . $applicant['email'] . '</td>';
            echo '<td>' . $applicant['details'] . '</td>';
            echo '<td><a href="/cvs/' . $applicant['cv'] . '">Download CV</a></td>';
            echo '</tr>';
        }

        // End of the table header and the table
        echo '</thead>';
        echo '</table>';
    }
    else {
        // If the user is not logged in, include the login template
        require '../templates/login_template.php';
    }
    // End of the PHP script
    ?>
</section>
<!-- End of the right section -->
