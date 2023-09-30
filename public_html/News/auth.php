<?php
session_start();
include 'includes/header.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Auth.php</title>
</head>
<body>
    <p>Authenticating your login details.....</p><br>
</body>
</html>

<?php


$userName = $_GET['userNameInput'];

$password = $_GET['passwordInput'];

$stmt = $mysqli->prepare("select first_name, password from users where username='$userName'");
if(!$stmt){
	printf("Query Prep Failed: %s<br>", $mysqli->error);
	exit;
}else{
    printf("Query Prep Success! <br>");
}



$stmt->execute();
$result = $stmt->get_result();
$row = $result->fetch_assoc();

if(!$row){
    echo "error: user name not found<br>";
    echo "<form action = login.php><input type =\"submit\" value = \"Go Back\"></input></form>";
}else{
    if($password == $row["password"]){
        $_SESSION["currUser"] = $userName;
        $_SESSION["LoggedIn"] = true;
        header("Location: home.php");
    }else{
        echo "incorrect password<br>";
        echo "<form action = login.php><input type =\"submit\" value = \"Go Back\"></input></form>";
    }
   
}

// echo "<ul>\n";
// while($row = $result->fetch_assoc()){

// 	// printf("Hello, %s</li>\n",
// 	// 	htmlspecialchars( $row["first_name"] )
// 	// );

// }

// echo "</ul>\n";

$stmt->close();


?>