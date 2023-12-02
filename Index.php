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
        <header>
            
            
            <p id="sitename"><a href="Index.php">My Movie List</a></p>
            <div class="sidebutton"> 
                <p id="ulist"><a href="UserList.php"><?php if (isset($_SESSION["myuser"])) 
                {   //if user is signed in sets the hyperlink to userlist.php to say their username's list, 
                    //otheriwse it sets it to just say "my movie list"
                    echo $_SESSION["myuser"];
                    echo "'s ";
                } else {
                    echo 'My ';
                } ?>Movie List</a></p>

                <p id="signbutt"><a href="SignIn.php"> <?php if (isset($_SESSION["myuser"])) { 
                    //if user is logged in changes the sign in button to a sign out button
                    echo 'Sign Out';
                } else {
                    echo 'Sign in';
                }
                ?></a></p>
            </div>
        </header>
        <form method="POST">
        <div id="popularwrap"> 
        </form>
        <p>userID:<?php if (isset($_SESSION['userID'])) {
            echo $_SESSION['userID'];} 
            else { echo ' Not signed in';}?></p>
            
            
            <?php require 'popularMovies.php'?>
            <?php include 'movietable.php'?>            

        </div>
    
    
    
    
    </body> 

</html>