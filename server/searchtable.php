            <?php 
            //written by Sebastian Deslauriers
            require_once('db_credentials.php');
            require_once('database.php');
        
            $db = db_connect();
            //getss all the movies in the movie table of the database, will make this more specific later
            /* old
            $sql = "SELECT * FROM movie ";
            $sql .= "ORDER BY movieID";
            */
            $sql = "select movie.movieID, title, yearCreated, length, concat(firstname,' ',lastname) as director, ratingName, genre_name from movie left outer join director on movie.directorID = director.directorID left outer join rating on movie.ratingID = rating.ratingID left outer join genre on movie.genreID = genre.genreID";
            $sql = $sql . " where title like '%" . $searchParam . "%'";
            $result_set = mysqli_query($db,$sql); //uses the querry with the databse and store the result
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
                    <td><img src="../posters/<?php echo $results['movieID']; ?>.png"></td> 
                    <td><?php echo $results['title']; ?></td>
                    <td><?php echo $results['yearCreated']; ?></td>
                    <td><?php echo $results['length']; ?> minutes</td>
                    <td><?php echo $results['genre_name']; ?></td>
                    <td><?php echo $results['director']; ?></td>
                    <td><?php echo $results['ratingName']; ?></td>
                </tr>
                
            <?php } ?>
            </table>
            <p style="text-decoration: underline;" style="font-weight: bold;">
            <a href="Missing.php">Don't have the movie your looking for?</a></p>