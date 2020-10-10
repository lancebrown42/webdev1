<!DOCTYPE html>
<?php 
    session_start();
    if (!isset($_SESSION['arrCounty'])) {
        $_SESSION['arrCounty'] = array();
        $_SESSION['arrState'] = array();
        $_SESSION['arrIncome'] = array();
        $_SESSION['arrHousehold'] = array();
        
    }
?>
<html>

<head>
    <title>My Template</title>
    <!--
Name: Lance Brown
Class:  IT-117-400
Abstract: Homework 9
Date: 10/01/20

-->
</head>

<body>
    Name: Lance Brown <br>
    Class: IT-117-400 <br>
    Abstract: Homework 9
    <hr>
    <form method="post" name="frmSurvey">
    	<table>
    		<tr>
    			<td>
    				<label for="dtmDate">Survey Date: </label>
    			</td>
    			<td>
    				<input type="date" name="dtmDate" id="dtmDate" required>
    			</td>
    		</tr>
    		<tr>
    			<td>
    				<label for="cboCountyState">County and State: </label>
    			</td>
    			<td>
    				<select name="cboCountyState" id="cboCountyState" required>
    					<option value="Hamilton, Ohio">Hamilton, OH</option>
    					<option value="Butler, Ohio">Butler, OH</option>
    					<option value="Boone, Kentucky">Boone, KY</option>
    					<option value="Kenton, Kentucky">Kenton, KY</option>
    					
    				</select>
    			</td>
    		</tr>
    		<tr>
    			<td>
    				<label for="numHouseholdMembers">Number of Household Members: </label>
    			</td>
    			<td>
    				<input type="number" name="numHouseholdMembers" id="numHouseholdMembers" min="1" max="99" required>
    			</td>
    		</tr>
    		<tr>
    			<td>
    				<label for="numIncome">Household Annual Income: </label>
    			</td>
    			<td>
    				<input type="number" id="numIncome" name="numIncome" required>
    			</td>
    		</tr>
            <tr>
                <td colspan="2" align="center">
                    <input type="submit" name="btnSubmit" id="btnSubmit">
                    <input type="reset" name="btnClear" value="Clear" id="btnClear">
                </td>
            </tr>
            <tr id="CalcNav">
                <td colspan="2">
                    
                    <input type="submit" name="btnTotal" value="Total Households Surveyed" id="btnTotal" formnovalidate>
                    <input type="submit" name="btnAverage" value="Average Household Income" id="btnAverage" formnovalidate>
                    <input type="submit" name="btnPercent" id="btnPercent" value="Percentage Below Poverty" formnovalidate>
                </td>
            </tr>
    	</table>
    </form>
    <h3>Test Area</h3>
    <hr>
    <?php 
    // foreach($_SESSION['arrHousehold'] as $value){
    //     echo "$value <br>";
    // }
    // foreach($_SESSION['arrCounty'] as $county){
    //     echo "$county <br>";
    // }
    ?>
    <!-- <?php echo $_SESSION['arrHousehold'][0];?> -->
<?php include "survey.php"; ?>
</body>
</html>