<!-- This is the beginning of an HTML paragraph tag -->
<p>Welcome to Jo's Jobs, we're a recruitment agency based in Northampton. We offer a range of different office jobs. Get in touch if you'd like to list a job with us.</p>
<!-- End of the paragraph tag -->

<!-- This is a heading tag for a section of the page -->
<h2>Select the type of job you are looking for:</h2>

<!-- Start of an unordered list -->
<ul>
    <!-- PHP script starts here -->
    <?php
        // Create a new instance of the DatabaseTable class with the 'category' table
        $cat = new DatabaseTable('category');

        // Call the findAll() method on the created object to retrieve all records
        $category = $cat->findAll();

        // Loop through each record in the $category array
        foreach($category as $cate){
    ?>
        <!-- For each category, create a list item with a link -->
        <!-- The link leads to the category page and includes the category ID in the query string -->
        <li><a href="index.php?page=category.php&pid=<?php echo $cate['id'] ?>"><?php echo $cate['name']?></a></li>
    <?php
        // End of the PHP foreach loop
        }
    ?>  
    <!-- End of the unordered list -->
</ul>
<!-- The closing </li> tag seems to be misplaced as there is no corresponding opening <li> tag. This might be a mistake. -->
</li>
