<?php
session_start();
include 'includes/header.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>New User Registration</title>
</head>
<body>
    <p>Registering new user.....</p><br>
</body>
</html>

<?php


$userName = $_GET['userNameInput'];

$password = $_GET['passwordInput'];
$passwordConfirm = $_GET['passwordInput2'];
$standrdRights = 1; //1 = no special privlieges

echo "<br> username: $userName, password: $password, confirm password: $passwordConfirm<br>";

if($password != $passwordConfirm){
    echo "<br>Error: Entered passwords does not match<br>";
    echo "<form action = login.php><input type =\"submit\" value = \"Go Back\"></input></form>";
}else{

    $stmt = $mysqli->prepare("select username, password from users where username='$userName'");
    if(!$stmt){
        printf("Query Prep Failed: %s<br>", $mysqli->error);
        exit;
    }
    
    
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();
    
    if($row){
        echo "error: username already been used<br>";
        echo "<form action = login.php><input type =\"submit\" value = \"Go Back\"></input></form>";
    }else{
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
    

        $stmt = $mysqli->prepare("insert into users (username, password, adminRights) values (?, ?, ?)");
        if(!$stmt){
            printf("Query Prep Failed: %s\n", $mysqli->error);
            exit;
        }
        
        $stmt->bind_param('ssi', $userName, $hashedPassword, $standrdRights );
        if(!$stmt->execute())
        {echo"<br>There was an error...<br>";
        }else{
            echo "<br> Account creationg successful! <br>";
        }
        
        $stmt->close();
       
    }




}

