<?php
  

		$title = 'Add user';
        $user = new DatabaseTable('user');
                
                if (isset($_POST['submit'])) {
                    unset($_POST['submit']);
                    $user->save($_POST);
            
                    echo 'Job Added';
                }

$content = loadTemplate('./templates/user_add_template.php', []);