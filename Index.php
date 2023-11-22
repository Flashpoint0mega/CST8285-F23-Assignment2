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
        <div id="popularwrap"> 
            <!-- this part has the "currently popular movies" which is a arbirtary set of movies just for show right now -->
            <h1>temp popular</h1>   
            <form method="POST">
            <!-- logout button -->
            <input type="submit" name="button1" class="button" value="logout" /> 

            <?php //getss all the movies in the movie table of the database, will make this more specific later
            $sql = "SELECT * FROM movie ";
            $sql .= "ORDER BY movieID";
            $result_set = mysqli_query($db,$sql); //uses the querry with the databse and store the result
            ?>

            <table>
                <tr>
                    
                    <th>Title</th>
                    <th>Year of Release</th>
                    <th>Length</th>
                <tr>
            <?php while($results = mysqli_fetch_assoc($result_set)) { ?>  <!-- while there are results, write this code -->
                <tr>
                    
                    <td><?php echo $results['title']; ?></td>
                    <td><?php echo $results['yearCreated']; ?></td>
                    <td><?php echo $results['length']; ?> minutes</td>
                </tr>
                       
            <?php } ?>
            </table>


        </div>
    
    
    
    
    </body> 

</html>