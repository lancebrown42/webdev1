<html>
<head>
	<link rel="stylesheet" type="text/css" href="../../../../css/bulma/css/bulma.css">
</head>
<body>
        <?php require "navbar.php"; ?>
<table border=1>
	<tr>
		<td><a href="addgolfer.php">Add a new Golfer</a></td>
	</tr>
	<tr>
		<td><a href="Final.php">Home</a></td>
	</tr>
</table>

<br>
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
	$txtName =  $_POST["txtName"];
	$txtAddress =  $_POST["txtAddress"];
	$txtCity = $_POST["txtCity"];
	$intState = $_POST["txtState"];
	$txtZip = $_POST["txtZip"];
	$txtPhone = $_POST["txtPhone"];
	$txtEmail = $_POST["txtEmail"];
	$intGolferID = $_POST["txtGolfers"];
	$intPaymentType = $_POST["txtPaymentType"];
	$intDonation = $_POST["txtDonation"];
	

	$strFirstName = explode(' ', $txtName)[0];
	$strLastName = explode(' ', $txtName)[1];

	
	
	//Insert information to database
	$insertSponsor = "CALL uspAddSponsor('$strFirstName', '$strLastName', '$txtAddress', '$txtCity', $intState, '$txtZip', '$txtPhone', '$txtEmail', $intGolferID, $intPaymentType, $intDonation, " . $_GET['d']. ", @outintSponsorID, @outintEventGolferSponsorID, @outintEventGolferID)";

	
	//Confirm record insertions
	$result = mysqli_query($conn, $insertSponsor);
	if ($result) {


		// $golferID = $result->fetch_array(MYSQLI_ASSOC)['intGolferID'];

		// $insertEventGolfer = "INSERT INTO TEventGolfers (intEventID, intGolferID) VALUES (1, $golferID)";
		// if(mysqli_query($conn, $insertEventGolfer)){
			echo "Thank you, ". $strFirstName . " " . $strLastName . " for your donation.";

		// }else{
		// 	echo "Error: " . $insertEventGolfer . "<br>" . mysqli_error($conn);
		// }
	} else {
		echo "Error: " . $insertSponsor . "<br>" . mysqli_error($conn);
	}
	
	
	
	

// Close connection
mysqli_close($conn);
?>
</body>
</html>