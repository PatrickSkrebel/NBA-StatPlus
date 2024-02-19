<?php
session_start();
    include __DIR__ . "/model/functions.php";
    include __DIR__ . '/../include/header.php'; 
    
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
        <!-- Core theme JS
        <script src="js/scripts.js"></script>
        -->
    </body>
</html>
