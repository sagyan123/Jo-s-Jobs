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

        <!-- Heading for the edit job section -->
        <h2>Edit Job</h2>

        <!-- Form for editing a job -->
        <form action="index.php?page=editjob.php" method="POST">
            <!-- Hidden input to store the job's ID -->
            <input type="hidden" name="jobs[id]" value="<?php if(isset($job['id'])) echo $job['id']; ?>" />
            <!-- Input fields for job details -->
            <label>Title</label>
            <input type="text" name="jobs[title]" value="<?php if(isset($job['title'])) echo $job['title']; ?>" />

            <label>Description</label>
            <textarea name="jobs[description]"><?php if(isset($job['description'])) echo $job['description']; ?></textarea>

            <label>Location</label>
            <input type="text" name="jobs[location]" value="<?php if(isset($job['location'])) echo $job['location']; ?>" />

            <label>Salary</label>
            <input type="text" name="jobs[salary]" value="<?php if(isset($job['salary'])) echo $job['salary']; ?>" />

            <label>Category</label>
            <!-- Dropdown for selecting job category -->
            <select name="jobs[categoryId]">
                <?php
                // Loop through categories for dropdown options
                foreach ($stmt as $row) {
                    // Check and mark the selected category
                    if ($job['categoryId'] == $row['id']) {
                        echo '<option selected="selected" value="' . $row['id'] . '">' . $row['name'] . '</option>';
                    }
                    else {
                        echo '<option value="' . $row['id'] . '">' . $row['name'] . '</option>';
                    }
                }
                ?>
            </select>

            <label>Closing Date</label>
            <input type="date" name="jobs[closingDate]" value="<?php if(isset($job['closingDate'])) echo $job['closingDate']; ?>"  />

            <!-- Submit button for the form -->
            <input type="submit" name="submit" value="Save" />
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
