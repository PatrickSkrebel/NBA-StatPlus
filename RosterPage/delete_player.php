<?php
session_start();
include __DIR__ . '/../include/header.php';
include __DIR__ . "/Model/db.php";
include __DIR__ . "/Model/functions.php";

if(isset($_POST["logoutBtn"])){
    session_unset(); 
    session_destroy();
}

if(isset($_GET['PlayerID'])) {
    $playerIdToDelete = $_GET['PlayerID'];

    // Fetch player information
    $stmtPlayer = $db->prepare("SELECT * FROM nbaplayers WHERE PlayerID = :PlayerID");
    $stmtPlayer->bindParam(':PlayerID', $playerIdToDelete);
    $stmtPlayer->execute();
    $playerInfo = $stmtPlayer->fetch(PDO::FETCH_ASSOC);

    if ($playerInfo) {
        // Display player information for confirmation
        echo "<h2>Confirm Deletion</h2>";
        echo "<p>Are you sure you want to delete {$playerInfo['FirstName']} {$playerInfo['LastName']} from the roster?</p>";
        echo "<form method='post'>";
        echo "<input type='hidden' name='PlayerID' value='{$playerIdToDelete}' />";
        echo "<input type='submit' name='confirmDelete' value='Confirm Delete' />";
        echo "</form>";

        // Handle form submission
        if(isset($_POST['confirmDelete'])) {
            deletePlayer($playerIdToDelete);

           // header('Location: ../StandingsPage/standings.php');// Redirect to the roster page after deletion
        }
    } else {
        echo "<p>Player not found.</p>";
    }
} else {
    echo "<p>Player ID not provided.</p>";
}

?>

<!-- Add your additional HTML content or scripts here -->

</body>
</html>