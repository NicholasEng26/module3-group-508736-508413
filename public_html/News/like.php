<?php
    include 'includes/header.php';
    session_start();

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Retrieve data from the form
        $article_id = $_POST['article_id'];

        // Check if user has already liked the article
        $stmt = $mysqli->prepare("SELECT * FROM likes WHERE article_id = ? AND owner = ?");
        $stmt->bind_param('is', $article_id, $_SESSION['currUser']);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows == 0) {
            // User has not liked the article yet, add like to database
            $stmt = $mysqli->prepare("INSERT INTO likes (article_id, owner) VALUES (?, ?)");
            $stmt->bind_param('is', $article_id, $_SESSION['currUser']);
            $stmt->execute();
            $stmt->close();
        }
    }

    header("Location: article.php?article_id=$article_id");
    exit();
?>