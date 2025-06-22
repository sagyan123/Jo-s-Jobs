<?php 

// Setting the title of the page
$title = 'login';

// Loading the login template
$content = loadTemplate('./templates/login_template.php', []);

// Checking if the login form has been submitted
if (isset($_POST['submit'])) {
    // Removing 'submit' from POST data
    unset($_POST['submit']);

    // Storing submitted username and password
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Creating an instance of DatabaseTable class for the 'user' table
    $users = new DatabaseTable('user');

    // Preparing a statement to find user by username
    $stmt = $users->user(':username');

    // Criteria array for the prepared statement
    $criteria = [
        'username' => $_POST['username'],
    ];

    // Executing the statement with the criteria
    $stmt->execute($criteria);

    // Counting the number of rows returned
    $count = $stmt->rowCount();

    // Checking if any user is found
    if ($count > 0) {
        // Fetching user data
        $userdata = $stmt->fetch();

        // Checking user role and credentials
        // For admin
        if ($userdata['role'] == 'admin') {
            if ($userdata['username'] === $username && $userdata['password'] === $password) {
                // Setting session variables
                $_SESSION['loggedin'] = $userdata['username'];
                $_SESSION['id'] = $userdata['id'];
                $_SESSION['role'] = 'admin';

                // Redirecting to the admin page
                echo '<script>window.location.href="index.php?page=admin.php"</script>';
                die();
            } else {
                // Display error message for incorrect credentials
                echo 'Sorry, this account or password does not match';
            }
        }

        // For staff
        if ($userdata['role'] == 'staff') {
            if ($userdata['username'] === $username && $userdata['password'] === $password) {
                // Setting session variables
                $_SESSION['loggedin'] = $userdata['username'];
                $_SESSION['id'] = $userdata['id'];
                $_SESSION['role'] = 'staff';

                // Redirecting to the staff page
                echo '<script>window.location.href="index.php?page=staff.php"</script>';
                die();
            } else {
                // Display error message for incorrect credentials
                echo 'Sorry, this account or password does not match';
            }
        }

        // For client user
        if ($userdata['role'] == 'Clientuser') {
            if ($userdata['username'] === $username && $userdata['password'] === $password) {
                // Setting session variables
                $_SESSION['loggedin'] = $userdata['username'];
                $_SESSION['id'] = $userdata['id'];
                $_SESSION['role'] = 'Clientuser';

                // Redirecting to the client user page
                echo '<script>window.location.href="index.php?page=staff.php"</script>';
                die();
            } else {
                // Display error message for incorrect credentials
                echo 'Sorry, this account or password does not match';
            }
        }
    }
}
?>
