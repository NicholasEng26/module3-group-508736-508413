<?php 
    include 'includes/header.php';
    session_start();

    $articleid = $_GET['articleidChangedVal'];
    $owner = $_GET['ownerChangedVal'];
    $content = $_GET['contentChangedVal'];
    $image = $_GET['imageChangedVal'];
    $title = $_GET['titleChangedVal'];
    $summary = $_GET['summaryChangedVal'];
    $url = $_GET['urlChangedVal'];

  echo($articleid);
$stmt = $mysqli->prepare("update articles set title = '$title', short_desc='$summary', content='$content', image='$image',urls='$url' where article_id=?");  
$stmt->bind_param('i', $articleid);


if(!$stmt){
    printf("Query Prep Failed: %s<br>", $mysqli->error);
    exit;
}else{
    header("Location: home.php");
}   

$stmt->execute();
$stmt->close();


?>