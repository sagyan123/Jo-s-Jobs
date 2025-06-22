<!-- Section with class 'left', typically for a sidebar or navigation -->
<section class="left">
    <!-- Unordered list for dynamic category links -->
    <ul>
        <?php
        // PHP code to instantiate database table objects and fetch categories
        $jobs = new DatabaseTable('job');
        $cat = new DatabaseTable('category');
        $category = $cat->findAll();

        // Loop through each category
        foreach ($category as $cate) {
            ?>
            <!-- List item with a link to a specific category -->
            <li><a href="category.php?pid=<?php echo $cate['id'] ?>"><?php echo $cate['name']?></a></li>
            <?php
        }
        ?>
    </ul>

    <!-- Form to filter jobs by location -->
    <form action="" method="POST">
        <label>Location</label>
        <select name="location">
            <?php
            // Conditional code to fetch distinct locations based on category
            if (isset($_GET['pid'])) {
                $stt = $jobs->distinct($_GET['pid']);
            }

            // Loop through each location and create an option in the dropdown
            if (isset($stt)) { // Check if $stt is defined
                foreach ($stt as $job) {
                    echo '<option value="' . $job['location'] . '">'.$job['location'].'</option>';
                }
            }
            ?>
        </select>
        <input type="submit" name="sub2" value="submit" />
    </form>
</section>
<!-- End of the left section -->

<!-- Section with class 'right', typically for main content -->
<section class="right">
    <!-- List for displaying job postings -->
    <h1><?php if (isset($cats)) echo $cats['name']; ?></h1> <!-- Move h1 outside ul -->

    <ul class="listing">
        <?php
        // Loop through each job and display its details
        foreach ($stmt as $job) { // Remove the 'a' in 'as'
            echo '<li>';
            echo '<div class="details">';
            echo '<h2>' . $job['title'] . '</h2>';
            echo '<h3>' . $job['salary'] . '</h3>';
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
