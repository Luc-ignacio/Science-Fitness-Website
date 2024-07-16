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
    
    $exercise = $_POST['exercise'];
    $equipment = $_POST['equipment'];
    $sets = $_POST['sets'];
    $reps = $_POST['reps'];


    $sql = "INSERT into exercise (id, exercise, equipment, sets, reps) VALUES (NULL, :exercise, :equipment, :sets, :reps)";
    $query = $dbConnect -> prepare($sql);
    $query -> bindParam(":exercise", $exercise);
    $query -> bindParam(":equipment", $equipment);
    $query -> bindParam(":sets", $sets);
    $query -> bindParam(":reps", $reps);
    $query -> execute();
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
            window.location.href= "addexercise.php"
        }
    </script>
</body>
</html>