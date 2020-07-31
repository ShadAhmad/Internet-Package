 <?php
	
	$planA_cost = 19.95;
	$planB_cost = 29.95;
	$planC_cost = 39.95;
	
	$planA_free_hours = 200;
	$planB_free_hours = 300;
	
	$planA_addit_cost = 0.40;
	$planB_addit_cost = 0.35;
	
	$package = $_POST["plan"];	
	$hour = $_POST["hour"];
	
	$msg_extra = "";

if(!empty($package) && !empty($hour)){	

	if($package == 'A' || $package == 'a' || $package == 'B' || $package == 'b' || $package == 'C' || $package == 'c') {
		
		$plan = strtolower($package);
		
		if($hour > 0) {			
		
			$planA_charge = $hour <= $planA_free_hours ? $planA_cost : ($planA_cost + (($hour - $planA_free_hours) * $planA_addit_cost));
			$planB_charge = $hour <= $planB_free_hours ? $planB_cost : ($planB_cost + (($hour - $planB_free_hours) * $planB_addit_cost));
			$planC_charge = $planC_cost;
			
			$monthly_cost = $plan == "a" ? $planA_charge : ($plan == "b" ? $planB_charge : $planC_charge);
			$monthly_cost = number_format($monthly_cost, 2);
			
			$msg = "Your monthly charge is $".$monthly_cost;
			
			if($monthly_cost > $planA_charge) {
				$savingA = $monthly_cost - $planA_charge;
				$savingA = number_format($savingA, 2);
				$msg_extra = "By switching to Package A you would save $".$savingA."<br>";
			}
			if($monthly_cost > $planB_charge) {
				$savingB = $monthly_cost - $planB_charge;
				$savingB = number_format($savingB, 2);
				$msg_extra = $msg_extra."By switching to Package B you would save $".$savingB."<br>";
			}
			if($monthly_cost > $planC_charge) {
				$savingC = $monthly_cost - $planC_charge;
				$savingC = number_format($savingC, 2);
				$msg_extra = $msg_extra."By switching to Package C you would save $".$savingC."<br>";
			}
			if(empty($msg_extra))
				$msg_extra = "You chose the best package.";
		}
	}
	else
		$msg = "Wrong package entered. Please return to the previous page and enter a valid package name.<br>";
	
	if($hour < 0)
		$msg = $msg."The number of hours must be non-negative. Please return to the previous page and enter a valid value.";	
}
else {
	$msg = "Please enter both package and hours used.";
}
	
 
 ?>
 
<!DOCTYPE html>

<html lang="en-US">

	<head>
		<title>Internet Monthly Charge</title>
	</head>
	
	<body>
		<fieldset>BCS350 Assignment 1 -- SAYED SHAD AHMAD ZAIDI</fieldset>
		<p>
			The package you entered: <?php echo $package ?><br>
			The hours you used: <?php echo $hour ?>
		</p>
		<p>
			<?php echo $msg ?>
		</p>
		<p>
			<?php echo $msg_extra ?>
		</p>
	</body>
	
</html>