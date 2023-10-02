<?php
    include 'includes/header.php';
    session_start();

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Retrieve data from the form

        $article_id = $_POST['article_id'];
        echo($article_id);
    

        // $stmt->bind_param('i', $article_id);
        // $stmt->execute();
        // $stmt->close();
        // $stmt->bind_param('i', $article_id);
        // $stmt->execute();
        // $stmt->close();
        // Check if user has already liked the article


        $stmt = $mysqli->prepare("SELECT * FROM likes WHERE article_id = ?");
        $stmt->bind_param('i', $article_id);
        $stmt->execute();
        $result = $stmt->get_result();
        $firstLike = 1;

        if ($result->num_rows == 0) {
            // User has not liked the article yet, add like to database
            $stmt = $mysqli->prepare("INSERT INTO likes (numOfLikes, article_id) VALUES (?, ?)");
            $stmt->bind_param('ii', $firstLike, $article_id);
            $stmt->execute();
            $stmt->close();
        }else{
            $stmt = $mysqli->prepare("UPDATE likes SET numOfLikes = numOfLikes + 1 WHERE article_id = ?");
            $stmt->bind_param('i', $article_id);
            $stmt->execute();
            $stmt->close();
        }
        header("Location: article.php?article_id=$article_id");
        exit();

    }

   
    
?>