<?php
session_start(); 
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


            $sql = "SELECT * FROM user WHERE username = '$namefinal' AND Password = '$passfinal'";
        $result = mysqli_query($db, $sql);
        // For INSERT statements, $result is true/false
            
        
        if(mysqli_num_rows($result)===1)
        {
            //username is stored to seesion and forward to next page
            $_SESSION["myuser"]= $namefinal;
            header("location: Index.php");
            
        } else {
            //error is shown
            echo '<script type="text/JavaScript">  
            alert("username or password is incorrect");
                 </script>' ;
            header("location: SignIn.html");
            
    }
};


?>