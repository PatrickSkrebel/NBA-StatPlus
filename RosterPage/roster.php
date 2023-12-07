
<?php
// Assuming you have the $db connection established
include __DIR__ . '/../include/header.php';
include __DIR__ . "/Model/db.php";

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

    // Display the roster
    ?>

    <h1 class="rosterTitle"><?= $teamInfo['TeamName'] ?> Roster</h1>
    <h2 class="rosterTitle">Conference: <?= $teamInfo['Conference'] ?></h2>
    <ul class="roster">
        <?php foreach ($players as $player): ?>
            <tr>
            <td><?= $player['FirstName']?> <?=$player['LastName']?> - [<?=$player['Position'] ?> - <?=$player['Birthdate'] ?>]<td></br>
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