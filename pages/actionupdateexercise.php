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
    print_r($_POST);

    $newsets = $_POST["newsets"];
    $newreps = $_POST["newreps"];
    $item_id = $_POST["item_id"];
    $table = $_POST["table"];

    $sql = "UPDATE $table SET sets = :sts, reps = :reps WHERE id = :item_id";
    $query = $dbConnect -> prepare($sql);
    $query -> bindParam (':sts', $newsets);
    $query -> bindParam (':reps', $newreps);
    $query -> bindParam (':item_id', $item_id);
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
            window.location.href= "dashboard.php"
        }
    </script>
</body>
</html>