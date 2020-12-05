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
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.4.1/semantic.min.css">
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

    .active,
    .collapsible:hover {
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

    .post-info {
      display: flex !important;
      justify-content: center !important;
      align-items: center !important;
      width: auto;
      margin: 0;
    }

    .hide {
      visibility: hidden;
      opacity: 0;
      transition: visibility 0s 2s, opacity 2s linear
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
        <a class="nav-link" href="#">Job Applications</a>
      </li>
    </ul>
  </nav>

  <div class="container-fluid ">
    <div class="row">
      <div class="col-sm-6 center ">
        <form action="apply.php" method="post">
          <h2>Candidate:</h2>

        </form>

        <div class="card m-5 ">


          <?php
          session_start();
          $item_id = $_GET['id_number'];
          include_once 'config.php';
          $username = $_SESSION["username"];
          $sql = "SELECT * from user_data where id_number = '$item_id' ";
          $result = mysqli_query($link, $sql);
          while ($row = mysqli_fetch_assoc($result)) {



            echo ' 
           
           <div class="card">
           <div class="card-header">
           <h5 id="job-title" class="card-title">' . $row['first_names'] . '</h5>
           </div>
           <div class="card-body">
            
             <p class="card-text">
            
            
                <b>First Name(s) :</b>' . $row['first_names'] . '<br>
                <b>Last Name :</b>' . $row['last_name'] . '<br>
                <b>ID :</b>' . $row['id_number'] . '<br>
                <b>DOB :</b>' . $row['dob'] . '<br>
                <b>Nationality :</b>' . $row['nationality'] . '<br>
                <b>Residential Address :</b>' . $row['residential_address'] . '<br>
                <b>Postal Address :</b>' . $row['postal_address'] . '<br>
                <b>Marital Status :</b>' . $row['marital_status'] . '<br>
                <b>gender :</b>' . $row['gender'] . '<br>
             </p>
             <div id="userid" style="visibility: hidden;">' . $username . '</div>
             <div id="id" style="visibility: hidden;">' . $row['id_number'] . '</div>
             
           </div>
         </div>
           
           ';
          }
          ?>

                <h2>Documents</h2>
              
  <table class="table table-bordered">
    <thead>
      <tr>
        <th>File Name</th>
        <th>Uploaded</th>
        <th>Open</th>
      </tr>
    </thead>
    <?php
                   
include_once 'config.php';

$username = $_SESSION["username"];
                    $sql = "SELECT * from uploads where posted_by = 'beezimukupi@gmail.com' ";
                    $result = mysqli_query($link,$sql);
                    while($row = mysqli_fetch_assoc($result)){
                             echo '
    <tbody>
      <tr>
        <td>'.$row['file_name'].'</td>
        <td>'.$row['uploaded_on'].'</td>
        <td><a href="process_delete_job.php?id='.$row['id'].'"><span class="glyphicon glyphicon-trash"></span></td>

      </tr>

     
    </tbody>
    </table>
     
     <a onclick="applyFunction()" class="btn btn-primary">Shortlist</a>
     '; }?>
  
        </div>
      </div>
      <hr>
      <!-- Button trigger modal -->

      <button id="applybtn" style="visibility: hidden;" type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
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
              <form id="position_ques" class="ui form mt-5">
                <a id="btn_submit"></a>
              </form>
              <div id="response">

              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <button onclick="submitFunction()" type="button" data-dismiss="modal" class="btn btn-primary">Apply</button>
            </div>
          </div>
        </div>
      </div>

    </div>
    <div id="notification" class="alert alert-success hide" role="alert">
      A simple success alert—check it out!
    </div>
  </div>

  <div class="jumbotron text-center" style="margin-bottom:0">
    <p>Footer</p>
  </div>
  <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.4.1/semantic.min.js"></script>
  <script>
    function applyFunction() {
      $('#applybtn').click();
    }
    $('select.dropdown')
      .dropdown();

    loadQues();

    function loadQues() {
      var url = 'load_questions';
      var p1 = $('#id').text();
      position = $('#id').text();

      var d = new Date();
      $('#positionId').html(position);

      $.ajax({
        type: 'post',
        url: "testserver.php",
        data: {
          doc_id: url,
          pos_id: position
        },
        beforeSend: function() {
          $('#positions').html('<div style="height:300px" class="ui segment"><div class="ui active inverted dimmer">  <div class="ui text loader">Loading</div></div> <p></p></div>');
        },
        success: function(data) {


          $('#position_ques').html(data);

          $('#exampleModalLabel').html($('#job-title').text());
        }
      });

    }

    function submitFunction() {
      var url = 'submit_test';
      var position = $('#id').text();
      var data = $('#position_ques').serializeArray();
      var uid = $('#userid').text();

      $.ajax({
        type: 'post',
        url: "testserver.php",
        data: {
          doc_id: url,
          ui_form: data,
          pos_id: position,
          user: uid
        },
        beforeSend: function() {
          $('#positions').html('<div style="height:300px" class="ui segment"><div class="ui active inverted dimmer">  <div class="ui text loader">Loading</div></div> <p></p></div>');
        },
        success: function(data) {
          $('#response').html(data);
          $('#notification').html('Sucessfully applied');
          $('#notification').removeClass('hide');
          setInterval(function() {
            $('#notification').addClass('hide');
          }, 5000);


        }
      });
    }
  </script>
</body>

</html>