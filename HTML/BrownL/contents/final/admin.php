<!DOCTYPE html>
<html>
    <head>
        <title>Admin</title>

        <link rel="stylesheet" type="text/css" href="../../../../css/bulma/css/bulma.css">
        <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta charset="utf-8">
    </head>
    <body>
        <?php
        require "adminnavbar.php";
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
        <div class="hero is-success">
        <div class="container section">
            <div>
                
            <article class="hero-body">
                <p class="title"> Administration Page</p>
            </article>
            </div>
        </div>
        </div>
    <div class="section has-text-centered">
        <a href="showgolfers.php" class="button is-info is-large is-hoverable">Golfer Management</button></a>
            <a href="CorporateSponsorMain.php" class="button is-large is-info is-hoverable">Corporate Sponsorship Management</a>
    </div>
    </body>
</html>
    