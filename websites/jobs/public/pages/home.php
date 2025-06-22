<?php
  

		$title = 'Home';
        $jo = new DatabaseTable('job');
$stmt = $jo->orderByDate();


$content = loadTemplate('./templates/home_template.php', ['stmt'=>$stmt]);