<?php

session_start();
include 'includes/header.php';

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
    <input type="radio" id="Politics" name="Politics" value="Politics">
    <label for="Politics">Politics</label><br>
    <input type="radio" id="Politics" name="Politics" value="Politics">
    <label for="Politics">Politics</label><br>
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

echo "<h3>Story Preview: </h3><br>";
echo "<b>Titile:</b> <br>$title<br>";
echo "<b>Short Description:</b> <br>$summary<br>";
echo "<b>Content:</b> <br>$content<br>";
echo "<iframe src = $media height=\"400vw\" width=\"400vw\" title=\"PLACEHOLDER\"><br>";


?>