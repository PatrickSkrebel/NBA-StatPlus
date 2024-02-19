<?php
// API endpoint URL
$apiUrl = 'https://api.sportradar.com/nba';

// Initialize cURL session
$ch = curl_init();

// Set cURL options
curl_setopt($ch, CURLOPT_URL, $apiUrl); // Set the URL to fetch
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); // Return the response as a string instead of outputting it directly
curl_setopt($ch, CURLOPT_HTTPHEADER, [
    'x-rapidapi-host: v1.basketball.api-sports.io',
    'x-rapidapi-key: YOUR_API_KEY' // Replace YOUR_API_KEY with your actual API key
]);

// Execute the cURL request
$response = curl_exec($ch);

// Check for errors
if(curl_errno($ch)) {
    echo 'Error: ' . curl_error($ch);
} else {
    // API response received successfully
    // You can now process the response data
    $responseData = json_decode($response, true); // Assuming the API returns JSON data

    // Check if data is received
    if ($responseData && isset($responseData['response']) && isset($responseData['response'][0]['teams'])) {
        ?>
        <!-- Begin table of teams -->
        <table class="data">
            <thead>
                <tr>           
                    <!-- Display The column rows --> 
                    <th>Team Name</th>
                    <th>Country</th>
                    <th>City</th>
                    <th>Conference</th>
                    <th>Division</th>
                </tr>
            </thead>
            <tbody>
            <?php foreach ($responseData['response'][0]['teams'] as $team): ?>
                <tr class="team-row">
                    <td><?= $team['name']; ?></td>
                    <td><?= $team['country']['name']; ?></td>
                    <td><?= $team['venue']['city']; ?></td>
                    <td><?= $team['conference']['name']; ?></td>
                    <td><?= $team['division']['name']; ?></td>
                </tr>
            <?php endforeach; ?> <!-- End foreach -->
            </tbody>
        </table>
        <?php
    } else {
        echo "No data retrieved from the API.";
    }
}

// Close cURL session
curl_close($ch);
?>
