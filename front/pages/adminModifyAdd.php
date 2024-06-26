<?php
session_start();
// Check if the user is logged in
if (isset($_SESSION['user_id'])) {$isLoggedIn = true;} 
else {$isLoggedIn = false;}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rotten Banana</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="../css/styleFrontTheo.css">
    <link rel="icon" href="../assets/banana.png">
</head>
<body>
    <header>
        <nav class="navbar navbar-expand-sm navbar-dark bg-third">
            <div class="container-fluid">
                <a class="navbar-brand" href="../index.php"><img src="../assets/banana.png" alt="" width="28"></a>
                <a href="../index.php" class="mt-auto mb-auto text-decoration-none mr-3">
                    <h1 class="m-0">Rotten Banana</h1>
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#mynavbar">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse justify-content-between align-items-center" id="mynavbar">
                    <div class="dropdown">
                        <button class="btn text-third dropdown-toggle bg-main" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Admin
                        </button>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <a class="dropdown-item" href="./adminList.php">List Movies</a>
                            <a class="dropdown-item" href="./adminModifyAdd.php">Add Movies</a>
                            <a class="dropdown-item" href="./adminListVote.php">List Vote</a>
                        </div>
                    </div>
                    <ul class="navbar-nav me-auto">
                    <?php if ($isLoggedIn): ?>
                    <li class="nav-item text-center">
                        <div class="btn bg-main m-2" type="button">
                            <a href="./php/logout.php" class="m-0 text-third">Logout</a>
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
    <main>
        <section class="container mt-5">
            <h2 class="text-center">Add or Modify a Movie</h2>
            <form action="../php/add_movie.php" method="POST">
              <div class="form-group">
                  <label for="movieTitle">Movie Title</label>
                  <input type="text" class="form-control" id="movieTitle" name="movieTitle" placeholder="Enter movie title" required>
              </div>
              <div class="form-group">
                  <label for="movieImgSrc">Movie Poster URL</label>
                  <input type="text" class="form-control" id="movieImgSrc" name="movieImgSrc" placeholder="Enter movie poster URL" required>
              </div>
              <div class="form-group">
                <label for="movieSummary">Movie Summary</label>
                <textarea class="form-control" id="movieSummary" name="movieSummary" placeholder="Enter Summary here" rows="5" required></textarea>

              </div>
              <div class="form-group">
                  <label for="movieGenre">Movie Genre</label>
                  <select class="form-control" id="movieGenre" name="movieGenre" required>
                      <option value="Action">Action</option>
                      <option value="Comedy">Comedy</option>
                      <option value="Drama">Drama</option>
                      <option value="Horror">Horror</option>
                      <option value="Romance">Romance</option>
                      <option value="Sci-Fi">Science Fiction</option>
                      <option value="Thriller">Thriller</option>
                      <option value="Thriller">Animation</option>
                      <option value="Thriller">War</option>


                  </select>
              </div>
              <button type="submit" class="btn btnRedBody">Add Movie</button>
            </form>
          
        </section>
    </main>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>