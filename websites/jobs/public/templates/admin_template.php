<?php
// Check if the 'loggedin' session variable is set and the user's role is 'admin'
if (isset($_SESSION['loggedin']) && $_SESSION['role'] == 'admin') {
    ?>
    <!-- HTML Section starts if the user is logged in as an admin -->
    <section class="left">
        <!-- Unordered list for navigation -->
        <ul>
            <!-- List item with a link to the jobs page -->
            <li><a href="index.php?page=jobs.php">Jobs</a></li>
            <!-- List item with a link to the categories page -->
            <li><a href="index.php?page=categories.php">Categories</a></li>
            <!-- List item with a link to the user list page -->
            <li><a href="index.php?page=user_list.php">User</a></li>
            <!-- The following code is commented out -->
            <!-- <li>Jobs -->
            <!-- Nested unordered list for job locations -->
            <!-- PHP code that was intended to list jobs based on location -->
            <!-- The code is commented out and hence not executed -->
            <!-- </li> -->
            <!-- Commented out form for adding a user with a role -->
            <!-- </form> -->
        </ul>
    </section>

    <!-- Right section of the page -->
    <section class="right">
        <!-- Heading indicating the user is logged in -->
        <h2>You are now logged in</h2>
    </section>

    <!-- PHP closing tag for the if statement -->
    <?php
    }
    // PHP closing tag for the file
    ?>
