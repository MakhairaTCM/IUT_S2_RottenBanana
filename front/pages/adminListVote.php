<?php include '../php/sessionManage.php'; ?>
<?php 
if(!$isLoggedIn || !$isAdmin){
    header("location: ./choose.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rotten Banana</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css"
    integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">

    <link rel="stylesheet" href="../css/style.css">

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
                    <button class="btn text-third  dropdown-toggle bg-main " type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Admin
                    </button>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                      <a class="dropdown-item" href="./adminList.php">List Movies</a>
                      <a class="dropdown-item" href="./adminModifyAdd.php">Add Movies</a>
                      <a class="dropdown-item" href="./adminListVote.php">List Vote</a>

                      <!-- <a class="dropdown-item" href="#">Something else here</a> -->
                    </div>
                </div>

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

    <main>
        <table class="table align-middle mb-0 bg-third container mt-4">
            <thead class="bg-light">
              <tr>
                <th>E-mail Adress</th>
                <th>Movie Title</th>
                <th>Vote</th>
                
              </tr>
            </thead>
            <tbody>
              <?php 
                include "../php/conexionAndClose.php";
                $conn = connect();
                
                $q = $conn->query('SELECT vote.mail, film.titre, vote.vote FROM `user` INNER JOIN vote ON user.mail=vote.mail INNER JOIN film ON vote.id_film=film.id_film;'); 
                
                foreach ($q as $vote) { ?>
                    <tr>
                        <td>
                            <div class="d-flex align-items-center">
                                <div class="ms-3">
                                    <p class="mb-0"><?= htmlspecialchars($vote['mail']); ?></p>
                                </div>
                            </div>
                        </td>
                        <td>
                            <p class="fw-normal mb-1"><?= htmlspecialchars($vote['titre']); ?></p>
                        </td>
                        <td class="backdropFilterBr">
                            <?php if ($vote['vote'] == 1) { ?>
                                <img src="../assets/likeblue.png" class="vote-icon-liste" alt="Upvote">
                            <?php } else{ ?>
                                <img src="../assets/dislikered.png" class="vote-icon-liste" alt="Downvote">
                            <?php } ?>
                        </td>
                    </tr>
                <?php } 
                $conn->close();

                ?>
            </tbody>
          </table>
        
    </main>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.bundle.min.js"></script>
    
</body>
</html>