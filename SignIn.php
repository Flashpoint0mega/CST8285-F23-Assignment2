<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Sign In</title>
        <!--css used-->
        <link rel="stylesheet" href="style.css">
        <link rel="stylesheet" href="styleSign.css">
        <!--<script src="SignIn.js"></script> -->
        
    </head>  
    
    <body>
        <header>
            <nav>
                <!--links to the other pages-->
                <p class="nav_list"><a href="index.php"> Home </a></p>
                <p class="nav_list" id="sitename"><a href="Index.php">Site Name</a></p>
                <p class="nav_list"><a href="Search.html"> Search </a></p>
                
            </nav>
    
        </header>
    <div id="signwrap">
        <h2>Sign In:</h2>
        <form method="post" action="Login.php" id="Login" onsubmit="return validate();">

            <input type="text" placeholder="Username or Email:" id="username" name="Uname"  autocomplete="off"><br>
            <input type="password" placeholder="Password:" id="password" name="Pass"  autocomplete="new-password"><br>
            

            <button type="submit" onclick="">Sign In</button>

        </form>
        <p id="error"><?php if (isset($_SESSION["error"])) {
                    echo $_SESSION["error"] ;
                } else {
                    echo '';
                }
        ?></p>
        <p id="Dont">Don't have an account?<br><a id="NoAcc" href="SignUp.html">Sign Up</a></p>
    </div>
    
    </body>

</html>