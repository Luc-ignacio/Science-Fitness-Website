<?php
    session_start();
    include_once("../functions/functions.php");
    $dbConnect = dbLink();
    if($dbConnect){
        echo "<!-- Connection established -->";
    }

    $table = $_POST["table"];
    if($_POST["trainer"] != NULL){
        $user = $_POST["trainer"];
    } else {
        $user = $_POST["member"];
    }
    $class = $_POST["class"];

    $result = insertlink($dbConnect,$table,$user,$class);
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