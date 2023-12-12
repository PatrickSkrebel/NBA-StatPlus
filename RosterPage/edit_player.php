
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editing Players</title>
</head>
<body>


<?php 
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
    include __DIR__ . '/model/functions.php';
    
    $error = "";


    $action = "";
    //IF COMING FROM A GET REQUEST, ASSIGN OUR ACTION AND ID!
    if(isset($_GET['action'])){
        $action = filter_input(INPUT_GET, 'action');
        $id = filter_input(INPUT_GET, 'PlayerID');

        if($action == "Update"){
            $people = getPlayer($id);
            $fName = $people["FirstName"];
            $lName = $people["LastName"];
            $position = $people["Position"];
        }else{
            $fName = "";
            $lName = "";
            $position = "";
        }

        //UPDATE TEAM WAS SUBMITTED IN FORM -> GRAB SUBMITTED VALUES AND PASS TO THE updateTeam() METHOD!
    }elseif (isset($_POST['edit_player'])){
        $action = filter_input(INPUT_POST, 'action');
        $id = filter_input(INPUT_POST, 'PlayerID');
        $fName = filter_input(INPUT_POST, 'FirstName');
        $lName = filter_input(INPUT_POST, 'LastName');
        $position = filter_input(INPUT_POST, 'Position');

        updatePlayer($id, $fName, $lName, $position);
        header('Location: ../StandingsPage/standings.php');

        //ADD TEAM WAS SUBMITTED IN FORM -> GRAB SUBMITTED VALUES AND PASS TO THE addTeam() METHOD!
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
    <h2><?= $action; ?> Player Info</h2>

    <form name="team" method="post" action="edit_player.php">
        
        <!--FORM-->
        <div class="wrapper">
            <input type="hidden" name="PlayerID" value="<?= $PlayerId; ?>" />
            <div class="label">
                <label>First Name:</label>
            </div>
            <div>
                <input type="text" name="FirstName" value="<?= $fName; ?>" />
            </div>
            <div class="label">
                <label>Last Name:</label>
            </div>
            <div>
                <input type="text" name="LastName" value="<?= $lName; ?>" />
            </div>
            <div class="label">
                <label>Position</label>
            </div>
            <div>
                <select id="Position" name="Position">
                    <option value="Point Guard">Point Guard</option>
                    <option value="Shooting Guard">Shooting Guard</option>
                    <option value="Small Forward">Small Forward</option>
                    <option value="Power Forward">Power Forward</option>
                    <option value="Center">Center</option>
                </select>
            </div>
            <div>
                &nbsp;
            </div>
            <div>
                <!-- WE CAN USE OUR 'ACTION' VALUE FROM THE GET RESULT TO MANIPULATE THE FORM! -->
                <input type="submit" name="<?= $action; ?>_player" value="<?= $action; ?> Players Information" />
            </div>
            <div>
                <input type="hidden" name="PlayerID" value="<?= $PlayerId;?>"/>
                <input type="submit" name="deletePlayer" value="Delete" />
            </div>
           
        </div>

    </form>

    </body>
</html>