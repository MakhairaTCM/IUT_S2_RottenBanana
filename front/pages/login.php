<?php include '../php/sessionManage.php'; ?>

<?php
$showLoginError = false;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  include("../php/connectAndClose.php");

  $email = filter_var($_POST["loginEmail"], FILTER_SANITIZE_EMAIL);
  $password = filter_var($_POST["loginPassword"], FILTER_SANITIZE_STRING);

  $sql = "SELECT PASSWORD, ADMIN FROM user WHERE mail = ?";

  $stmt = mysqli_prepare($conn, $sql);

  if (!$stmt) {
    echo "MySQL Error: " . mysqli_error($conn);
    exit();
  }

  mysqli_stmt_bind_param($stmt, "s", $email);
  mysqli_stmt_execute($stmt);
  $result = mysqli_stmt_get_result($stmt);
  mysqli_stmt_close($stmt);

  if ($result && mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);

    $hash = $row['PASSWORD'];
    $check = password_verify($password, $hash);

    if ($check) {
      $_SESSION['user_id'] = $email;
      if ($row['ADMIN'] == "1") {
        $_SESSION['admin'] = true;
      }
      header("Location: ../index.php");
    } else {
      echo "<script>console.log('Email or password wrong');</script>";
      $showLoginError = true;
    }
  } else {
    echo "<script>console.log('Email or password wrong');</script>";
    $showLoginError = true;
  }

  mysqli_free_result($result);
}
?>

<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Rotten Banana</title>
    
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../css/login.css">
    <link rel="stylesheet" href="../css/style.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <link rel="icon" href="../assets/banana.png">
</head>
<body>
    <header>
        <nav class="navbar navbar-expand-sm navbar-dark bg-third">
            <div class="container-fluid ">
              <a class="navbar-brand" href="../index.php"><img src="../assets/banana.png" alt="" width="28"></a>
              <a href="../index.php" class="mt-auto mb-auto text-decoration-none mr-3">
                <h1 class="m-0">Rotten Banana</h1>
              </a>

              <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#mynavbar">
                <span class="navbar-toggler-icon"></span>
              </button>
              <div class="collapse navbar-collapse justify-content-end align-items-center" id="mynavbar">
              
              <ul class="navbar-nav me-auto">
                  <li class="nav-item text-center">
                      <a class="nav-link" href="./choose.php">
                          <img src="../assets/loginicon.png" width="32" height="32" alt="icon login">
                      </a>
                  </li>
                </ul>
              </div>
            </div>
          </nav>
    </header>

    <?php 
    if($showLoginError) {
        echo ' <div class="container-fluid row justify-content-center"><div class="alert alert-danger col-3 mt-4 text-center">Email or Password is wrong</div></div> ';
      }
    ?>

    <div class="container col-md-5 mt-4">
      <div class="col-md-12 mb-4">
        <h2 class="text-center">Log In</h2>


    <?php if ($isLoggedIn): ?>
        <div class="justify-content-center text-center pt-4">
          <p class="m-0">
            You're already logged in, log out first 
          </p>
          <div class="btn bg-main m-2" type="button">
              <a href="../php/logoutLogin.php" class="m-0 text-third">Logout</a>
          </div>   
        </div>  


    <?php else: ?>
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
    <?php endif; ?>


      </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <script src="../js/login.js"></script>
</body>
</html>