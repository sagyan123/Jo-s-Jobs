<!-- Beginning of a section with a "left" class, typically for a sidebar or a similar layout -->
<section class="left">
    <!-- Unordered list for navigation or links -->
    <ul>
        <!-- List item with a link to a jobs page -->
        <li><a href="index.php?page=jobs.php">Jobs</a></li>
        <!-- List item with a link to a categories page -->
        <li><a href="index.php?page=categories.php">Categories</a></li>
    </ul>
    <!-- End of the unordered list -->
</section>
<!-- End of the "left" section -->

<!-- Beginning of a section with a "right" class, typically for main content -->
<section class="right">
    <!-- PHP script starts -->
    <?php
        // Check if 'id' is set in the session (indicating a logged-in user)
        if (isset($_SESSION['id'])) {
    ?>
    <!-- Heading for the Add Job form -->
    <h2>Add Job</h2>

    <!-- Form for adding a new job -->
    <form action="index.php?page=addjob.php" method="POST">
        <!-- Form fields for job details -->
        <label>Title</label>
        <input type="text" name="title" />

        <label>Description</label>
        <textarea name="description"></textarea>

        <label>Salary</label>
        <input type="text" name="salary" />

        <label>Location</label>
        <input type="text" name="location" />

        <label>Category</label>
        <select name="categoryId">
            <!-- PHP script to dynamically populate category options -->
            <?php
                // Looping through each row of a previously executed statement
                foreach ($stmt as $row) {
                    echo '<option value="' . $row['id'] . '">' . $row['name'] . '</option>';
                }
            ?>
        </select>

        <label>Closing Date</label>
        <input type="date" name="closingDate" />

        <!-- Submit button for the form -->
        <input type="submit" name="submit" value="Add" />
    </form>
    <!-- End of the form -->
    <?php
        // End of the 'if' block
        }
        else {
            // Include the login template if the user is not logged in
            require './templates/login_template.php';
        }
    ?>
    <!-- End of the PHP script -->
</section>
<!-- End of the "right" section -->
