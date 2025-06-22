<?php
  $cat = new DatabaseTable('category'); 
    $Categories = $cat->findAll();

$title = 'Categories';

$content = loadTemplate('./templates/categories_template.php', ['categories'=>$Categories]);  
		?>