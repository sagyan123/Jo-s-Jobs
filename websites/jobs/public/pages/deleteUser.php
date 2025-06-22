<?php


if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {


	$user = new DatabaseTable('user');
	$user->delete('id',$_POST['id']);
   echo '<script>window.location.href="index.php?page=user_list.php"</script>';
}