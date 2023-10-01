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
    <title>Upload a new story</title>
</head>
<body>
    <form action ="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method = "POST">

    <label for = "storyTitle">Story Title:</label><br>
    <input type = "text" id = "storyTitle" name="storyTitleInput"/><br>
    <label for = "shortDesc">Short Description of Story:</label><br>
    <input type = "text" id = "shortDesc" name="shortDescInput"/><br>
    <input type="radio" id="Politics" name="Category" value="Politics">
    <label for="Politics">Politics</label><br>
    <input type="radio" id="Business" name="Category" value="Business">
    <label for="Business">Business</label><br>
    <input type="radio" id="Technology" name="Category" value="Technology">
    <label for="Technology">Technology</label><br>
    <label for = "storyContent">Content of Story:</label><br>
    <textarea id = "storyContent" name="storyContentInput"> 
</textarea><br>
    <label for = "mediaLink">Post any media as a link here: </label><br>
    <input type = "text" id = "mediaLink" name="mediaLinkInput"/><br>

    <button type="submit" name="submit">Submit the story</button>

</form>


</body>
</html>

<?php

$title = $_POST['storyTitleInput'];
$summary = $_POST['shortDescInput'];
$content = $_POST['storyContentInput'];
$media = $_POST['mediaLinkInput'];
$cat = $_POST['Category'];
$username = $_SESSION['currUser'];
$articleid = null; //will use autoincrement


echo "<h3>Story Preview for $username: </h3><br>";
echo "<br> Category: $cat <br>";
echo "<b>Titile:</b> <br>$title<br>";
echo "<b>Short Description:</b> <br>$summary<br>";
echo "<b>Content:</b> <br>$content<br>";
echo "<iframe src = $media height=\"400vw\" width=\"400vw\" title=\"PLACEHOLDER\"><br>";

$stmt = $mysqli->prepare("insert into articles (title, short_desc, category, content, image, article_id, owner) values (?, ?, ?, ?, ?, ?, ?)");
if(!$stmt){
	printf("Query Prep Failed: %s\n", $mysqli->error);
	exit;
}else{
    echo"<br>connected ig?";
}

$stmt->bind_param('sssssis', $title, $summary, $cat, $content, $media, $articleid, $username);
if(!$stmt->execute())
{echo"<br>There was an error...<br>";
}

$stmt->close();

?>