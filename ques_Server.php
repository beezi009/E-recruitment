<?php



extract($POST['form']);

$connect1 = mysqli_connect("localhost", "root", "", "e-recruitment");
    $query1 = "INSERT INTO `questions` (`question`, `position_id`, `answer`) VALUES ( '" . $data['candidate_id'] . "', '" . $data['score'] . "', '" . $data['pos_id'] . "')";
     mysqli_query($connect1, $query1);


?>