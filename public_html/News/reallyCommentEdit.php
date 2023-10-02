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
            //echo "<p>ArticleID: $article_id, Owner: $owner Content: $content Comment ID: $comment_id</p>";

            // Update comment in database
            $stmt = $mysqli->prepare("update comments set content='$content' where comment_id=?");
            $stmt->bind_param('i', $comment_id);


            if(!$stmt){
                printf("Query Prep Failed: %s<br>", $mysqli->error);
                exit;
            }else{
                header("Location: home.php");
            }

            echo "<p>HELLO</p>";

            $stmt->execute();
            $stmt->close();
        }
        ?>
    </main>
</body>
</html>