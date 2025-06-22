<?php
$title = 'IT Jobs';
$jo = new DatabaseTable('job');
//$mt = $jo->bi('2');

$st = $jo->bi('2',':date');


$content = loadTemplate('../templates/it_template.php', ['stmt'=>$st]);
?>