<?php
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);

    session_start();
    include_once("../functions/functions.php");
    $dbConnect = dbLink();
    if($dbConnect){
        echo "<!-- Connection established -->";
    }
    print_r($_POST);
    $newpassword = $_POST["newpassword"];
    $user_id = $_POST["user_id"];
    $table = $_POST["table"];
    update($dbConnect, $user_id, $newpassword, $table);
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
            window.location.href= "dashboard.php"
        }
    </script>
</body>
</html>