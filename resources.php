
<?php
session_start(); 
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">

    <!-- Used for proper rendering and touch zooming on mobile devices -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Computer Science Hub - Courses</title>
    <link rel="stylesheet" href="styles.css">
</head>


<body class="page-with-fixed-header">
    
    <!-- Fixed Header Navigation -->

    <header class="fixed-header">
        <div class="header-content">
            <img src="css-logo.png" alt="Computer Science Hub Logo" class="header-logo">
            <nav class="top-nav">
                <ul>
                    <li><a href="index.html">Home</a></li>
                    <li><a href="courses.html">Courses</a></li>
                    <li><a href="tutorials.html">Tutorials</a></li>
                    <li><a href="resources.php">Student Resources</a></li>
                    <li><a href="contact.html">Contact</a></li>
                </ul>
            </nav>
        </div>
    </header>


    <main id="student-resources">


        <h1>Student Resources</h1>

        <br>
        <br>

        <section class="resource-category">
            <h2>E-books</h2>
            <div class="resource-list">
                <a href="https://adamschwartz.co/magic-of-css/chapters/1-the-box/" target="_blank">E-book 1</a><br>
                <a href="https://dash.generalassemb.ly/" target="_blank">E-book 2</a><br>
                <a href="https://learn.shayhowe.com/html-css/" target="_blank">E-book 3</a><br>
                <a href="https://www.scrapingbee.com/java-webscraping-book/?utm_source=devfreebooks&utm_medium=medium&utm_campaign=DevFreeBooks" target="_blank">E-book 4</a><br>
                <a href="https://greenteapress.com/wp/think-python-2e/" target="_blank">E-book 5</a><br>
            </div>
        </section>

        <br>
    
        <section class="resource-category">
            <h2>Articles</h2>
            <div class="resource-list">
                <a href="https://www.joshwcomeau.com/tutorials/css/" target="_blank">Article 1</a><br>
                <a href="https://www.codecademy.com/articles/language/java" target="_blank">Article 2</a><br>
                <a href="https://hackr.io/blog/what-is-java" target="_blank">Article 3</a><br>
                <a href="https://www.datacamp.com/blog/category/python" target="_blank">Article 4</a><br>
                <a href="https://tutorialzine.com/tag/php" target="_blank">Article 5</a><br>
            </div>
        </section>

        <br>
    
        <section class="resource-category">
            <h2>Study Materials</h2>
            <div class="resource-list">
                <a href="https://www.w3schools.com/css/" target="_blank">Study Material 1</a><br>
                <a href="https://wesbos.com/javascript" target="_blank">Study Material 2</a><br>
                <a href="https://www.w3schools.com/php/" target="_blank">Study Material 3</a><br>
                <a href="https://ocw.mit.edu/courses/6-092-introduction-to-programming-in-java-january-iap-2010/pages/lecture-notes/" target="_blank">Study Material 4</a><br>
                <a href="https://data-flair.training/blogs/learn-python-notes/" target="_blank">Study Material 5</a><br>
            </div>
        </section>

        <br>
        <br>


        <!-- Check if a session message is set -->

        <?php if (isset($_SESSION['message'])): ?>
            <p><?php echo $_SESSION['message']; ?></p>
            <?php unset($_SESSION['message']); ?>
        <?php endif; ?>

        
        <!-- Used for uploading materials -->

        <section class="upload-section">
            <h2>Upload Materials</h2>

            <!-- Form for uploading the files -->

            <form action="upload.php" method="post" enctype="multipart/form-data">
                <input type="file" name="fileToUpload" id="fileToUpload">
                <input type="submit" value="Upload Resource" name="submit">
            </form>

        </section>


        <br>

        
        <!-- Used for displaying uploaded files -->

        <section class="resource-category">
            <h2>Uploaded Files</h2>
            <div class="resource-list">

                <!-- Listing files from the uploads directory -->

                <?php
                $files = scandir('uploads/');
                foreach ($files as $file) {
                    if ($file !== "." && $file !== "..") {
                        echo "<a href='uploads/" . htmlspecialchars($file) . "'>" . htmlspecialchars($file) . "</a><br />";
                    }
                }
                ?>
            </div>
        </section>

        <br>
        <br>

    </main>


    <br>
    <br>
    <br>
    <br>
    <br>

            
    <!-- Footer that also contains Navigation -->

    <footer>
        <img src="css-logo.png" class="footerLogo" alt="Computer Science Hub Logo">
        <div class="col">
            <a href="index.html">Home</a>
            <a href="courses.html">Courses</a>
            <a href="tutorials.html">Tutorials</a>
            <a href="resources.php">Student Resources</a>
            <a href="contact.html">Contact</a>
        </div>
        <div class="copyright">
            <p>© 2024 Computer Science Hub</p>
        </div>
    </footer>


</body>
</html>