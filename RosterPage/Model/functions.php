<?php

    include (__DIR__ . '/db.php');
    
    // Get listing of all teams
    function getStandings () {
        global $db; // Grabs database
        
        $results = []; // 

        $stmt = $db->prepare("SELECT PlayerId, Team, lastName, birthdate, teamid,position, wins, losses FROM people ORDER BY PlayerId"); // sends the code to my sql 
        
        if ( $stmt->execute() && $stmt->rowCount() > 0 ) // Checks for errors when the database doesnt find a 1 of the description
        {
             $results = $stmt->fetchAll(PDO::FETCH_ASSOC);// Executes the data
                 
         }
         
         return ($results);
    }

    function getTeamName($teamId) {
        global $db;
        
        $stmt = $db->prepare("SELECT TeamName FROM nbateams WHERE TeamID = :TeamID");
        $stmt->bindParam(':TeamID', $teamId);
        $stmt->execute();
    
        return $stmt->fetchColumn();
    }

    //Add a team to database
    function addPlayer ($firstName, $lastName, $position, $teamid,$birthdate) {
        global $db;
        $results = "Not added";

        $stmt = $db->prepare("INSERT INTO nbaplayers SET FirstName = :fN, LastName = :lN,teamid = :h,position = :p, birthdate = :bd");

        $binds = array(
            ":fN" => $firstName,
            ":lN" => $lastName,            
            ":p" => $position,
            ":h" => $teamid,
            ":bd" => $birthdate,

           
        );
        
        
        if ($stmt->execute($binds) && $stmt->rowCount() > 0) {
            $results = 'Data Added';
        }
        
        return ($results);
    }

       //Add a team to database
       function addTeam ($TeamName, $City,$Conference, $Wins, $Losses) {
        global $db;
        $results = "Not added";

        $stmt = $db->prepare("INSERT INTO nbaTeams SET TeamName = :tN, City = :c, Conference = :cf,wins = :w, losses = :l");

        $binds = array(
            ":tN" => $TeamName,
            ":c" => $City,            
            ":cf" => $Conference,
            ":w" => $Wins,
            ":l" => $Losses,
        );
        
        
        if ($stmt->execute($binds) && $stmt->rowCount() > 0) {
            $results = 'Data Added';
        }
        
        return ($results);
    }
    
    // When you have to update a player 
    function updatePlayer ($PlayerId, $firstName, $lastName,$teamid , $birthdate, $position) {
        global $db;

        $results = "";
        $sql = "UPDATE nbaplayers SET FirstName = :fN, LastName = :lN, birthdate = :bd, TeamId = :td, Position = :p WHERE PlayerId=:PlayerId ";
        $stmt = $db->prepare($sql);

        $stmt->bindValue(':PlayerId', $PlayerId);
        $stmt->bindValue(':fN', $firstName);
        $stmt->bindValue(':lN', $lastName);
        $stmt->bindValue(':bd', $birthdate);
        $stmt->bindValue(':td', $teamid);
        $stmt->bindValue(':p', $position);

      
        if ($stmt->execute() && $stmt->rowCount() > 0) {
            $results = 'Data Updated';
        }
        
        return ($results);
    }

    function updateTeam ($TeamID, $TeamName, $Wins, $Losses) {
        global $db;

        $results = "";
        $sql = "UPDATE nbaTeams SET TeamName = :tN, wins = :w, losses = :l WHERE TeamID=:TeamID ";
        $stmt = $db->prepare($sql);

        $stmt->bindValue(':TeamID', $TeamID);
        $stmt->bindValue(':tN', $TeamName);
        $stmt->bindValue(':w', $Wins);
        $stmt->bindValue(':l', $Losses);

      
        if ($stmt->execute() && $stmt->rowCount() > 0) {
            $results = 'Data Updated';
        }
        
        return ($results);
    }

    // take a player off the roster
    function deletePlayer ($PlayerId) {
        global $db;
        
        $results = "Data was not deleted";
        $stmt = $db->prepare("DELETE FROM nbaplayers WHERE PlayerId=:PlayerId"); // calls the sql database
        
        $stmt->bindValue(':PlayerId', $PlayerId); // Grabs the players id in the DB and deletes 
            
        if ($stmt->execute() && $stmt->rowCount() > 0) { // If its < 0 then that means it didn't reach the DB and calls nothing
            $results = 'Data Deleted'; // confirms deletions
        }
        
        return ($results);
    }

    function getPerson($PlayerId){

        global $db;
        
        $result = [];
        $stmt = $db->prepare("SELECT * FROM nbaplayers WHERE PlayerId=:PlayerId");
        $stmt->bindValue(':PlayerId', $PlayerId);
       
        if ( $stmt->execute() && $stmt->rowCount() > 0 ) {
             $result = $stmt->fetch(PDO::FETCH_ASSOC);
                        
         }
         
         return ($result);
    }

    function getTeam($TeamID){

        global $db;
        
        $result = [];
        $stmt = $db->prepare("SELECT * FROM nbaTeams WHERE TeamID=:TeamID");
        $stmt->bindValue(':TeamID', $TeamID);
       
        if ( $stmt->execute() && $stmt->rowCount() > 0 ) {
             $result = $stmt->fetch(PDO::FETCH_ASSOC);
                        
         }
         
         return ($result);
    }

    function login($user, $pass){
        global $db;
        
        $result = [];
        $stmt = $db->prepare("SELECT * FROM users WHERE userName=:user AND userPassword=sha1(:pass)");
        $stmt->bindValue(':user', $user);
        $stmt->bindValue(':pass', $pass);
       
        if ( $stmt->execute() && $stmt->rowCount() > 0 ) {
             $result = $stmt->fetch(PDO::FETCH_ASSOC);
                        
         }
         
         return ($result);
    }



      // Get listing of all Players 
    function searchTeam ($TeamName, $Conference) {
        global $db;
        $binds = array();

        $sql =  "SELECT * FROM nbateams WHERE 0=0";

        if ($TeamName != "") {
            $sql .= " AND TeamName LIKE :TeamName";
            $binds['TeamName'] = '%'.$TeamName.'%';
        }

        if ($Conference != "") {
            $sql .= " AND Conference LIKE :Conference";
            $binds['Conference'] = '%'.$Conference.'%';
        }


        $sql .= " ORDER BY wins DESC";

        $results = array();

        $stmt = $db->prepare($sql);

        if ($stmt->execute($binds) && $stmt->rowCount() > 0) {
            $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
        }

        return ($results);
    }

?>