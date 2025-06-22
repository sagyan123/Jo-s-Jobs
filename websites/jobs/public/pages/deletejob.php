<?php

if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {


	$job = new DatabaseTable('job');
	$job->delete('id',$_POST['id']);
   echo '<script>window.location.href="index.php?page=jobs.php"</script>';
}
