<?php

$jo = new DatabaseTable('job');
$stmt = $jo->find('categoryId','2' AND 'closingDate > :date');
// $pdo = new PDO('mysql:dbname=job;host=mysql', 'student', 'student');
// $stmt = $pdo->prepare('SELECT * FROM job WHERE categoryId = 4 AND closingDate > :date');

$date = new DateTime();

$values = [
    'date' => $date->format('Y-m-d')
];

$stmt->execute($values);

$title = 'sales';
$content = loadTemplate('../templates/sales_template.php', ['stmt'=>$stmt]);
?>