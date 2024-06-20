<?php
include "../php/conexionAndClose.php";
$conn = connect();

if (isset($_GET['movieId'])) {
    $movieId = $_GET['movieId'];
    $stmt = $conn->prepare("SELECT * FROM Film WHERE id_film = ?");
    $stmt->bind_param("i", $movieId);
    $stmt->execute();
    $result = $stmt->get_result();
    $film = $result->fetch_assoc();
    $stmt->close();
    $conn->close();
}
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
                            <a class="dropdown-item" href="./adminModifyAdd.html">Add Movies</a>
                            <a class="dropdown-item" href="./adminListVote.php">List Vote</a>
                        </div>
                    </div>
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
    <main>
        <section class="container mt-5">
            <h2 class="text-center">Add or Modify a Movie</h2>
            <form action="../php/add_movie.php" method="POST">
                <input type="hidden" name="movieId" value="<?= $film['id_film']; ?>">
                <div class="form-group">
                    <label for="movieTitle">Movie Title</label>
                    <input type="text" class="form-control" id="movieTitle" name="movieTitle" placeholder="Enter movie title" value="<?= $film['titre']; ?>" required>
                </div>
                <div class="form-group">
                    <label for="movieImgSrc">Movie Poster URL</label>
                    <input type="text" class="form-control" id="movieImgSrc" name="movieImgSrc" placeholder="Enter movie poster URL" value="<?= $film['url_poster']; ?>" required>
                </div>
                <div class="form-group">
                    <label for="movieGenre">Movie Genre</label>
                    <select class="form-control" id="movieGenre" name="movieGenre" required>
                        <option value="Action" <?= $film['genre'] == 'Action' ? 'selected' : ''; ?>>Action</option>
                        <option value="Comedy" <?= $film['genre'] == 'Comedy' ? 'selected' : ''; ?>>Comedy</option>
                        <option value="Drama" <?= $film['genre'] == 'Drama' ? 'selected' : ''; ?>>Drama</option>
                        <option value="Horror" <?= $film['genre'] == 'Horror' ? 'selected' : ''; ?>>Horror</option>
                        <option value="Romance" <?= $film['genre'] == 'Romance' ? 'selected' : ''; ?>>Romance</option>
                        <option value="Sci-Fi" <?= $film['genre'] == 'Sci-Fi' ? 'selected' : ''; ?>>Sci-Fi</option>
                        <option value="Thriller" <?= $film['genre'] == 'Thriller' ? 'selected' : ''; ?>>Thriller</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Update Movie</button>
            </form>
        </section>
    </main>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
