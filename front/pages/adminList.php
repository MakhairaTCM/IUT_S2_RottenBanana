<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rotten Banana</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css"
    integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">

    <link rel="stylesheet" href="../css/styleFrontTheo.css">

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
              <div class="collapse navbar-collapse justify-content-between align-items-center" id="mynavbar">
                
                <div class="dropdown">
                    <button class="btn text-third dropdown-toggle bg-main" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Admin
                    </button>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                      <a class="dropdown-item" href="./adminList.php">List Movies</a>
                      <a class="dropdown-item" href="./adminModifyAdd.html">Add Movies</a>
                      <a class="dropdown-item" href="./adminListVote.html">List Vote</a>
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
        <section>
            <div class="ml-3 mr-3 mt-5">
                <div class="row ml-0 mb-4">
                    <h2>Requested movies for communities movies</h2>
                    <a href="../pages/adminModifyAdd.html" class="btn btnRedBody ml-3 mt-auto mb-auto">
                        <i class="fas fa-plus"></i> Validate All
                    </a>
                </div>

                <div class="rowResponsiveAdmin">
                    <?php 
                        include "../php/conexionAndClose.php";

                        $conn = connect();

                        // Code pour supprimer le film
                        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                            // $conn = connect();
                            $movieId = $_POST['movieId'];

                            if (isset($_POST['delete'])) {
                                $stmt = $conn->prepare("DELETE FROM Film WHERE id_film = ?");
                                $stmt->bind_param("i", $movieId);

                                if ($stmt->execute()) {
                                    $message = "Film deleted successfully";
                                } else {
                                    $message = "Error: " . $stmt->error;
                                }

                                $stmt->close();
                            } elseif (isset($_POST['validate'])) {
                                $stmt = $conn->prepare("UPDATE Film SET valide = 1 WHERE id_film = ?");
                                $stmt->bind_param("i", $movieId);

                                if ($stmt->execute()) {
                                    $message = "Film validated successfully";
                                } else {
                                    $message = "Error: " . $stmt->error;
                                }

                                $stmt->close();
                            }

                            // $conn->close();
                        }

                        
                        $q = $conn->query('SELECT * FROM `film` WHERE valide=0;'); 
                        foreach ($q as $film) { ?>
                            <div class="fixedHeightWidthCard">
                                <div class="card mb-4 shadow-sm">
                                    <img src="<?= $film['url_poster'];?>" class="card-img-top" alt="Film Poster">
                                    <div class="card-body">
                                        <h5 class="card-title"><?= $film['titre'];?></h5>
                                        <div class="d-flex justify-content-between align-items-center">
                                            <div class="btn-group">
                                                <form method="POST" action="">
                                                    <input type="hidden" name="movieId" value="<?= $film['id_film']; ?>">
                                                    <button type="submit" name="validate" class="btn btnRedBody mt-auto mb-auto mr-2">Validate</button>
                                                </form>
                                                <form method="POST" action="">
                                                    <input type="hidden" name="movieId" value="<?= $film['id_film']; ?>">
                                                    <button type="submit" name="delete" class="btn btnRedBody mt-auto mb-auto">Delete</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php } 
                        $conn->close();
                    ?>
                </div>
            </div>

            <div class="ml-3 mr-3 mt-5">
                <div class="row ml-0 mb-4">
                    <h2>Communities Movies</h2>
                    <a href="../pages/adminModifyAdd.html" class="btn btnRedBody ml-3 mt-auto mb-auto">
                        <i class="fas fa-plus"></i> Add
                    </a>
                </div>

                <div class="rowResponsiveAdmin">
                    <?php 
                        $conn2 = connect();
                        $r = $conn2->query('SELECT * FROM `film` WHERE valide=1;'); 
                        foreach ($r as $film) { ?>
                            <div class="fixedHeightWidthCard">
                                <div class="card mb-4 shadow-sm">
                                    <img src="<?= $film['url_poster'];?>" class="card-img-top" alt="Film Poster">
                                    <div class="card-body">
                                        <h5 class="card-title"><?= $film['titre'];?></h5>
                                        <div class="d-flex justify-content-between align-items-center">
                                            <div class="btn-group">
                                                <button type="button" class="btn btnRedBody mr-2 mt-auto mb-auto">Edit</button>
                                                <form method="POST" action="">
                                                    <input type="hidden" name="movieId" value="<?= $film['id_film']; ?>">
                                                    <button type="submit" name="delete" class="btn btnRedBody mt-auto mb-auto">Delete</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php } 
                        $conn2->close();
                    ?>
                </div>
            </div>
        </section>
    </main>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
