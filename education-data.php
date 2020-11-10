<?php

session_start();
include_once 'config.php';

$username = $_SESSION["username"];

	 $institute = $_POST['institute'];
	 $type_of_qualification = $_POST['type_of_qualification'];
	 $qualification = $_POST['qualification'];
	 $end_year = $_POST['end_year'];
	 $start_year = $_POST['start_year'];

	 $sql = "INSERT INTO education_data (institute, type_of_qualification, qualification, start_year, end_year, username )
	 VALUES ('$institute','$type_of_qualification','$qualification', '$start_year', 'end_year', '$username')";
	 if (mysqli_query($link, $sql)) {
		echo "<script>
alert('New record created successfully !') 
window.location.href='education.php';
</script>";
	 } else {
		echo "Error: " . $sql . "
" . mysqli_error($link);
	 }
	 mysqli_close($link);
?>