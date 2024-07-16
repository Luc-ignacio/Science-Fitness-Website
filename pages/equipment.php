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

        <div class="equipment">
            <div class="cta">
                <h1>Equipment:</h1>
                <h2>Weights & Bars</h2>
                <p>Our extensive selection of weights and bars includes everything you need to push your limits and achieve your strength goals. From dumbbells and kettlebells to barbells and weight plates, our free weights are designed to accommodate all levels of strength training. Perfect for functional training, muscle building, and powerlifting.</p>
                <h2>Strength Machines</h2>
                <p>Our strength training area is equipped with a variety of machines to target every muscle group effectively and safely. This includes:</p>
                <p><strong>Benches:</strong> Adjustable benches for various pressing and dumbbell exercises.</p>
                <p><strong>Bars:</strong> Olympic bars, safety bars, and specialty bars to diversify your lifting routine.</p>
                <p><strong>Racks:</strong> Squat racks, power racks, and Smith machines for maximum versatility and safety during heavy lifts.</p>
                <p>These machines are ideal for providing support and stability, allowing you to focus on correct form and progressively increase your strength.</p>
                <h2>Conditioning</h2>
                <p>For those looking to improve their conditioning and body weight strength, we offer a range of equipment to challenge your endurance and agility:</p>
                <p><strong>Body Weight Stations:</strong> Pull-up bars, dip stations, and other calisthenics equipment.</p>
                <p><strong>Conditioning Tools:</strong> Battle ropes, sleds, agility ladders, and plyometric boxes.</p>
                <p>These tools help you enhance your cardiovascular fitness, muscular endurance, and overall athletic performance.</p>
                <h2>Cardio</h2>
                <p>Our cardio section is stocked with state-of-the-art machines designed to provide a variety of workouts, ensuring you never get bored while improving your cardiovascular health:</p>
                <p><strong>Exercise Bikes:</strong> Stationary bikes and spin bikes for low-impact, high-efficiency cardio sessions.</p>
                <p><strong>Treadmills:</strong> High-quality treadmills with various settings and programs to simulate different terrains and intensities.</p>
                <p><strong>Elliptical Cross Trainers:</strong> Full-body workout machines that are easy on the joints while providing an effective cardio workout.</p>
                <p><strong>Rowing Machines:</strong> Rowers that deliver a full-body cardiovascular workout, engaging multiple muscle groups simultaneously.</p>
                <p><strong>Ski Trainers:</strong> Machines that simulate the movements of cross-country skiing, offering an excellent low-impact, full-body cardio workout.</p>
                <p>At Science Fitness, our equipment is carefully selected to provide you with the best possible fitness experience. Each piece is maintained to the highest standards to ensure your workouts are safe, effective, and enjoyable.</p>
            </div>
            <div id="equipment-image">
                <img src="../images/dumbbells.jpg" alt="Dumbbells">
            </div>
        </div>

        <div class="footer">
            <p>&copy; 2024 Science Fitness</p>
        </div>
    
    </div>
</body>
</html>