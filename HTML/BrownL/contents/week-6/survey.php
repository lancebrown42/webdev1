<?php
	$arrStateCounties = array("Ohio"=>["Hamilton", "Butler"], "Kentucky"=>["Boone", "Kenton"]);
	if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['btnSubmit'])) {
	$dtmDate = $_POST["dtmDate"];
	
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
		
		// print_r($_SESSION['arrState']);
		// echo "<br>";
		// foreach (array_keys($_SESSION['arrState']) as $states => $state) {
		// 	echo $_SESSION['arrState'][$state] . ": &nbsp;&nbsp;&nbsp;&nbsp;" . count(ParseIndices("arrState", $_SESSION[$state])) . "<br>";
		// }
		// $intTotalHouseholdsOH = count(ParseIndices("arrState", "OH"));
		// $intTotalHouseholdsKY = count(ParseIndices("arrState", "KY"));
		// $intHamilton = count(ParseIndices("arrCounty", "Hamilton"));
		// $intButler = count(ParseIndices("arrCounty", "Butler"));
		// $intBoone = count(ParseIndices("arrCounty", "Boone"));
		// $intKenton = count(ParseIndices("arrCounty", "Kenton"));

		// // echo(print_r(array_values(array_keys($_SESSION['arrState'], "Ohio"))));
		// // print_r($_SESSION['arrState']);
		// echo "<h2> Households Surveyed:</h2>
		// <table>
		// <tr>
		// <td colspan = 4>Ohio:</td>
		// <td>$intTotalHouseholdsOH<td>
		// </tr><tr>
		// <td>&nbsp;&nbsp;&nbsp;&nbsp;</td>
		// <td colspan = 2>Hamilton:</td>
		// <td>&nbsp;&nbsp;&nbsp;&nbsp;</td>
		// <td>$intHamilton</td>
		// </tr>
		// <tr>
		// <td colspan = 4>Kentucky:</td>
		// <td>$intTotalHouseholdsKY</td>
		// </tr>
		// <tr>
		// <td>&nbsp;&nbsp;&nbsp;&nbsp;</td>
		// <td colspan = 2>Boone:</td>
		// <td><td>
		// <td>$intBoone</td>

		// </tr>
		// <table>
		// ";
	}
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
	function ParseIndices($strArray, $strSearch){
		
		return(array_keys($_SESSION[$strArray], $strSearch));
	}
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
	}

?>