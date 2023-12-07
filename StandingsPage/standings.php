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


        <!--<a href="add_people.php">Add Person</a>-->
         <!-- Begin table of teams -->
         <table class="data">
        <thead>
            <tr>            
                <th>Rank</th>
                <th>TeamName</th>
                <th>City</th>              
                <th>Conference</th>
                <th>Wins</th>
                <th>Losses</th>
                <th>Edit</th>
                <!-- make this appear when you log in -->
            </tr>
        </thead>
        <tbody>

        <?php foreach ($teams as $t): ?>
            <?php $rank++ ?>
            <tr class="team-row">
                <td># <?= $rank ?></td>
                <td><?= $t['TeamName'];?></td>
                <td><?= $t['City'];?></td>                
                <td><?= $t['Conference'];?></td>
                <td><?= $t['wins'];?></td>
                <td><?= $t['losses'];?></td>
                <td>
                    <a href="edit_TeamWins.php?action=Update&teamID=<?= $t['TeamID']; ?>" class="edit-link">Edit</a>
                </td>    
            </tr>
        <?php endforeach; ?>
        
        </table>

        </br>
        <!--<a href="edit_TeamWins.php?action=Add">Add New Team</a>-->
    </div>
    </div>
</body>
</html>