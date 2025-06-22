<!-- Section with class 'left', typically used for a sidebar or navigation -->
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

<!-- Section with class 'right', typically used for main content -->
<section class="right">
    <!-- PHP script starts -->
    <?php
    // Check if 'id' is set in the session (indicating a logged-in user)
    if (isset($_SESSION['id'])) {
        ?>

        <!-- Heading for the archive job section -->
        <h2>Archive Job</h2>

        <!-- Form for archiving a job -->
        <form action="index.php?page=archivejob.php" method="POST">
            <!-- Hidden input to store the job's ID -->
            <input type="hidden" name="archive_job_id" value="<?php if(isset($job['id'])) echo $job['id']; ?>" />

            <p>Are you sure you want to archive this job?</p>

            <!-- Submit button for archiving the job -->
            <input type="submit" name="submit" value="Archive" />
        </form>
        <?php
    }
    else {
        // If the user is not logged in, include the login template
        require './templates/login_template.php';
    }
    ?>
    <!-- End of the PHP script -->
</section>
<!-- End of the right section -->
