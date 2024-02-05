<?php
session_start();
    include __DIR__ . "/model/functions.php";

    
    $TeamName = "";
    $Conference = "";
    $league = "";
    
    
    if(isset($_GET["Conference"])){
        $Conference = filter_input(INPUT_GET, "Conference");
    }
    
    if(isset($_GET["East/West"])){
        $league = filter_input(INPUT_GET, "East/West");
    }
    
    if(isset($_POST["logoutBtn"])){
        session_unset(); 
        session_destroy();
    }

    $teams = searchConference($Conference);
    $team = getStandings();

    $rank = 0;

    //$people = getPeople();
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Blog Post - Start Bootstrap Template</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="../css/styles.css" rel="stylesheet" />
    </head>
    <body>
        <!-- Responsive navbar-->
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container">
                <a class="navbar-brand" href="#!">Stat+</a>
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
                            <h1 class="fw-bolder mb-1">NBA Stangings</h1>
                            <!-- Post meta content-->
                            <!-- <div class="text-muted fst-italic mb-2">Posted on January 1, 2023 by Start Bootstrap</div> -->
                            <!-- Post categories-->
                            <h2>Selected Conference: <?php echo $Conference; ?></h2>

                            <a class="badge bg-secondary text-decoration-none link-light" href="?East/West=League">League</a>
                            <a class="badge bg-secondary text-decoration-none link-light" href="?Conference=East">East</a>
                            <a class="badge bg-secondary text-decoration-none link-light" href="?Conference=West">West</a>

                            
                        </header>

                        <!-- Post content-->
                        <div class="">

<div class="data">
     <!-- Begin table of teams -->
     <table class="data">
    <thead>
        <tr>           
            <!-- Display The column rows --> 
            <th>Rank</th>
            <th>Team Name</th>
            <th>City</th>              
            <th>Conference</th>
            <th>Wins</th>
            <th>Losses</th>
            <?php if(isset($_SESSION['user'])): ?>
                <th>Edit</th>
                <form method="POST" name="logout" class="logout">
                    <input type="submit" name="logoutBtn" value="Logout">
                </form>

            <?php else: ?>
               
            <?php endif; ?>

            <!-- make this appear when you log in -->
        </tr>
    </thead>
    <tbody>

    
    <!-- The foreach will go through all the data is the DB and will fill the columns -->
    <?php foreach ($teams as $t): ?>
        <?php $rank++ ?>
        <tr class="team-row">
            <td># <?= $rank ?></td>
            <td><?= $t['TeamName'];?></td>
            <td><?= $t['City'];?></td>                
            <td><?= $t['Conference'];?></td>
            <td><?= $t['wins'];?></td>
            <td><?= $t['losses'];?></td>
            <?php if(isset($_SESSION['user'])): ?> <!-- When a user logins in this will check it -->
                <td><a href="edit_TeamWins.php?action=Update&teamID=<?= $t['TeamID']; ?>" class="edit-link">Edit</a></td><!-- Edit appears be able to change the teams wins or loss -->
            <?php else: ?> <!-- This could be an error message or a redirect page. -->
                    <!-- Code -->
            <?php endif; ?><!-- End statement -->
        </tr>
    <?php endforeach; ?> <!-- End foreach -->
    
    </table>

    </br>
    <!--<a href="edit_TeamWins.php?action=Add">Add New Team</a>-->
</div>
</div>
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
                                        <div class="fw-bold">Commenter Name</div>
                                        If you're going to lead a space frontier, it has to be government; it'll never be private enterprise. Because the space frontier is dangerous, and it's expensive, and it has unquantified risks.
                                        <!-- Child comment 1-->
                                        <div class="d-flex mt-4">
                                            <div class="flex-shrink-0"><img class="rounded-circle" src="https://dummyimage.com/50x50/ced4da/6c757d.jpg" alt="..." /></div>
                                            <div class="ms-3">
                                                <div class="fw-bold">Commenter Name</div>
                                                And under those conditions, you cannot establish a capital-market evaluation of that enterprise. You can't get investors.
                                            </div>
                                        </div>
                                        <!-- Child comment 2-->
                                        <div class="d-flex mt-4">
                                            <div class="flex-shrink-0"><img class="rounded-circle" src="https://dummyimage.com/50x50/ced4da/6c757d.jpg" alt="..." /></div>
                                            <div class="ms-3">
                                                <div class="fw-bold">Commenter Name</div>
                                                When you put money directly to a problem, it makes a good headline.
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Single comment-->
                                <div class="d-flex">
                                    <div class="flex-shrink-0"><img class="rounded-circle" src="https://dummyimage.com/50x50/ced4da/6c757d.jpg" alt="..." /></div>
                                    <div class="ms-3">
                                        <div class="fw-bold">Commenter Name</div>
                                        When I look at the universe and all the ways the universe wants to kill us, I find it hard to reconcile that with statements of beneficence.
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
                                <button class="btn btn-primary" id="button-search" type="button">Go!</button>
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
            <div class="container"><p class="m-0 text-center text-white">Copyright &copy; Stat+ 2023</p></div>
        </footer>
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="js/scripts.js"></script>
    </body>
</html>
