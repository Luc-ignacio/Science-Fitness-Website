<?php
    session_start();
    include_once("../functions/functions.php");
    $dbConnect = dbLink();
    if($dbConnect){
        echo "<!-- Connection established -->";
    }

    $table = $_POST["table"];
    $user = $_POST["member"];
    $exercise = $_POST["exercise"];

    $result = insertlinkexercise($dbConnect,$table,$user,$exercise);
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