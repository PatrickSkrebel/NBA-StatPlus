<?php
session_start();
include __DIR__ . '/../include/header.php'; 

//Grab Team ID from the URL. Use this ID to then grab all players from that team
if(isset($_GET['teamId'])){
    $teamId = filter_input(INPUT_GET, 'teamId');
}

// Your API key
$apiKey = 'd599cf75-13b3-413a-a46e-a13fca488265';

// Initialize a cURL session
$ch = curl_init();

// Set the URL and other options
//Call the players API passing in the team ID parameter to grab the roster
curl_setopt($ch, CURLOPT_URL, "https://api.balldontlie.io/v1/players?team_ids[]=" . $teamId);
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

    // Iterate over the 'data' array and print each player for the team ID that was grabbed from the GET request
    foreach ($data['data'] as $player) {
        echo "<a href='../API_Testing/profile.php?playerId=" . htmlspecialchars($player['id']) . "'>"; // Using paragraph for better control, replace <td> with <p>
        echo htmlspecialchars($player['first_name']) . " " . htmlspecialchars($player['last_name']) . "<br>";
        echo "</a>";
    }

    echo '</div>'; // End of centering div
}

// Close the cURL session
curl_close($ch);
?>
</body>
</html>

