<?php 

    $owner = $_POST['owner'];
    $content = $_POST['comment'];
    $article_id = $_POST['article_id'];

    $stmt = $mysqli->prepare("insert into comments (article_id, content, comment_id, owner) values (?, ?, ?, ?)");
    if(!$stmt){
        printf("Query Prep Failed: %s\n", $mysqli->error);
    exit;
    }else{
        echo"<br>connected ig?";
    }

    $stmt->bind_param('isis', $article_id, $content, $comment_id, $owner);
    if(!$stmt->execute())
    {echo"<br>There was an error...<br>";
    }

    $stmt->close();

    header("Location: home.php");
?>

