    
<?php 
session_start();
include __DIR__ . '/../include/header.php'; 


?>

<?php

$url = "https://www.nba.com/sixers/roster";

// Use file_get_contents() function to get the content of the URL
$content = file_get_contents($url);

if ($content !== false) {
    // If content was successfully fetched, display it
    echo $content;
} else {
    // If content could not be fetched, display an error message
    echo "Unable to fetch content from the URL.";
}

?>


</body>
</html>