<?php

$jobs = new DatabaseTable('job');
$app = new DatabaseTable('applicants');
$title = 'Job list';

$st = $jobs->findAll();
    $content = loadTemplate('./templates/jobs_template.php', ['stmt' => $st,'app'=>$app]);
   
