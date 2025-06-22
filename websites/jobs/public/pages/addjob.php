<?php
// Creating an instance of DatabaseTable class for 'category' table
$cat = new DatabaseTable('category');

// Creating an instance of DatabaseTable class for 'job' table
$job = new DatabaseTable('job');

// Checking if the form has been submitted
if (isset($_POST['submit'])) {
    // Removing the 'submit' entry from the POST data
    unset($_POST['submit']);

    // Saving the job data to the database
    $job->save($_POST);

    // Displaying a message to confirm the job has been added
    echo 'Job Added';
}

// Setting the title of the page
$title = 'Add a Job';

// Retrieving all records from the 'category' table
$stmt  = $cat->findAll();

// Loading the add job template and passing the category data to it
$content = loadTemplate('./templates/add_job_template.php', ['stmt'=>$stmt]);

?>
