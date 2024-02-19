
<?php
session_start();
// Assuming you have the $db connection established
include __DIR__ . "/Model/db.php";
include __DIR__ . "/Model/functions.php";


if(isset($_POST["delete"]))

if(isset($_POST["logoutBtn"])){
    session_unset(); 
    session_destroy();
}

if (isset($_GET['TeamID'])) {
    $selectedTeamId = $_GET['TeamID'];

    // Fetch team information
    $stmtTeam = $db->prepare("SELECT * FROM nbateams WHERE TeamID = :TeamID");
    $stmtTeam->bindParam(':TeamID', $selectedTeamId);
    $stmtTeam->execute();
    $teamInfo = $stmtTeam->fetch(PDO::FETCH_ASSOC);

    // Fetch players of the selected team
    $stmtPlayers = $db->prepare("SELECT * FROM nbaplayers WHERE TeamID = :TeamID");
    $stmtPlayers->bindParam(':TeamID', $selectedTeamId);
    $stmtPlayers->execute();
    $players = $stmtPlayers->fetchAll(PDO::FETCH_ASSOC);


?>

<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <title>Stat+</title>


  <style>
    .roster{
        text-align: center;

    }


.team-list {
    display: flex;
    flex-wrap: wrap;
    justify-content: space-around;
    padding: 0;
    list-style: none;
}

.columnTeams {
    display: inline-flex; /* Display divisions side by side */
    flex-direction: column; /* Ensure content within each division flows top to bottom */
    margin-right: 20px; /* Add some space between the divisions */
}
/* Optional: Style for the division headers */
.columnTeams h3 {
    text-align: center; /* Center-align the division titles */
    margin-bottom: 10px; /* Space between title and team links */
    background-color: lightblue;
}

.rowTeams {
    display: flex; /* Display team links in a column */
    flex-direction: column; /* Stack team links vertically */
}

.rowTeams a {
    flex-grow: 1;
    text-align: center; /* Center the link text */
    padding: 10px;
    color: #000; /* Adjust text color as needed */
    text-decoration: none;
    border-right: 1px solid #eee; /* Adds a subtle line between items */
    box-sizing: border-box;
    min-width: 100px; /* Adjust based on preference */
}

.rowTeams a:last-child {
    border-right: none;
}

.rowTeams a:hover {
    background-color: #f0f0f0; /* Hover effect */
}


body {
        font-family: Arial, sans-serif;
        margin: 20px;
    }
    .grid {
        display: grid;
        grid-template-rows: repeat(3, 1fr); /* Creates 3 rows */
        grid-auto-flow: column; /* Fills the grid by columns */
        gap: 10px; /* Space between items */
    }
    .team {
        border: 1px solid #ccc;
        padding: 10px;
        text-align: center;
        background-color: #f9f9f9;
    }

    .divisions{
        text-align: center;
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
                        <li class="nav-item"><a class="nav-link" href="../StandingsPage/standingsPage.php">Standings</a></li>     
                        <li class="nav-item"><a class="nav-link" href="../StandingsPage/login.php">Login</a></li>                                                
                    </ul>
                    
                </div>
            </div>
        </nav>

<div class="divisions">
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

</div>
<br>
<br>
<br>
<div class="roster">

    <h1 class="rosterTitle"><?= $teamInfo['TeamName'] ?> Roster</h1>
    <h2 class="rosterTitle">Conference: <?= $teamInfo['Conference'] ?></h2>
    <ul class="roster">
        <?php if(isset($_SESSION['user'])): ?>
                <a href="add_player.php?action=Add&TeamId=<?= $selectedTeamId; ?>" >Add Player</a><br>
            <?php endif; ?>

        <?php foreach ($players as $player): ?>
            <tr>                
            <!-- Onced Logged In -->
            <?php if(isset($_SESSION['user'])): ?>
                <th><?= $player['FirstName']?> <?=$player['LastName']?> - [<?=$player['Position'] ?> - <?=$player['Birthdate'] ?>]<th>
                <th><a href="edit_player.php">Edit</a></th>
                <th><a href="delete_player.php?PlayerID=<?= $player['PlayerID'] ?>">Delete</a></th><br>
            <?php else: ?>
                <th><?= $player['FirstName']?> <?=$player['LastName']?> - [<?=$player['Position'] ?> - <?=$player['Birthdate'] ?>]<th><br>
            <?php endif; ?>

            </tr>
        <?php endforeach; ?>
    </ul>
    </div>
    <?php
} else {
    // Redirect back to the main page if teamid is not set
    header("Location: index.php");
    exit();
}

?>

<!-- Add your additional HTML content or scripts here -->

</body>
</html>