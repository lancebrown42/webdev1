<?php
	//array for easier result generation
	$arrStateCounties = array("Ohio"=>["Hamilton", "Butler"], "Kentucky"=>["Boone", "Kenton"]);
	
	//if "Submit" button was pressed, store data in session
	if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['btnSubmit'])) {
	$dtmDate = $_POST["dtmDate"];
	//break data from select into state and county
	$txtCountyState = explode(", ", $_POST["cboCountyState"]);
	$intHouseholdMembers = $_POST["numHouseholdMembers"];
	$dblIncome = $_POST["numIncome"];
	$txtCounty = $txtCountyState[0];
	$txtState = $txtCountyState[1];
	array_push($_SESSION['arrCounty'], ($txtCounty));
	array_push($_SESSION['arrState'], ($txtState));
	array_push($_SESSION['arrIncome'], ($dblIncome));
	array_push($_SESSION['arrHousehold'], ($intHouseholdMembers));
	}
	//if Total button was pressed display that data
	elseif ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['btnTotal'])) {
		
		echo "<h2> Households Surveyed:</h2>
		<table>";
		foreach ($arrStateCounties as $state => $counties) {
			echo "<tr>
		<td colspan = 4>$state:</td>
		<td>" . count(ParseIndices("arrState", $state)) . "<td>
		</tr>";
		foreach ($counties as $index => $county) {
			echo "<tr>
					<td>&nbsp;&nbsp;&nbsp;&nbsp;</td>
					<td colspan = 2>$county:</td>
					<td>&nbsp;&nbsp;&nbsp;&nbsp;</td>
					<td>" . count(ParseIndices("arrCounty", $county)) . "</td>
					</tr>";
		}
		}

	}//if average button was pressed, display that data
	elseif($_SERVER["REQUEST_METHOD"] == 'POST' && isset($_POST['btnAverage'])){
		echo "<h2> Average Household Income:</h2>
		<table>";
		foreach ($arrStateCounties as $state => $counties) {
			echo "<tr>
		<td colspan = 4>$state:</td>
		<td>$ " . number_format(AverageIncome(ParseIndices("arrState", $state)), 2, ".", ",") . "<td>
		</tr>";
		foreach ($counties as $index => $county) {
			echo "<tr>
					<td>&nbsp;&nbsp;&nbsp;&nbsp;</td>
					<td colspan = 2>$county:</td>
					<td>&nbsp;&nbsp;&nbsp;&nbsp;</td>
					<td>$ " . number_format(AverageIncome(ParseIndices("arrCounty", $county)), 2, ".", ",") . "</td>
					</tr>";
		}
	}
	}
	elseif($_SERVER["REQUEST_METHOD"] == 'POST' && isset($_POST['btnPercent'])){
		echo "<h2> Percentage Below Poverty:</h2>
		<table>";
		foreach ($arrStateCounties as $state => $counties) {
			echo "<tr>
		<td colspan = 4>$state:</td>
		<td>" . number_format(Poverty(ParseIndices("arrState", $state)), 2, ".", ",") . "%<td>
		</tr>";
		foreach ($counties as $index => $county) {
			echo "<tr>
					<td>&nbsp;&nbsp;&nbsp;&nbsp;</td>
					<td colspan = 2>$county:</td>
					<td>&nbsp;&nbsp;&nbsp;&nbsp;</td>
					<td>" . number_format(Poverty(ParseIndices("arrCounty", $county)), 2, ".", ",") . "%</td>
					</tr>";
		}
	}
	}//clear session, mostly for debugging
	elseif($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['btnEnd'])){
		session_destroy();
	}//finds a specific state or county in results
	function ParseIndices($strArray, $strSearch){
		
		return(array_keys($_SESSION[$strArray], $strSearch));
	}//calculates average income of specific municipality
	function AverageIncome($arrResponseIndices){
		$arrIncomes = array();
		$dblReturn = 0;
		foreach ($arrResponseIndices as $index) {
			array_push($arrIncomes, $_SESSION['arrIncome'][$index]);
		}
		if (count($arrIncomes) == 0){
			$dblReturn = 0;
		}else{
			$dblReturn = array_sum($arrIncomes) / count($arrIncomes);
		}
		return($dblReturn);
	}//calculates poverty percentage
	function Poverty($arrResponseIndices){
		$arrPoverty = array("1"=>"12000", "2"=>"18000", "3"=>"25000", "4"=>"30000", "5"=>"40000");
		$arrIncomes = array();
		$arrHouseholds = array();
		$intPovertyCount = 0;
		$dblReturn = 0;
		foreach ($arrResponseIndices as $index) {
			array_push($arrIncomes, $_SESSION['arrIncome'][$index]);
			array_push($arrHouseholds, $_SESSION['arrHousehold'][$index]);
		}
		foreach ($arrIncomes as $index => $income) {
			if($arrHouseholds[$index] < count($arrPoverty)){
				if($income < $arrPoverty[$arrHouseholds[$index]]){
					$intPovertyCount++;
				}
			} else{
				if($income < $arrPoverty[count($arrPoverty)]){
					$intPovertyCount++;
				}
			}
		}
		if(count($arrIncomes) > 0){
			$dblReturn = $intPovertyCount / count($arrIncomes) * 100;
		}
		else{
			$dblReturn = 0;
		}

		return($dblReturn);
	}

?>