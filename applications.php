<!DOCTYPE html>
<html lang="en">
<head>
  <title>Applications</title>
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
        <h3>Received Job Applications:</h3>
        <form action="/action_page.php">
    <select name="cars" class="custom-select mb-3">
      <option selected>Select Ministry</option>
      <option value="volvo">Volvo</option>
      <option value="fiat">Fiat</option>
      <option value="audi">Audi</option>
      </select>

      <select name="cars" class="custom-select mb-3">
      <option selected>Select Job</option>
      <option value="volvo">Volvo</option>
      <option value="fiat">Fiat</option>
      <option value="audi">Audi</option>
    </select>
    
    <button type="submit" class="btn btn-primary">Search</button>
  </form>
        <p>Here is a list of short listed candidates.</p>
    <table class="table table-bordered">
    <thead>
      <tr>
        <th>First Name</th>
        <th>Last name</th>
        <th>Score</th>
        <th>View</th>
      </tr>
    </thead>
    <?php
                    include 'config.php';
                    $sql = "SELECT first_names, last_name, id_number, candidate_score from user_data, candidates ";
                    $result = mysqli_query($link,$sql);
                    while($row = mysqli_fetch_assoc($result)){
                             echo '
    <tbody>
      <tr>
        <td>'.$row['first_names'].'</td>
        <td>'.$row['last_name'].'</td>
        <td>'.$row['candidate_score'].'</td>
        <td><a href="candidate-single.php?id_number='.$row['id_number'].'">Open</td>

      </tr>

     
    </tbody>
    '; }?>
  </table>

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
