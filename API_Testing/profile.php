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

    // Iterate over the 'data' array and print each team's name, limit to first 30
    foreach ($data as $player) {

        //var_dump($player);
        echo "<p>"; // Using paragraph for better control, replace <td> with <p>
        echo $player['first_name'] . " " . $player['last_name'] . "<br>";
        echo "</p>";

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
?>
</body>
</html>

