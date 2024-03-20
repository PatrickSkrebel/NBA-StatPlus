<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <title>Stat+</title>


  <style>
    /* Style for the teams dropdown */
.columnTeams {
    display: flex;
    flex-wrap: wrap;
    justify-content: space-between;
    margin-bottom: 20px;
}

/* Style for each division column */
.columnTeams {
    border: 1px solid #ddd; /* Add a border for better separation */
    padding: 10px;
    width: 200px;/* Set width for each column, considering 20px margin */
    box-sizing: border-box;
}

/* Style for the headers and clickable options */
.columnTeams h3, .columnTeams a {
    display: block;
    margin-bottom: 8px;
    text-decoration: none;
    color: #333;
}

.columnTeams a {
    width: 500%; /* Make each team link take up 100% width within the column */
}

.columnTeams a:hover {
    color: #007bff; /* Change the color on hover */
}

 </style>


<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Stats+</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="../css/styles.css" rel="stylesheet" />
    </head>
    <body>
        <!-- Responsive navbar-->
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container">
                <a class="navbar-brand" href="../Site/Index.php">Stats+</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                        <li class="nav-item"><a class="nav-link" href="../Site/Index.php">Home</a></li>
                        <li class="nav-item"><a class="nav-link" href="../StandingsPage/standingsPage.php">Standings</a></li>     
                        <li class="nav-item"><a class="nav-link" href="../NewsPage/index.php">News (Test)</a></li>     
                                            
                        <l1 class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                NBA Teams
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <!-- Add your NBA teams as list items here -->
                                 <!-- Atlantic Div -->
                                <div class="columnTeams"><!-- This styles the division columns-->
                                    <div class="rowTeams">
                                    <!-- Header and the clickable options -->
                                    <h3>Atlantic</h3>
                                    <a href="../RosterPage/roster.php?TeamID=2">Boston Celtics</a>
                                    <a href="../RosterPage/roster.php?TeamID=3">Brooklyn Nets</a>
                                    <a href="../RosterPage/roster.php?TeamID=20">New York Knicks</a>
                                    <a href="../RosterPage/roster.php?TeamID=23">Philidelphia 76rs</a>
                                    <a href="../RosterPage/roster.php?TeamID=28">Toronto Raptors</a>
                                    </div>
                                </div>

                                <!-- Central Div -->
                                <div class="columnTeams">
                                    <div class="rowTeams">
                                    <!-- Header and the clickable options -->
                                    <h3>Central</h3>
                                    <a href="../RosterPage/roster.php?TeamID=5">Chicago Bulls</a>
                                    <a href="../RosterPage/roster.php?TeamID=6">Cleveland Cavaliers</a>
                                    <a href="../RosterPage/roster.php?TeamID=9">Detriot Pistons</a>
                                    <a href="../RosterPage/roster.php?TeamID=12">Indiana Pacers</a>
                                    <a href="../RosterPage/roster.php?TeamID=17">Milwaulke Bucks</a>
                                    </div>
                                                            </div>
                                <!-- Northwest Div -->
                                <div class="columnTeams">
                                    <div class="rowTeams">
                                    <!-- Header and the clickable options -->
                                    <h3>NorthWest</h3>
                                    <a href="../RosterPage/roster.php?TeamID=8">Denver Nuggets</a>
                                    <a href="../RosterPage/roster.php?TeamID=18">Minnestoa Timberwolves</a>
                                    <a href="../RosterPage/roster.php?TeamID=21">Oklahoma City Thunder</a>
                                    <a href="../RosterPage/roster.php?TeamID=25">Portland Trailblazers</a>
                                    <a href="../RosterPage/roster.php?TeamID=29">Utah Jazz</a>
                                    </div>
                                </div>    
                                <!-- Pacific Div -->
                                <div class="columnTeams">
                                    <div class="rowTeams">
                                    <!-- Header and the clickable options -->
                                    <h3>Pacific</h3>
                                    <a href="../RosterPage/roster.php?TeamID=10">Golden State Warriors</a>
                                    <a href="../RosterPage/roster.php?TeamID=13">Los Angeles Clippers</a>
                                    <a href="../RosterPage/roster.php?TeamID=14">Los Angeles Lakers</a>
                                    <a href="../RosterPage/roster.php?TeamID=24">Phoenix Suns</a>
                                    <a href="../RosterPage/roster.php?TeamID=26">Sacramento Kings</a>
                                    </div>
                                </div>
                                <!-- Southeast Div -->
                                <div class="columnTeams">
                                    <div class="rowTeams">
                                    <!-- Header and the clickable options -->
                                    <h3>SouthEast</h3>
                                    <a href="../RosterPage/roster.php?TeamID=1">Atlanta Hawks</a>
                                    <a href="../RosterPage/roster.php?TeamID=4">Charotte Hornets</a>
                                    <a href="../RosterPage/roster.php?TeamID=16">Miami Heat</a>
                                    <a href="../RosterPage/roster.php?TeamID=22">Orlando Magic</a>
                                    <a href="../RosterPage/roster.php?TeamID=30">Washington Wizards</a>
                                    </div>
                                </div>
                                <!-- Southwest Div -->
                                <div class="columnTeams">
                                    <div class="rowTeams">
                                    <!-- Header and the clickable options -->
                                    <h3>SouthWest</h3>
                                    <a href="../RosterPage/roster.php?TeamID=7">Dallas Mavericks</a>
                                    <a href="../RosterPage/roster.php?TeamID=11">Houston Rockets</a>
                                    <a href="../RosterPage/roster.php?TeamID=15">Memphis Grizzlies</a>
                                    <a href="../RosterPage/roster.php?TeamID=19">New Orleans Pelicans</a>
                                    <a href="../RosterPage/roster.php?TeamID=27">San Antonio Spurs</a>
                                    </div>
                                </div>
                                <!-- Add more teams as needed -->
                                
                            </ul>
                        </li>
                        
                    </ul>
                    
                </div>
            </div>
        </nav>