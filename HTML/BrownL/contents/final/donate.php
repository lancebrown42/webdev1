<!DOCTYPE html>
<html>
<head>
	<title>Donate</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="../../../../css/bulma/css/bulma.css">
</head>
<body>
        <?php require "navbar.php"; ?>
	<?php
            ini_set('display_errors', 1);
            ini_set('display_startup_errors', 1);
            error_reporting(E_ALL);
            //Connect to MySQL
            require "server.php";

            // Create connection
            $conn = new mysqli($servername, $username, $password, $dbname);
            // Check connection
            if ($conn->connect_error) {
              die("Connection failed: " . $conn->connect_error);
            } 

			$sql = "SELECT * FROM TGolfers";
			if($result = mysqli_query($conn, $sql)){
                $golfer = mysqli_fetch_array($result);
                
                $txtName =  $golfer["strFirstName"] . " " . $golfer["strLastName"];
                $txtAddress =  $golfer["strStreetAddress"];
                $txtCity = $golfer["strCity"];
                $intState = $golfer["intStateID"];
                $txtZip = $golfer["strZip"];
                $txtPhone = $golfer["strPhoneNumber"];
                $txtEmail = $golfer["strEmail"];
                $intShirtSize = $golfer["intShirtSizeID"];
                // $team = $conn->query("SELECT TEGT.intTeamandgolferID, TEG.intEventGolferID, TEG.intGolferID, TG.intGolferID FROM TEventGolferTeamandCLubs as TEGT JOIN TEventGolfers as TEG on TEGT.intEventGolferID = TEG.intEventGolferID JOIN TGolfers as TG on TEG.intGolferID = TG.intGolferID WHERE TG.intGolferID =" . $_GET['ID']);
                $intGender = $golfer["intGenderID"];
                $strFirstName = explode(' ', $txtName)[0];
                $strLastName = explode(' ', $txtName)[1];
                
                $states = $conn->query("SELECT intStateID, strState FROM TStates");
                $genders = $conn->query("SELECT intGenderID, strGenderDesc FROM TGenders");
                $shirtsize = $conn->query("SELECT intShirtSizeID, strShirtSizeDesc FROM TShirtSizes");
                $teams = $conn->query("SELECT intTypeOfTeamID, strTypeOfTeamDesc FROM TTypeofTeams");
                $golfers = $conn->query("SELECT * FROM TGolfers");
                $paymenttype = $conn->query("SELECT * FROM TPaymentTypes");
        }
            
        ?>

		<form class="form container" action="process_donation.php?d=<?php echo time();?>" method="post">
            <table>
                <tr>
                    <td>
                        <label for="txtName">Name:</label>
                    </td>
                    <td>
                        <input type="text" name="txtName" required>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="txtAddress">Address:</label>
                    </td>
                    <td>
                        <input type="text" name="txtAddress" required>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="txtCity">City:</label>
                    </td>
                    <td>
                        <input type="text" name="txtCity" required>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="txtState">State:</label>
                    </td>
                    <td>
                        <select name="txtState" required>
                            <option hidden disabled selected value> -- Select a State -- </option>
                            <?php
                                while($rows = $states->fetch_assoc()){
                                    $state_name = $rows['strState'];
                                    $state_key = $rows['intStateID'];
                                    echo"<option value='$state_key'>$state_name</option>";
                                }
                                ?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="txtZip">Zip:</label>
                    </td>
                    <td>
                        <input type="number" step="0" name="txtZip" min="00501" max="99950" required>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="txtPhone">Phone:</label>
                    </td>
                    <td>
                        <input type="tel" name="txtPhone" required>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="txtEmail">Email:</label>
                    </td>
                    <td>
                        <input type="email" name="txtEmail" required>
                    </td>
                </tr>
                <tr>
                	
                </tr>
                <tr>
                	<td>
                		<label for="txtGolfers">Golfer to sponsor:</label>
                	</td>
                	<td>
                		<select name="txtGolfers" required>
                			<option hidden disabled selected value> -- Select a Golfer -- </option>
                			<?php
                				while($rows = $golfers->fetch_assoc()){
                					$golfer_name = $rows['strFirstName'] . " " . $rows["strLastName"];
                					$golfer_key = $rows['intGolferID'];
                					echo"<option value='$golfer_key'>$golfer_name</option>";
                				}
                				?>
                		</select>
                	</td>
                </tr>
                <tr>
                	<td>
                		<label for="txtDonation">Donation amount:</label>
                	</td>
                	<td>
                		<input type="number" name="txtDonation" step="0.01" required>
                	</td>
                	<td>
                		<label for="txtPaymentType">Payment Method:</label>
                	</td>
                	<td>
                		<select name="txtPaymentType" required>
                			<option hidden disabled selected value> -- Select Payment Type -- </option>
                			<?php
                			while($rows = $paymenttype->fetch_assoc()){
                				$payment_name = $rows['strPaymentTypeDesc'];
                				$payment_key = $rows['intPaymentTypeID'];
                				echo "<option value='$payment_key'>$payment_name</option>";
                			}
                			?>
                		</select>
                	</td>
                </tr>
                <tr>
                	<td>
                		<input type="submit" name="submit" value="DONATE NOW">
                	</td>
                	<td>
                		<input type="reset" name="clear" value="Clear">
                	</td>
                </tr>
	</body>
	</html>