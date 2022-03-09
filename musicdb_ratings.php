<!-- 
    Emily Ren Jackson
    COMP333
    Homework 2, 1.b

    retrieve: enter a username and return all songs rated with rating 
    WORKS!!!

        Working Notes:
        - outputs all songs under one user in a line (need to add line breaks)

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

    </form>
</body>
</html>