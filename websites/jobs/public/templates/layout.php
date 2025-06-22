<!DOCTYPE html>
<!-- HTML5 Document Declaration -->
<html>
<head>
    <!-- Link to an external CSS stylesheet -->
    <link rel="stylesheet" href="../css/styles.css"/>
    <!-- Title tag dynamically set by PHP -->
    <title> <?php echo $title; ?> </title>
</head>
<body>
    <!-- Header section of the page -->
    <header>
        <section>
            <!-- Sidebar or additional information area -->
            <aside>
                <h3>Office Hours:</h3>
                <p>Mon-Fri: 09:00-17:30</p>
                <p>Sat: 09:00-17:00</p>
                <p>Sun: Closed</p>
            </aside>
            <!-- Main heading of the page -->
            <h1>Jo's Jobs</h1>
        </section>
    </header>

    <!-- Navigation menu -->
    <nav>
        <ul>
            <!-- Navigation links -->
            <li><a href="home.php">Home</a></li>
            <!-- Dropdown for job categories -->
            <li>Jobs
                <ul>
                    <?php
                    // PHP code to fetch job categories from the database
                    $cat = new DatabaseTable('category');
                    $category = $cat->findAll();
                    foreach ($category as $cate) {
                        ?>
                        <!-- List of job categories -->
                        <li><a href="index.php?page=category.php&pid=<?php echo $cate['id'] ?>"><?php echo $cate['name']?></a></li>
                        <?php
                    }
                    ?>
                </ul>
            </li>
            <!-- More navigation links -->
            <li><a href="index.php?page=faqs.php">faqs</a></li>
            <li><a href="index.php?page=about.php">About Us</a></li>
            <?php
            // PHP code for displaying login/logout and admin/staff links based on user session
            if (isset($_SESSION['id'])) {
                echo $_SESSION['loggedin'];
                echo '<a href="index.php?page=logout.php">Log out</a> </br>';
                if ($_SESSION['role'] == 'admin') {
                    echo '<a href="index.php?page=admin.php">admin dash</a>'; 
                } else if ($_SESSION['role'] == 'Clientuser') {
                    echo '<a href="index.php?page=staff.php">staff</a>'; 
                }
            } else {
                echo '<a href="index.php?page=login.php">login</a>';
            }
            ?>
        </ul>
    </nav>

    <!-- Random banner image -->
    <img src="images/randombanner.php"/>

    <!-- Main content area -->
    <main class="home">
        <!-- Dynamic content loaded from PHP variable -->
        <?php echo $content; ?>
    </main>

    <!-- Footer section -->
    <footer>
        <!-- Dynamic year using PHP's date function -->
        &copy; Jo's Jobs <?php echo date('Y');?>
    </footer>
</body>
</html>
