<?php
$pdo = new PDO('mysql:dbname=job;host=mysql', 'student', 'student');
session_start();
?>
<!DOCTYPE html>
<html>
	<head>
		<link rel="stylesheet" href="/styles.css"/>
		<title>Jo's Jobs - Add Category</title>
	</head>
	<body>
	<header>
		<section>
			<aside>
				<h3>Office Hours:</h3>
				<p>Mon-Fri: 09:00-17:30</p>
				<p>Sat: 09:00-17:00</p>
				<p>Sun: Closed</p>
			</aside>
			<h1>Jo's Jobs</h1>

		</section>
	</header>
	<nav>
		<ul>
			<li><a href="/">Home</a></li>
			<li>Jobs
				<ul>
					<li><a href="/it.php">IT</a></li>
					<li><a href="/hr.php">Human Resources</a></li>
					<li><a href="/sales.php">Sales</a></li>

				</ul>
			</li>
			<li><a href="/about.html">About Us</a></li>
		</ul>

	</nav>
	<img src="/images/randombanner.php"/>
	<main class="sidebar">

	<section class="left">
		<ul>
			<li><a href="jobs.php">Jobs</a></li>
			<li><a href="categories.php">Categories</a></li>

		</ul>
	</section>

	<section class="right">

	<?php

		if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {


	if (isset($_POST['submit'])) {

		$stmt = $pdo->prepare('INSERT INTO category (name) VALUES (:name)');

		$criteria = [
			'name' => $_POST['name']
		];

		$stmt->execute($criteria);
		echo 'Category added';
	}
	else {
		?>


			<h2>Add Category</h2>

			<form action="" method="POST">
				<label>Name</label>
				<input type="text" name="name" />


				<input type="submit" name="submit" value="Add Category" />

			</form>


		<?php
		}



	}
	else {
			?>
			<h2>Log in</h2>

			<form action="index.php" method="post">
				<label>Password</label>
				<input type="password" name="password" />

				<input type="submit" name="submit" value="Log In" />
			</form>
		<?php
		}
	?>


</section>
	</main>

	<footer>
		&copy; Jo's Jobs 2017
	</footer>
</body>
</html>

//<?php
$message = new DatabaseTable('message'); // create person object
$person = new DatabaseTable('person');

if (isset($_POST['submit'])) {
	$date = new DateTime();
	unset($_POST['submit']);
	$_POST['messageDate'] = $date->format('Y-m-d');
	$message->save($_POST);
	echo '<p>Message posted</p>';
	echo '<a href="index.php?page=listmessages">Return to message list</a>';
}

$title = 'Add a Message';
$content = loadTemplate('../templates/message_add_template.php', ['person'=>$person]);
?>

<?php

if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {


	if (isset($_POST['submit'])) {
		$name->save($_POST);
		echo 'Category added';
		echo '<a href="index.php?page=categories">Return to category list</a>';
	}
}
	$title = 'Add  Category';
$content = loadTemplate('../templates/add_category__template.php', ['person'=>$person]);
?>




<form action="index.php?page=addcategory"? method="POST">

<label>Select user</label>
<select name="userId">
	<?php
		$stmt = $person->findAll();

		foreach ($stmt as $row) {
			echo '<option value="' . $row['id'] . '">' . $row['firstname'] . ' ' . $row['surname'] . '</option>';
		}
	?>
</select>

<label>Message</label>
<textarea name="messageText"></textarea>

<input type="submit" name="submit" value="add message" />
</form>


<h2>Add Category</h2>

<form action="" method="POST">
	<label>Name</label>
	<input type="text" name="name" />


	<input type="submit" name="submit" value="Add Category" />

</form>
