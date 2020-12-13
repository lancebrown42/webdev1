<!DOCTYPE html>
<html>
    <head>
        <title>Corporate Sponsorship Management</title>

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
        $available = "SELECT * from vAvailableCorporateSponsorships where intAvailable > 0 ORDER BY monTypeCost DESC";
        $result = $conn->query($available);
        ?><div class="has-text-centered">
                <p class="hero title is-success">Available Sponsorships</p>
            <div class="section">
            	<div class="columns is-centered">
            		<div class="column is-half">
                <table class="table">
                	<thead>
                		<th>Type of Sponsorship</th>
                		<th>Cost</th>
                		<th>Qty Available</th>
                	</thead>
                	<tbody>
                		<?php while($row = $result->fetch_assoc()){
                			echo "<tr>";
                			echo "<td>".$row['strType']."</td>";
                			echo "<td>$".$row['monTypeCost']."</td>";
                			echo "<td>".$row['intAvailable']."</td>";
                			echo "</tr>";
                			

                	}?>
                	</tbody>
                </table>
                </div>
            </div>
            <div class="columns is-centered">
            	<div class="column is-half">
                <a href="addcorporate.php" class="button is-success">Reserve Now</a>
            </div>
        </div>
        </div>
        </div>
    </body>
</html>