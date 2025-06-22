<!-- Section with class 'right', typically used for main content -->
<section class="right">
    <!-- PHP script starts -->
    <?php
    // Check if 'id' is set in the session (indicating a logged-in user)
    if (isset($_SESSION['id'])) {
        ?>

        <!-- Heading for the jobs section -->
        <h2>Jobs</h2>

        <!-- Link to add a new job -->
        <a class="new" href="index.php?page=addjob.php">Add new job</a>

        <!-- PHP script to create a table of jobs -->
        <?php
        // Begin table structure
        echo '<table>';
        echo '<thead>';
        echo '<tr>';
        // Table headers for job title, salary, actions (edit, view applicants, delete, and archive)
        echo '<th>Title</th>';
        echo '<th style="width: 15%">Salary</th>';
        echo '<th style="width: 5%">&nbsp;</th>';
        echo '<th style="width: 15%">&nbsp;</th>';
        echo '<th style="width: 5%">&nbsp;</th>';
        echo '<th style="width: 5%">&nbsp;</th>'; // Add a new column for "Archive"
        echo '</tr>';
        echo '</thead>';
        echo '<tbody>'; // Add a tbody element to contain table body rows

        // Loop through each job for display
        foreach ($stmt as $job) {
            // PHP script to count the number of applicants for each job
            $app = new DatabaseTable('applicants');
            $mt = $app->count('jobId', $job['id']);
            $applicantCount = $mt->fetch();

            echo '<tr>';
            // Display job title and salary
            echo '<td>' . $job['title'] . '</td>';
            echo '<td>' . $job['salary'] . '</td>';
            // Edit link for the job
            echo '<td><a style="float: right" href="index.php?page=editjob.php&id=' . $job['id'] . '">Edit</a></td>';
            // Link to view applicants, showing the count of applicants
            echo '<td><a style="float: right" href="index.php?page=applicants.php&id=' . $job['id'] . '">View applicants (' . $applicantCount['count'] . ')</a></td>';
            // Delete form for the job
            echo '<td><form method="post" action="index.php?page=deletejob.php">
            <input type="hidden" name="id" value="' . $job['id'] . '" />
            <input type="submit" name="submit" value="Delete" />
            </form></td>';
            // Archive button for the job
            echo '<td><form method="post" action="index.php?page=archivejob.php">
            <input type="hidden" name="archive_job_id" value="' . $job['id'] . '" />
            <input type="submit" name="archive_submit" value="Archive" />
            </form></td>';
            echo '</tr>';
        }

        // End of the table body and the table
        echo '</tbody>';
        echo '</table>';
    } else {
        // If the user is not logged in, include the login template
        require './templates/login_template.php';
    }
    ?>
    <!-- End of the PHP script -->
</section>
<!-- End of the right section -->
