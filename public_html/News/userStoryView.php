<?php

session_start();
include 'includes/header.php';

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit a new story</title>
</head>
<body>
<h2>Here's all your past published stories:</h2>

</body>
</html>

<?php 
$userName = $_SESSION['currUser'];
$stmt = $mysqli->prepare("select * from articles where owner='$userName'");
if(!$stmt){
	printf("Query Prep Failed: %s<br>", $mysqli->error);
	exit;
}

$stmt->execute();
$result = $stmt->get_result();

echo "<ul>\n";
while($row = $result->fetch_assoc()){
    printf("\t<li><b>Title:</b> %s <b>Description:</b> %s <b>Category:</b> %s <b>article id:</b> %s</li>\n",
		htmlspecialchars( $row["title"]),
		htmlspecialchars( $row["short_desc"] ),
        htmlspecialchars( $row["category"]),
        htmlspecialchars( $row["article_id"])

	);

    $articleID = $row["article_id"];
    echo "<form action=\"storyDel.php\" method = \"GET\">
    <input type=\"hidden\" name= \"articleID\" value=$articleID>
    <button type=\"submit\" name=\"submit\">Delete</button>
    </form>";

}
echo "</ul>\n";





?>