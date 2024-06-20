<?php
$showLoginError = false;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  include("../php/connectAndClose.php");

  $email = $_POST["loginEmail"];
  $password = $_POST["loginPassword"];

  echo "<script>console.log('email is $email')</script>";
  echo "<script>console.log('passw is $password')</script>";

  $sql = "SELECT * FROM user WHERE mail='".$email."';";
  $result = mysqli_query($conn, $sql); 
  $num = mysqli_num_rows($result);  

  if ($num > 0) {
    echo "<script>console.log('email is good');</script>";

    $sql = "SELECT PASSWORD FROM user WHERE mail='".$email."';";
    $result = mysqli_query($conn, $sql); 
    $row = mysqli_fetch_array($result);

    $hash = "0";
    if ($row) {$hash = $row[0];}
    $check = password_verify("$password", "$hash");

    if ($check) {
      echo "<script>console.log('everything is good, connected');</script>";
      header("Location: ../index.php");
    }

    else {
      echo "<script>console.log('wrong password');</script>";
      $showLoginError = true;
    }
  }
  else {
    echo "<script>console.log('email is wrong');</script>";
    $showLoginError = true;
  }
}
?>

<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Rotten Banana</title>
    
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../css/login.css">
    <link rel="stylesheet" href="../css/styleFrontTheo.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <link rel="icon" href="../assets/banana.png">
</head>
<body>
    <header>
        <nav class="navbar navbar-expand-sm navbar-dark bg-third">
            <div class="container-fluid ">
              <a class="navbar-brand" href="../index.html"><img src="../assets/banana.png" alt="" width="28"></a>
              <a href="../index.php" class="mt-auto mb-auto text-decoration-none mr-3">
                <h1 class="m-0">Rotten Banana</h1>
              </a>

              <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#mynavbar">
                <span class="navbar-toggler-icon"></span>
              </button>
              <div class="collapse navbar-collapse justify-content-end align-items-center" id="mynavbar">
              
                <ul class="navbar-nav me-auto">
                  <li class="nav-item text-center">
                    <a class="nav-link" href="./login.html">
                        <img src="../assets/loginicon.png" width="32" height="32">
                    </a>
                  </li>
                </ul>
              </div>
            </div>
          </nav>
    </header>

    <?php 
    if($showLoginError) {

        echo '<div class="container-fluid row justify-content-center"><div class="alert alert-danger justify-content-center col-3 mt-4">Email or password is incorrect</div></div>';
      }
    ?>

    <div class="container col-md-5 mt-4">
        <div class="col-md-12 mb-4">
            <h2 class="text-center mb-2">Log In</h2>
            <form id="loginForm" action="login.php" method="post">
                <div class="form-group">
                    <label for="loginEmail">Email</label>
                    <input type="email" class="form-control" id="loginEmail" name="loginEmail" required>
                </div>
                <div class="form-group">
                    <label for="loginPassword">Password</label>
                    <input type="password" class="form-control" id="loginPassword" name="loginPassword" required>
                </div>
                <button type="submit" class="btn bg-third text-second btn-block">Log In</button>
            </form>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <script src="../js/login.js"></script>
</body>
</html>