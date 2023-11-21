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
    //$page_title = 'Employee'; ?>
        <header>
            
            
            <p id="sitename"><a href="Index.php">Site Name</a></p>
            <div class="sidebutton">
                <p id="ulist"><a href="UserList.html"> My Movie List </a></p>
                <p id="signbutt"><a href="SignIn.html"> Sign In </a></p>
            </div>
            <div id="searchbar">
                <input type="text" placeholder="Search:" id="search" name="search bar" size="60">
                <p id="searchbutt"><a href="Search.html">🔍</a></p>
            </div>
        </header>
        <div id="popularwrap">
            <h1>temp popular</h1>

            <?php
            $sql = "SELECT * FROM user ";
            $sql .= "ORDER BY userID";
            $result_set = mysqli_query($db,$sql);
            ?>

            <table>
                <tr>
                    <th>userID</th>
                    <th>Name</th>
                    <th>Password</th>
                <tr>
            <?php while($results = mysqli_fetch_assoc($result_set)) { ?> 
                <tr>
                    <td><?php echo $results['userID']; ?></td>
                    <td><?php echo $results['username']; ?></td>
                    <td><?php echo $results['Password']; ?></td>
            </tr>
                       
            <?php } ?>


        </div>
    
    
    
    
    </body> 

</html>