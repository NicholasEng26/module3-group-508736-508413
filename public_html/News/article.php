<?php
    include 'includes/header.php';
    session_start();
?>
    <header>
        <h1>HN News Network</h1>
    </header>
    <main>
        <?php

            if ($_SERVER["REQUEST_METHOD"] == "GET") {
                // Retrieve data from the form
                $article_id = $_GET['article_id'];
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
                $articleImage = $row["image"];
                $articleAuthor = $row["owner"];
                $articleContent = $row["content"];
                $articleSummary = $row["short_desc"];
                $articleURL = $row["urls"];

            } else {
                echo "<p>article_id: not set</p>";
            }

            if($_SESSION['LoggedIn'] && $_SESSION['currUser'] == $articleAuthor){
                echo "<form action=\"articleEdit.php\" method = \"GET\">
                <input type=\"hidden\" id=\"article_id\" name=\"articleidVal\" value='" . $article_id . "'>
                <input type=\"hidden\" id=\"title_id\" name=\"titleVal\" value='" . $articleTitle . "'>
                <input type=\"hidden\" id=\"owner_id\" name=\"ownerVal\" value='" . $articleAuthor . "'>
                <input type=\"hidden\" id=\"content_id\" name=\"contentVal\" value='" . $articleContent . "'>
                <input type=\"hidden\" id=\"image_id\" name=\"imageVal\" value='" . $articleImage . "'>
                <input type=\"hidden\" id=\"summary_id\" name=\"summaryVal\" value='" . $articleSummary . "'>
                <input type=\"hidden\" id=\"url_id\" name=\"urlVal\" value='" . $articleURL . "'>
                <input type=\"submit\" value=\"Edit Story\"?>
                </form>";
            }
           
            // Display the article
            echo "<div class='article'>";
            echo "<h2>$articleTitle</h2>";
            echo "<img src='$articleImage' width='1080px' length='1440px' alt='Article Image'><br>";
            echo "<p><strong>By:</strong> $articleAuthor</p>";
            echo "<p>$articleContent</p>";
            echo "<p> <b>External URLs:</b> </p>";
            if(isset($articleURL)){
                echo "<a href='$articleURL'>External URL</a>";
            }else{
                echo"<p> Author did not provide any external urls</p>";
            }
            
            echo "<form action='like.php' method='POST'>
                <input type='hidden' id='article_id' name='article_id' value='<?php echo($article_id); ?>'>
                <input type='image' src='https://cdn3.emoji.gg/emojis/Like.png' width='50px' height='50px' alt='Submit'>
                </form>";

            echo "</div>";
        ?>
        <!-- Insert Comments -->
        
    </main>
    <div id="comments">
        <h1>Comments Section</h1>
        <form action="commentCreate.php" method="POST">
            <label for="owner">Username: <?php if(!$_SESSION["LoggedIn"]){echo('<strong><em>User not logged in. Login to comment.</em></strong>');}?></label><br> 
            <input type="text" readonly="readonly" id="owner" name="ownerVal" value= "<?php echo($_SESSION['currUser']); ?>"> <br>
            <input type="hidden" id="article_id" name="articleidVal" value= "<?php echo($article_id); ?>"> <br>
            <label for="comment">Comment:</label> <br>
            <textarea id="comment" name="comment" <?php if(!$_SESSION["LoggedIn"]){echo('disabled');}?> required></textarea> <br>
            <input type="submit" value="Comment" <?php if(!$_SESSION["LoggedIn"]){echo("disabled");}?>>
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
                echo "<form action='commentEdit.php' method='POST'> 
                <input hidden type='text' id='article_id' name='article_id' value='" . $article_id . "'> 
                <input hidden type='text' id='content' name='content' value='" . $row['content'] . "'>
                <input hidden type='text' id='comment_id' name='comment_id' value='" . $row['comment_id'] . "'> 
                <input hidden type='text' id='owner' name='owner' value='" . $row['owner'] . "'> 
                <input type='submit' value='Edit'> 
                </form>";

                echo "<form action='commentDelete.php' method='post'>
                 <input hidden type='text' id='comment_id' name='comment_id' value='" . $row['comment_id'] . "'> 
                 <input type='submit' value='Delete'> </form>";
            }
            echo '</div>';
        }

        $stmt->close();
    ?>
<?php
    include 'includes/footer.php';
?>

