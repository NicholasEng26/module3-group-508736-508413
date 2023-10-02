<?php 
    session_start();
    include 'includes/header.php';

    $authToken = $_POST['authToken'];

    if(!hash_equals($_SESSION['token'], $authToken)){
        die("Warning: someone tried to forge a request");
    }else{

        $owner = $_POST['ownerVal'];
        $content = $_POST['comment'];
        $article_id = $_POST['articleidVal'];
        $comment_id = NULL;
    
    
        echo "owner: $owner content: $content article_id: $article_id coid: $comment_id";
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


    }

    
?>

