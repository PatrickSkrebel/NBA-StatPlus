<?php
session_start();
    include __DIR__ . "/model/functions.php";
    include __DIR__ . '/../include/header.php';

    if(isset($_POST["searchBtn"])){
        $TeamName = filter_input(INPUT_POST, "TeamName");
        $Conference = filter_input(INPUT_POST, "Conference");

    }else{
        $TeamName = "";
        $Conference = "";
    }

    if(isset($_POST["logoutBtn"])){
        session_unset(); 
        session_destroy();
    }

    $teams = searchTeam($TeamName, $Conference);

    $rank = 0;

    //$people = getPeople();
?>

    <div class="container">

    <div class="data">

        <h1>NBA Standings</h1>


        <form method="POST" name="search">
            <label>Team</label><input type="text" name="TeamName">
            <label>Conference</label><input type="text" name="Conference">
            <input type="submit" name="searchBtn" value="Search">
        </form>

         <!-- Begin table of teams -->
         <table class="data">
        <thead>
            <tr>           
                <!-- Display The column rows --> 
                <th>Rank</th>
                <th>TeamName</th>
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
</body>
</html>