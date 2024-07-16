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

        <div class="contact">
            <h1>Contact:</h1>
            <form action="actioncontact.php" method="post">
                <input type="text" id="name" name="name" placeholder=" Name" required>
                <input type="email" id="email" name="email" placeholder=" Email" required>
                <textarea id="message" name="message" rows="4" placeholder=" Enter your message" required></textarea>
                <input type="submit" value="Submit">
            </form>
        </div>
        

        <div class="footer">
            <p>&copy; 2024 Science Fitness</p>
        </div>
    
    </div>
</body>
</html>