<?php

session_start();
include_once 'config.php';

$username = $_SESSION["username"];

   $title = $_POST['title'];
   $description = $_POST['description'];
   $date_posted = $_POST['date_posted'];
   $closing_date = $_POST['closing_date'];

   $sql = "INSERT INTO jobs (title, description, date_posted, closing_date )
   VALUES ('$title','$description','$date_posted', '$closing_date')";
   if (mysqli_query($link, $sql)) {
    echo "New record created successfully !";
   } else {
    echo "Error: " . $sql . "
" . mysqli_error($link);
   }
   mysqli_close($link);
?>