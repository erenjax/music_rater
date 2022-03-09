<!-- 
    Emily Ren Jackson 
    COMP 333 
    Homework 2, 1.b

    registration: ability to register a new user intot he music db users table
    WORKS!!!!!!

--> 

<!DOCTYPE HTML>
<html lang="en">
    <head>
        <title>User Registration</title>
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

</body>
</html>