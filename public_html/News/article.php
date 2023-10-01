<?php
    include 'includes/header.php';
    session_start();
?>
    <header>
        <h1>Sample Article Page</h1>
    </header>
    <main>
        <?php

            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                // Retrieve data from the form
                $article_id = $_POST['article_id'];
                // echo "<p>article_id:" . $article_id . "</p>";

                // Pull article data from database
                $stmt = $mysqli->prepare("select * from articles where article_id='$article_id'");
                if(!$stmt){
                    printf("Query Prep Failed: %s\n", $mysqli->error);
                    exit;
                }
                $stmt->execute();
                $result = $stmt->get_result();
                $row = $result->fetch_assoc();

                $articleTitle = $row["title"];
                $articleimage = $row["image"];
                $articleAuthor = $row["owner"];
                $articleContent = $row["content"];

            } else {
                echo "<p>article_id: not set</p>";
            }

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
    <div id="comments">
        <h1>Comments Section</h1>
        <form action="commentCreate.php" method="POST">
            <label for="owner">Username:</label><br> 
            <input disabled type="text" id="owner" name="owner" value= <?php echo($_SESSION['currUser']); ?>> <br><br>
            <input disabled type="text" id="article_id" name="article_id" value= <?php echo($article_id); ?>> <br>
            <label for="comment">Comment:</label> <br>
            <textarea id="comment" name="comment" required></textarea> <br>
            <input type="submit" value="Comment">
        </form>
    </div>
 
    <?php 
        // Query Comments Database
        $stmt = $mysqli->prepare("SELECT * FROM `comments` WHERE article_id='$article_id'");
        if(!$stmt){
            printf("Query Prep Failed: %s\n", $mysqli->error);
            exit;
        }
        $stmt->execute();
        $result = $stmt->get_result();
        //$row = $result->fetch_assoc();

        while($row = $result->fetch_assoc()){
            echo '<div class="comment-section">';
            echo '<p><strong>Username:</strong> ' . $row['owner'] . '</p>';
            echo '<p><strong>Comment:</strong> ' . $row['content'] . '</p>';
            if ($row['owner'] == $_SESSION['currUser']) {
                echo "<form action='commentEdit.php' method='post'> <input hidden type='text' id='comment_id' name='comment_id' value='" . $row['comment_id'] . "'> <input type='submit' value='Edit'> </form>";
            }
            echo '</div>';
        }

        $stmt->close();
       
        foreach ($comment_arr as $comment) {
           
        }
    ?>

    <!-- <div class="comment">
        <p><strong>Username:</strong>Owner</p>
        <p><strong>Comment:</strong>Comment here!</p>
    </div> -->
<?php
    include 'includes/footer.php';
?>

