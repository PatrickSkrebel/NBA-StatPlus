<?php
// Assuming you have the $db connection established
include __DIR__ . '/../include/header.php';
require_once "db.php";


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
    echo "<h1>{$teamInfo['TeamName']} Roster</h1>";
    echo "<h2>Conference: {$teamInfo['Conference']}</h2>";
    echo "<ul>";
    foreach ($players as $player) {
        echo "<li>{$player['FirstName']}</li>";
    }
    echo "</ul>";
} else {
    // Redirect back to the main page if teamid is not set
    header("Location: index.php");
    exit();
}
?>