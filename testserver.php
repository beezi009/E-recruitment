<?php
$document_id =  $_POST["doc_id"];

$connect = mysqli_connect("localhost", "root", "", "e-recruitment");





if ($document_id == 'load') {
    $query = 'SELECT * FROM positions';
    $result = mysqli_query($connect, $query);
    $output = '<option selected value="">Postion You are applying for</option>';
    $arr = array();
    if (mysqli_num_rows($result) > 0) {

        $output .= '';
        $i = 0;
        while ($row = mysqli_fetch_array($result)) {
            $output .= '<option value="' . $row['position_id'] . '">' . $row['position_name'] . '</option>';
        }
    }

    echo $output;
}

if ($document_id == 'load_questions') {
    $query = 'SELECT * FROM questions where position_id="' . $_POST["pos_id"] . '"';
    $result = mysqli_query($connect, $query);
    $output = '';
    $output = '<h3>Job skill questionaire</h3><hr>';
    if (mysqli_num_rows($result) > 0) {

        $output .= '';
        $i = 1;
        while ($row = mysqli_fetch_array($result)) {
            $output .= ' <div class="inline fields">
                          <label>' . $row['question'] . '?</label>
                            <div class="field">
                            <div class="ui radio checkbox">
                                <input type="radio" name="ques' . $i . '" checked="checked" value="yes">
                                <label>yes</label>
                            </div>
                            </div>
                            <div class="field">
                            <div class="ui radio checkbox">
                                <input type="radio"name="ques' . $i . '" value="no">
                                <label>no</label>
                            </div>
                            </div>
                        </div>';
            $i++;
        }
    }
    $output .= '<a id="btn_submit" onclick="submitFunction()" class="ui button primary" >Submit</a>';
    echo $output;
}

if ($document_id == 'submit_test') {


    $datas = array();

    $query = 'SELECT * FROM questions where position_id="' . $_POST["pos_id"] . '"';
    $result = mysqli_query($connect, $query);
    $output = '';
    $arr = array();
    if (mysqli_num_rows($result) > 0) {


        $output .= '';
        $i = 0;
        $score = 0;
        $percent = 0.0;
        $datas =  $_POST['ui_form'];
        while ($row = mysqli_fetch_array($result)) {


            if ($row['answer'] == $datas[$i]['value']) {
                $score++;
            }
            $i++;
        }
        $percent =  ($score / count($datas)) * 100;
        $candidateData = [
            'score' =>   $percent,
            'pos_id' => $_POST["pos_id"],
            'candidate_id' => ''
        ];
        insertUserScore($candidateData);
    }
}

function insertUserScore($data)
{
    $connect1 = mysqli_connect("localhost", "root", "", "e-recruitment");
    $query1 = "INSERT INTO `candidates` ( `candidate_id`, `candidate_score`, `position_id`) VALUES ( '" . $data['candidate_id'] . "', '" . $data['score'] . "', '" . $data['pos_id'] . "')";
    mysqli_query($connect1, $query1);
}
