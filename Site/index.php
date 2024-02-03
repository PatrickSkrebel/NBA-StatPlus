<?php
session_start();
include __DIR__ . "/model/functions.php";

if(isset($_POST["searchBtn"])){
    $TeamName = filter_input(INPUT_POST, "TeamName");

}else{
    $TeamName = "";
}

if(isset($_POST["logoutBtn"])){
    session_unset(); 
    session_destroy();
}

$teams = searchTeam($TeamName);
?>

<style>
    /* Style for the teams dropdown */
.columnTeams {
    display: flex;
    flex-wrap: wrap;
    justify-content: space-between;
    margin-bottom: 20px;
}

/* Style for each division column */
.columnTeams {
    border: 1px solid #ddd; /* Add a border for better separation */
    padding: 10px;
    width: 200px;/* Set width for each column, considering 20px margin */
    box-sizing: border-box;
}

/* Style for the headers and clickable options */
.columnTeams h3, .columnTeams a {
    display: block;
    margin-bottom: 8px;
    text-decoration: none;
    color: #333;
}

.columnTeams a {
    width: 500%; /* Make each team link take up 100% width within the column */
}

.columnTeams a:hover {
    color: #007bff; /* Change the color on hover */
}

 </style>


<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Stats+</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="../css/styles.css" rel="stylesheet" />
    </head>
    <body>
        <!-- Responsive navbar-->
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container">
                <a class="navbar-brand" href="../Site/Index.php">Stats+</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                        <li class="nav-item"><a class="nav-link" href="../Site/Index.php">Home</a></li>
                        <li class="nav-item"><a class="nav-link" href="../StandingsPage/standings.php">Standings</a></li>                             
                        <l1 class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                NBA Teams
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <!-- Add your NBA teams as list items here -->
                                 <!-- Atlantic Div -->
                                <div class="columnTeams"><!-- This styles the division columns-->
                                    <div class="rowTeams">
                                    <!-- Header and the clickable options -->
                                    <h3>Atlantic</h3>
                                    <a href="../RosterPage/roster.php?TeamID=2">Boston Celtics</a>
                                    <a href="../RosterPage/roster.php?TeamID=3">Brooklyn Nets</a>
                                    <a href="../RosterPage/roster.php?TeamID=20">New York Knicks</a>
                                    <a href="../RosterPage/roster.php?TeamID=23">Philidelphia 76rs</a>
                                    <a href="../RosterPage/roster.php?TeamID=28">Toronto Raptors</a>
                                    </div>
                                </div>

                                <!-- Central Div -->
                                <div class="columnTeams">
                                    <div class="rowTeams">
                                    <!-- Header and the clickable options -->
                                    <h3>Central</h3>
                                    <a href="../RosterPage/roster.php?TeamID=5">Chicago Bulls</a>
                                    <a href="../RosterPage/roster.php?TeamID=6">Cleveland Cavaliers</a>
                                    <a href="../RosterPage/roster.php?TeamID=9">Detriot Pistons</a>
                                    <a href="../RosterPage/roster.php?TeamID=12">Indiana Pacers</a>
                                    <a href="../RosterPage/roster.php?TeamID=17">Milwaulke Bucks</a>
                                    </div>
                                                            </div>
                                <!-- Northwest Div -->
                                <div class="columnTeams">
                                    <div class="rowTeams">
                                    <!-- Header and the clickable options -->
                                    <h3>NorthWest</h3>
                                    <a href="../RosterPage/roster.php?TeamID=8">Denver Nuggets</a>
                                    <a href="../RosterPage/roster.php?TeamID=18">Minnestoa Timberwolves</a>
                                    <a href="../RosterPage/roster.php?TeamID=21">Oklahoma City Thunder</a>
                                    <a href="../RosterPage/roster.php?TeamID=25">Portland Trailblazers</a>
                                    <a href="../RosterPage/roster.php?TeamID=29">Utah Jazz</a>
                                    </div>
                                </div>    
                                <!-- Pacific Div -->
                                <div class="columnTeams">
                                    <div class="rowTeams">
                                    <!-- Header and the clickable options -->
                                    <h3>Pacific</h3>
                                    <a href="../RosterPage/roster.php?TeamID=10">Golden State Warriors</a>
                                    <a href="../RosterPage/roster.php?TeamID=13">Los Angeles Clippers</a>
                                    <a href="../RosterPage/roster.php?TeamID=14">Los Angeles Lakers</a>
                                    <a href="../RosterPage/roster.php?TeamID=24">Phoenix Suns</a>
                                    <a href="../RosterPage/roster.php?TeamID=26">Sacramento Kings</a>
                                    </div>
                                </div>
                                <!-- Southeast Div -->
                                <div class="columnTeams">
                                    <div class="rowTeams">
                                    <!-- Header and the clickable options -->
                                    <h3>SouthEast</h3>
                                    <a href="../RosterPage/roster.php?TeamID=1">Atlanta Hawks</a>
                                    <a href="../RosterPage/roster.php?TeamID=4">Charotte Hornets</a>
                                    <a href="../RosterPage/roster.php?TeamID=16">Miami Heat</a>
                                    <a href="../RosterPage/roster.php?TeamID=22">Orlando Magic</a>
                                    <a href="../RosterPage/roster.php?TeamID=30">Washington Wizards</a>
                                    </div>
                                </div>
                                <!-- Southwest Div -->
                                <div class="columnTeams">
                                    <div class="rowTeams">
                                    <!-- Header and the clickable options -->
                                    <h3>SouthWest</h3>
                                    <a href="../RosterPage/roster.php?TeamID=7">Dallas Mavericks</a>
                                    <a href="../RosterPage/roster.php?TeamID=11">Houston Rockets</a>
                                    <a href="../RosterPage/roster.php?TeamID=15">Memphis Grizzlies</a>
                                    <a href="../RosterPage/roster.php?TeamID=19">New Orleans Pelicans</a>
                                    <a href="../RosterPage/roster.php?TeamID=27">San Antonio Spurs</a>
                                    </div>
                                </div>
                                <!-- Add more teams as needed -->
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <!-- Page content-->
        <div class="container mt-5">
            <div class="row">
                <div class="col-lg-8">
                    <!-- Post content-->
                    <article>
                        <!-- Post header-->
                        <header class="mb-4">
                            <!-- Post title-->
                            <h1 class="fw-bolder mb-1">Today's Stats News</h1>
                            <!-- Post meta content-->
                            <!-- <div class="text-muted fst-italic mb-2">Posted on January 1, 2023 by Start Bootstrap</div> -->
                            <!-- Post categories
                            <a class="badge bg-secondary text-decoration-none link-light" href="#!">Web Design</a>
                            <a class="badge bg-secondary text-decoration-none link-light" href="#!">Freebies</a>
                            -->
                        </header>
                        <!-- Preview image figure-->
                        <figure class="mb-4"><img class="img-fluid rounded" src="https://www.inquirer.com/resizer/uoqT-oMeyFqN9RHap2JQM39U9KE=/760x507/smart/filters:format(webp)/cloudfront-us-east-1.images.arcpublishing.com/pmn/6R25ENZBGU5TYMD6NOMB6U7P3A.jpg" alt="..." /></figure>
                        <!-- Post content-->
                        <section class="mb-5">
                            <p class="fs-5 mb-4">Reigning MVP Joel Embiid suffered a lateral meniscus “injury” on his left knee and will be out at least through the weekend, the Philadelphia 76ers announced Thursday, placing the defense of his lofty title in jeopardy.</p>
                            <p class="fs-5 mb-4">Embiid is awaiting further testing to determine whether a tear of the meniscus occurred, and how severe the injury may be, according to sources close to the center.</p>
                            <p class="fs-5 mb-4">Embiid, who suffered the injury in the fourth quarter of a loss Tuesday against the Golden State Warriors, missed his 13th game Thursday against the Utah Jazz. Per a new league rule, any player who does not play in at least 65 of his team’s 82 regular-season games is ineligible for postseason awards. Embiid will be out for at least two more games, and if his absence extends any further, his MVP defense is over.</p>
                        <!-- extra lines
                            <h2 class="fw-bolder mb-4 mt-5">I have odd cosmic thoughts every day</h2>                        
                            <p class="fs-5 mb-4">For me, the most fascinating interface is Twitter. I have odd cosmic thoughts every day and I realized I could hold them to myself or share them with people who might be interested.</p>
                            <p class="fs-5 mb-4">Venus has a runaway greenhouse effect. I kind of want to know what happened there because we're twirling knobs here on Earth without knowing the consequences of it. Mars once had running water. It's bone dry today. Something bad happened there as well.</p>
                        -->
                        </section>
                    </article>
                    <!-- Comments section-->
                    <section class="mb-5">
                        <div class="card bg-light">
                            <div class="card-body">
                                <!-- Comment form-->
                                <form class="mb-4"><textarea class="form-control" rows="3" placeholder="Join the discussion and leave a comment!"></textarea></form>
                                <!-- Comment with nested comments-->
                                <div class="d-flex mb-4">
                                    <!-- Parent comment-->
                                    <div class="flex-shrink-0"><img class="rounded-circle" src="https://dummyimage.com/50x50/ced4da/6c757d.jpg" alt="..." /></div>
                                    <div class="ms-3">
                                        <div class="fw-bold">LeBron James</div>
                                        Where are all the media outlets, tv media personalities, hot takes that talked so much 💩 about Joel Embiid about missing those games when he knew what he was dealing with.
                                        <!-- Child comment 1-->
                                        <div class="d-flex mt-4">
                                            <div class="flex-shrink-0"><img class="rounded-circle" src="https://dummyimage.com/50x50/ced4da/6c757d.jpg" alt="..." /></div>
                                            <div class="ms-3">
                                                <div class="fw-bold">LeBron James</div>
                                                Now he’s out with an injury because of it. Not 1 person has went back on tv or their dumbass podcast and apologized to that MAN!! No accountability 🗑️🗑️🗑️
                                            </div>
                                        </div>
                                        <!-- Child comment 2-->
                                        <div class="d-flex mt-4">
                                            <div class="flex-shrink-0"><img class="rounded-circle" src="https://dummyimage.com/50x50/ced4da/6c757d.jpg" alt="..." /></div>
                                            <div class="ms-3">
                                                <div class="fw-bold">Random Fan</div>
                                                Get in the gym buddy ur team is .500
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Single comment-->
                                <div class="d-flex">
                                    <div class="flex-shrink-0"><img class="rounded-circle" src="https://dummyimage.com/50x50/ced4da/6c757d.jpg" alt="..." /></div>
                                    <div class="ms-3">
                                        <div class="fw-bold">NBA on TNT</div>
                                        "I feel for the kid... He was the clear cut MVP for this year." 

                                        Shaq's reaction to Joel Embiid's meniscus injury
                                        <a href="https://twitter.com/i/status/1753218043482648758" target="_blank">Click to watch the video</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
                <!-- Side widgets-->
                <div class="col-lg-4">
                    <!-- Search widget-->
                    <div class="card mb-4">
                        <div class="card-header">Search</div>
                        <div class="card-body">
                            <div class="input-group">
                                <input class="form-control" type="text" placeholder="Enter search term..." aria-label="Enter search term..." aria-describedby="button-search" />
                                <input type="submit" name="searchBtn" value="Search">
                            </div>
                        </div>
                    </div>
                    <!-- Categories widget-->
                    <div class="card mb-4">
                        <div class="card-header">Categories</div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-6">
                                    <ul class="list-unstyled mb-0">
                                        <li><a href="#!">Web Design</a></li>
                                        <li><a href="#!">HTML</a></li>
                                        <li><a href="#!">Freebies</a></li>
                                    </ul>
                                </div>
                                <div class="col-sm-6">
                                    <ul class="list-unstyled mb-0">
                                        <li><a href="#!">JavaScript</a></li>
                                        <li><a href="#!">CSS</a></li>
                                        <li><a href="#!">Tutorials</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Side widget-->
                    <div class="card mb-4">
                        <div class="card-header">Side Widget</div>
                        <div class="card-body">You can put anything you want inside of these side widgets. They are easy to use, and feature the Bootstrap 5 card component!</div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Footer-->
        <footer class="py-5 bg-dark">
            <div class="container"><p class="m-0 text-center text-white">Copyright &copy; Your Website 2023</p></div>
        </footer>
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="js/scripts.js"></script>
    </body>
</html>
