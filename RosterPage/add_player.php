<?php
    include __DIR__ . "/model/functions.php";

    $FNameErr = $LNameErr = $PositionErr = $BirthdateErr = $pcNews = "";
    $FName = $LName = $Position = $Birthdate = $pcNews = "";

    $fBool = false;
    $lBool = false;
    $posBool = false;
    $birthBool = false;
    $pcNews = false;


    if(isset($_GET["TeamId"])){
        $id = filter_input(INPUT_GET, 'TeamId');

        $teamName = getTeamName($id);
    }

    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $id = filter_input(INPUT_POST, 'TeamId');

        // First Name validation
        if(empty($_POST["FirstName"])){
            $FNameErr = "* First Name is Required";
        }else{
            $FName = test_input($_POST["FirstName"]);
            $fBool = true;
            // regex validation
            if (!preg_match("/^[a-zA-Z-' ]*$/",$FName)) {
                $fNameErr = "Only letters and white space allowed";
              }
        }

        // Last name validation
        if(empty($_POST["LastName"])){
            $LNameErr = "* Last Name is Required";
        }else{
            $LName = test_input($_POST["LastName"]);
            $lBool = true;

                // check if name only contains letters and whitespace
            if (!preg_match("/^[a-zA-Z-' ]*$/",$LName)) {
                $lNameErr = "Only letters and white space allowed";
            }
        }

        // Position validation
        if(empty($_POST["Position"])){
            $PositionErr = "* Must select a position";
        }else{
            $Position = test_input($_POST["Position"]);
            $posBool = true;
        }

        // Birthday validation
        if (empty($_POST["Birthdate"])) {
            $BirthdateErr = "* Birthday is required";
          } else {
            $Birthdate = test_input($_POST["Birthdate"]);
            $birthBool = true;
            // check if name only contains letters and whitespace
            if (!preg_match("/^\d{4}-(0?[1-9]|1[0-2])-(0?[1-9]|[12][0-9]|3[01])$/",$Birthdate)) {
              $BirthdateErr = "ex: 0000-0-0";
            }
          }

          if(empty($_POST["PCNews"])){
            $pcNews = "* Must Select How Player Aquire";
          }else{
            $pcNews = test_input($_POST["PCNews"]);
            $pcNews = true;
        }


          if($fBool && $lBool && $posBool && $birthBool == true)
          {
              addPlayer($FName, $LName, $Position, $id, $Birthdate);

              header('Location: ../StandingsPage/standings.php');
          }
    }

    function test_input($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Player</title>
    <style>
        h1{
            display: flex;
            justify-content: center;
            align-items: center;
        }
        .background{
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh; /* This ensures the content is centered vertically */
            margin-bottom: 1000px; /* Remove default margin */
            background-color: #d3d3d3;
        
        }
        .main-form{
            background-color: #A5D3CE;
        }
    </style>
</head>
<body>
    <form action="../standingsPage/standings.php" method="POST">
        <button type="submit" name="goToPage">Standings</button>
    </form>

    <h1>Add Player To <?= $teamName ?></h1>
    
    <div class="background">
        <form class="main-form" method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
            <input type="hidden" name="TeamId" value="<?= $id; ?>" />

            <div class="wrapper">
                <div class="label">
                </br>
                    <label>First Name</label>
                </div>
                <div>
                    <input type="text" name="FirstName" value="<?= $FName; ?>"> 
                    <span class="error"><?= $FNameErr;?></span>
                </div>
                <div class="label">
                </br>
                    <label>Last Name</label>
                </div>
                <div>
                    <input type="text" name="LastName" value="<?= $LName; ?>">
                    <span class="error"><?= $LNameErr;?></span>
                </div>
                <div class="label">
                </br>
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
                <div class="label">
                </br>
                    <label>Birthdate</label>
                </div>
                <div>
                    <input type="text" name="Birthdate" value="<?= $Birthdate?>"/>
                    <span class="error"><?= $BirthdateErr;?></span>
                </div>
                <div>
                </br>
                    <label>Aquired By</label>
                </div>
                <div>
                    <select id="PCNews" name="PCNews">
                        <option value="Free Agent">Free Agent</option>
                        <option value="G-Leauge">G-League</option>
                    </select>
                </div>
                <div>
                    </br>
                    <input type="submit" name="submit" value="Add Player"/>
                </div>
        </form>
    </div>
</body>
</html>