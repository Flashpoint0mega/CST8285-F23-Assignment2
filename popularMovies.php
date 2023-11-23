<?php

    # connect
    include 'connectToDb.php';
    $conn = OpenCon();

    # control statement needs to be removed
    echo "Connected Successfully";


    # the only action availible from this screen is ADD
    $_SESSION["myaction"] = "ADD";

    if(isset($_SESSION["myuser"])){
        $currentUser = $_SESSION["myuser"];
    } else {
        $currentUser = "";
    }
    
    # get userid from username and save it into sesion - needed on other pages
    if(isset($_SESSION["userID"])){
        $_SESSION["userID"];
    } else {
        
    }
    
    
    displayMovies($result, $currentUser, $conn);
    
    CloseCon($conn);

    # selects updated userlist of movies and displayes it as listbox 
    function displayMovies(&$result, $currentUser, $conn)
    {

        #prepare sql select statement
        $sql = "select movie.movieID, title, yearCreated, length, concat(firstname,' ',lastname) as director, ratingName, genre_name from movie 
        left outer join director on movie.directorID = director.directorID 
        left outer join rating on movie.ratingID = rating.ratingID 
        left outer join genre on movie.genreID = genre.genreID";

        # execute sql
        $result = $conn->query($sql);

        # check result of execution
        if (!$result) 
        {
            # control statement needs to be replaced with better message
            echo "Error: " . $conn->error;
        } else 
        {
            # declaring form with action and creating listbox
            echo "<form action='SaveSelections.php' method='post'>";

            #  if any records returned, create listbox
            if ($result->num_rows > 0) {
                # header - replace if necessary
                echo "<h1>Users List of Movies</h1>";

                # declare listbox as multi select
                echo "<select multiple='multiple' name='lstBox1[]' id='lstBox1' class='form-control'>";

                # loop through returned records and generate items for listbox 
                while ($row = $result->fetch_assoc()) {
                    echo "<option value={$row['movieID']}>{$row['title']} ({$row['yearCreated']}) - Directed by {$row['director']}, Length: {$row['length']} minutes, Genre: {$row['genre_name']}, Rating: {$row['ratingName']}</option>";
                }
                echo "</select>";

                #button
                echo "<br><input value='Add' type='Submit' />";
            } else {

                # replace with better message
                echo "No movies found";
                echo "<br><a href='Index.php'>Go Back</a>";
            }

            # end of form
            echo "</form>";
        }
    }

?>