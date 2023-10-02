<?php 
    include 'includes/header.php';
    session_start();

    
    $authToken = $_POST['authToken'];
    
    if(!hash_equals($_SESSION['token'], $authToken)){
       
        die("Warning: someone tried to forge a request");
    }
    $articleid = $_POST['articleidChangedVal'];
    $owner = $_POST['ownerChangedVal'];
    $content = $_POST['contentChangedVal'];
    $image = $_POST['imageChangedVal'];
    $title = $_POST['titleChangedVal'];
    $summary = $_POST['summaryChangedVal'];
    $url = $_POST['urlChangedVal'];

  echo($articleid);
$stmt = $mysqli->prepare("update articles set title = '$title', short_desc='$summary', content='$content', image='$image',urls='$url' where article_id=?");  
$stmt->bind_param('i', $articleid);


if(!$stmt){
    printf("Query Prep Failed: %s<br>", $mysqli->error);
    exit;
}else{
    header("Location: article.php?article_id=$articleid");
}   

$stmt->execute();
$stmt->close();


?>