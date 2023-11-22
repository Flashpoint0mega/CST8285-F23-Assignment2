<?php
session_start();
if (isset($_SESSION["myuser"])) { //if user is not logged in, they can't access this page
    
} else {
    $_SESSION["error"]="Please sign in to access your list";
    header("location: SignIn.php"); //sends them to the sign in page and it will display the message shown above
}
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Movie List</title>
        <meta name="author" content="Sebastian Deslauriers">
        <!--css used-->
        <link rel="stylesheet" href="style.css">
        <link rel="stylesheet" href="styleList.css"> 
    </head>

    <body>
    <?php //gets the cradentials for the database then connects to the database
    require_once('db_credentials.php');
    require_once('database.php');

    $db = db_connect();
    
    ?>
        <header>
            
            
            <p id="sitename"><a href="Index.php">Site Name</a></p>
            <div class="sidebutton">
                <p id="ulist"><a href="UserList.php"> My Movie List </a></p>
                <p id="signbutt"><a href="SignIn.php"> <?php if (isset($_SESSION["myuser"])) {
                    //if user is logged in changes the sign in button to show their username, will change this to the log in button during finalization
                    echo $_SESSION["myuser"] ; //'myuser' is the variable name for the users name and credentials
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
            <?php //querry to get all the movies user has added to their list
            $sql = "SELECT movie.movieID, movie.title, movie.yearCreated, movie.Length, genre.genre_name, concat(director.firstName, ' ', director.lastName) AS director, user.username FROM movie_genre JOIN movie ON movie_genre.movieID = movie.movieID JOIN genre ON movie_genre.GenreID = genre.GenreID JOIN movie_director ON movie.movieID = movie_director.movieID JOIN director ON movie_director.directorID = director.directorID JOIN movieuser ON movie.movieID = movieuser.movieID JOIN user ON movieuser.userID = user.userID WHERE user.username = '$_SESSION[myuser]' ";
            $result_set = mysqli_query($db,$sql);
            ?>

<table>
                <tr class="movierow">
                    <th></th>
                    <th>Title</th>
                    <th>Year of Release</th>
                    <th>Length</th>
                    <th>Genre</th>
                    <th>Director</th>
                    <th>Rating</th>
                <tr>
            <?php while($results = mysqli_fetch_assoc($result_set)) { ?>  <!-- while there are results, write this code -->
                <tr class="movierow">
                    <!-- puts the movieID as the link to the poster so we can use the same numbering sceme for every photo -->
                    <td><img src="posters/<?php echo $results['movieID']; ?>.png"></td> 
                    <td><?php echo $results['title']; ?></td>
                    <td><?php echo $results['yearCreated']; ?></td>
                    <td><?php echo $results['Length']; ?> minutes</td>
                    <td><?php echo $results['genre_name']; ?></td>
                    <td><?php echo $results['director']; ?></td>
                    <td>NULL</td>
                </tr>
                       
            <?php } ?>
            </table>
        </div>
    
    
    
    
    
    
    </body>
    
</html>