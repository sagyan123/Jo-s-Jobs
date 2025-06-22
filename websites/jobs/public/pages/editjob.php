<?php

// Creating an instance of DatabaseTable class for the 'job' table
$editjob = new DatabaseTable('job');

// Setting the title of the page to 'Edit Job'
$title = 'Edit Job';

// Checking if the user is logged in
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
    // The code block for logged-in users (currently empty)
}

// Checking if the form has been submitted
if (isset($_POST['submit'])) {
    // Removing 'submit' from POST data
    unset($_POST['submit']);

    // Saving the job data to the database, using 'id' as the identifier
    $editjob->save($_POST['jobs'], 'id');

    // Displaying a confirmation message
    echo 'Job saved';

    // Redirecting to the jobs page using JavaScript
    echo '<script>window.location.href="index.php?page=jobs.php"</script>';
}
else {
    // Checking if a job ID is provided in the GET request
    if(isset($_GET['id'])) {
        // Retrieving the job record with the specified ID
        $stmt = $editjob->find('id', $_GET['id']);

        // Fetching the job data from the result set
        $ejob = $stmt->fetch();
    }
    else {
        // Setting 'ejob' to an empty array if no ID is provided
        $ejob = [];
    }

    // Creating an instance of DatabaseTable class for the 'category' table
    $cat = new DatabaseTable('category');

    // Retrieving all records from the 'category' table
    $stmt = $cat->findAll();

    // Executing the query (though this seems unnecessary as 'findAll' should execute it)
    $stmt->execute();
}

// Loading the edit job template and passing the job and category data to it
$content = loadTemplate('./templates/edit_job_template.php', ['job' => $ejob, 'stmt' => $stmt]);
?>
