<?php
// Creating an instance of DatabaseTable class for the 'job' table
$jobs = new DatabaseTable('job');

// Creating an instance of DatabaseTable class for the 'applicants' table
$appli = new DatabaseTable('applicants');

// Setting the title of the page
$title = 'Applicants';

// Checking if an 'id' parameter is set in the GET request
if (isset($_GET['id'])) {
    // Retrieving the job record with the specified ID from the 'job' table
    $st = $jobs->find('id', $_GET['id']);
    // Fetching the job data from the result set
    $jobe = $st->fetch();
}
else {
    // If no 'id' is provided, set 'jobe' to an empty array
    $jobe = [];
}

// Checking again if the 'id' parameter is set in the GET request
if (isset($_GET['id'])) {
    // Retrieving applicant records for the specified job ID from the 'applicants' table
    $stm = $appli->find('jobId', $_GET['id']);
}
else {
    // If no 'id' is provided, set 'stm' to an empty array
    $stm = [];
}

// Loading the applicants template and passing the job and applicant data to it
$content = loadTemplate('./templates/applicants_template.php', ['stmt'=>$stm, 'job'=>$jobe]);
?>
