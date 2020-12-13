<html>
<head>
	<title>Corporate Processing</title>
	<link rel="stylesheet" type="text/css" href="../../../../css/bulma/css/bulma.css">
</head>
<body>
        <?php require "adminnavbar.php"; ?>

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
	$txtCompany = $_POST["txtCompany"];
	$txtName =  $_POST["txtName"];
	$txtAddress =  $_POST["txtAddress"];
	$txtCity = $_POST["txtCity"];
	$intState = $_POST["txtState"];
	$txtZip = $_POST["txtZip"];
	$txtPhone = $_POST["txtPhone"];
	$txtEmail = $_POST["txtEmail"];
	$intType = $_POST["txtSponsorshipType"];
	

	$strFirstName = explode(' ', $txtName)[0];
	$strLastName = explode(' ', $txtName)[1];

	
	
	//Insert information to database
	$insertCorporateSponsor = "CALL uspAddCorporateSponsor('$txtCompany', '$strFirstName', '$strLastName', '$txtAddress', '$txtCity', $intState, '$txtZip', '$txtPhone', '$txtEmail', $intType, @outintCorporateSponsorID, @outintEventCorporateSponsorshipTypeCorporateSponsorID, @outintEventCorporateSponsorshipTypeID, @outintAvailable)";

	
	//Confirm record insertions
	$result = mysqli_query($conn, $insertCorporateSponsor);
	if ($result) {


		// $golferID = $result->fetch_array(MYSQLI_ASSOC)['intGolferID'];

		// $insertEventGolfer = "INSERT INTO TEventGolfers (intEventID, intGolferID) VALUES (1, $golferID)";
		// if(mysqli_query($conn, $insertEventGolfer)){
			echo "Thank you, ". $strFirstName . " " . $strLastName . " for your sponsorship.";

		// }else{
		// 	echo "Error: " . $insertEventGolfer . "<br>" . mysqli_error($conn);
		// }
	} else {
		echo "Error: " . $insertCorporateSponsor . "<br>" . mysqli_error($conn);
	}
	
	
	
	

// Close connection
mysqli_close($conn);
?>
</body>
</html>