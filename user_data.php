<?php
session_start();
include_once 'config.php';

$username = $_SESSION["username"];

	 $firstnames = $_POST['firstnames'];
	 $lastname = $_POST['lastname'];
	 $id_number = $_POST['id_number'];
	 $dob = $_POST['dob'];
	 $nationality = $_POST['nationality'];
	 $address = $_POST['address']; 
	 $postal_address = $_POST['postal_address'];
	 $marital_status = $_POST['marital_status'];
	 $sex = $_POST['sex'];

	 $sql = "INSERT INTO user_data (first_names,last_name,username, id_number, dob, nationality , residential_address, postal_address, marital_status, gender)
	 VALUES ('$firstnames','$lastname','$username','$id_number', '$dob', '$nationality', '$address', '$postal_address', '$marital_status', '$sex')";
	 if (mysqli_query($link, $sql)) {
		echo "<script>
alert('New record created successfully !') 
window.location.href='Education.php';
</script>";
	 } else {
		echo "Error: " . $sql . "
" . mysqli_error($link);
	 }
	 mysqli_close($link);
?>