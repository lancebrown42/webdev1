<html>
<body>
<table border=1>
	<tr>
		<td><a href="Assignment11.php">Add a new Golfer</a></td>
</table>

<br>
<?php
	//Connect to MySQL
	$servername = "itd1.cincinnatistate.edu";
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
	$txtName =  $_POST["txtName"];
	$txtAddress =  $_POST["txtAddress"];
	$txtCity = $_POST["txtCity"];
	$intState = $_POST["txtState"];
	$txtZip = $_POST["txtZip"];
	$txtPhone = $_POST["txtPhone"];
	$txtEmail = $_POST["txtEmail"];
	$intShirtSize = $_POST["txtShirtSize"];
	$intGender = $_POST["txtGender"];
	

	$strFirstName = explode(' ', $txtName)[0];
	$strLastName = explode(' ', $txtName)[1];
	
	
	//Insert information to database
	$insertGolfer = "INSERT INTO Customers (strFirstName, strLastName, strStreetAddress, strCity, intStateID, strZip, strPhoneNumber, strEmail, intShirtSizeID, intGenderID)
	VALUES ('$txtFirstName', '$txtLastName', '$txtAddress', '$txtCity', '$intStateID', '$txtZip', '$txtPhone', '$txtEmail', '$intShirtSize', '$intGender')";
	
	//Confirm record insertions
	if (mysqli_query($conn, $insertGolfer)) {
		echo "";
	} else {
		echo "Error: " . $insertGolfer . "<br>" . mysqli_error($conn);
	}
	
	
	
	
	//Display all custs
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
                echo "<td>" . $row['strFirstName'] . "</td>";
                echo "<td>" . $row['strLastName'] . "</td>";
                echo "<td>" . $row['strStreetAddress'] . "</td>";
				echo "<td>" . $row['strCity'] . "</td>";
				echo "<td>" . $row['strState'] . "</td>";
				echo "<td>" . $row['strZip'] . "</td>";
				echo "<td>" . $row['strPhone'] . "</td>";
				echo "<td>" . $row['strEmail'] . "</td>";
				echo "<td>" . $row['strShirtSizeDesc'] . "</td>";
				echo "<td>" . $row['strGenderDesc'] . "</td>";
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
 
// Close connection
mysqli_close($conn);
?>
</body>
</html>