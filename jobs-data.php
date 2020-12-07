<?php

session_start();
include_once 'config.php';

$username = $_SESSION["username"];

   $title = $_POST['title'];
   $description = $_POST['description'];
   $closing_date = $_POST['closing_date'];
   $ministry = $_POST['ministry'];
   $location = $_POST['location'];

   $sql = "INSERT INTO jobs (title, description, date_posted, closing_date, username, location, ministry )
   VALUES ('$title','$description', NOW(), '$closing_date', '$username', '$location', '$ministry' )";
   if (mysqli_query($link, $sql)) {
    echo "<script>
alert('New record created successfully !') 
window.location.href='jobs.php';
</script>";
   } else {
    echo "Error: " . $sql . "
" . mysqli_error($link);
   }
   mysqli_close($link);



?>
