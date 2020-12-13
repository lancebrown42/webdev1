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
        <link rel="stylesheet" type="text/css" href="../../../../css/bulma/css/bulma.css">
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
            
            //Check connection
            
            $event = (($conn->query("SELECT intEventID, intEventYear FROM TEvents"))->fetch_assoc());
            $totalDonations = (($conn->query("SELECT SUM(monPledgeAmount) from VGolferSponsors"))->fetch_assoc()["SUM(monPledgeAmount)"]);
            $totalGolfers = (($conn->query("SELECT COUNT(intGolferID) from TGolfers"))->fetch_assoc()["COUNT(intGolferID)"]);
            $states = $conn->query("SELECT intStateID, strState FROM TStates");
            $genders = $conn->query("SELECT intGenderID, strGenderDesc FROM TGenders");
            $shirtsize = $conn->query("SELECT intShirtSizeID, strShirtSizeDesc FROM TShirtSizes");
            $recentSponsors = $conn->query("SELECT * from vRecentSponsors");
        ?>
        <div class="hero is-dark has-text-left is-fullheight-with-navbar">
        	<div class = "hero-body">
        		<div class = "container">
		            <h2 class="title">Event Info</h2>
		            <h3 class="subtitle">Year: <?php echo $event['intEventYear']?></h3>
		            <h4 class="subtitle">Total raised: $<?php echo $totalDonations?></h4>
		            <h4 class="subtitle">Top Donations Team:</h4>
		            <h4 class="subtitle">Total golfers: <?php echo $totalGolfers?></h4>
		            <h4 class="subtitle">Latest Donors:
		            </h4>
		            <ul class = "content card is-pulled-left has-text-success-light has-background-grey-dark">
		            	
		            <?php 
		            while($row = mysqli_fetch_array($recentSponsors)){

		            	echo "<li class =''>" . $row['strSponsorFirst'] . " " . $row['strSponsorLast'] . ": $". $row['monDonation'] . " to " . $row['strGolferFirst'] . " " . $row['strGolferLast'] . "</li>";

		            		
		            }
		            	?>
		            </ul>
	            	
        		</div>
        	</div>
        </div>
    </body>
</html>