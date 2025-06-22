<?php

// Creating an instance of DatabaseTable class for the 'job' table
$job = new DatabaseTable('job');

// Creating an instance of DatabaseTable class for the 'category' table
$cat = new DatabaseTable('category');

// Initializing an empty string for the title
$title = '';

// Checking if 'pid' is set in the GET request
if(isset($_GET['pid'])){
    // Fetching job information based on 'pid' and a placeholder ':date'
    $st = $job->bi($_GET['pid'], ':date');
}

// Checking if 'location' is set in the POST request
if(isset($_POST['location'])){
    // Fetching job information based on 'pid', 'location', and a placeholder ':date'
    $st = $job->CAlo($_GET['pid'], $_POST['location'], ':date');
}

// Checking again if 'pid' is set in the GET request
if (isset($_GET['pid'])) {
    // Finding the category with the specified ID
    $mat = $cat->find('id', $_GET['pid']);
    // Fetching the category data from the result set
    $tmt = $mat->fetch();
}

// Loading the category template and passing job and category data to it
$content = loadTemplate('./templates/category_template.php', ['stmt'=>$st, 'cats'=>$tmt]);
?>
