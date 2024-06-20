<?php
$showAlert = false;  
$showError = false;  
$exists=false; 
    
if($_SERVER["REQUEST_METHOD"] == "POST") { 
      
    include("../php/connectAndClose.php");
    
    $email = $_POST["signupEmail"];  
    $password = $_POST["signupPassword"];  
    $cpassword = $_POST["signupPasswordConfirm"];
    $sql = "Select * from user where mail='$email'"; 
    
      $result = mysqli_query($conn, $sql); 
    
    $num = mysqli_num_rows($result);  
    
    // This sql query is use to check if 
    // the email is already present  
    // or not in our Database 
    if($num == 0) { 
        if(($password == $cpassword) && $exists==false) { 
    
            $hash = password_hash($password, PASSWORD_DEFAULT); 
                
            // Password Hashing is used here.  
            $sql = "INSERT INTO `user` ( `mail`, `password`, `admin`) VALUES ('$email', '$hash', '0')"; 
    
            $result = mysqli_query($conn, $sql); 
    
            if ($result) { 
                $showAlert = true;  
            } 
        }  
        else {  
            $showError = "Passwords do not match";  
        }       
    }// end if  
    
   if($num>0)  
   { 
      $exists="email not available";  
   }  
    
}//end if    
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
    
    if($showAlert) { 
    
        echo '<div class="container-fluid row justify-content-center"><div class="alert alert-success col-4 mt-4">Account successfully created</div></div>';  
    } 
    
    if($showError) { 
    
        echo '<div class="container-fluid row justify-content-center"><div class="alert alert-danger col-3 mt-4">Passwords do not match</div></div>';  
   } 
        
    if($exists) { 
        echo '<div class="container-fluid row justify-content-center"><div class="alert alert-danger col-5 mt-4">Oops, looks like this email address is already in use</div></div>';  
     } 
   
?> 
   
    <div class="container col-md-6 mt-4">
        <div class="col-md-12 mb-4">
            <h2 class="text-center mb-2">Sign Up</h2>
            <form action="signup.php" method="post">
                <div class="form-group">
                    <label for="signupEmail">Email</label>
                    <input type="email" class="form-control" id="signupEmail" name="signupEmail" required>
                </div>
                <div class="form-group">
                    <label for="signupPassword">Password</label>
                    <input type="password" class="form-control" id="signupPassword" name="signupPassword" required>
                </div>
                <div class="form-group">
                    <label for="signupPasswordConfirm">Confirm Password</label>
                    <input type="password" class="form-control" id="signupPasswordConfirm" name="signupPasswordConfirm" required>
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