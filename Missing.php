<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Missing Movie</title>
        <!--css used-->
        <link rel="stylesheet" href="style.css">
        <link rel="stylesheet" href="styleMissing.css"> 
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
            <h1>Missing Movie Form</h1>
            <form method="POST" action="addmovie.php" id="missmovie">

            <input type="text" placeholder="Name of movie"       id="moviename"   name="mname"      class="moviedetails" autocomplete="off"><br>
            <input type="text" placeholder="Year of Release"     id="yearCreated" name="year"       class="moviedetails" autocomplete="off">
            <input type="text" placeholder="Length in Minutes"   id="length"      name="length"     class="moviedetails" autocomplete="off"><br>
            <input type="text" placeholder="Genre"               id="genre"       name="genre"      class="moviedetails" autocomplete="off">
            <input type="text" placeholder="Rating"              id="rating"      name="rating"     class="moviedetails" autocomplete="off"><br>
            <input type="text" placeholder="Director First name" id="DirFname"    name="dirfname"   class="moviedetails" autocomplete="off">
            <input type="text" placeholder="Director Last name"  id="DirLname"    name="dirlname"   class="moviedetails" autocomplete="off"><br>
            <input type="text" placeholder="Lead First name"     id="ActFname"    name="actfname"   class="moviedetails" autocomplete="off">
            <input type="text" placeholder="Lead Last name"      id="ActLname"    name="actlname"   class="moviedetails" autocomplete="off"><br>

            <button type="submit" onclick="">submit</button>
            <button type="submit" onclick="">submit & <br> add to my list</button>

        </form>
            
        </div>
    
    
    
    
    </body>
    
</html>