<?php 
session_start();
include 'includes/header.php';
if(!($_SESSION["LoggedIn"])){
    header("Location: login.php");
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Article Delete Processor</title>
</head>
<body>
    
</body>
</html>

<?php 

$authToken = $_POST['authToken'];

if(!hash_equals($_SESSION['token'], $authToken)){
    die("Warning: someone tried to forge a request");
} else{
    echo ($_POST['articleID']);
    $articleID = $_POST['articleID'];
    $userName = $_SESSION['currUser'];
    
    $stmt2 = $mysqli->prepare("delete from comments where article_id= ?");
    $stmt2->bind_param('i', $articleID);

    $stmt2->execute();
    $stmt2->close();

    $stmt = $mysqli->prepare("delete from articles where article_id= ?");
    $stmt->bind_param('i', $articleID);
    
    if(!$stmt){
        printf("Query Prep Failed: %s<br>", $mysqli->error);
        exit;
    }else{
        header("Location: profile.php");
    }
    
    $stmt->execute();
    $stmt->close();

}




?>