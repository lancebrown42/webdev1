<!DOCTYPE html>
<html>
<head>
	<title>Golfer Details</title>
	<meta charset="utf-8">
</head>
<body>
	
<?php
	//Connect to MySQL
	$servername = "mc-itddb-12-e-1";
	$username = "lbrown11";
	$password = "0671312";
	$dbname = "WAPP1BrownL";
	
	//Create connection
	$conn = mysqli_connect($servername, $username, $password, $dbname);
	
	//Check connection
	if (!$conn) {
		die("Connection failed: " . mysqli_connect_error());
	}

	//example variables and posts from a form

//Display all golfers
	$sql = "SELECT * FROM TGolfers JOIN TStates on TGolfers.intStateID = TStates.intStateID JOIN TGenders on TGolfers.intGenderID = TGenders.intGenderID JOIN TShirtSizes on TGolfers.intShirtSizeID = TShirtSizes.intShirtSizeID";
	if($result = mysqli_query($conn, $sql)){
		if(mysqli_num_rows($result) > 0){
			echo "<table border=1>";
				echo "<tr>";
				echo "<th>Golfer</th>";
				echo "<th>First Name</th>";
				echo "<th>Last Name</th>";
				echo "<th>Address</th>";
				echo "<th>City</th>";
				echo "<th>State</th>";
				echo "<th>Zip Code</th>";
				echo "<th>Phone</th>";
				echo "<th>Email</th>";
				echo "<th>Shirt Size</th>";
				echo "<th>Gender</th>";
            echo "</tr>";
        while($row = mysqli_fetch_array($result)){
            echo "<tr>";
            	echo "<td><a href='updateplayer.php?ID=" . $row['intGolferID'] . "'>". $row['intGolferID'] . "</td>";
                echo "<td>" . $row['strFirstName'] . "</td>";
                echo "<td>" . $row['strLastName'] . "</td>";
                echo "<td>" . $row['strStreetAddress'] . "</td>";
				echo "<td>" . $row['strCity'] . "</td>";
				echo "<td>" . $row['strState'] . "</td>";
				echo "<td>" . $row['strZip'] . "</td>";
				echo "<td>" . $row['strPhoneNumber'] . "</td>";
				echo "<td>" . $row['strEmail'] . "</td>";
				echo "<td>" . $row['strShirtSizeDesc'] . "</td>";
				echo "<td>" . $row['strGenderDesc'] . "</td>";
				echo "<td><a href='donate.php?ID=" . $row['intGolferID'] . "'><button>Donate now</button></a></td>";
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
    <a href="Assignment12.php"><button>Go Back</button></a>
</body>
</html>

