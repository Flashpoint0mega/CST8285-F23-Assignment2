<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Search</title>
        <!--css used-->
        <link rel="stylesheet" href="style.css">
        <link rel="stylesheet" href="styleList.css"> 
    </head>

    <body>
        <header>
            
            
            <p id="sitename"><a href="Index.php">Site Name</a></p>
            <div class="sidebutton">
                <p id="ulist"><a href="UserList.php"> My Movie List </a></p>
                <p id="signbutt"><a href="SignIn.html"> <?php if (isset($_SESSION["myuser"])) {
                    echo $_SESSION["myuser"] ;
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
        <div id="contentwrap">
            <h1>temp search</h1>

        </div>
    
    
    
    
    </body>
    
</html>