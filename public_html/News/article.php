<?php
    include 'includes/header.php';
    session_start();
?>
    <header>
        <h1>Sample Article Page</h1>
    </header>
    <main>
        <?php
            // Simulated article data
            // $articleID = urldecode($_GET['article_id']);
            $articleID = $_GET["article_ID"];
            echo "<p> $articleID </p>";

            //Pull article data from database
            $articleimage = "https://awlights.com/wp-content/uploads/sites/31/2017/05/placeholder-news.jpg";
            $articleTitle = "Sample Article Title";
            $articleAuthor = "Person Doe";
            $articleContent = "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed aliquam massa vitae ex rhoncus sodales. Maecenas sit amet condimentum libero. Nullam vel odio ac arcu posuere blandit a in quam. Nulla facilisi. Phasellus vitae libero nec arcu venenatis varius. Fusce tristique elit at libero posuere, id condimentum libero volutpat. Sed non aliquam metus, non dapibus ex. Sed vel mi vel enim congue vulputate. Suspendisse potenti. Nulla luctus massa non risus bibendum, non vestibulum purus malesuada.";

            // Display the article
            echo "<div class='article'>";
            echo "<h2>$articleTitle</h2>";
            echo "<p><strong>Author:</strong> $articleAuthor</p>";
            echo "<img src='$articleimage' with='200px' length='600px' alt='Article Image'>";
            echo "<p>$articleContent</p>";
            echo "</div>";
        ?>
        <!-- Insert Comments -->
    </main>
<?php
    include 'includes/footer.php';
?>