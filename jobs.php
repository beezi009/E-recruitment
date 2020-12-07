<!DOCTYPE html>
<html lang="en">

<head>
  <title>Jobs</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
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
      <a class="nav-link" href="jobs.php">Post vacancies</a>
    </li>
   

    <li class="nav-item">
      <a class="nav-link" href="applications.php">Job Applications</a>
    </li>
      <p>
        <a href="reset-password.php" class="btn btn-warning">Reset Your Password</a>
        <a href="logout.php" class="btn btn-danger">Sign Out of Your Account</a>
      </p>
    </ul>
  </nav>

  <div class="container-fluid">
    <div class="row">
      <div class="col-sm-6">
        <h2>You are here: Post Jobs</h2>

        <table class="table table-bordered">
          <thead>
            <tr>
              <th>#</th>
              <th>Tite</th>
              <th>Date Posted</th>
              <th>Closing Date</th>
              <th>Add question</th>
            </tr>
          </thead>
          <?php
          session_start();
          include_once 'config.php';

          $username = $_SESSION["username"];
          $sql = "SELECT * from jobs ";
          $result = mysqli_query($link, $sql);
          while ($row = mysqli_fetch_assoc($result)) {
            echo '
                  <tbody>
                  
                    <tr>
                      <td>' . $row['job_id'] . '</td>
                      <td>' . $row['title'] . '</td>
                      <td>' . $row['date_posted'] . '</td>
                      <td>' . $row['closing_date'] . '</td>
                      <td>
                          <a id="next" onclick="setques(' . $row['job_id'] . ')" 
                          class="ui button primary" data-toggle="modal" data-target="#myQuesModal">
                         Add  <i class="pl-2 plus square outline icon"></i>
                          </a>
                      <td>
                    </tr>
                    </a>
                  
                  </tbody>
                  ';
          } ?>
        </table>

        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
          Add
        </button>


        <!-- The Modal -->
        <div class="modal" id="myModal">
          <div class="modal-dialog">
            <div class="modal-content">

              <!-- Modal Header -->
              <div class="modal-header">
                <h4 class="modal-title">Post Jobs</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
              </div>

              <!-- Modal body -->
              <div class="modal-body">
                <div id="f1">
                  <form action="jobs-data.php" method="post">
                    <div class="form-group">
                      <label for="title">Title:</label>
                      <input type="text" class="form-control" id="title" placeholder="Enter title" name="title">
                    </div>

                    <div class="form-group">
                      <label for="description">Job Description:</label>
                      <input type="text" class="form-control" id="description" placeholder="Enter your type of description" name="description">
                    </div>

                   

                    <select name="ministry" class="custom-select mb-3">
                    <option selected>Select Ministry</option>
                     <?php
       
          include_once 'config.php';

          $sql = "SELECT * from ministries ";
          $result = mysqli_query($link, $sql);
          while ($row = mysqli_fetch_assoc($result)) {
            echo '
                    <option value="' . $row['ministry_id'] . '">' . $row['ministry'] . '</option>
                      ';
          } ?>

                    </select>

                    <select name="location" class="custom-select mb-3">
                    <option selected>Select Location</option>
                     <?php
       
          include_once 'config.php';

          $sql = "SELECT * from location ";
          $result = mysqli_query($link, $sql);
          while ($row = mysqli_fetch_assoc($result)) {
            echo '
                    <option value="' . $row['location_id'] . '">' . $row['location'] . '</option>
                      ';
          } ?>
                    <div class="form-group">
                      <label for="closing_date">Closing Date:</label>
                      <input type="date" class="form-control" id="closing_date" name="closing_date">
                    </div>
                    <button id="submitbtn" type="submit" class="btn btn-primary">Submit</button>

                </div>
                </form>
              </div>

            </div>

            <!-- Modal footer -->
            <div class="modal-footer">
              <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
            </div>

          </div>
        </div>
      </div>




      <!-- The Modal -->
      <div class="modal" id="myQuesModal">
        <div class="modal-dialog">
          <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
              <h4 class="modal-title">Post Jobs</h4>
              <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">

              <div class="p-2" id="f2">
                <form class="ui form" id="uploadQues" method="post">

                  <b> Job id: </b>
                  <div id="job_id"></div><br>
                  <div class="field">
                    <label for="question"><b>Question:</b></label>
                    <input type="text" class="form-control" id="question" name="question" placeholder="Enter the question" name="question">
                  </div>
                  <div class="field">
                    <label for="answer"><b>Answer:</b></label>
                    <input type="text" class="form-control" id="answer" name="answer" placeholder="Enter your type of answer" name="answer">
                  </div>
                  <a onclick="submitQues()" class="ui primary button">Submit</a>


                </form>
              </div>

            </div>

            <!-- Modal footer -->
            <div class="modal-footer">
              <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
            </div>

          </div>
        </div>
      </div>

    </div>
    <div class="col-sm-6 bg-warning">
      
    </div>
  </div>
  </div>
  </div>

  <div class="jumbotron text-center" style="margin-bottom:0">
    <p>Research 2020</p>
  </div>
  <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.4.1/semantic.min.js"></script>
  <script type="text/javascript">
    function submitQues() {

      dataq = $('#uploadQues').serializeArray();

      $.ajax({
        type: 'post',
        url: "ques_Server.php",
        data: {
          formData: dataq,
          id: $('#job_id').text()
        },
        beforeSend: function() {
          $('#positions').html('<div style="height:300px" class="ui segment"><div class="ui active inverted dimmer">  <div class="ui text loader">Loading</div></div> <p></p></div>');
        },
        success: function(data) {

          alert(data);

        }
      });

    }

    function setques(id) {
      $('#job_id').html(id);
    }
  </script>
</body>

</html>
