<!-- Section with class 'left', typically used for a sidebar or navigation -->
<section class="left">
    <!-- Unordered list containing navigation links -->
    <ul>
        <!-- Navigation item linking to a jobs page -->
        <li><a href="index.php?page=jobs.php">Jobs</a></li>
        <!-- Navigation item linking to a categories page -->
        <li><a href="index.php?page=categories.php">Categories</a></li>
    </ul>
</section>
<!-- End of the left section -->

<!-- Section with class 'right', typically used for main content -->
<section class="right">
    <!-- PHP script starts -->
    <?php
    // Check if the user is logged in and has an 'admin' role
    if (isset($_SESSION['loggedin']) && $_SESSION['role'] == 'admin') {
        ?>
        <!-- Heading for the categories section -->
        <h2>Categories</h2>

        <!-- Link to add a new category -->
        <a class="new" href="index.php?page=addcategory.php">Add new category</a>

        <!-- PHP script to create a table of categories -->
        <?php
        // Begin table structure
        echo '<table>';
        echo '<thead>';
        echo '<tr>';
        // Table headers for category name and actions (edit, delete)
        echo '<th>Name</th>';
        echo '<th style="width: 5%">&nbsp;</th>';
        echo '<th style="width: 5%">&nbsp;</th>';
        echo '</tr>';

        // Loop through each category for display
        foreach ($categories as $category) {
            echo '<tr>';
            // Display category name
            echo '<td>' . $category['name'] . '</td>';
            // Edit link for the category
            echo '<td><a style="float: right" href="index.php?page=editcategory.php&id=' . $category['id'] . '">Edit</a></td>';
            // Delete form for the category
            echo '<td><form method="post" action="index.php?page=deletecategory.php">
            <input type="hidden" name="id" value="' . $category['id'] . '" />
            <input type="submit" name="submit" value="Delete" />
            </form></td>';
            echo '</tr>';
        }

        // End of the table header and the table
        echo '</thead>';
        echo '</table>';
    }
    // Else block for non-admin users
    else {
        // Include the login template
        require './templates/login_template.php';
    }
    // End of PHP script
    ?>
</section>
<!-- End of the right section -->
