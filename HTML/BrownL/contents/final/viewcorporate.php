<!DOCTYPE html>
<html>
<head>
	<title>Corporate Donor List</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="../../../../css/bulma/css/bulma.css">
</head>
<body>
        <?php require "adminnavbar.php"; ?>
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
	$sql = "SELECT TCS.strCompanyName as strCompany, TECST.monTypeCost as monTypeCost, TCST.strTypeDescription as strType FROM TCorporateSponsors as TCS JOIN TEventCorporateSponsorshipTypeCorporateSponsors as TECSTCS on TCS.intCorporateSponsorID = TECSTCS.intCorporateSponsorID JOIN TEventCorporateSponsorshipTypes as TECST on TECSTCS.intEventCorporateSponsorshipTypeID = TECST.intEventCorporateSponsorshipTypeID JOIN TCorporateSponsorshipTypes as TCST on TECST.intCorporateSponsorshipTypeID = TCST.intCorporateSponsorshipTypeID";
	$result = $conn->query($sql);
	if($result){?>

	<div class="has-text-centered">
                <p class="hero title is-success">Available Sponsorships</p>
            <div class="section">
            	<div class="columns is-centered">
            		<div class="column is-half">
                <table class="table">
                	<thead>
                		<th>Company</th>
                		<th>Type of Sponsorship</th>
                		<th>Cost</th>
                	</thead>
                	<tbody>
                		<?php while($row = $result->fetch_assoc()){
                			echo "<tr>";
                			echo "<td>".$row['strCompany']."</td>";
                			echo "<td>".$row['strType']."</td>";
                			echo "<td>$".$row['monTypeCost']."</td>";

                			echo "</tr>";
                			

                	}?>
                	</tbody>
                </table>
                </div>
            </div>
            <div class="columns is-centered">
            	<div class="column is-half">
                <a href="addcorporate.php" class="button is-success">Add another</a>
            </div>
        </div>
        </div>
        </div>

	
    <a href="CorporateSponsorMain.php"><button class="button">Go Back</button></a>
</div>
<?php }else{
	echo "Error: " . $result . "<br>" . mysqli_error($conn);
}
?>
</body>
</html>