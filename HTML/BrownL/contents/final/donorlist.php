<!DOCTYPE html>
<html>
<head>
	<title>Donor List</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="../../../../css/bulma/css/bulma.css">
</head>
<body>
        <?php require "navbar.php"; ?>
        <div class = container>
<?php
	//Connect to MySQL
	require "server.php";
	//Create connection
	$conn = mysqli_connect($servername, $username, $password, $dbname);
	
	//Check connection
	if (!$conn) {
		die("Connection failed: " . mysqli_connect_error());
	}

	//example variables and posts from a form

//Display all golfers
	$sql = "SELECT TS.strFirstName as strSponsorFirst, TS.strLastName as strSponsorLast, TG.strFirstName as strGolferFirst, TG.strLastName as strGolferLast, TEGS.monPledgeAmount as monDonation FROM TSponsors as TS JOIN TEventGolferSponsors as TEGS on TS.intSponsorID = TEGS.intSponsorID JOIN TEventGolfers as TEG on TEGS.intEventGolferID = TEG.intEventGolferID JOIN TGolfers as TG on TEG.intGolferID = TG.intGolferID WHERE TEG.intGolferID =" . $_GET['ID'];
	$golfer = mysqli_query($conn, "SELECT strFirstName, strLastName FROM TGolfers WHERE intGolferID = " . $_GET['ID'])->fetch_assoc();

	if($result = mysqli_query($conn, $sql)){
		if(mysqli_num_rows($result) > 0){
			echo "<table class='table'>";
			echo "<th>Sponsors for ". $golfer['strFirstName'] . " " . $golfer['strLastName'] . "</th>";
				echo "<tr>";
				echo "<th>First Name</th>";
				echo "<th>Last Name</th>";
				echo "<th>Donation</th>";
            echo "</tr>";
        while($row = mysqli_fetch_array($result)){
            echo "<tr class='content'>";
                echo "<td>" . $row['strSponsorFirst'] . "</td>";
                echo "<td>" . $row['strSponsorLast'] . "</td>";
                echo "<td>$" . $row['monDonation'] . "</td>";
            echo "</tr>";
        }
        echo "</table>";
		
        // Free result set
        mysqli_free_result($result);
    } else{
        echo "No records matching your query were found.";
    }
} else{
    echo "ERROR: $sql. " . mysqli_error($conn);
}
    ?>
    <a href="golferstats.php"><button class="button">Go Back</button></a>
</div>
</body>
</html>