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

        <div class="about">
            <div class="cta">
                <h1>About Us:</h1>
                <h2>Our Story</h2>
                <p>Founded in 2020, Science Fitness was born out of a passion for fitness and a desire to make evidence-based training accessible to everyone. Our founder, Lucas Ignacio, a seasoned fitness professional with a background in exercise physiology, envisioned a gym where the latest scientific research informs every aspect of the training process.</p>
                <h2>Our Philosophy</h2>
                <p>We understand that fitness is not a one-size-fits-all journey. That’s why we take a personalised approach to your health and wellness. Whether you're a beginner or an elite athlete, our team of highly qualified trainers will work with you to create a customised plan that fits your unique needs and goals.</p>
                <h2>What We Offer</h2>
                <p><strong>1. Personal Training:</strong> Our certified personal trainers use scientifically-backed methods to help you maximise your workouts. With personalised attention, you’ll receive guidance tailored to your body and goals.</p>
                <p><strong>2. Group Classes:</strong> From high-intensity interval training (HIIT) to yoga, our diverse range of group classes offers something for everyone. Each class is designed with the latest fitness trends and scientific insights in mind.</p>
                <p><strong>3. State-of-the-Art Equipment:</strong> At Science Fitness, we invest in the latest fitness technology and equipment to ensure you have the best tools available for your workouts.</p>
                <p><strong>4. Wellness Programs:</strong> Beyond physical fitness, we offer programs focused on mental well-being, stress management, and overall lifestyle enhancement.</p>
            </div>
            <div id="about-image">
                <img src="../images/about.jpg" alt="Woman training">
            </div>
        </div>
        
        

        <div class="footer">
            <p>&copy; 2024 Science Fitness</p>
        </div>
    
    </div>
</body>
</html>