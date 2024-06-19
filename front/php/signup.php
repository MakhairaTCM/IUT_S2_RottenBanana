<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "your_database";

// Crée la connexion
$conn = new mysqli($servername, $username, $password, $dbname);

// Vérifie la connexion
if($conn) { 
    echo "success";  
}  
else { 
    die("Error". mysqli_connect_error());  
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
              <a href="../index.html" class="mt-auto mb-auto text-decoration-none mr-3">
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
   
    <div class="container col-md-6 mt-4">
        <div class="col-md-12 mb-4">
            <h2>Sign Up</h2>
            <form id="signupForm">
                <div class="form-group">
                    <label for="signupEmail">Email</label>
                    <input type="email" class="form-control" id="signupEmail" name="signupEmail" required>
                </div>
                <div class="form-group">
                    <label for="signupPassword">Password</label>
                    <input type="password" class="form-control" id="signupPassword" name="signupPassword" required>
                </div>
                <div class="dropdown">
                    <button class="btn dropdown-toggle" type="button" id="signupStatut" data-bs-toggle="dropdown" aria-expanded="false">
                      Statut
                    </button>
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                      <li><a class="dropdown-item" href="#">1st Year</a></li>
                      <li><a class="dropdown-item" href="#">2nd Year</a></li>
                      <li><a class="dropdown-item" href="#">3rd Year</a></li>
                      <li><a class="dropdown-item" href="#">Teacher</a></li>
                    </ul>
                </div>
                <br>
                <button type="submit" class="btn bg-third text-second btn-block">Sign Up</button>
            </form>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <script src="../js/login.js"></script>
</body>
</html>