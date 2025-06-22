<?php
// Check if the form has been submitted
if (isset($_POST['submit'])) {
    // Remove the 'submit' element from the $_POST array
    unset($_POST['submit']);

    // Create an instance of the DatabaseTable class for the 'category' table
    $cat = new DatabaseTable('category');

    // Save the submitted data to the 'category' table
    $cat->save($_POST); 

    // Display a confirmation message
    echo 'Category added';

    // Provide a link to return to the category list
    echo '<a href="index.php?page=categories.php">Return to category list</a>';
}

// Set the title for the page
$title = 'Add Category';

// Load a template file for the content, passing an empty array as data
// (Assuming loadTemplate is a function that loads a specific PHP template file)
$content = loadTemplate('./templates/add_category_template.php', []);
?>
