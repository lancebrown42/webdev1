<!DOCTYPE html>
<html>
    <head>
        <title>Golfathon</title>
        <!--
        Name: Lance Brown
        Class:  IT-117-400
        Abstract: Homework 11
        Date: 10/20/20
        -->
    </head>
    <body>
        Name: Lance Brown <br>
        Class: IT-117-400 <br>
        Abstract: Homework 11
        <hr>
        <?php
            // ini_set('display_errors', 0);
            // ini_set('display_startup_errors', 0);
            // error_reporting(0);
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

            $states = $mysqli->query("SELECT intStateID, strState FROM TStates");
            $genders = $mysqli->query("SELECT intGenderID, strGenderDesc FROM TGenders");
            $shirtsize = $mysqli->query("SELECT intShirtSize, strShirtSizeDesc FROM TShirtSizes");
            mysqli_close($conn);
        ?>
        <form action="process_golfer.php" method="post">
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
                    <td>
                        <label for="txtShirtSize">Shirt Size:</label>
                    </td>
                    <td>
                        <select name="txtShirtSize" required>
                            <option hidden disabled selected value> -- Select a shirt size -- </option>
                            <?php
                                while($rows = $shirtsize->fetch_assoc()){
                                    $shirtsize = $rows['strShirtSizeDesc'];
                                    $shirtsize_key = $rows['intShirtSizeID'];
                                    echo"<option value='$shirtsize_key'>$shirtsize</option>";
                                }
                                ?>
                        </select>
                    </td>
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
                                    echo"<option value='$gender_key'>$gender_name</option>";
                                }
                                ?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        <input type="submit" name="submit">
                        <input type="reset" name="clear" value="Clear">
                    </td>
                </tr>
            </table>
        </form>
    </body>
</html>