<!-- Main container with a class 'sidebar', likely used for overall layout -->
<main class="sidebar">

    <!-- Section with class 'left', typically for a sidebar or navigation menu -->
    <section class="left">
        <!-- Unordered list for navigation links -->
        <ul>
            <!-- List item with a link to a jobs page -->
            <li><a href="index.php?page=jobs.php">Jobs</a></li>
            <!-- List item with a link to a categories page -->
            <li><a href="index.php?page=categories.php">Categories</a></li>
        </ul>
    </section>
    <!-- End of the left section -->

    <!-- Section with class 'right', typically for main content -->
    <section class="right">
        <!-- Heading displaying the title of the job being applied for -->
        <h2>Apply for <?=$job['title'];?></h2>

        <!-- Form for applying to a job -->
        <form action="apply.php" method="POST" enctype="multipart/form-data">
            <!-- Input fields for the application form -->
            <label>Your name</label>
            <input type="text" name="apply[name]" />

            <label>E-mail address</label>
            <input type="text" name="apply[email]" />

            <label>Cover letter</label>
            <textarea name="apply[details]"></textarea>

            <label>CV</label>
            <!-- File input for uploading a CV -->
            <input type="file" name="apply[cv]" />

            <!-- Hidden field to store the job ID -->
            <input type="hidden" name="apply[jobId]" value="<?=$job['id'];?>" />

            <!-- Submit button for the form -->
            <input type="submit" name="submit" value="Apply" />
        </form>
    </section>
    <!-- End of the right section -->
</main>
<!-- End of the main container -->
