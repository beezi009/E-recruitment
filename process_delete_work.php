<?php

$item_id = $_GET['id'];
include_once 'config.php';
// sql to delete a record
$sql = "DELETE FROM work_history  WHERE id='$item_id' ";

if (mysqli_query($link, $sql)) {
  echo "<script>
alert('Succesfully Deleted') 
window.location.href='work.php';
</script>";
} else {
  echo "Error deleting record: " . mysqli_error($link);
}

mysqli_close($link);
?>