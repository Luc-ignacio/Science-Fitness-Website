<?php
    session_start();
    include_once("../functions/functions.php");
    $dbConnect = dbLink();
    if($dbConnect){
        echo "<!-- Connection established -->";
    } 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Science Fitness</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    <div class="wrapper">
        <div class="header">
            <h1>Science Fitness</h1>
        </div>

        <div class="nav">
            <div>
                <a href="../index.php">Home</a>
                <a href="./about.php">About Us</a>
                <a href="./equipment.php">Equipment</a>
                <a href="./timetable.php">Timetable</a>
                <a href="./contact.php">Contact</a>
            </div>
        </div>

        <div class="timetable">
            <h1>Timetable:</h1>
            <img id="timetable-image" src="../images/timetable.png" alt="Timetable">
        </div>
        

        <div class="footer">
            <p>&copy; 2024 Science Fitness</p>
        </div>
    
    </div>
</body>
</html>