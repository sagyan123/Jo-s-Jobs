<?php
	$server = 'db';
	$username = 'root';
	$password = 'root';
	session_start();
	//The name of the schema we created earlier in MySQL workbench
	$schema = 'job';
	$pdo = new PDO('mysql:dbname=' . $schema . ';host=' . $server, $username, $password, [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);