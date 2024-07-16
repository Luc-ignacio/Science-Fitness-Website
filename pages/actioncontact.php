<?php
    session_start();
    include_once("../functions/functions.php");
    $dbConnect = dbLink();
    if($dbConnect){
        echo "<!-- Connection established -->";
    }
    
    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['message'];

    $sql = "INSERT into contact (id,name,email, message) VALUES (NULL, :nm, :email, :msg)";
    $query = $dbConnect -> prepare($sql);
    $query -> bindParam(":nm", $name);
    $query -> bindParam(":email", $email);
    $query -> bindParam(":msg", $message);
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
            window.location.href= "contact.php"
        }
    </script>
</body>
</html>