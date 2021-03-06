<!DOCTYPE html>
<html>
    <head>
        <title>Golfathon</title>
        <!--
        Name: Lance Brown
        Class:  IT-117-400
        Abstract: Homework 12
        Date: 10/20/20
        -->
        <meta charset="utf-8">
    </head>
    <body>
        Name: Lance Brown <br>
        Class: IT-117-400 <br>
        Abstract: Homework 12
        <hr>
        <a href="addgolfer.php"><button>Add Golfer</button></a>
        <a href="showgolfers.php"><button>Show Golfers</button></a>
        <a href="donate.php"><button>Donate Now</button></a>
        <!-- <?php
            ini_set('display_errors', 1);
            ini_set('display_startup_errors', 1);
            error_reporting(E_ALL);
            //Connect to MySQL
            $servername = "mc-itddb-12-e-1";
            $username = "lbrown11";
            $password = "0671312";
            $dbname = "WAPP1BrownL";

            // Create connection
            $conn = new mysqli($servername, $username, $password, $dbname);
            // Check connection
            if ($conn->connect_error) {
              die("Connection failed: " . $conn->connect_error);
            }
            // $conn = mysqli_connect($servername, $username, $password, $dbname);
            
            //Check connection
            
            
            $states = $conn->query("SELECT intStateID, strState FROM TStates");
            $genders = $conn->query("SELECT intGenderID, strGenderDesc FROM TGenders");
            $shirtsize = $conn->query("SELECT intShirtSizeID, strShirtSizeDesc FROM TShirtSizes");
            
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
                            <option hidden disabled selected value> -- Select a Shirt Size -- </option>
                            <?php
                                while($rows = $shirtsize->fetch_assoc()){
                                    $shirtsize_name = $rows['strShirtSizeDesc'];
                                    $shirtsize_key = $rows['intShirtSizeID'];
                                    echo"<option value='$shirtsize_key'>$shirtsize_name</option>";
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
                                    echo"<option value='$gender_key'>$gender_name</option>";
                                }
                                ?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        <input type="submit" name="submit" value="Add Golfer">
                        <input type="reset" name="clear" value="Clear">
                    </td>
                </tr>
            </table>
        </form>
        <a href="showgolfers.php"><button>Show Golfers</button></a>
        <?php $conn->close();?> -->
    </body>
</html>