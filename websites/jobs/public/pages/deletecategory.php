<?php
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {

	$cat = new DatabaseTable('category');
	$cat->delete('id', $_POST['id']);
	//header('location: categories.php');
	echo '<script>window.location.href="index.php?page=categories.php"</script>';
}

