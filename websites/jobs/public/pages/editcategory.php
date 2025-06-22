<?php
// Creating an instance of DatabaseTable class for the 'category' table
$editCat = new DatabaseTable('category');

// Setting the title of the page to 'Edit category'
$title = 'Edit category';

// Checking if the form has been submitted
if (isset($_POST['submit'])) {
    // Removing 'submit' from the POST data
    unset($_POST['submit']);

    // Saving the category data to the database, using 'id' as the identifier
    $editCat->save($_POST['cat'], 'id');

    // Displaying a confirmation message
    echo 'Category Saved';

    // Redirecting to the categories page using JavaScript
    echo '<script>window.location.href="index.php?page=categories.php"</script>';
}
else {
    // Checking if a category ID is provided in the GET request
    if (isset($_GET['id'])) {
        // Retrieving the category record with the specified ID
        $stmt = $editCat->find('id', $_GET['id']);

        // Fetching the category data from the result set
        $currentCategory = $stmt->fetch();
    }
}

// Loading the edit category template and passing the current category data to it
$content = loadTemplate('./templates/edit_category_template.php', ['currentCategory' => $currentCategory]);

?>
