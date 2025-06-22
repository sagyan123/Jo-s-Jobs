<!-- Start of a section with the class "left" -->
<section class="left">
    <!-- Unordered list starts -->
    <ul>
        <!-- List item containing a link to the jobs page -->
        <li><a href="index.php?page=jobs.php">Jobs</a></li>
        <!-- List item containing a link to the categories page -->
        <li><a href="index.php?page=categories.php">Categories</a></li>
    </ul>
    <!-- End of the unordered list -->
</section>
<!-- End of the section with the class "left" -->

<!-- Start of a section with the class "right" -->
<section class="right">
    <!-- PHP script starts -->
    <?php
        // Check if the 'loggedin' session variable is set and the user role is 'admin'
        if (isset($_SESSION['loggedin']) && $_SESSION['role'] == 'admin') {
    ?>
    <!-- Display a heading -->
    <h2>Add Category</h2>

    <!-- Start of a form for adding a category -->
    <form action="" method="POST">
        <!-- Label for the name input field -->
        <label>Name</label>
        <!-- Text input field for the category name -->
        <input type="text" name="name" />

        <!-- Submit button for the form -->
        <input type="submit" name="submit" value="Add Category" />
    </form>
    <!-- End of the form -->
    <?php
        // End of the if condition
        }

        // Else part of the condition
        else {
    ?>
    <!-- The closing </form> tag here seems misplaced and should be removed -->
    </form>
    <!-- Include the login template -->
    <?php
        require './templates/login_template.php';
        }
    ?>
    <!-- End of the PHP script -->
</section>
<!-- End of the section with the class "right" -->
