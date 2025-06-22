<?php
// Setting the title of the page to 'job list'
$title = 'job list';

// Creating an instance of DatabaseTable class for the 'job' table
$job = new DatabaseTable('job');

// Creating an instance of DatabaseTable class for the 'category' table
$cat = new DatabaseTable('category');

// Resetting the title variable to an empty string
$title = '';

// Checking if 'jid' is set in the GET request
if(isset($_GET['jid'])) {
    // Retrieving the job record with the specified ID
    $st = $job->find('id', $_GET['jid']);
    // Note: The following commented line would fetch the job data
    // but it's not currently being used
    // $stmt = $st->fetch();
}

// Checking again if 'jid' is set in the GET request
if (isset($_GET['jid'])) {
    // Retrieving the job record with the specified ID again
    $mat = $job->find('id', $_GET['jid']);

    // Fetching the job data from the result set
    $tmt = $mat->fetch();
}

// Loading the joblist template and passing the job data to it
$content = loadTemplate('./templates/joblist_template.php', ['stmt' => $st, 'loc' => $tmt]);
?>
