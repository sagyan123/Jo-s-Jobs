<?php
$job = new DatabaseTable('job');
$archivedJob = new DatabaseTable('archived_jobs');

// Check if a job ID is provided via POST
if (isset($_POST['archive_job_id']) && is_numeric($_POST['archive_job_id'])) {
    $job_id_to_archive = (int) $_POST['archive_job_id'];

    // Check if the job ID exists in the 'job' table
    $existingJob = $job->find('id', $job_id_to_archive);
    if ($existingJob->rowCount() == 0) {
        echo 'Job ID ' . $job_id_to_archive . ' does not exist.';
    } else {
        // Update the 'archived' status in the 'job' table
        $recordToUpdate = ['archived' => 1];
        $job->update($recordToUpdate, 'id', $job_id_to_archive);

        // Prepare the data for the 'archived_jobs' table
        $archivedJobRecord = [
            'job_id' => $job_id_to_archive,
            'archived_date' => date('Y-m-d H:i:s')
        ];

        // Insert the record into the 'archived_jobs' table
        if ($archivedJob->insert($archivedJobRecord)) {
            echo 'Job Archived';
        } else {
            echo 'Error archiving job.';
        }
    }
} else {
    echo 'Invalid or missing job ID';
}

$title = 'Archive a Job';
$content = loadTemplate('./templates/archive_job_template.php', []);
?>
