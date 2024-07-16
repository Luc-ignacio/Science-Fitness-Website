<?php
    function dbLink(){
        $db_user = "mri";
        $db_pass = "password";
        $db_host = "localhost";
        $db = "science_fitness";
        try{
            $db = new PDO("mysql:host=$db_host;dbname=$db",$db_user,$db_pass);
        } catch(Exception $e){
            echo"Unable to access database.".$e;
        }
        error_reporting(1);
        return $db;
    }

    function validateUser($dbConnect, $username, $pwd, $table) {
        echo "<!-- Validating against table: $table -->";
        $sql = "SELECT * FROM $table WHERE name = :username";
        $stmt = $dbConnect->prepare($sql);
        $stmt->execute([':username' => $username]);
        
        $user = $stmt->fetch(PDO::FETCH_ASSOC);
    
        if ($user) {
            // Verify the hashed password
            if (password_verify($pwd, $user["password"])) {
                $_SESSION["username"] = $username;
                $_SESSION["position"] = $user['position'];
                $_SESSION["user_id"] = $user["id"];
                $_SESSION["validate"] = "validated";
                return true;            
            }
        }
        return false;
    }
    

    function navigation($page){
        if($page == "index"){
            if($_SESSION["validate"] == "validated"){
                // logged in index page
                echo '
                <div>
                    <a href="pages/dashboard.php">Dashboard</a>
                    <a href="index.php?logout=logout">Logout</a>
                </div>
                ';
            } else{
                // annonymous access
                echo '
                <form action="./pages/dashboard.php" method="POST">
                <input type="text" name="username" placeholder=" Enter Username">
                <input type="password" name="pwd" placeholder=" Enter Password">
                <select name="position">
                    <option value="member">Member</option>
                    <option value="trainer">Trainer</option>
                    <option value="admin">Admin</option>
                </select>
                <input type="submit" value="Login">
                </form>
                ';
            }
        } else{
            if($page == "dashboard"){
                if($_SESSION["validate"] == "validated"){
                    // logged in dashboard
                    echo '
                    <div>
                        <a href="../index.php">Home</a>
                        <a href="dashboard.php">Dashboard</a>
                        <a href="../index.php?logout">Logout</a>
                    </div>
                    ';
                } else {
                    // annonymous access
                echo '
                <a href="../index.php">Home</a>
                ';
                }
            }
        }
    }

    function insertuser($dbConnect, $username, $password, $table) {
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
    
        if ($table == "trainer") {
            $sql = "INSERT INTO $table (id, name, password, position) VALUES (NULL, :un, :pwd, :pos)";
            $query = $dbConnect->prepare($sql);
            $query->bindParam(":un", $username);
            $query->bindParam(":pwd", $hashedPassword); // Store hashed password
            $query->bindParam(":pos", $table);
            $result = $query->execute();
            return $result;
        } else {
            $table = "member";
            $sql = "INSERT INTO $table (id, name, password) VALUES (NULL, :un, :pwd)";
            $query = $dbConnect->prepare($sql);
            $query->bindParam(":un", $username);
            $query->bindParam(":pwd", $hashedPassword); // Store hashed password
            $result = $query->execute();
            return $result;
        }
    }

    function insertclass($dbConnect,$class){
        $table = "class";
        $sql = "INSERT into $table(id,name) VALUES (NULL, :un)";
        $query = $dbConnect -> prepare($sql);
        $query -> bindParam(":un", $class);
        $result = $query -> execute();
        return $result;
    }

    function viewItem($dbConnect,$table){
        echo '
        <div class="ctaBox">
        <h3>' .ucfirst($table). '</h3><hr>';
        $sql = "SELECT * FROM $table";
        if($table == "exercise"){
            echo '
            <table border="1">
                <thead>
                    <tr>
                        <th>Exercise</th>
                        <th>Equipment</th>
                        <th>Sets</th>
                        <th>Reps</th>
                        <th>Action</th>
                    </tr>
                </thead>
            ';
            foreach ($dbConnect -> query($sql) as $row){
                $item_id = $row["id"];
                echo '
                    <tbody>
                        <tr>
                            <td>'.$row['exercise'].'</td>
                            <td>'.$row['equipment'].'</td>
                            <td>'.$row['sets'].'</td>
                            <td>'.$row['reps'].'</td>
                            <td><a href="remove.php?item_id='.$item_id.'&table='.$table.'">Remove</a><br>
                            <a href="updateexercise.php?item_id='.$item_id.'&table='.$table.'">Update</a></td>
                        </tr>
                    </tbody>
                ';
            }
            echo '</table><br>';
        } else {
            foreach ($dbConnect -> query($sql) as $row){
                $item_id = $row["id"];
                echo $row["name"];
                echo '<a href="remove.php?item_id='.$item_id.'&table='.$table.'">- Remove</a>';
                if($table == "class"){
                    echo '<a href="updateclass.php?item_id='.$item_id.'&table='.$table.'">Update</a>';
                    echo '<br>';
                } else {
                    echo '<a href="update.php?item_id='.$item_id.'&table='.$table.'">Update</a>';
                    echo '<br>';
                }
            }
            
        }
        echo '</div>';
    }

    function link_user_class($dbConnect, $table){
        echo'
        <form action="actionlink.php" method="post">';
        if($table == "trainer"){
            dropdown($dbConnect, "trainer");
            dropdown($dbConnect, "class");
            echo '
            <input type="hidden" name="table" value="trainer">
            <input type="submit" value="Link">';
        } else{
            dropdown($dbConnect, "member");
            dropdown($dbConnect, "class");
            echo '
            <input type="hidden" name="table" value="member">
            <input type="submit" value="Link">';
        }
        echo '</form>';
    }

    function link_user_exercise($dbConnect, $table){
        $table = "member";
        echo'
        <form action="actionlinkexercise.php" method="post">';
        dropdown($dbConnect, "member");
        dropdown($dbConnect, "exercise");
        echo '
        <input type="hidden" name="table" value="member">
        <input type="submit" value="Link">';
        echo '</form>';
    }

    function dropdown($dbConnect,$table){
        if($table != "exercise"){
            echo '<select name="' .$table. '">';
            $sql = "SELECT * FROM $table";
            foreach($dbConnect -> query($sql) as $row){
                echo '
                <option name="' .$table. 'id" value="' .$row['id']. '">' .$row['name']. '</option>';
            }
            echo '</select>';
        } else {
            echo '<select name="' .$table. '">';
            $sql = "SELECT * FROM $table";
            foreach($dbConnect -> query($sql) as $row){
                echo '
                <option name="' .$table. 'id" value="' .$row['id']. '">' .$row['exercise']. '</option>';
            }
            echo '</select>';
        }
        
        
    }

    function insertlink($dbConnect,$table,$user,$class){
        echo $table.$user.$class;
        if($table == "trainer"){
            $sql = "INSERT INTO trainer_to_class(id,trainer_id,class_id) VALUES (NULL,:uid, :cid)";
        } else {
            $sql = "INSERT INTO member_to_class(id,member_id,class_id) VALUES (NULL,:uid, :cid)";
        }
        $query = $dbConnect -> prepare($sql);
        $query -> bindParam(":uid", $user);
        $query -> bindParam(":cid", $class);
        $result = $query -> execute();
        return $result;
    }

    function insertlinkexercise($dbConnect,$table,$user,$exercise){
        echo $table.$user.$exercise;
        
        $sql = "INSERT INTO member_to_exercise (id,member_id,exercise_id) VALUES (NULL,:uid, :eid)";
        $query = $dbConnect -> prepare($sql);
        $query -> bindParam(":uid", $user);
        $query -> bindParam(":eid", $exercise);
        $result = $query -> execute();
        return $result;
    }

    function view_link($dbConnect,$table){
        if ($table == "trainer"){
            echo "<hr><br><h3>Trainer & Classes</h3><br>";
            $sqltable = "trainer_to_class";
            $sql = "SELECT DISTINCT * FROM $sqltable";
            foreach($dbConnect -> query($sql) as $row){
                $table_id = $row["id"];
                echo $name = returndetail($dbConnect,$row["trainer_id"], "trainer");
                echo " - ";
                echo $class = returndetail($dbConnect,$row["class_id"], "class");
                echo '<a href="remove.php?item_id='.$table_id.'&table=trainer_to_class">- Remove</a><br>';
            }
        } else{
            echo "<br><hr><br><h3>Member & Classes</h3><br>";
            $sqltable = "member_to_class";
            $sql = "SELECT DISTINCT * FROM $sqltable";
            foreach($dbConnect -> query($sql) as $row){
                $table_id = $row["id"];
                echo $name = returndetail($dbConnect,$row["member_id"], "member");
                echo " - ";
                echo $class = returndetail($dbConnect,$row["class_id"], "class");
                echo '<a href="remove.php?item_id='.$table_id.'&table=member_to_class">- Remove</a><br>';
            }
        }
    }

    function view_link_exercise($dbConnect,$table){
        echo "<br><hr><br><h3>Member & Exercises</h3><br>";
        $sqltable = "member_to_exercise";
        $sql = "SELECT DISTINCT * FROM $sqltable";
        foreach($dbConnect -> query($sql) as $row){
            $table_id = $row["id"];
            echo $name = returndetail($dbConnect,$row["member_id"], "member");
            echo " - ";
            echo returndetail_exercise($dbConnect,$row["exercise_id"], "exercise");
            echo '<a href="remove.php?item_id='.$table_id.'&table=member_to_exercise">- Remove</a><br>';
        }
    }

    function returndetail_exercise($dbConnect, $id, $table){
        $sql = "SELECT * FROM $table";
        foreach($dbConnect -> query($sql) as $row){
            if ($id == $row["id"]){
                echo 'Exercise: ';
                echo $row["exercise"];
                echo ' - Equipment: ';
                echo $row["equipment"];
                echo ' - Sets: ';
                echo $row["sets"];
                echo ' - Reps: ';
                echo $row["reps"];
            }
        }
    }

    function returndetail($dbConnect, $id, $table){
        $sql = "SELECT * FROM $table";
        foreach($dbConnect -> query($sql) as $row){
            if ($id == $row["id"]){
                return $row["name"];
            }
        }
    }

    function listClasses($dbConnect,$user_id,$table){
        if ($table == "trainer"){
            $sqltable = "trainer_to_class";
        } else{
            $sqltable = "member_to_class";
        }
        $sql = "SELECT * FROM $sqltable";
        foreach($dbConnect -> query($sql) as $row){
            if($table == "trainer"){
                $user_id_from_table = $row["trainer_id"];
            } else {
                $user_id_from_table = $row["member_id"];
            }
            if($user_id == $user_id_from_table){
                $id = $row["class_id"];
                $result = returndetail($dbConnect,$id,"class");
                echo ucfirst($result)."<br>";
            }
        }
    }

    function listExercises($dbConnect,$user_id,$table){
        $sqltable = "member_to_exercise";
        $sql = "SELECT * FROM $sqltable";
        foreach($dbConnect -> query($sql) as $row){
            $user_id_from_table = $row["member_id"];
            if($user_id == $user_id_from_table){
                $id = $row["exercise_id"];
                echo returndetail_exercise($dbConnect,$id,"exercise");
                echo '<br>';
            }
        }
    }

    function listMembers($dbConnect,$user_id,$table){
        $sqltable = "trainer_to_class";
        $sql = "SELECT * FROM $sqltable";
        foreach($dbConnect -> query($sql) as $row){
            if ($user_id == $row["trainer_id"]){
                $id = $row["class_id"];
                $result = returndetail($dbConnect,$id,"class");
                echo "<h4>" .ucfirst($result)."</h4>";
                listMembersByClass($dbConnect, $id, "member_to_class");
                echo "<br>";
            }
        }
    }

    function listMembersByClass($dbConnect, $id, $table){
        $sql = "SELECT * FROM $table";
        foreach($dbConnect -> query($sql) as $row){
            if($id == $row["class_id"]){
                $member_id = $row["member_id"];
                $result = returndetail($dbConnect, $member_id, "member");
                echo ucfirst($result);
                echo '<br>';
            }
            
        }

    } 

    function removeitem($dbConnect, $item_id, $table){
        $sql = "DELETE FROM $table WHERE id = :id";
        $query = $dbConnect -> prepare($sql);
        $query -> bindParam(":id", $item_id);
        $query -> execute();
    }

    function removefromlinks($dbConnect, $item_id, $table){
        echo $item_id.$table;
        if($table == "trainer"){
            $sqltable = "trainer_to_class";
        } else{
            $sqltable = "member_to_class";
        }
        $sql = "SELECT * FROM $sqltable";
        echo $sql;
        foreach($dbConnect -> query($sql) as $row){
            if($table == "trainer"){
                $user_id_from_table = $row["trainer_id"];
            } else{
                $user_id_from_table = $row["member_id"];
            }
            if($item_id == $user_id_from_table){
                $row_id = $row["id"];
                removeitem($dbConnect, $row_id, $sqltable);
            }
        }
    }

    function update($dbConnect, $user_id, $newpassword, $table){
        $newhashedPassword = password_hash($newpassword, PASSWORD_DEFAULT);
        $sql = "UPDATE $table SET password = :pw WHERE id = :postid";
        $query = $dbConnect -> prepare($sql);
        $query -> bindParam (':pw', $newhashedPassword);
        $query -> bindParam (':postid', $user_id);
        $query -> execute();
    }

    function updateclass($dbConnect, $user_id, $newname, $table){
        $sql = "UPDATE $table SET name = :nm WHERE id = :postid";
        $query = $dbConnect -> prepare($sql);
        $query -> bindParam (':nm', $newname);
        $query -> bindParam (':postid', $user_id);
        $query -> execute();
    }    

?>