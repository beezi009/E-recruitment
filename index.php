<!DOCTYPE html>
<html lang="en">
<head>
  <title>Home EBMS Systems</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<body>

<nav class="navbar navbar-expand-sm bg-dark navbar-dark">
  <!-- Brand/logo -->
  <a class="navbar-brand" href="index.php">
    <img src="images/1200px-Coat_of_arms_of_Namibia.svg.png" alt="logo" style="width:40px;">
  </a>
  
  <!-- Links -->
  <ul class="navbar-nav">
    <li class="nav-item">
      <a class="nav-link" href="#">Home</a>
    </li>
    <li class="nav-item">

    <li class="nav-item">
      <a class="nav-link" href="#">Jobs</a>
    </li>

    <li class="nav-item">
      <a class="nav-link" href="login.php">Sign in</a>
    </li>

    <li class="nav-item">
      <a class="nav-link" href="register.php">Sign up</a>
    </li>

    <li class="nav-item dropdown">
      <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
        My Account
      </a>
      <div class="dropdown-menu">
        <a class="dropdown-item" href="#">Dashboard</a>
        <a class="dropdown-item" href="#">Profile Settings</a>
        <a class="dropdown-item" href="#">My job applications</a>
        <a class="dropdown-item" href="#">Sign out</a>
      </div>
    </li>
    <li class="nav-item">
  </ul>
</nav>

<div class="container-fluid">

  <span class="badge badge-pill badge-primary">Information Technology</span>
  <span class="badge badge-pill badge-secondary">Logistics</span>
  <span class="badge badge-pill badge-success">Human Resource</span>
  <span class="badge badge-pill badge-danger">Office Administration</span>
  <span class="badge badge-pill badge-warning">Engineering</span>
  <span class="badge badge-pill badge-info">Applied Science</span>
  <span class="badge badge-pill badge-light">Education</span>
  <span class="badge badge-pill badge-dark">Procurement Management</span>
  <br>

  <br>

  <div class="card bg-light text-dark">
    <div class="card-body">Job Listings</div>
  </div>
</div>

<div class="container-fluid">          
  <table class="table table-striped" >
    <thead>
      <tr>
        <th>#</th>
        <th>Job</th>
        <th>Date Posted</th>
        <th>Closing Date</th>
      </tr>
    </thead>
    <tbody>
      <?php
                    session_start();
include_once 'config.php';

      
                    $sql = "SELECT * from jobs ";
                    $result = mysqli_query($link,$sql);
                    while($row = mysqli_fetch_assoc($result)){
                             echo '
     
      <tr>
        <td>'.$row['job_id'].'</td></a>
        <td><a href="job_listing-single.php?id='.$row['job_id'].'">'.$row['title'].'</a><span class="glyphicon glyphicon-trash"></span></td>
        <td><a href="job_listing-single.php?id='.$row['job_id'].'">'.$row['date_posted'].'</a></td>
        <td>'.$row['closing_date'].'</td>
      </tr>
      </a>
       '; }?>
    </tbody>
   
  </table>
</div>
  
</div>


<div class="jumbotron text-center" style="margin-bottom:0">
  <p>Research Project @2020</p>
</div>


</body>
</html>