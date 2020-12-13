<!DOCTYPE html>
<html>
<head>
	<title>Team Details</title>
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
	$sql = "SELECT * FROM vTeamStats;";
	if($result = mysqli_query($conn, $sql)){
		if(mysqli_num_rows($result) > 0){
			echo "<table class='table'>";
				echo "<tr>";
				echo "<th>Team</th>";
				echo "<th>Amount Raised</th>";

            echo "</tr>";
        while($row = mysqli_fetch_array($result)){
	            if($row['monDonations'] > 2000){
	            	echo "<tr class='content has-text-danger has-text-weight-bold'>";
	            }else{

	            echo "<tr class='content'>";
	            }

            	echo "<td>" . $row['strGender'] . " " . $row['strLevel'] . " " . $row['strTeam'] . "</td>";
                echo "<td>$" . $row['monDonations'] . "</td>";
				echo "<td><a href='teamdonorlist.php?ID=" . $row['intTeamID']  . "'><button class='button is-primary'>Donor List</button></a></td>";
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

