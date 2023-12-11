
<?php
session_start();
// Assuming you have the $db connection established
include __DIR__ . '/../include/header.php';
include __DIR__ . "/Model/db.php";
include __DIR__ . "/Model/functions.php";

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

    if(isset($_POST["logoutBtn"])){
        session_unset(); 
        session_destroy();
    }

    if(isset($_POST['deletePlayer'])){
        $PlayerId = filter_input(INPUT_POST, 'PlayerID');
        deletePlayer($PlayerId);
        header('Location: ../StandingsPage/standings.php');
    }
?>


    <h1 class="rosterTitle"><?= $teamInfo['TeamName'] ?> Roster</h1>
    <h2 class="rosterTitle">Conference: <?= $teamInfo['Conference'] ?></h2>
    <ul class="roster">
        <?php if(isset($_SESSION['user'])): ?>
                <a href="add_player.php?action=Add&TeamId=<?= $selectedTeamId; ?>" >Add Player</a><br>
            <?php endif; ?>

        <?php foreach ($players as $player): ?>
            <tr>                
            <?php if(isset($_SESSION['user'])): ?>
                <th><?= $player['FirstName']?> <?=$player['LastName']?> - [<?=$player['Position'] ?> - <?=$player['Birthdate'] ?>]<th>
                <th><input type="submit" name="deletePlayer" value="Delete"/>
                <th><a href="edit_player.php">Edit</a></th><br>

            <?php else: ?>
                <th><?= $player['FirstName']?> <?=$player['LastName']?> - [<?=$player['Position'] ?> - <?=$player['Birthdate'] ?>]<th><br>
            <?php endif; ?>

            </tr>
        <?php endforeach; ?>
    </ul>

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