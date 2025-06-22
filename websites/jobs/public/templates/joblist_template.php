<!-- Section with class 'left', typically used for a sidebar or navigation menu -->
<section class="left">
    <!-- Unordered list for navigation links -->
    <ul>
        <?php
        // PHP script to instantiate database table objects and fetch categories
        $jobs = new DatabaseTable('job');
        $cat = new DatabaseTable('category');
        $category = $cat->findAll();

        // Loop through each category and display it as a list item
        foreach ($category as $cate) {
            ?>
            <!-- List item with a link to a specific category -->
            <li><a href="category.php?pid=<?php echo $cate['id'] ?>"><?php echo $cate['name']?></a></li>
            <?php
        }
        ?>
    </ul>
</section>
<!-- End of the left section -->

<!-- Section with class 'right', typically used for main content -->
<section class="right">
    <!-- Unordered list for listing job postings -->
    <ul class="listing">
        <!-- Heading displaying the current location -->
        <h1><?=$loc['location'];?></h1>
        <?php
        // PHP script to loop through each job and display its details
        foreach ($stmt as $job) {
            echo '<li>';
            // Div block for job details
            echo '<div class="details">';
            // Job title
            echo '<h2>' . $job['title'] . '</h2>';
            // Job salary
            echo '<h3>' . $job['salary'] . '</h3>';
            // Job description with newline-to-break conversion
            echo '<p>' . nl2br($job['description']) . '</p>';
            // Link to apply for the job
            echo '<a class="more" href="index.php?page=apply.php&id=' . $job['id'] . '">Apply for this job</a>';
            echo '</div>';
            echo '</li>';
        }
        ?>
    </ul>
</section>
<!-- End of the right section -->
