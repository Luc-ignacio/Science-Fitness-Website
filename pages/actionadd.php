<?php
    session_start();
    include_once("../functions/functions.php");
    $dbConnect = dbLink();
    if($dbConnect){
        echo "<!-- Connection established -->";
    }
    print_r($_POST);
    $username = $_POST["username"];
    $password = $_POST["password"];
    $position = $_POST["position"];

    $result = insertuser($dbConnect,$username,$password,$position);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Science Fitness</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body onload="bounce()">
    <script>
        function bounce(){
            window.location.href= "adduser.php"
        }
    </script>
</body>
</html>