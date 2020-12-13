<!DOCTYPE html>
<html>
<head>
	<title>Add Corporate Sponsor</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="../../../../css/bulma/css/bulma.css">
</head>
<body>
        <?php require "adminnavbar.php"; ?>
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
                
                $states = $conn->query("SELECT intStateID, strState FROM TStates");
                $genders = $conn->query("SELECT intGenderID, strGenderDesc FROM TGenders");
                $sponsorshiptype = $conn->query("SELECT * from vAvailableCorporateSponsorships");

        
            
        ?>
        <div class="section">
		<form class="form container" action="process_corporate.php?d=<?php echo time();?>" method="post">
            <table>
                <tr>
                    <td>
                        <label for="txtCompany">Comapny Name:</label>
                    </td>
                    <td>
                        <input type="text" name="txtCompany" required>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="txtName">Contact Name:</label>
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
                <tr>
                    <td>
                        <label for="txtSponsorshipType">Sponsorship Type</label>
                    </td>
                    <td>
                        <select name="txtSponsorshipType" required>
                            <option hidden disabled selected value> -- Select a Sponsorship Type -- </option>
                            <?php
                                while($rows = $sponsorshiptype->fetch_assoc()){
                                    $type_name = $rows['strType'] . " - $" . $rows["monTypeCost"];
                                    $type_key = $rows['intEventSponsorTypeID'];
                                    echo"<option value='$type_key'>$type_name</option>";
                                }
                                ?>
                            
                        </select>
                    </td>
                </tr>	
                
                <tr>
                	<td>
                		<input type="submit" name="submit" class="button is-submit" value="Sponsor Us">
                	</td>
                	<td>
                		<input type="reset" name="clear" class="button is-danger" value="Clear">
                	</td>
                </tr>
            </table>
        </form>
    </div>
	</body>
	</html>