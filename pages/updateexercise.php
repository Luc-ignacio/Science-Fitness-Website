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
                        $item_id = $_GET["item_id"];
                        $table = $_GET["table"];
                        echo'
                        <h2>Update Exercise</h2>
                        <form action="actionupdateexercise.php" method="post">
                            <input type="text" name="newsets" placeholder="Enter Sets"><br>
                            <input type="text" name="newreps" placeholder="Enter Reps"><br>
                            <input type="hidden" name="item_id" value="'.$item_id.'">
                            <input type="hidden" name="table" value="'.$table.'">
                            <input type="submit" value="Update">
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