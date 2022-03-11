<!-- 
    Emily Ren Jackson
    COMP333
    Homework 2, 1.b
    index.php

    retrieve: enter a username and return all songs rated with rating 
    registration: ability to register a new user intot he music db users table

--> 

<!-- musicdb_new_user.php, registers a new user into users table --> 
<!DOCTYPE HTML>
<html lang="en">
    <head>
        <title>User Registration</title>
    </head>

<body> 
    <h1 style="text-align:center">
        Music Rater: Registration
    </h1>
    <div style="text-align:center">
    <hr size="8" width="90%" color="blue">  
        Register to Music Rater to start rating songs!
        <hr size="8" width="90%" color="blue">  
    </div>
    <!-- 
        PHP code
    --> 
    <dive style="text-align:center">
    <?php 
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "music_db";

        $conn = new mysqli($servername, $username, $password, $dbname);

        if ($conn->connect_error){
            die("Connection Failed: " . $conn->connect_error);
        }

        // get an input to register
        if(isset($_REQUEST["submit"])){
            $out_value = "";
            $s_u = $_REQUEST['username'];
            $s_p = $_REQUEST['_password'];

        $sql = "INSERT INTO users (username, _password)
            VALUES ('$s_u', '$s_p')";

        if (mysqli_query($conn, $sql)) {
            $out_value = "New user registered successfully";
        } else {
            $out_value = "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
        }
        $conn->close();
    ?> 

    <form method="GET" action="">
    <!-- username input box --> 
    Username: <input type="text" name="username" placeholder="username" /><br> 
    <!-- password input box -->
    Password: <input type="text" name="_password" placeholder="password" /><br> 
    <!-- submit button --> 
    <input type="submit" name="submit" value="Register"/>
    </form>

    <p><?php
    if(!empty($out_value)){
        echo $out_value;
    }
    ?></p>
    </div>

</body>
</html>

<!-- musicdb_ratings.php, outputs songs rated by a given user --> 
<!DOCTYPE HTML>
<html lang="en">
    <head>
        <title>Music db User Ratings</title>
    </head>
    <style>

    </style>

<body> 
    <h1 style="text-align:center">
        Music Rater: Ratings
    </h1>
    <div style="text-align:center">
    <hr size="8" width="90%" color="red">  
        Look up a user to see the ratings they have submited!
        <hr size="8" width="90%" color="red">  
    </div>
    <!-- 
        PHP code
    --> 
    <div style="text-align:center">
    <?php 
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "music_db";

        $conn = new mysqli($servername, $username, $password, $dbname);

        if ($conn->connect_error){
            die("Connection Failed: " . $conn->connect_error);
        }

        // "submit" comes from line 53, <input ... name="submit".../> 
        if(isset($_REQUEST["retrieve"])){
            $out_value = "";
            $s_u = $_REQUEST['username'];

        if (!empty($s_u)){
            $sql_query = "SELECT * FROM ratings_table WHERE username = ('$s_u')";
            $result = mysqli_query($conn, $sql_query);

            while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                $out_value = $out_value . $row['song'] . " --> " . $row['rating'] . "\n";
            }
        }   
        else{
            $out_value = "No registered user";
        }
        }
        $conn->close();
    ?> 

    <form method="GET" action="">
    <!-- username input box --> 
    Username: <input type="text" name="username" placeholder="username" /><br> 
    <!-- submit button --> 
    <input type="submit" name="retrieve" value="Submit"/>

  <p><?php
    if(!empty($out_value)){
        echo $out_value;
    } else {
        echo "No songs rated";
    }
    ?></p>
    </div>

    </form>
</body>
</html>