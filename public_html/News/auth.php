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

$stmt = $mysqli->prepare("select username, password from users where username='$userName'");
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
    $databasePWD = $row['password'];
    //$password = password_hash($password, PASSWORD_DEFAULT);
    echo"password: $password databasepwd: $databasePWD";
    if(password_verify($password, $databasePWD)){
        $_SESSION["currUser"] = $userName;
        $_SESSION["LoggedIn"] = true;
        $_SESSION["token"] = bin2hex(openssl_random_pseudo_bytes(32));; //uses rando_int to generate a token for CSRF Token auth
        header("Location: home.php");
    }else{
        echo "incorrect password<br>";
        echo "<form action = login.php><input type =\"submit\" value = \"Go Back\"></input></form>";
    }
   
}


$stmt->close();


?>