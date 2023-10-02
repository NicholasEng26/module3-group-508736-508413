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

echo ($_GET['articleID']);
$articleID = $_GET['articleID'];
$userName = $_SESSION['currUser'];

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



?>