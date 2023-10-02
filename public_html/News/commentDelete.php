<?php 
    session_start();
    include 'includes/header.php';
    if(!($_SESSION["LoggedIn"])){
        header("Location: login.php");
    }
?>
    
</body>
</html>

<?php 
    $comment_id = $_POST['comment_id'];
    $username = $_SESSION['currUser'];

    echo "comment_id: $comment_id username: $username";

    $stmt = $mysqli->prepare("delete from comments where comment_id= ?");
    $stmt->bind_param('i', $comment_id);

    if(!$stmt){
        printf("Query Prep Failed: %s<br>", $mysqli->error);
        exit;
    }else{
        header("Location: home.php");
    }

    $stmt->execute();
    $stmt->close();

    include 'includes/footer.php';
?>