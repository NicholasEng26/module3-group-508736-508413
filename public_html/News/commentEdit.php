<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sample Article Page</title>
    
</head>
<body>
    <header>
        <h1>Sample Article Page</h1>
    </header>
    <main>
        <?php
            // Simulated article data
            require 'database/config.php';
            session_start();
            $authToken = $_POST['authToken'];

        if(!hash_equals($_SESSION['token'], $authToken)){
            die("Warning: someone tried to forge a request");
        } else{

            $article_id = $_POST['article_id'];
            $content = $_POST['content'];
            $comment_id = $_POST['comment_id'];
            $owner= $_POST['owner'];
          
            // Display the article
            echo "<form action='reallyCommentEdit.php' method='POST'> 
                <input hidden type='text' id='article_id' name='article_id' value='" . $article_id . "'> 
                <label for='owner'>Username:</label> <br>
                <input type='text' id='owner' name='owner' value='" . $owner . "' readonly> <br><br>
                <label for='content'>Comment:</label> <br>
                <input type='text' id='content' name='content' value='" . $content . "'>
                <input hidden type='text' id='comment_id' name='comment_id' value='" . $comment_id . "'> <br><br>
                <input type='hidden' name='authToken' value='" . $_SESSION['token'] . "' >
                <input type='submit' value='Edit Comment'> 
                </form>";
    }
        ?>
    </main>
</body>
</html>