<?php

if(!empty($_POST['lstBox1']))
{
    #connect to database
    include 'connectToDb.php';
    $conn = OpenCon();
    echo "Connected Successfully";
    session_start();

	#for ($i=0; $i < count($_POST['lstBox1']);$i++) {
     #   $delimit = "";
     #   if($i>0)  $delimit = ",";
	#	echo $delimit . $_POST['lstBox1'][$i];
	#}


    $currentUser = $_SESSION['userID'];
    $currentAction = $_SESSION['action'];


    echo "<br>" . $currentUser . "  " . $currentAction;

    if ( $currentAction == "ADD")
    {

       
        


        $insertPart = "";
        for ($i=0; $i < count($_POST['lstBox1']);$i++) 
        {
            if ( $i > 0)
            {
                $insertPart = $insertPart . ",";
            }
            $insertPart = $insertPart . "(" . $_POST['lstBox1'][$i] . "," . $currentUser . ")";
        }

        
        
        $sql = "REPLACE INTO movieuser (movieid,userid) VALUES " . $insertPart;
        echo "sql = " . $sql;

        $result = $conn->query($sql);

        if (!$result) 
        {
            echo "Error: " . $conn->error;
        } else 
        {
            echo "Sucessfully added<br>";


            displayMovies($result, $currentUser, $conn);

        }
    }


    if ( $currentAction == "REMOVE")
    {
        echo "<br><br>REMOVING...";
        $deletePart = "";
        for ($i=0; $i < count($_POST['lstBox1']);$i++) 
        {
            if ( $i > 0)
            {
                $deletePart = $deletePart . " OR ";
            }
            $deletePart = $deletePart . "(userID=" . $currentUser . " and movieid=" . $_POST['lstBox1'][$i] . ")" ;
        }

        $sql = "delete from movieuser where " . $deletePart;

        echo "<br>" . $sql;

        #execute and if successful, display
        $result = $conn->query($sql);
    
        if (!$result) 
        {
            echo "Error: " . $conn->error;
        } else 
        {
            echo "Sucessfully removed<br>";
            displayMovies($result, $currentUser, $conn);
            #show user's movies on the screen
          
        }

    }   
}

function displayMovies(&$result, $currentUser, $conn)
{
    echo "Sucessfully added<br>";

    $sql = "select movie.movieID, title, yearCreated, length, concat(firstname,' ',lastname) as director, ratingName, genre_name from movie 
    left outer join director on movie.directorID = director.directorID 
    left outer join rating on movie.ratingID = rating.ratingID 
    left outer join genre on movie.genreID = genre.genreID
    inner join movieuser on movie.movieID = movieuser.movieID
    where userid = " . $currentUser;
    $result = $conn->query($sql);

    if (!$result) 
    {
        echo "Error: " . $conn->error;
    } else 
    {
        echo "Sucessfully added<br>";



        echo "<form action='SaveSelections.php' method='post'>";
        if ($result->num_rows > 0) {
            echo "<h1>Users List of Movies</h1>";
            echo "<select multiple='multiple' name='lstBox1[]' id='lstBox1' class='form-control'>";

            while ($row = $result->fetch_assoc()) {
                echo "<option value={$row['movieID']}>{$row['title']} ({$row['yearCreated']}) - Directed by {$row['director']}, Length: {$row['length']} minutes, Genre: {$row['genre_name']}, Rating: {$row['ratingName']}</option>";
            }
            echo "</select>";
            $_SESSION['action'] = "REMOVE";
            echo "<input value='Remove' type='Submit' />";
        } else {
            echo "No movies found";
        }
        echo "</form>";
    }
}
?>
