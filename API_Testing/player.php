<?php
session_start();
include __DIR__ . '/../include/header.php'; 

//Grab Player ID from the URL. Use this ID to then grab specific player information
if(isset($_GET['playerId'])){
    $playerId = filter_input(INPUT_GET, 'playerId');
}

// Your API key
$apiKey = 'd599cf75-13b3-413a-a46e-a13fca488265';

// Initialize a cURL session
$ch = curl_init();

// Set the URL and other options
//Call the players API passing in the team ID parameter to grab the roster
curl_setopt($ch, CURLOPT_URL, "https://api.balldontlie.io/v1/players/" . $playerId);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

// Include the API key in the request headers
curl_setopt($ch, CURLOPT_HTTPHEADER, array("Authorization: {$apiKey}"));

// Execute the request and capture the response
$response = curl_exec($ch);

// Check for errors
if (curl_errno($ch)) {
    echo 'Request Error:' . curl_error($ch);
} else {
    // Convert the JSON response to a PHP array
    $data = json_decode($response, true);

    echo '<div style="text-align: center; margin: 2rem 0;">'; // Start of centering div

    // Iterate over the 'data' array and print the players properties
    foreach ($data as $player) {

        //var_dump($player);
        echo "<h2>"; // Using paragraph for better control, replace <td> with <p>
        echo $player['first_name'] . " " . $player['last_name'] . "<br>";
        echo "</h2>";

        echo "<ul style='list-style-type:none; padding:0;'>";
        echo "<li><span style='font-weight:700;'>Jersey Number: </span>" . htmlspecialchars($player['jersey_number']) . "</li>";
        echo "<li><span style='font-weight:700;'>Position: </span>" . htmlspecialchars($player['position']) . "</li>";
        echo "<li><span style='font-weight:700;'>Height: </span>" . htmlspecialchars($player['height']) . "</li>";
        echo "<li><span style='font-weight:700;'>Weight: </span>" . htmlspecialchars($player['weight']) . "</li>";
        echo "<li><span style='font-weight:700;'>College: </span>" . htmlspecialchars($player['college']) . "</li>";
        echo "</ul>";
    }

    echo '</div>'; // End of centering div
}

// Close the cURL session
curl_close($ch);

// Initialize a cURL session
$ch = curl_init();

// Set the URL and other options
//Call the season averages API passing in the player ID parameter to grab the roster (season parameter is required, and is hardcoded to 2023 in this example)
curl_setopt($ch, CURLOPT_URL, "https://api.balldontlie.io/v1/season_averages?season=2023&player_ids[]=" . $playerId);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

// Include the API key in the request headers
curl_setopt($ch, CURLOPT_HTTPHEADER, array("Authorization: {$apiKey}"));

// Execute the request and capture the response
$response = curl_exec($ch);

// Check for errors
if (curl_errno($ch)) {
    echo 'Request Error:' . curl_error($ch);
} else {
    // Convert the JSON response to a PHP array
    $data = json_decode($response, true);

    echo '<div style="text-align: center; margin: 2rem 0;">'; // Start of centering div

    // Iterate over the 'data' array and print the players season averages 
    foreach ($data['data'] as $season_avg) {

        //var_dump($player);
        echo "<hr />";
        echo "<h4>"; // Using paragraph for better control, replace <td> with <p>
        echo "Season Averages (" . htmlspecialchars($season_avg['season']) . "):";
        echo "</h4>";

        echo "<ul style='list-style-type:none; padding:0;'>";
        echo "<li><span style='font-weight:700;'>Games Played: </span>" . htmlspecialchars($season_avg['games_played']) . "</li>";
        echo "<li><span style='font-weight:700;'>Minutes: </span>" . htmlspecialchars($season_avg['min']) . "</li>";
        echo "<li><span style='font-weight:700;'>Points: </span>" . htmlspecialchars($season_avg['pts']) . "</li>";
        echo "<li><span style='font-weight:700;'>Field Goal %: </span>" . htmlspecialchars($season_avg['fg_pct']) . "</li>";
        echo "<li><span style='font-weight:700;'>Field Goal (3) %: </span>" . htmlspecialchars($season_avg['fg3_pct']) . "</li>";
        echo "<li><span style='font-weight:700;'>Free Throw %: </span>" . htmlspecialchars($season_avg['ft_pct']) . "</li>";
        echo "</ul>";
    }

    echo '</div>'; // End of centering div
}

// Close the cURL session
curl_close($ch);

?>
</body>
</html>

