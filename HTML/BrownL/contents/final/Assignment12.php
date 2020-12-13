<!DOCTYPE html>
<html>
    <head>
        <title>Golfathon</title>
        <!--
        Name: Lance Brown
        Class:  IT-117-400
        Abstract: Homework 12
        Date: 10/20/20
        -->
        <meta charset="utf-8">
    </head>
    <body>
        Name: Lance Brown <br>
        Class: IT-117-400 <br>
        Abstract: Homework 12
        <hr>
        <nav>
            
            <a href="addgolfer.php"><button>Add Golfer</button></a>
            <a href="showgolfers.php"><button>Show Golfers</button></a>
            <a href="donate.php"><button>Donate Now</button></a>
            <a href="golferstats.php"><button>Golfer Statistics</button></a>
            <a href="teamstats.php"><button>Team Statistics</button></a>
        </nav>
        <?php
            ini_set('display_errors', 1);
            ini_set('display_startup_errors', 1);
            error_reporting(E_ALL);
            //Connect to MySQL
            $servername = "mc-itddb-12-e-1";
            $username = "lbrown11";
            $password = "0671312";
            $dbname = "WAPP1BrownL";

            // Create connection
            $conn = new mysqli($servername, $username, $password, $dbname);
            // Check connection
            if ($conn->connect_error) {
              die("Connection failed: " . $conn->connect_error);
            }
            // $conn = mysqli_connect($servername, $username, $password, $dbname);
            
            //Check connection
            
            $event = $conn->query("SELECT intEventYearID, intEventYear FROM TEventYears");
            $states = $conn->query("SELECT intStateID, strState FROM TStates");
            $genders = $conn->query("SELECT intGenderID, strGenderDesc FROM TGenders");
            $shirtsize = $conn->query("SELECT intShirtSizeID, strShirtSizeDesc FROM TShirtSizes");
            
        ?>
        <h1>Event Info</h1>
        <h2><?php </h2>
        
    </body>
</html>