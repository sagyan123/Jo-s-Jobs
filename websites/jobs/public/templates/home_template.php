<!-- Paragraph with a welcome message and a brief introduction to the recruitment agency -->
<p>Welcome to Jo's Jobs, we're a recruitment agency based in Northampton. We offer a range of different office jobs. Get in touch if you'd like to list a job with us.</p>

<!-- Heading indicating the start of a section where users can select job types -->
<h2>Select the type of job you are looking for:</h2>

<!-- Unordered list to display job categories -->
<ul>
    <?php
    // PHP script to fetch job categories from the database
    $cat = new DatabaseTable('category');
    $category = $cat->findAll();

    // Loop through each category and display it as a list item
    foreach ($category as $cate) {
        ?>
        <li><a href="index.php?page=category.php&pid=<?php echo $cate['id'] ?>"><?php echo $cate['name'] ?></a></li>
        <?php
    }
    ?>       
</ul>
<!-- The closing </li> tag here seems misplaced as there is no corresponding opening <li> tag. This might be a mistake. -->

<!-- Heading for the jobs section -->
<h2>Jobs</h2>

<?php
// PHP script to loop through each job and display its details
foreach ($stmt as $job) {
    // Start of the div block for job details
    echo '<div class="details">';
    // Job title
    echo '<h2>' . $job['title'] . '</h2>';
    // Job salary
    echo '<h3>' . $job['salary'] . '</h3>';
    // Job description with newline-to-break conversion for better readability
    echo '<p>' . nl2br($job['description']) . '</p>';
    // Link to apply for the job
    echo '<a class="more" href="index.php?page=apply.php&id=' . $job['id'] . '">Apply for this job</a>';
    // End of the div block
    echo '</div>';
}
?>
