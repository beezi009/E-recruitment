<?php
session_start();
include_once 'config.php';

$username = $_SESSION["username"];

	 $company_name = $_POST['company-name'];
	 $position = $_POST['position'];
	 $start_date = $_POST['start-date'];
	 $end_date = $_POST['end-date'];
	 $Employement_type = $_POST['Employement_type'];
	

	 $sql = "INSERT INTO work_history (company_name,position,start_year, end_year, employement_type, username )
	 VALUES ('$company_name','$position','$start_date','$end_date', '	 
$Employement_type', '$username')";
	 if (mysqli_query($link, $sql)) {
			echo "<script>
alert('New record created successfully !') 
window.location.href='work.php';
</script>";
	 } else {
		echo "Error: " . $sql . "
" . mysqli_error($link);
	 }
	 mysqli_close($link);
?>