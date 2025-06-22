<!-- Heading for the user section -->
<h2>User</h2>

<!-- Link to add a new user -->
<a class="new" href="index.php?page=user_add.php">Add User</a>

<!-- PHP script to create a table for displaying user information -->
<?php
// Begin table structure
echo '<table>';
echo '<thead>';
echo '<tr>';
// Table headers for user information
echo '<th style="width: 5%">Id</th>';
echo '<th style="width: 15%">Username</th>';
echo '<th style="width: 5%">Password</th>';
echo '<th style="width: 15%">Email</th>';
echo '<th style="width: 15%">Role</th>';
echo '<th style="width: 5%">Action</th>';
echo '</tr>';

// Loop through each user record for display (assumes $stmt is a dataset of user records)
foreach ($stmt as $userharu) {
    echo '<tr>';
    // Display user ID, username, password, email, and role
    echo '<td>' . $userharu['id'] . '</td>';
    echo '<td>' . $userharu['username'] . '</td>';
    echo '<td>' . $userharu['password'] . '</td>';
    echo '<td>' . $userharu['email'] . '</td>';
    echo '<td>' . $userharu['role'] . '</td>';
    // Form for deleting a user, with a hidden field for user ID and a delete button
    echo '<td><form method="post" action="index.php?page=deleteuser.php">
    <input type="hidden" name="id" value="' . $userharu['id'] . '" />
    <input type="submit" name="submit" value="Delete" />
    </form></td>';
    echo '</tr>';
}
echo '</thead>';
echo '</table>';
?>
