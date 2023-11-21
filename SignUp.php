<?php

require_once('db_credentials.php');
require_once('database.php');

$db = db_connect();

    //handle values sent by signup.html
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $name = $_POST["Uname"];
        $pass = $_POST["Pass"];
        $nametrim = trim($name);
        $passtrim = trim($pass);
        $namefinal = stripcslashes($nametrim);
        $passfinal = stripcslashes($passtrim);


            $sql = "INSERT INTO user (username, Password) VALUES ('$namefinal', '$passfinal')";
        $result = mysqli_query($db, $sql);
        // For INSERT statements, $result is true/false
            
        
            $id = mysqli_insert_id($db);
            header("Location: Index.php?id=  $id");
            
    } else {
            header("Location Missing.html");
    }


?>