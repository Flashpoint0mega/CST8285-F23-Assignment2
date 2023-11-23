<?php
session_start();
$_SESSION["error"]="";
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Welcome</title>
        <meta name="author" content="Sebastian Deslauriers">
        <!--css used-->
        <link rel="stylesheet" href="style.css">
        <link rel="stylesheet" href="styleIndex.css"> 
    </head>
    
    <body>
    <?php //gets the cradentials for the database then connects to the database
    require_once('db_credentials.php');
    require_once('database.php');

    $db = db_connect();
    
    ?>
    <?php //logs out user if they click the logout button
        if(array_key_exists('button1', $_POST)) { 
            button1(); 
        }
        function button1() { //function to log out user
            session_destroy();
            header("location: Index.php");
        } 
    ?>
        <header>
            
            
            <p id="sitename"><a href="Index.php">Site Name</a></p>
            <div class="sidebutton"> 
                <p id="ulist"><a href="UserList.php"> My Movie List </a></p>
                <p id="signbutt"><a href="SignIn.php"> <?php if (isset($_SESSION["myuser"])) { 
                    //if user is logged in changes the sign in button to show their username, will change this to the log in button during finalization
                    echo $_SESSION["myuser"] ;//'myuser' is the variable name for the users name and credentials
                } else {
                    echo 'Sign in';
                }
                ?></a></p>
            </div>
            <div id="searchbar">
                <input type="text" placeholder="Search:" id="search" name="search bar" size="60">
                <p id="searchbutt"><a href="Search.php">🔍</a></p>
            </div>
        </header>
        <form method="POST">
        <div id="popularwrap"> 
        </form>
        <input type="submit" name="button1" class="button" value="logout" />
        <p>userID:<?php if (isset($_SESSION['userID'])) {
            echo $_SESSION['userID'];} 
            else { echo ' Not signed in';}?></p>


            <?php require 'popularMovies.php'?>


        </div>
    
    
    
    
    </body> 

</html>