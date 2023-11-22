<?php
session_start();
$_SESSION["error"]="";
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Welcome</title>
        <!--css used-->
        <link rel="stylesheet" href="style.css">
        <link rel="stylesheet" href="styleIndex.css"> 
    </head>
    
    <body>
    <?php
    require_once('db_credentials.php');
    require_once('database.php');

    $db = db_connect();
    
    ?>
    <?php
        if(array_key_exists('button1', $_POST)) { 
            button1(); 
        }
        function button1() { 
            session_destroy();
            header("location: Index.php");
        } 
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
        <div id="popularwrap">
            <h1>temp popular</h1>   
            <form method="POST">
            <input type="submit" name="button1"
                class="button" value="logout" /> 

            <?php
            $sql = "SELECT * FROM movie ";
            $sql .= "ORDER BY movieID";
            $result_set = mysqli_query($db,$sql);
            ?>

            <table>
                <tr>
                    
                    <th>Title</th>
                    <th>Year of Release</th>
                    <th>Length</th>
                <tr>
            <?php while($results = mysqli_fetch_assoc($result_set)) { ?> 
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