<?php
session_start();
    include __DIR__ . "/model/functions.php";

    if(isset($_POST["searchBtn"])){
        $$TeamName = filter_input(INPUT_POST, "TeamName");
        $Conference = filter_input(INPUT_POST, "Conference");

    }else{
        $TeamName = "";
        $Conference = "";
    }

    if(isset($_POST["logoutBtn"])){
        session_unset(); 
        session_destroy();
    }

    $teams = searchTeam($TeamName, $Conference);

    //$people = getPeople();
?>

<html lang="en">
<head>
  <title>NBA Standings</title> 
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
  <style>
    .data:{
        margin: 100px 0 0 159px; /* top right bottom left */
    }

  </style>
</head>
<body>
<?php include __DIR__ . '/../include/header.php'; ?>
    <div class="container">

    <div class="data">
        <h1>NBA Standings</h1>

        <label>Team</label><input type="text" name="TeamName">
        <label>Conferance</label><input type="text" name="Conference">
        <input type="submit" name="searchBtn" value="Search">

        <br>

        <!--<a href="add_people.php">Add Person</a>-->
         <!-- Begin table of teams -->
         <table class="data">
        <thead>
            <tr >            
                <th>TeamName</th>
                <th>City</th>              
                <th>Conferance</th>
                <th>Wins</th>
                <th>Losses</th>
                <th>Edit</th>
                <!-- make this appear when you log in -->
 
            </tr>
        </thead>
        <tbody>

        <?php foreach ($teams as $t): ?>
            <tr>
                <td><?= $t['TeamName'];?></td>
                <td><?= $t['City'];?></td>                
                <td><?= $t['Conference'];?></td>
                <td><?= $t['wins'];?></td>
                <td><?= $t['losses'];?></td>
                <td><a href="edit_TeamWins.php?action=Update&teamId=<?= $p['id']; ?>">Edit</a></td>    
            </tr>
        <?php endforeach; ?>
        
        </table>

        </br>
        <a href="edit_TeamWins.php?action=Add">Add New Team</a>
    </div>
    </div>
</body>
</html>