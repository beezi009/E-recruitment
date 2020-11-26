<!DOCTYPE html>
<html lang="en">
<head>
  <title>Job listing single</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

  <style>
.collapsible {
  background-color: #777;
  color: white;
  cursor: pointer;
  padding: 18px;
  width: 100%;
  border: none;
  text-align: left;
  outline: none;
  font-size: 15px;
}

.active, .collapsible:hover {
  background-color: #555;
}

.collapsible:after {
  content: '\002B';
  color: white;
  font-weight: bold;
  float: right;
  margin-left: 5px;
}

.active:after {
  content: "\2212";
}

.content {
  padding: 0 18px;
  max-height: 0;
  overflow: hidden;
  transition: max-height 0.2s ease-out;
  background-color: #f1f1f1;
}
</style>
</head>
<body>

<nav class="navbar navbar-expand-sm bg-dark navbar-dark">
  <!-- Brand/logo -->
  <a class="navbar-brand" href="welcome.php">
    <img src="images/1200px-Coat_of_arms_of_Namibia.svg.png" alt="logo" style="width:40px;">
  </a>
  
  <!-- Links -->
  <ul class="navbar-nav">
    <li class="nav-item">
      <a class="nav-link" href="index.php">Vacancies</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="details.php">Personal Details</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="education.php">Educational Details</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="work.php">Work History</a>
    </li>

    <li class="nav-item">
      <a class="nav-link" href="#">Job Applications</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="uploads.php">Documents</a>
    </li>
  </ul>
</nav>

<div class="container-fluid">
    <div class="row">
      <div class="col-sm-6">
        <form action="apply.php" method="post">
              <h2>You are here Job Post Information:</h2>
                  <?php
                              session_start();
                                            $item_id = $_GET['id'];
                              include_once 'config.php';
                              $username = $_SESSION["username"];
                                            $sql = "SELECT * from jobs where job_id = '$item_id' ";
                                            $result = mysqli_query($link,$sql);
                                            while($row = mysqli_fetch_assoc($result)){
                                                     echo '
                                <label>Job ID</label>
                                <p>'.$row['job_id'].'</p>
                                <label>Title</label>
                                <p>'.$row['title'].'</p>
                                <label>Description</label>
                                <p>'.$row['description'].'</p>
                                <label>Date Posted</label>
                                <p>'.$row['date_posted'].'</p>
                                <label>Closing Date</label>
                                <p>'.$row['closing_date'].'</p>
                                </div>
                                

                                <a href="apply.php?id='.$row['job_id'].'" target="_blank">Apply</a>
                        '; }
                        ?>  
        </form>
      </div>
      <hr>
     <!-- Button trigger modal -->
    
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
 Apply
</button>
      <!-- Modal -->


      <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
             <?php 
                include('ques.php')
             ?>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary">Save changes</button>
          </div>
        </div>
      </div>
    </div>
</div>
</div>

<div class="jumbotron text-center" style="margin-bottom:0">
  <p>Footer</p>
</div>
    <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.4.1/semantic.min.js"></script>
    <script>
        $('select.dropdown')
            .dropdown();

        loadPage();

        $("#positions").change(function() {
            loadQues($('#positions').val());
        });

        function loadPage() {
            var url = 'load';
            $.ajax({
                type: 'post',
                url: "testserver.php",
                data: {
                    doc_id: url
                },
                beforeSend: function() {
                    $('#positions').html('<div style="height:300px" class="ui segment"><div class="ui active inverted dimmer">  <div class="ui text loader">Loading</div></div> <p></p></div>');
                },
                success: function(data) {


                    $('#positions').html(data);


                }
            });

        }

        function loadQues(position) {
            var url = 'load_questions';
            var p1 = position;
            var user = {
                "firstName": $('#first-name').val(),
                "lastName": $('#last-name').val()
            };
            var d = new Date();
            $('#positionId').html(position);
           
            $.ajax({
                type: 'post',
                url: "testserver.php",
                data: {
                    doc_id: url,
                    pos_id: position,
                    userDetails: user
                },
                beforeSend: function() {
                    $('#positions').html('<div style="height:300px" class="ui segment"><div class="ui active inverted dimmer">  <div class="ui text loader">Loading</div></div> <p></p></div>');
                },
                success: function(data) {


                    $('#position_ques').html(data);
                    loadPage();

                }
            });

        }

        function submitFunction() {
            var url = 'submit_test';
            var position = $('#positionId').text();

            var data = $('#position_ques').serializeArray();

            $.ajax({
                type: 'post',
                url: "testserver.php",
                data: {
                    doc_id: url,
                    ui_form: data,
                    pos_id: position
                },
                beforeSend: function() {
                    $('#positions').html('<div style="height:300px" class="ui segment"><div class="ui active inverted dimmer">  <div class="ui text loader">Loading</div></div> <p></p></div>');
                },
                success: function(data) {


                    $('#response').html(data);
                    loadPage();

                }
            });
        }
       
    </script>

</body>
</html><!DOCTYPE html>
<html lang="en">
<head>
  <title>Job listing single</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

  <style>
.collapsible {
  background-color: #777;
  color: white;
  cursor: pointer;
  padding: 18px;
  width: 100%;
  border: none;
  text-align: left;
  outline: none;
  font-size: 15px;
}

.active, .collapsible:hover {
  background-color: #555;
}

.collapsible:after {
  content: '\002B';
  color: white;
  font-weight: bold;
  float: right;
  margin-left: 5px;
}

.active:after {
  content: "\2212";
}

.content {
  padding: 0 18px;
  max-height: 0;
  overflow: hidden;
  transition: max-height 0.2s ease-out;
  background-color: #f1f1f1;
}
</style>
</head>
<body>

<nav class="navbar navbar-expand-sm bg-dark navbar-dark">
  <!-- Brand/logo -->
  <a class="navbar-brand" href="welcome.php">
    <img src="images/1200px-Coat_of_arms_of_Namibia.svg.png" alt="logo" style="width:40px;">
  </a>
  
  <!-- Links -->
  <ul class="navbar-nav">
    <li class="nav-item">
      <a class="nav-link" href="index.php">Vacancies</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="details.php">Personal Details</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="education.php">Educational Details</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="work.php">Work History</a>
    </li>

    <li class="nav-item">
      <a class="nav-link" href="#">Job Applications</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="uploads.php">Documents</a>
    </li>
  </ul>
</nav>

<div class="container-fluid">
    <div class="row">
      <div class="col-sm-6">
        <form action="apply.php" method="post">
         <h2>You are here Job Post Information:</h2>
        <?php
                    session_start();
                    $item_id = $_GET['id'];
include_once 'config.php';
      $username = $_SESSION["username"];
                    $sql = "SELECT * from jobs where job_id = '$item_id' ";
                    $result = mysqli_query($link,$sql);
                    while($row = mysqli_fetch_assoc($result)){
                             echo '
        <label>Job ID</label>
        <p>'.$row['job_id'].'</p>
        <label>Title</label>
        <p>'.$row['title'].'</p>
        <label>Description</label>
        <p>'.$row['description'].'</p>
        <label>Date Posted</label>
        <p>'.$row['date_posted'].'</p>
        <label>Closing Date</label>
        <p>'.$row['closing_date'].'</p>
        </div>
        

        <a href="apply.php?id='.$row['job_id'].'" target="_blank">Apply</a>
'; }?>
        
    
        </form>
        
  
      <div class="col-sm-6 bg-warning">
        Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.
      </div>
    </div>
</div>
</div>

<div class="jumbotron text-center" style="margin-bottom:0">
  <p>Footer</p>
</div>


</body>
</html>
