<!DOCTYPE html>
<html>
<head>
	<title>Update Golfer</title>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
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

			$sql = "SELECT * FROM TGolfers WHERE intGolferID = " . $_GET["ID"];
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
                $team = $conn->query("SELECT TEGT.intTeamandClubID, TEG.intEventGolferID, TG.intGolferID FROM TEventGolferTeamandCLubs as TEGT JOIN TEventGolfers as TEG on TEGT.intEventGolferID = TEG.intEventGolferID JOIN TGolfers as TG on TEG.intGolferID = TG.intGolferID WHERE TG.intGolferID =" . $_GET['ID'])->fetch_assoc()['intTeamandClubID'];
                $intGender = $golfer["intGenderID"];
                $strFirstName = explode(' ', $txtName)[0];
                $strLastName = explode(' ', $txtName)[1];
                
                $states = $conn->query("SELECT intStateID, strState FROM TStates");
                $genders = $conn->query("SELECT intGenderID, strGenderDesc FROM TGenders");
                $shirtsize = $conn->query("SELECT intShirtSizeID, strShirtSizeDesc FROM TShirtSizes");
                $teams = $conn->query("SELECT TT.strTypeOfTeamDesc, TTC.intTeamandClubID, TG.strGenderDesc, TLT.strLeveldesc FROM TTypeofTeams as TT JOIN TTeamandCLubs as TTC on TT.intTypeOfTeamID = TTC.intTypeOfTeamID JOIN TLevelofTeams as TLT on TTC.intLevelofTeamID = TLT.intLevelofTeamID JOIN TGenders as TG on TTC.intGenderID = TG.intGenderID");
        }
            
        ?>

        <form action="process_updategolfer.php?ID=<?php echo $_GET['ID'];?>" method="post">
            <table>
                <tr>
                    <td>
                        <label for="txtName">Name:</label>
                    </td>
                    <td>
                        <input type="text" name="txtName" value = "<?php echo $txtName;?>" required>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="txtAddress">Address:</label>
                    </td>
                    <td>
                        <input type="text" name="txtAddress" value = "<?php echo $txtAddress;?>"required>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="txtCity">City:</label>
                    </td>
                    <td>
                        <input type="text" name="txtCity" value = "<?php echo $txtCity;?>"required>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="txtState">State:</label>
                    </td>
                    <td>
                        <select name="txtState" required selected value = "<?php echo $intState;?>">
                           
                            <?php
                                while($rows = $states->fetch_assoc()){
                                    $state_name = $rows['strState'];
                                    $state_key = $rows['intStateID'];
                                    if ($state_key == $intState){
                                        echo "<option value='$state_key' selected>$state_name</option>";
                                    }
                                    else{
                                        echo"<option value='$state_key'>$state_name</option>";
                                     }
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
                        <input type="number" step="0" name="txtZip" min="00501" max="99950" value = "<?php echo $txtZip;?>"  required>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="txtPhone">Phone:</label>
                    </td>
                    <td>
                        <input type="tel" name="txtPhone"  value = "<?php echo $txtPhone;?>" required>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="txtEmail">Email:</label>
                    </td>
                    <td>
                        <input type="email" name="txtEmail" value = "<?php echo $txtEmail;?>" required>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="txtShirtSize">Shirt Size:</label>
                    </td>
                    <td>
                        <select name="txtShirtSize" required>
                            <option hidden disabled selected value> -- Select a Shirt Size -- </option>
                            <?php
                                while($rows = $shirtsize->fetch_assoc()){
                                    $shirtsize_name = $rows['strShirtSizeDesc'];
                                    $shirtsize_key = $rows['intShirtSizeID'];
                                    if ($shirtsize_key == $intShirtSize){
                                        echo "<option value='$shirtsize_key' selected>$shirtsize_name</option>";
                                    }
                                    else{
                                        echo"<option value='$shirtsize_key'>$shirtsize_name</option>";
                                     }
                                    
                                }
                                ?>
                        </select>
                        
                </tr>
                <tr>
                    <td>
                        <label for="txtTeam">Team:</label>
                    </td>
                    <td>
                        <select name="txtTeam" required>
                            <option hidden disabled selected value> -- Select a Team -- </option>
                            <?php
                                while($rows = $teams->fetch_assoc()){
                                    $team_name = $rows['strGenderDesc'] . " " . $rows['strLeveldesc'] . " " . $rows['strTypeOfTeamDesc'];
                                    $team_key = $rows['intTeamandClubID'];
                                    if ($team_key == $team){
                                        echo "<option value='$team_key' selected>$team_name</option>";
                                    }
                                    else{
                                        echo"<option value='$team_key'>$team_name</option>";
                                     }
                                    
                                }
                                ?>
                        </select>
                        
                </tr>
                <tr>
                    <td>
                        <label for="txtGender">Gender:</label>
                    </td>
                    <td>
                        <select name="txtGender" required>
                            <option hidden disabled selected value> -- Select a gender -- </option>
                            <?php
                                while($rows = $genders->fetch_assoc()){
                                    $gender_name = $rows['strGenderDesc'];
                                    $gender_key = $rows['intGenderID'];
                                    if ($gender_key == $intGender){
                                        echo "<option value='$gender_key' selected>$gender_name</option>";
                                    }
                                    else{
                                        echo"<option value='$gender_key'>$gender_name</option>";
                                     }
                                    
                                }
                                ?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        <input type="submit" name="submit" value="Update Golfer">
                        
                    </td>
                </tr>
            </table>
        </form>
        <?php $conn->close();?>
	</body>
	</html>