<?php
session_start();
include __DIR__ . '/../include/header.php'; 

// Your API key
$apiKey = 'd599cf75-13b3-413a-a46e-a13fca488265';

// Initialize a cURL session
$ch = curl_init();

// Set the URL and other options
curl_setopt($ch, CURLOPT_URL, "https://api.balldontlie.io/v1/teams/");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

// Include the API key in the request headers
curl_setopt($ch, CURLOPT_HTTPHEADER, array("Authorization: {$apiKey}"));

// Execute the request and capture the response
$response = curl_exec($ch);
$rank = 1;

// Check for errors
if (curl_errno($ch)) {
    echo 'Request Error:' . curl_error($ch);
} else {
    // Convert the JSON response to a PHP array
    $data = json_decode($response, true);

    echo '<div style="text-align: center;">'; // Start of centering div

    // Iterate over the 'data' array and print each team's name, limit to first 30
    foreach ($data['data'] as $team) {
        if ($rank > 30) {
            break; // Stop the loop after 30 iterations
        }

        echo "<p>"; // Using paragraph for better control, replace <td> with <p>
        echo $rank . ". " . htmlspecialchars($team['full_name']) . "<br>";
        echo "</p>";
        $rank++;
    }

    echo '</div>'; // End of centering div
}

// Close the cURL session
curl_close($ch);
?>

     <!-- Begin table of teams -->
     <table class="data">
    <thead>
        <tr>           
            <!-- Display The column rows --> 
            <th>Rank</th>
            <th>Team Name</th>
            <th>City</th>              
            <th>Conference</th>
            <th>Wins</th>
            <th>Losses</th>
            <?php if(isset($_SESSION['user'])): ?>
                <th>Edit</th>
                <form method="POST" name="logout" class="logout">
                    <input type="submit" name="logoutBtn" value="Logout">
                </form>

            <?php else: ?>
               
            <?php endif; ?>


                <!-- The foreach will go through all the data is the DB and will fill the columns -->
    <?php foreach ($data['data'] as $t):
                if ($rank > 30) {
                    break; // Stop the loop after 30 iterations
                }
        ?>
        <?php $rank++ ?>
        
        <tr class="team-row">
            <td># <?php $rank ?></td>
            <td><?= $t['full_name'];?></td>
            <td><?= $t['city'];?></td>   
            <td><?= $t['conference'];?></td>
            
        <?php endforeach; ?> <!-- End foreach -->
            

            <!-- make this appear when you log in -->
        </tr>
    </thead>
    <tbody>


</body>
</html>

