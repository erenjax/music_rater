<!-- 
    Emily Ren Jackson
    COMP333
    Homework 2, 1.b

    retrieve: enter a username and return all songs rated with rating 

    Working Notes:
        - currently works, however, for amelia-earhart is only returns the first song
            as opposed to all three songs she has submited in the table 
        - if user not registered, get an error instead of printing an error message

-->

<!DOCTYPE HTML>
<html lang="en">
    <head>
        <title>Music db User Ratings</title>
        </head>

<body> 
    <!-- 
        PHP code
    --> 
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
            //$s_p = $_REQUEST['_password'];

        if (!empty($s_u)){
            // && !empty($s_p)
            $sql_query = "SELECT * FROM ratings_table WHERE username = ('$s_u')";

            $result = mysqli_query($conn, $sql_query);

            $row = mysqli_fetch_assoc($result);
            $out_value = $row['song'] . " --> " . $row['rating'];
        }
        else{
            $out_value = "User not registered";
        }
        }
        $conn->close();
    ?> 

    <form method="GET" action="">
    <!-- username input box --> 
    Username: <input type="text" name="username" placeholder="username" /><br> 
    <!-- password input box 
    Password: <input type="text" name="_password" placeholder="password" /><br> 
    --> 
    <!-- submit button --> 
    <input type="submit" name="retrieve" value="Submit"/>

  <p><?php
    if(!empty($out_value)){
        echo $out_value;
    }
    ?></p>

    </form>
</body>
</html>