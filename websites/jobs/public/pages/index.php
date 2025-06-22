<?php
require './functions/loadtemplate.php';
//require './pages/' . $_GET['page'] . '.php';
require './pages/' . $_GET['page'] ;
$templateVars = [
 'title' => $title,
 'content' => $content
];
echo loadTemplate('./templates/layout.php', $templateVars);