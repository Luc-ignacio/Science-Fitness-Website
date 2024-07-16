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
    // Validate user and password
    if($_SESSION["validate"] != "validated"){
        if($_SESSION["username"] != NULL){
            $username = $_SESSION["username"];
            $pwd = $_SESSION["pwd"];
            $position = $_SESSION["position"];
            if($_SESSION["username"] == "admin"){
                $position = "admin";
            }
        } else {
            $username = $_POST['username'];
            $pwd = $_POST['pwd'];
            $position = $_POST['position'];
        }
        $validation = validateUser($dbConnect, $username, $pwd, $position);
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Science Fitness - Dashboard</title>
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
                        $username = ucfirst($_SESSION["username"]);
                        echo "<h3>Welcome $username </h3><br><hr>";
                        switch($_SESSION["position"]){
                            case "admin": 
                                echo "
                                    <br>
                                    <a href='adduser.php'>Add a New User</a><br>
                                    <a href='addclass.php'>Add a New Class</a><br>
                                    <a href='addexercise.php'>Add a New Exercise</a><br>
                                    <br>
                                ";
                                echo '<hr><br><h3>Link Trainer to Class</h3><br>';
                                link_user_class($dbConnect,"trainer");
                                echo '<br><h3>Link Member to Class</h3><br>';
                                link_user_class($dbConnect,"member");
                                echo '<br><h3>Link Member to Exercise</h3><br>';
                                link_user_exercise($dbConnect,"member");
                                echo "<br><hr>";
                                viewItem($dbConnect,"trainer");
                                viewItem($dbConnect,"member");
                                viewItem($dbConnect,"class");
                                viewItem($dbConnect,"exercise");
                                echo '<div class="clear"></div>';
                                view_link($dbConnect,"trainer");
                                view_link($dbConnect,"member");
                                view_link_exercise($dbConnect,"member");
                            break;
                            case "trainer":
                                echo "
                                    <br>
                                        <a href='addclass.php'>Add a New Class</a><br>
                                        <a href='addexercise.php'>Add a New Exercise</a><br>
                                    <br>
                                ";
                                echo '<hr><br><h3>Link Trainer to Class</h3><br>';
                                link_user_class($dbConnect,"trainer");
                                echo '<br><h3>Link Member to Class</h3><br>';
                                link_user_class($dbConnect,"member");
                                echo '<br><h3>Link Member to Exercise</h3><br>';
                                link_user_exercise($dbConnect,"member");
                                echo "<br><hr>";
                                viewItem($dbConnect,"trainer");
                                viewItem($dbConnect,"member");
                                viewItem($dbConnect,"class");
                                viewItem($dbConnect,"exercise");
                                echo '<div class="clear"></div>';
                                echo "<hr><br><h3>My Classes</h3>";
                                echo "<br>";
                                listClasses($dbConnect, $_SESSION["user_id"], "trainer");
                                echo "<br><hr><br><h3>Members Attending to Each Class</h3>";
                                echo "<br>";
                                listMembers($dbConnect, $_SESSION["user_id"], "trainer");
                                view_link_exercise($dbConnect,"member");
                            break;
                            default: 
                                echo "<br><h3>My Classes</h3><br>";
                                listClasses($dbConnect, $_SESSION["user_id"], "member");
                                echo "<br><h3>My Exercises</h3><br>";
                                listExercises($dbConnect, $_SESSION["user_id"], "member");
                            break;
                        }
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