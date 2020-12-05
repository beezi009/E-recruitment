<!DOCTYPE html>
<html lang="en">
<head>
  <title>Educational Information</title>
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
        <h2>Educational Information</h2>
              
  <table class="table table-bordered">
    <thead>
      <tr>
        <th>Name of Institute</th>
        <th>Type of qualification</th>
        <th>Qualification Obtained</th>
        <th>Start year</th>
        <th>End year</th>
        <th>Delete</th>
      </tr>
    </thead>
    <?php
                    session_start();
include_once 'config.php';

$username = $_SESSION["username"];
                    $sql = "SELECT * from education_data where username = '$username' ";
                    $result = mysqli_query($link,$sql);
                    while($row = mysqli_fetch_assoc($result)){
                             echo '
    <tbody>
      <tr>
        <td>'.$row['institute'].'</td>
        <td>'.$row['type_of_qualification'].'</td>
        <td>'.$row['qualification'].'</td>
        <td>'.$row['start_year'].'</td>
        <td>'.$row['end_year'].'</td>
        <td><a href="process_delete_job.php?id='.$row['id'].'"><span class="glyphicon glyphicon-trash"></span></td>
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
          <form action="education-data.php" method="post">
    <div class="form-group">
      <label for="institute">Institute or centre:</label>
      <input type="text" class="form-control" id="institute" placeholder="Enter institute or centre" name="institute">
    </div>

    <select name="type_of_qualification" id="type_of_qualification" class="custom-select mb-3">
      <option selected>Type of Qualification</option>
      <option value="DEGREE">DEGREE</option>
      <option value="DIPLOMA">DIPLOMA</option>
      <option value="DIPLOMA">CERTIFICATE</option>
      <option value="NSSC">NSSC</option>
    </select>

    <div class="form-group">
      <label for="qualification">Qualification:</label>
      <input type="text" class="form-control" id="qualification" placeholder="Enter qualification" name="qualification">
    </div>

    <div class="form-group">
      <label for="start_year">Start year:</label>
      <input type="date" class="form-control" id="start_year"  name="start_year">
    </div>

    <div class="form-group">
      <label for="end_year">End year:</label>
      <input type="date" class="form-control" id="end_year"  name="end_year">

      <button type="submit"  class="btn btn-primary">Submit</button>
    </div>
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
