<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Movie List</title>
        <!--css used-->
        <link rel="stylesheet" href="style.css">
        <link rel="stylesheet" href="styleList.css"> 
    </head>

    <body>
    <?php
    require_once('db_credentials.php');
    require_once('database.php');

    $db = db_connect();
    
    ?>
        <header>
            
            
            <p id="sitename"><a href="Index.php">Site Name</a></p>
            <div class="sidebutton">
                <p id="ulist"><a href="UserList.php"> My Movie List </a></p>
                <p id="signbutt"><a href="SignIn.php"> <?php if (isset($_SESSION["myuser"])) {
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
            <h1>temp List</h1>
            <?php
            $sql = "SELECT movie.title, movie.yearCreated, movie.length, user.username FROM movieuser JOIN movie ON movieuser.movieID = movie.movieID JOIN user ON movieuser.userID = user.userID WHERE user.username = '$_SESSION[myuser]' ";
            $result_set = mysqli_query($db,$sql);
            ?>

            <table>
                 
                <tr>
                    <th>Movie Title</th>
                    <th>Year of Release</th>
                    <th>Movie length</th>
            <?php while($results = mysqli_fetch_assoc($result_set)) { ?>        
                <tr>
                    <td><?php echo $results['title']; ?></td>
                    <td><?php echo $results['yearCreated']; ?></td>
                    <td><?php echo $results['length']; ?> Minutes</td>
                <tr>
                    
                    
                </tr>
                       
            <?php } ?>
            </table>
        </div>
    
    
    
    
    
    
    </body>
    
</html>