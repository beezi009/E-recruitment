
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
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
  <a class="navbar-brand" href="welcome.php">
    <img src="images/1200px-Coat_of_arms_of_Namibia.svg.png" alt="logo" style="width:40px;">
  </a>
  
  <!-- Links -->
  <ul class="navbar-nav">
    <li class="nav-item">
      <a class="nav-link" href="index.php">Vacancies</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="#">Personal Details</a>
    </li>
    <li class="nav-item">
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
        <form action="user_data.php" method="post">
          <h3>Personal Information</h3>
    <?php
                  session_start();
include_once 'config.php';

$username = $_SESSION["username"];
                    $sql = "SELECT * from user_data  where username = '$username'";
                    $result = mysqli_query($link,$sql);
                    while($row = mysqli_fetch_assoc($result)){
                             echo '
    <div class="form-group">
      <label for="firstnames">First Names:</label>
      <input type="text" class="form-control" id="firstnames" value="'.$row['first_names'].'" placeholder="Enter your firstnames" name="firstnames">
    </div>

    <div class="form-group">
      <label for="lastname">Lastname:</label>
      <input type="text" class="form-control" id="lastname" value="'.$row['last_name'].'" placeholder="Enter your lastname" name="lastname">
    </div>

    <div class="form-group">
      <label for="id_number">ID:</label>
      <input type="text" class="form-control" id="id_number" value="'.$row['id_number'].'" placeholder="Enter your id_number" name="id_number">
    </div>

    <div class="form-group">
      <label for="dob">Dob:</label>
      <input type="date" class="form-control" id="dob"  value="'.$row['dob'].'" placeholder="Enter your date of birth" name="dob">
    </div>

    <div class="form-group">
      <label for="nationality">Nationality</label>
      <input type="text" class="form-control" id="nationality" value="'.$row['nationality'].'" placeholder="Enter your Nationality" name="nationality">
    </div>

    <div class="form-group">
      <label for="address">Residetial Address</label>
      <input type="text" class="form-control" id="address" value="'.$row['residential_address'].'" placeholder="Enter your Residential address" name="address">
    </div>

    <div class="form-group">
      <label for="postal_address">Postal Address</label>
      <input type="text" class="form-control" value="'.$row['postal_address'].'" id="postal_address" placeholder="Enter your Postal Address" name="postal_address">
    </div>

    <select name="marital_status" class="custom-select mb-3">
      <option selected>Marital Status</option>
      <option value="MARRIED">Married</option>
      <option value="SINGLE">Single</option>
    </select>

    <select name="sex" class="custom-select mb-3">
      <option selected>Sex</option>
      <option value="MALE">Male</option>
      <option value="FEMALE">Female</option>
    </select>
    '; }?>
    
    <button type="submit"  class="btn btn-primary">Update</button>
  </form>
      </div>
      <div class="col-sm-6 bg-warning">
        <img src="images/pexels-cottonbro-5081971.jpg" width="100%">
      </div>
    </div>
  </div>
</div>


<div class="jumbotron text-center" style="margin-bottom:0">
  <p>Research 2020</p>
</div>


</body>
</html>