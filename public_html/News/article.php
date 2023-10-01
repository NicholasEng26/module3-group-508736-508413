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
        <form action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="post">
            <label for="name">Username:</label><br> 
            <input disabled type="text" id="username" name="username" value= <?php echo($_SESSION['currUser']); ?>> <br><br>
            <label for="comment">Comment:</label> <br>
            <textarea id="comment" name="comment" required></textarea> <br>
            <input type="submit" value="Comment">
        </form>
    </div>
 
    <?php 
        $username = $_POST['username'];
        $content = $_POST['comment'];

        $stmt = $mysqli->prepare("insert into comments (article_id, content, comment_id, owner) values (?, ?, ?, ?, ?, ?, ?)");
        if(!$stmt){
            printf("Query Prep Failed: %s\n", $mysqli->error);
            exit;
        }else{
            echo"<br>connected ig?";
        }

        $stmt->bind_param('sssssis', $username, $content, $media, $articleid, $username);
        if(!$stmt->execute())
        {echo"<br>There was an error...<br>";
        }

        $stmt->close();
    ?>
<?php
    include 'includes/footer.php';
?>