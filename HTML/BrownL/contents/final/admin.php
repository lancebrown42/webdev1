<!DOCTYPE html>
<html>
    <head>
        <title>Login</title>

        <link rel="stylesheet" type="text/css" href="../../../../css/bulma/css/bulma.css">
        <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta charset="utf-8">
    </head>
    <body>
        <?php
        require "navbar.php";
        require "server.php";
        ini_set('display_errors', 1);
        ini_set('display_startup_errors', 1);
        error_reporting(E_ALL);
            //Connect to MySQL


        // Create connection
        $conn = new mysqli($servername, $username, $password, $dbname);
        // Check connection
        if ($conn->connect_error) {
          die("Connection failed: " . $conn->connect_error);
        }
        // $conn = mysqli_connect($servername, $username, $password, $dbname);
        ?>
    </body>
</html>
    