<!DOCTYPE html>
<html>
	<body>

		<?php
		$txtName =  $_POST["txtName"];
		$txtAddress =  $_POST["txtAddress"];
		$txtCity = $_POST["txtCity"];
		$txtState = $_POST["txtState"];
		$txtZip = $_POST["txtZip"];
		$decAge = $_POST["txtAge"];
		$txtGender = $_POST["txtGender"];
		$txtAgeRange = NULL;

		if ($decAge < 18) {
			$txtAgeRange = "Junior"
		} elseif($decAge < 55){
			$txtAgeRange = "Professional"
		} elseif($decAge >= 55){
			$txtAgeRange = "Senior"
		}
		
		?>
		Name: <?php echo $txtName;?><br>
		Address: <?php echo $txtAddress;?><br>
		City:<?php echo $txtCity;?><br>
		Zip:<?php echo $txtZip;?><br>
		Player Type:<?php echo $txtGender + " " + $txtAgeRange;?><br>
		
	</body>
</html>