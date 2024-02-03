
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NBA Teams</title>
</head>
<body>


<?php 
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
    include __DIR__ . '/model/functions.php';
    
    $error = "";

    //Delete the record
    // if(isset($_POST['deleteTeam'])){
    //     $id = filter_input(INPUT_POST, 'TeamID');
    //     deletePatient($id);
    //     header('Location: standings.php');
    // }

    $action = "";
    //IF COMING FROM A GET REQUEST, ASSIGN OUR ACTION AND ID!
    if(isset($_GET['action'])){
        $action = filter_input(INPUT_GET, 'action');
        $id = filter_input(INPUT_GET, 'teamID');
        //var_dump($action);
        //var_dump($id);

        if($action == "Update"){
            $team = getTeam($id);
            //var_dump($team);
            $TeamName = $team["TeamName"];
            $Wins = $team["wins"];
            $Losses = $team["losses"];
        }else{
            $team = "";
            $TeamName = "";
            $Wins = "";
            $Losses = "";
        }

        //UPDATE TEAM WAS SUBMITTED IN FORM -> GRAB SUBMITTED VALUES AND PASS TO THE updateTeam() METHOD!
    }elseif (isset($_POST['Update_team'])){
        $action = filter_input(INPUT_POST, 'action');
        $id = filter_input(INPUT_POST, 'teamID');
        $TeamName = filter_input(INPUT_POST, 'TeamName');
        $Wins = filter_input(INPUT_POST, 'wins');
        $Losses = filter_input(INPUT_POST, 'losses');

        //var_dump($id, $TeamName, $Wins, $Losses);

        updateTeam($id, $TeamName, $Wins, $Losses);
        header('Location: standings.php');

        //ADD TEAM WAS SUBMITTED IN FORM -> GRAB SUBMITTED VALUES AND PASS TO THE addTeam() METHOD!
    }elseif (isset($_POST['Add_people'])){
        $action = filter_input(INPUT_POST, 'action');
        $firstName = filter_input(INPUT_POST, 'FirstName');
        $lastName = filter_input(INPUT_POST, 'LastName');
        $position = filter_input(INPUT_POST, 'Position');
        $teamid = filter_input(INPUT_POST, 'teamID');
        $birthdate = filter_input(INPUT_POST, 'Birthdate');
        
        addTeam($TeamName, $City,$Conference, $Wins, $Losses);
        header('Location: standings.php');
    }

?>

    <style type="text/css">
       .wrapper {
            display: grid;
            grid-template-columns: 180px 400px;
        }
        .label {
            text-align: right;
            padding-right: 10px;
            margin-bottom: 5px;
        }
        label {
           font-weight: bold;
        }
        input[type=text] {width: 200px;}
        .error {color: red;}
        div {margin-top: 5px;}
    </style>

    <!-- ADD TEAM FORM -->
    <h2><?= $action; ?> NBA STAT WIN/LOSS</h2>

    <form name="team" method="post" action="edit_TeamWins.php">
        
        <!--FORM-->
        <div class="wrapper">
            <input type="hidden" name="teamID" value="<?= $id; ?>" />
            <div class="label">
                <label>Team Name:</label>
            </div>
            <div>
                <input type="text" name="TeamName" value="<?= $TeamName; ?>" />
            </div>
            <div class="label">
                <label>Wins:</label>
            </div>
            <div>
                <input type="number" name="wins" value="<?= $Wins; ?>" />
            </div>
            <div class="label">
                <label>Losses:</label>
            </div>
            <div>
                <input type="number" name="losses" value="<?= $Losses; ?>" />
            </div>
            <div>
                <!-- WE CAN USE OUR 'ACTION' VALUE FROM THE GET RESULT TO MANIPULATE THE FORM! -->
                <input type="submit" name="<?= $action; ?>_team" value="<?= $action; ?> NBA Team" />
            </div>
           
        </div>

    </form>

    </body>
</html>