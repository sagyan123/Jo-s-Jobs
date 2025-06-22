<!-- Section with class 'left', typically used for a sidebar or navigation menu -->
<section class="left">
    <!-- Unordered list for navigation links -->
    <ul>
        <!-- List item with a link to a jobs page -->
        <li><a href="index.php?page=jobs.php">Jobs</a></li>
        <!-- List item with a link to a categories page -->
        <li><a href="index.php?page=categories.php">Categories</a></li>
    </ul>
</section>
<!-- End of the left section -->

<!-- Section with class 'right', typically used for main content -->
<section class="right">
    <!-- PHP script starts -->
    <?php
    // Check if the user is logged in and has the 'admin' role
    if (isset($_SESSION['loggedin']) && $_SESSION['role'] == 'admin') {
        ?>
        <!-- Heading for the edit category section -->
        <h2>Edit Category</h2>

        <!-- Form for editing a category -->
        <form action="" method="POST">
            <!-- Hidden input to store the category's ID -->
            <input type="hidden" name="cat[id]" value="<?php if(isset($currentCategory['id'])) echo $currentCategory['id']; ?>" />
            <!-- Input field for the category's name -->
            <label>Name</label>
            <input type="text" name="cat[name]" value="<?php if(isset($currentCategory['name'])) echo $currentCategory['name']; ?>" />

            <!-- Submit button for the form -->
            <input type="submit" name="submit" value="Save Category" />
        </form>
        <?php
    }
    else {
        // If the user is not an admin, include the login template
        require './templates/login_template.php';
    }
    ?>
    <!-- End of the PHP script -->
</section>
<!-- End of the right section -->
