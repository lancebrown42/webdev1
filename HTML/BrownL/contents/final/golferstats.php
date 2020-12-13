<!DOCTYPE html>
<html>
<head>
	<title>Golfer Details</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="../../../../css/bulma/css/bulma.css">
</head>
<body>
        <?php require "navbar.php"; ?>
        <div class = "container">
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
	$sql = "SELECT * FROM vgolferstats;";
	// $sql = "SELECT * FROM TGolfers JOIN TStates on TGolfers.intStateID = TStates.intStateID JOIN TGenders on TGolfers.intGenderID = TGenders.intGenderID JOIN TShirtSizes on TGolfers.intShirtSizeID = TShirtSizes.intShirtSizeID";
	if($result = mysqli_query($conn, $sql)){
		if(mysqli_num_rows($result) > 0){
			echo "<table class='table'>";
				echo "<tr>";
				echo "<th>Golfer</th>";
				echo "<th>Team</th>";
				echo "<th>First Name</th>";
				echo "<th>Last Name</th>";
				echo "<th>Amount Raised</th>";

            echo "</tr>";
        while($row = mysqli_fetch_array($result)){
        	$teamquery = $conn->query("SELECT * from vGetTeam where intGolferID =" . $row['intGolferID'] )->fetch_assoc();
        	// if($teamquery){
        	// 	$donation = $teamquery['monDonations'];
	            if($row['monDonations'] > 1000){
	            	echo "<tr class='content has-text-danger has-text-weight-bold'>";
	            }else{

	            echo "<tr class='content'>";
	            }
        	// }else{
        		// $teamquery = $conn->query("SELECT strTeamandClubDesc as strTeam, strGender, strLevel from vgetteam where intGolferID =" . $row['intGolferID'] )->fetch_assoc();
        		// $donation = 0;
        		// echo "<tr class='content'>";
        	// }
            	echo "<td>" . $row['intGolferID'] . "</td>";
            	echo "<td>" . $teamquery['strGender'] . " " . $teamquery['strLevel'] . " " . $teamquery['strTeamandClubDesc'] . "</td>";
                echo "<td>" . $row['strFirstName'] . "</td>";
                echo "<td>" . $row['strLastName'] . "</td>";
                echo "<td>$" . $row['monDonations'] . "</td>";
				echo "<td><a href='donorlist.php?ID=" . $row['intGolferID']  . "'><button class='button is-primary'>Donor List</button></a></td>";
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
    <a href="Final.php"><button class = "button">Go Back</button></a>
</div>
</body>
</html>

