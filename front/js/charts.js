fetch('./php/getVotedMovies.php')
        .then(response => response.json())
        .then(data => {
            var marksCanvas = document.getElementById("marksChart");

            var movies = data.map(item => item.title);
            var countLike = data.map(item => item.count_like);
            var countDislike = data.map(item => item.count_dislike);

            var marksData = {
                labels: movies,
                datasets: [{
                    label: "Positive Votes",
                    backgroundColor: "rgba(24,19,48,0.3)",
                    data: countLike
                }, {
                    label: "Dislike Votes",
                    backgroundColor: "rgba(217,65,116,0.3)",
                    data: countDislike
                }]
            };

            var radarChart = new Chart(marksCanvas, {
                type: 'radar',
                data: marksData,
                options: {
                    scale: {
                        ticks: {
                            beginAtZero: true,
                            min: 0,
                            stepSize: 2
                        }
                    },
                    title: {
                        display: true,
                        text: 'Movie Votes (Likes vs Dislikes)',
                        // fontSize: 18,
                        fontColor: '#333' // Optional: specify font color
                    }
                }
            });
        })
        .catch(error => {
            console.error('Error fetching data:', error);
        });





        // First Charts
        document.addEventListener('DOMContentLoaded', function() {
            fetchTopVotedMovies();
        });

        function fetchTopVotedMovies() {
            $.ajax({
                url: './php/getTopVotedMovies.php', 
                method: 'GET',
                dataType: 'json',
                success: function(data) {
                    const xValues = data.map(movie => movie.titre);
                    const yValues = data.map(movie => movie.total_votes);

                    
                    const barColors = xValues.map((_, index) => (index % 2 === 0 ? '#D94174' : '#181330'));

                    new Chart("myChart1", {
                        type: "bar",
                        data: {
                            labels: xValues,
                            datasets: [{
                                backgroundColor: barColors,
                                data: yValues
                            }]
                        },
                        options: {
                            scales: {
                                yAxes: [{
                                    ticks: {
                                        beginAtZero: true 
                                    }
                                }]
                            },
                            legend: { display: false },
                            title: {
                                display: true,
                                text: "Most Popular Movies"
                            }
                        }
                    });
                },
                error: function(error) {
                    console.error('Error fetching top voted movies:', error);
                }
            });
        }


        // Second Chart
        // function generateRandomColors(numColors) {
        //     const colors = [];
        //     for (let i = 0; i < numColors; i++) {
        //         const color = `hsl(${Math.floor(Math.random() * 360)}, 100%, 50%)`;
        //         colors.push(color);
        //     }
        //     return colors;
        // }
        fetch('./php/data_genre.php')
            .then(response => response.json())
            .then(data => {
                var xValues = data.map(item => item.genre);
                var yValues = data.map(item => item.total_votes_genre);

                // var barColors = generateRandomColors(xValues.length);
                // const barColors = xValues.map((_, index) => (index % 2 === 0 ? '#D94174' : '#181330'));

                const colors = ['#D94174', '#181330', '#FFDE17'];
                const barColors = xValues.map((_, index) => colors[index % colors.length]);


                new Chart("myChart", {
                    type: "pie",
                    data: {
                        labels: xValues,
                        datasets: [{
                            backgroundColor: barColors,
                            data: yValues
                        }]
                    },
                    options: {
                        title: {
                            display: true,
                            text: "Voted Movie Genre"
                        }
                    }
                });
        });