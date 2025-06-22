<?php
$jo = new DatabaseTable('job');

$st = $jo->bi('2',':date');

$title = 'Human Resources Jobs';
$content = loadTemplate('../templates/hr_template.php', ['stmt'=>$st]);
?>