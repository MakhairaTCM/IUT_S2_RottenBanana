
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rotten Banana</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css"
    integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">

    <link rel="stylesheet" href="./css/styleFrontTheo.css">
    <link rel="icon" href="./assets/banana.png">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
</head>
<body>
    <header>
        <nav class="navbar navbar-expand-sm navbar-dark bg-third">
            <div class="container-fluid ">
              <a class="navbar-brand" href="./index.php">
                <img src="./assets/banana.png" alt="logo of the website : a rotten banana" width="28">
              </a>
              <a href="./index.php" class="mt-auto mb-auto text-decoration-none mr-3">
                <h1 class="m-0">Rotten Banana</h1>
              </a>
              <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#mynavbar">
                <span class="navbar-toggler-icon"></span>
              </button>
              
              <div class="collapse navbar-collapse justify-content-between align-items-center" id="mynavbar">
                <div class="d-flex ">
                    <input type="text" class="form-control mt-auto mb-auto" placeholder="Search" id="input-movie">
                    <div class="dropdown ml-3">
                        <button class="btn text-third  dropdown-toggle bg-main " type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Admin
                        </button>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                          <a class="dropdown-item" href="./pages/adminList.php">List Movies</a>
                          <a class="dropdown-item" href="./pages/adminModifyAdd.html">Add Movies</a>
                          <a class="dropdown-item" href="./pages/adminListVote.php">List Vote</a>
                        </div>
                    </div>
                </div>
                
                <ul class="navbar-nav me-auto">
                  <li class="nav-item text-center">
                    <a class="nav-link" href="./pages/login.html">
                        <img src="./assets/loginicon.png" width="32" height="32" alt="icon login">
                    </a>
                  </li>
                </ul>
              </div>
            </div>
          </nav>
    </header>

    <main class="p-3">
        <section id="search-results-section" class="mb-5">
            <h2>Search Results</h2>
            <div id="movie-posters" class="pb-2"></div>
        </section>
        
        <section class="mb-5">
            <h2>Trending Movies</h2>
            <div id="movie-posters-random" class="pb-2">
                <!-- Movie posters will be displayed here -->
            </div>
        </section>
        
        <section class="mb-5">
            <div class="row ml-0">
                <h2>Community</h2>
                <a href="./pages/adminModifyAdd.html" class="btn btnRedBody ml-3 mt-auto mb-auto">
                    <i class="fas fa-plus"></i> Add Suggestion
                </a>
            </div>
            <div id="movie-posters-community" class="pb-2">
                <?php 
                    include "./php/conexionAndClose.php";
                    $conn = connect();
                    
                    $q = $conn->query('SELECT * FROM `film` WHERE valide=1 LIMIT 50;'); 
                    foreach ($q  as  $film){ ?>
                    
                            <div class="movie-poster-card" data-movie-id="<?= $film['id_film'];?>" data-movie-title="<?= $film['titre']; ?>" data-movie-genre="<?= $film['genre']; ?>">
                                <img src="<?= $film['url_poster'];?>" alt="poster of the film <?= $film['titre'];?>" class="movieImg">
                                <p><?= $film['titre'];?></p>
                                <div class="vote-icons">
                                    <img src="./assets/likeblue.png" class="vote-icon" alt="Upvote">
                                    <img src="./assets/dislikered.png" class="vote-icon" alt="Downvote">
                                </div>
                                <div class="resume">
                                    <p>Summary :</p>
                                    <p><?= $film['resumer'];?></p>
                                </div>
                            </div>
                        

                        <?php } 
                            // $conn->close();

                            ?>
            </div>
        </section>
        
        <section class="mb-5">
            <h2>Ranking</h2>
            <div id="movie-posters-ranking" class="pb-2">
                <?php 
                    $q = $conn->query('SELECT film.titre, film.genre, film.url_poster, film.id_film, SUM(vote.vote) AS total_votes FROM film INNER JOIN vote ON film.id_film = vote.id_film GROUP BY film.id_film, film.titre, film.genre, film.url_poster ORDER BY total_votes DESC LIMIT 20;'); 
                    $films = $q->fetch_all(MYSQLI_ASSOC); // Fetch all results into an associative array
                    for ($i = 0; $i < count($films); $i++) {
                        $film = $films[$i];
                ?>
                        <div class="movie-poster-card-ranking">
                            <div class="ranking-badge"><?= $i+1; ?></div>
                            <img src="<?= $film['url_poster']; ?>" alt="poster of the film <?= $film['titre'];?>" class="movieImg">
                            <p><?= $film['titre']; ?></p>
                        </div>
                <?php 
                    } 
                    $conn->close();
                ?>
            </div>
        </section>
                <section class="mb-5">
            <h2>Results Charts</h2>
            <div class="ligneFlex pb-1">
                <canvas id="myChart1" style="width:100%;max-width:700px" class="bg-light border rounded mb-3"></canvas>
                <canvas id="myChart" style="width:100%;max-width:600px" class="bg-light border rounded ml-3 mb-3"></canvas>
                <canvas id="marksChart" style="width:100%;max-width:600px" class="bg-light border rounded ml-3 mb-3"></canvas>

            </div>
        </section>
    </main>

    <footer></footer>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>
    <script src="./js/charts.js"></script>
    
    <script>

        document.addEventListener('DOMContentLoaded', e => {
            fetchRandomMovies();
            addVoteListeners(); 
        });
    
        function fetchRandomMovies() {
            $.ajax({
                url: "https://api.themoviedb.org/3/movie/popular",
                dataType: "json",
                data: {
                    api_key: "a78671649d9627eedd795ddb4114bf73"
                },
                success: function (data) {
                    const movies = data.results;
                    const shuffledMovies = movies.sort(() => 0.5 - Math.random());
                    const randomMovies = shuffledMovies.slice(0, 20);
                    displayMovies(randomMovies, '#movie-posters-random');
                },
                error: function() {
                    $('#movie-posters-random').html(`<p>Sorry, could not fetch movies.</p>`);
                }
            });
        }
    
        document.addEventListener('DOMContentLoaded', () => {
            $('#input-movie').on('input', function () {
                const query = $(this).val();
                if (query.length >= 2) {
                    searchMovies(query);
                } else {
                    $('#movie-posters').empty(); 
                    $('#search-results-section').hide(); 
                    searchResultsAdded = false;  
                }
            });
        });
    
        function searchMovies(query) {
            $.ajax({
                url: "https://api.themoviedb.org/3/search/movie",
                dataType: "json",
                data: {
                    api_key: "a78671649d9627eedd795ddb4114bf73",  
                    query: query
                },
                success: function (data) {
                    const movies = data.results.map(movie => ({
                        id: movie.id,
                        title: movie.title,
                        summary: movie.overview
                    }));
                    displayMovies(movies, '#movie-posters');
                },
                error: function() {
                    $('#movie-posters').html(`<p>Sorry, no movies found.</p>`);
                }
            });
        }
    
        function displayMovies(movies, containerSelector) {
            const moviePostersContainer = $(containerSelector);
            moviePostersContainer.empty();
            
            movies.forEach(movie => {
                $.ajax({
                    url: `https://api.themoviedb.org/3/movie/${movie.id}`,
                    dataType: "json",
                    data: {
                        api_key: "a78671649d9627eedd795ddb4114bf73"
                    },
                    success: function (movieDetails) {
                        const posterPath = movieDetails.poster_path;
                        const posterUrl = posterPath ? `https://image.tmdb.org/t/p/w500${posterPath}` : '../front/assets/placeholder.jpg';
                        
                        let firstGenre = 'Genre Not Available';
                        if (movieDetails.genres.length > 0) {
                            firstGenre = movieDetails.genres[0].name;
                        }
                        
                        const moviePosterCard = $('<div>').addClass('movie-poster-card')
                                                        .attr('data-movie-id', movieDetails.id)
                                                        .attr('data-movie-title', movieDetails.title)
                                                        .attr('data-movie-genre', firstGenre)
                                                        .attr('data-movie-summary', movieDetails.overview);
                                                        
                        const posterImg = $('<img>').attr('src', posterUrl).attr('alt', `${movieDetails.title} Poster`).addClass('movieImg');
                        const movieTitle = $('<p>').text(movieDetails.title);
                        const voteIcons = $('<div>').addClass('vote-icons')
                            .append($('<img>').attr('src', './assets/likeblue.png').addClass('vote-icon').attr('alt', 'Upvote'))
                            .append($('<img>').attr('src', './assets/dislikered.png').addClass('vote-icon').attr('alt', 'Downvote'));
                        
                        const summary = $('<div>').addClass('resume')
                            .append($('<p>').text("Summary:"))
                            .append($('<p>').text(movieDetails.overview)).addClass('resumeContent');

                        moviePosterCard.append(posterImg, movieTitle, voteIcons, summary);
                        moviePostersContainer.append(moviePosterCard);
                        addVoteListeners(); // Add listeners after each movie card is appended
                    },
                    error: function() {
                        const moviePosterCard = $('<div>').addClass('movie-poster-card');
                        const posterImg = $('<img>').attr('src', './assets/placeholder.jpg').attr('alt', 'No Poster Available');
                        const errorMsg = $('<p>').text(movie.title);
                        
                        moviePosterCard.append(posterImg, errorMsg);
                        moviePostersContainer.append(moviePosterCard);
                    }
                });
            });

            if (containerSelector === '#movie-posters' && !searchResultsAdded) {
                $('#search-results-section').show();
                searchResultsAdded = true;
            }
        }


        let searchResultsAdded = false;
        $('#search-results-section').hide(); 

        function addVoteListeners() {
            $(document).off('click', '.vote-icon').on('click', '.vote-icon', function() {
                const movieCard = $(this).closest('.movie-poster-card');
                const movieId = movieCard.data('movie-id'); // ID du film
                const movieTitle = movieCard.data('movie-title'); // Titre du film
                const movieGenre = movieCard.data('movie-genre'); // Genre du film
                const movieImgSrc = movieCard.find('img.movieImg').attr('src'); // URL du poster
                const movieSummary = movieCard.data('movie-summary');


                const voteValue = $(this).attr('alt') === 'Upvote' ? 1 : -1; // +1 for upvote, -1 for downvote
                const userEmail = 'user1@example.com'; // Replace this with actual user email

                const movieData = {
                    movieId: movieId,
                    movieTitle: movieTitle,
                    movieGenre: movieGenre,
                    movieImgSrc: movieImgSrc,
                    valide: 1, // because u don't need to validate a movie already present in the api 
                    movieSummary: movieSummary,

                    vote: voteValue, // +1 for upvote, -1 for downvote
                    mail: userEmail
                };

                $.ajax({
                    url: 'film.php',
                    type: 'POST',
                    data: movieData,
                    success: function(response) {
                        console.log(response);
                    },
                    error: function(jqXHR, textStatus, errorThrown) {
                        console.error('Error:', textStatus, errorThrown);
                    }
                });
            });
        }





        
    </script>
</body>
</html>

