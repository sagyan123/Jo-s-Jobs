<?php
// Setting the title of the page to 'Apply'
$title = 'Apply';

// Checking if the form has been submitted
if (isset($_POST['submit'])) {
    // Removing 'submit' from POST data
    unset($_POST['submit']);

    // Checking if the file upload for 'cv' has no errors
    if ($_FILES['cv']['error'] == 0) {
        // Creating an instance of DatabaseTable class for the 'applicants' table
        $applicants = new DatabaseTable('applicants');

        // Splitting the filename by '.' to get the extension
        $parts = explode('.', $_FILES['cv']['name']);
        $extension = end($parts);

        // Generating a unique filename with the original extension
        $fileName = uniqid() . '.' . $extension;

        // Moving the uploaded file to the 'cvs' directory
        move_uploaded_file($_FILES['cv']['tmp_name'], 'cvs/' . $fileName);

        // Setting the 'cv' field in the POST data to the new filename
        $_POST['cv'] = $fileName;

        // Building the criteria array from the submitted form data
        $criteria = [
            'name' => $_POST['apply']['name'],
            'email' => $_POST['apply']['email'],
            'details' => $_POST['apply']['details'],
            'jobId' => $_POST['apply']['jobId'],
            'cv' => $fileName
        ];

        // Saving the applicant data to the database
        $applicants->save($_POST['apply']);
        // Executing the save operation with the criteria
        $applicants->execute($criteria);

        // Displaying a confirmation message
        echo 'Your application is complete. We will contact you after the closing date.';
    } else {
        // Displaying an error message if there was an error uploading the CV
        echo 'There was an error uploading your CV';
    }
}

// Checking if a job ID has been passed via GET
if (isset($_GET['id'])) {
    // Creating an instance of DatabaseTable class for the 'job' table
    $jobs = new DatabaseTable('job');

    // Retrieving the job record with the specified ID
    $stmt = $jobs->find('id', $_GET['id']);
    // Fetching the job data
    $job = $stmt->fetch();
}

// Loading the apply template and passing the job data to it
$content = loadTemplate('./templates/apply_template.php', ['job'=>$job]);
?>
