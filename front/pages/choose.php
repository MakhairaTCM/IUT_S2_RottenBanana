<?php include '../php/sessionManage.php'; ?>

<!DOCTYPE html>
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
                <?php if ($isLoggedIn): ?>
                    <li class="nav-item text-center">
                        <div class="btn bg-main m-2" type="button">
                            <a href="../php/logout.php" class="m-0 text-third">Logout</a>
                        </div>     
                    </li>       
                <?php else: ?>
                    <li class="nav-item text-center">
                        <a class="nav-link" href="./choose.php">
                            <img src="../assets/loginicon.png" width="32" height="32" alt="icon login">
                        </a>
                    </li>
                <?php endif; ?>
                  </ul>
              </div>
            </div>
          </nav>
    </header>
   
    <div class="container col-md-5 mt-4">
      <div class="col-md-12 mb-2">
          <h2 class="text-center">Connect Now</h2> <br>
            <a href="./signup.php" class="btn bg-third text-second btn-block"" role="button">Sign Up</a>
            <a href="./login.php" class="btn bg-third text-second btn-block"" role="button">Log In</a>
      </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <script src="../js/login.js"></script>
</body>
</html>