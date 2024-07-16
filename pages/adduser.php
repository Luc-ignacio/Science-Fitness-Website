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
            <?php
                navigation("dashboard");
            ?>
        </div>

        <div class="cta">
            <div class="content">
                <?php
                    if($_SESSION["validate"] == "validated"){
                        //Do something once validate
                        echo'
                        <h2>Add User</h2>
                        <form action="actionadd.php" method="post">
                            <input type="text" name="username" placeholder="Enter Username"><br>
                            <input type="password" name="password" placeholder="Enter Password"><br>
                            <select name="position">
                                <option value="member">Member</option>
                                <option value="trainer">Trainer</option>
                            </select><br>
                            <input type="submit" value="Add User">
                        </form> 
                        ';
                    } else{
                        //Get the user to login again
                        echo 'Not valid, click Home and try again';
                    }
                ?>
            </div>
        </div>

        

        <div class="footer">
            <p>&copy; 2024 Science Fitness</p>
        </div>
    
    </div>
</body>
</html>