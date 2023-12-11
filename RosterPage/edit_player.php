
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NFL Teams</title>
</head>
<body>


<?php 
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
    include __DIR__ . '/model/functions.php';
    
    $error = "";

    //Delete the record
    if(isset($_POST['deleteTeam'])){
        $id = filter_input(INPUT_POST, 'teamId');
        deletePatient($id);
        header('Location: index.php');
    }

    $action = "";
    //IF COMING FROM A GET REQUEST, ASSIGN OUR ACTION AND ID!
    if(isset($_GET['action'])){
        $action = filter_input(INPUT_GET, 'action');
        $id = filter_input(INPUT_GET, 'teamId');

        if($action == "Update"){
            $people = getPerson($id);
            $fName = $people["firstName"];
            $lName = $people['lastName'];
            $married = $people['married'];
            $birthDate = $people['birthdate'];
            $height = $people['height'];
            $weight = $people['weight'];
        }else{
            $fName = "";
            $lName = "";
            $married = "";
            $birthDate = "";
            $height = "";
            $weight = "";
        }

        //UPDATE TEAM WAS SUBMITTED IN FORM -> GRAB SUBMITTED VALUES AND PASS TO THE updateTeam() METHOD!
    }elseif (isset($_POST['edit_player'])){
        $action = filter_input(INPUT_POST, 'action');
        $id = filter_input(INPUT_POST, 'PlayerID');
        $fName = filter_input(INPUT_POST, 'FirstName');
        $lName = filter_input(INPUT_POST, 'LastName');
        $position = filter_input(INPUT_POST, 'Position');
        $birthDate = filter_input(INPUT_POST, 'Birthdate');

        updatePatient($id, $fName, $lName, $married, $birthDate, $height, $weight);
        header('Location: ../StandingsPage/standings.php');

        //ADD TEAM WAS SUBMITTED IN FORM -> GRAB SUBMITTED VALUES AND PASS TO THE addTeam() METHOD!
    }elseif (isset($_POST['add_player'])){
        $action = filter_input(INPUT_POST, 'action');
        $fName = filter_input(INPUT_POST, 'firstName');
        $lName = filter_input(INPUT_POST, 'lastName');
        $birthDate = filter_input(INPUT_POST, 'birthdate');
        
        addPeople($fName, $lName, $married, $birthDate);
        header('Location: ../StandingsPage/standings.php');
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
            <input type="hidden" name="PlayerID" value="<?= $id; ?>" />
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
                <label>Birthdate:</label>
            </div>
            <div>
                <input type="text" name="Birthdate" value="<?= $birthDate; ?>" />
            </div>
            <div>
                &nbsp;
            </div>
            <div>
                <!-- WE CAN USE OUR 'ACTION' VALUE FROM THE GET RESULT TO MANIPULATE THE FORM! -->
                <input type="submit" name="<?= $action; ?>_team" value="<?= $action; ?> Players Information" />
            </div>
            <div>
                <input type="hidden" name="teamId" value="<?= $id;?>"/>
                <input type="submit" name="deleteTeam" value="Delete" />
            </div>
           
        </div>

    </form>

    </body>
</html>