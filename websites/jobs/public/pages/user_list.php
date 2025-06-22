<?php
  $title = 'user list';
$user = new DatabaseTable('user');

$stmt = $user->findAll();

// $content = loadTemplate('../templates/user_list_template.php', ['stmt' => $stmt]);
$content = loadTemplate('./templates/user_list_template.php', ['stmt' => $stmt]);
?>