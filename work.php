<!DOCTYPE html>
<html lang="en">
<head>
  <title>Work History</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
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
      <a class="nav-link" href="Details.php">Personal Details</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="education.php">Educational Details</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="work.php">Work History</a>
    </li>

    <li class="nav-item">
      <a class="nav-link" href="my_jobs.php">Job Applications</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="uploads.php">Documents</a>
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
        <h3>Work Exprience:</h3>
        <p>Please add your work exprience.</p>
    <table class="table table-bordered">
    <thead>
      <tr>
        <th>Company</th>
        <th>Position</th>
        <th>Start year</th>
        <th>End year</th>
        <th>Type of mployement</th>
        <th>Delete</th>
      </tr>
    </thead>
    <?php
                    include 'config.php';
                    $sql = "SELECT * from work_history ";
                    $result = mysqli_query($link,$sql);
                    while($row = mysqli_fetch_assoc($result)){
                             echo '
    <tbody>
      <tr>
        <td>'.$row['company_name'].'</td>
        <td>'.$row['position'].'</td>
        <td>'.$row['start_year'].'</td>
        <td>'.$row['end_year'].'</td>
        <td>'.$row['employement_type'].'</td>
        <td><a href="process_delete_work.php?id='.$row['id'].'"><span class="glyphicon glyphicon-trash"></span></td>

      </tr>

     
    </tbody>
    '; }?>
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
          <h4 class="modal-title">Sign in</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>

   <!-- Modal body -->
        <div class="modal-body">
          <form method="post" action="work-data.php">
    <div class="form-group">
      <label for="company-name">Company:</label>
      <input type="text" class="form-control" id="company-name" placeholder="Enter company name" name="company-name">
    </div>

    <div class="form-group">
      <label for="position">Position:</label>
      <input type="text" class="form-control" id="position" placeholder="Enter Position" name="position">
    </div>

    <div class="form-group">
      <label for="start-date">Start date:</label>
      <input type="date" class="form-control" id="start-date" placeholder="Enter start date" name="start-date">
    </div>

    <div class="form-group">
      <label for="end-date">End date:</label>
      <input type="date" class="form-control" id="end-date" placeholder="Enter email" name="end-date">
    </div>

    <select name="Employement_type" class="custom-select mb-3">
      <option selected>Type of Employement</option>
      <option value="CONTRACT">Contract</option>
      <option value="TEMPORARY">Temporary</option>
      <option value="PERMANENT">Permanent</option>
    </select>

    <button type="submit" class="btn btn-primary">Submit</button>
  </form>
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
        <img src="images/pexels-cottonbro-5081971.jpg" width="100%">
      </div>
    </div>
  </div>
</div>

<div class="jumbotron text-center" style="margin-bottom:0">
  <p>Footer</p>
</div>


</body>
</html>