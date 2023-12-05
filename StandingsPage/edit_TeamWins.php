
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
        $id = filter_input(INPUT_POST, 'TeamId');
        deletePatient($id);
        header('Location: standings.php');
    }

    $action = "";
    //IF COMING FROM A GET REQUEST, ASSIGN OUR ACTION AND ID!
    if(isset($_GET['action'])){
        $action = filter_input(INPUT_GET, 'action');
        $id = filter_input(INPUT_GET, 'TeamId');

        if($action == "Update"){
            $team = getTeam($TeamID, $TeamName, $Wins, $Losses);
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
        $id = filter_input(INPUT_POST, 'person_id');
        $fName = filter_input(INPUT_POST, 'firstName');
        $lName = filter_input(INPUT_POST, 'lastName');
        $married = filter_input(INPUT_POST, 'married');
        $birthDate = filter_input(INPUT_POST, 'birthdate');
        $height = filter_input(INPUT_POST, 'height');
        $weight = filter_input(INPUT_POST, 'weight');

        updatePatient($id, $fName, $lName, $married, $birthDate, $height, $weight);
        header('Location: view_people.php');

        //ADD TEAM WAS SUBMITTED IN FORM -> GRAB SUBMITTED VALUES AND PASS TO THE addTeam() METHOD!
    }elseif (isset($_POST['Add_people'])){
        $action = filter_input(INPUT_POST, 'action');
        $fName = filter_input(INPUT_POST, 'firstName');
        $lName = filter_input(INPUT_POST, 'lastName');
        $married = filter_input(INPUT_POST, 'married');
        $birthDate = filter_input(INPUT_POST, 'birthdate');
        $height = filter_input(INPUT_POST, 'height');
        $weight = filter_input(INPUT_POST, 'weight');
        
        addPeople($fName, $lName, $married, $birthDate, $height, $weight);
        header('Location: view_people.php');
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

    <form name="team" method="post" action="edit_people.php">
        
        <!--FORM-->
        <div class="wrapper">
            <input type="hidden" name="teamid" value="<?= $id; ?>" />
            <div class="label">
                <label>First Name:</label>
            </div>
            <div>
                <input type="text" name="firstName" value="<?= $fName; ?>" />
            </div>
            <div class="label">
                <label>Last Name:</label>
            </div>
            <div>
                <input type="text" name="lastName" value="<?= $lName; ?>" />
            </div>
            <div class="label">
                <label>Married:</label>
            </div>
            <div>
            <input type="text" name="married" value="<?= $married; ?>" />
            </div>
            <div class="label">
                <label>Birthdate:</label>
            </div>
            <div>
                <input type="text" name="birthdate" value="<?= $birthDate; ?>" />
            </div>
            <div class="label">
                <label>Height:</label>
            </div>
            <div>
                <input type="text" name="height" value="<?= $height; ?>" />
            </div>
            <div class="label">
                <label>Weight:</label>
            </div>
            <div>
                <input type="text" name="weight" value="<?= $weight; ?>" />
            </div>
            <div>
                &nbsp;
            </div>
            <div>
                <!-- WE CAN USE OUR 'ACTION' VALUE FROM THE GET RESULT TO MANIPULATE THE FORM! -->
                <input type="submit" name="<?= $action; ?>_team" value="<?= $action; ?> Patients Information" />
            </div>
            <div>
                <input type="hidden" name="teamId" value="<?= $id;?>"/>
                <input class="" type="submit" name="deleteTeam" value="Delete" />
            </div>
           
        </div>

    </form>


    <?php foreach ($people as $p):                 
            ?>
                <tr>
                    <td>
                        <!-- FORM FOR DELETE FUNCTIONALITY -->
                        <form action='standings.php' method='post'>
 
                            
 
                        </form>
                    </td>
                  
                </tr>
            <?php endforeach; ?>
    <p>
       
    </p>


    </body>
</html>