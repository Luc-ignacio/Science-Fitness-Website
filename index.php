<?php
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);

    session_start();
    include_once("./functions/functions.php");
    $dbConnect = dbLink();
    if($dbConnect){
        echo "<!-- Connection established -->";
    }
    
    $logoutStatus = $_GET["logout"];
    if($logoutStatus == "logout"){
        $_SESSION["username"] = NULL;
        $_SESSION["password"] = NULL;
        $_SESSION["position"] = NULL;
        $_SESSION["validate"] = NULL;
        session_destroy();
        session_regenerate_id();
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Science Fitness - Home</title>
    <link rel="stylesheet" href="./css/style.css">
</head>
<body>
    <div class="wrapper">
        <div class="header">
            <h1>Welcome to Science Fitness</h1>
        </div>

        <div class="nav">
            <div>
                <a href="index.php">Home</a>
                <a href="./pages/about.php">About Us</a>
                <a href="./pages/equipment.php">Equipment</a>
                <a href="./pages/timetable.php">Timetable</a>
                <a href="./pages/contact.php">Contact</a>
            </div>
            <?php
                navigation("index");
            ?>
        </div>

        <div class="home">
            <div class="cta">
                <h1>Science Fitness:</h1>
                <h2>Where Evidence Meets Exercise</h2>
                <p>At Science Fitness, we believe in the power of knowledge-backed fitness to transform lives. Our mission is to blend the latest scientific research with cutting-edge training techniques to help you achieve your health and fitness goals efficiently and effectively.</p>
            </div>
        </div>

        <div class="footer">
            <p>&copy; 2024 Science Fitness</p>
        </div>
    
    </div>
</body>
</html>