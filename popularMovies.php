<?php
    include 'connectToDb.php';
    $conn = OpenCon();
    echo "Connected Successfully";

    session_start();
    $currentUserID = 1;

    $_SESSION['userID'] = $currentUserID;
    $_SESSION['action'] = "ADD";
  

    $sql = "select movie.movieID, title, yearCreated, length, concat(firstname,' ',lastname) as director, ratingName, genre_name from movie 
    left outer join director on movie.directorID = director.directorID 
    left outer join rating on movie.ratingID = rating.ratingID 
    left outer join genre on movie.genreID = genre.genreID";
    

    $result = $conn->query($sql);

     if (!$result) {
        echo "Error: " . $conn->error;
    } else {
        // Process the result
        echo "<form action='SaveSelections.php' method='post'>";
        if ($result->num_rows > 0) {
            echo "<h1>All Movies</h1>";
            echo "<select multiple='multiple' name='lstBox1[]' id='lstBox1' class='form-control'>";

            while ($row = $result->fetch_assoc()) {
                echo "<option value={$row['movieID']}>{$row['title']} ({$row['yearCreated']}) - Directed by {$row['director']}, Length: {$row['length']} minutes, Genre: {$row['genre_name']}, Rating: {$row['ratingName']}</option>";
            }
            echo "</select>";

            echo "<input value='Add' type='Submit' />";
        } else {
            echo "No movies found";
        }
        echo "</form>";
    }
    CloseCon($conn);
?>
