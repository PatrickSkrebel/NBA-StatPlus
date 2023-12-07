<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <title>SE 266 - PHP, MySQL, and More!</title>
<style>

p.a {
  
}

/* Roster Page */
.rosterTitle{
  text-align: center;
}

.roster{
  margin: 0px 0 0px 200px; /* top right bottom left */
}

/* Dropdown styles */

body {
  font-family: "Times New Roman", Times, serif;
  font-size: "16px;";
  margin-left: 500px;
  margin-right: 20px;
  height: 1000px;
  width: 1000px;
  border: 5px solid #333;
  background-color: #BEC3B7;
}
.navbar {
  overflow: hidden;
  background-color: #333;
  font-family: Arial, Helvetica, sans-serif;
  text-align: center;
}

.navbar a {
  float: left;
  font-size: 16px;
  color: white;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
}

.dropdown {
  float: left;
  overflow: hidden;
}

.dropdown .dropbtn {
  cursor: pointer;
  font-size: 16px;  
  border: none;
  outline: none;
  color: white;
  padding: 14px 16px;
  background-color: inherit;
  font-family: inherit;
  margin: 0;
}

.navbar a:hover, .dropdown:hover .dropbtn, .dropbtn:focus {
  background-color: red;
}

.dropdown-content {
  display: none;
  position: absolute;
  background-color: #0774AA;
  min-width: 160px;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  z-index: 1;
}

.dropdown-content a {
  float: none;
  color: black;
  padding: 12px 16px;
  text-decoration: none;
  display: block;
  text-align: left;
}

/* Styles the columns on the dropdown list */
.column {
  float: left;
  width: 26%;
  height: 275px; /* Adjust the height as needed */
  overflow-y: auto;
}

.dropdown-content a:hover {
  background-color: #3307AA;
}

.show {
  display: block;
}

li {
  font-family: "Times New Roman", Times, serif;
  font-size: "16px;";
}

/* Home Page Design */
.left {
        margin: 100px 0 0 159px; /* top right bottom left */
        word-wrap: break-word; /* Add word-wrap property */
        width: 300px;
        height: 200px;
        border: 2px solid #333;
        text-align: center;
    }
    .right {
        margin: -240px 0 0 550px; /* top right bottom left */
        word-wrap: break-word; /* Add word-wrap property */
        width: 300px;
        height: 200px;
        border: 2px solid #333;
        text-align: center;
    }

    /* Standings Page */
  .data{
       
        margin: 40px 0 0px 75px; /* top right bottom left */
    }

    .team-row {
        border: 1px solid #ccc; /* Add a border to separate rows */
        padding: 10px; /* Add padding for spacing */
        margin-bottom: 10px; /* Add margin for additional separation */
    }

    /* Style for the Edit link */
    .edit-link {
        color: blue;
        text-decoration: underline;
        cursor: pointer;
    }

    /* Login Page */
    .login{
      margin: 0px 0px 0px 850px; /* top right bottom left */
    }

</style>
</head>
<body>

<!-- This code is the navbar that contains the dropdown with all the teams and the standings page etc -->
<div class="navbar">
<a href="../Site/Index.php">Home</a>  <!-- Home page that you start on -->
  <div class="dropdown">
    <button class="dropbtn" onclick="dropDown()">Teams  <!-- Button to open dropdown -->
      <i class="fa fa-caret-down"></i>
    </button>
    <div class="dropdown-content" id="myDropdown">  <!-- Splits the the teams into  -->
      <!-- Atlantic Div -->
      <div class="column"><!-- This styles the division columns-->
        <div class="row">
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
      <div class="column">
        <div class="row">
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
      <div class="column">
        <div class="row">
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
      <div class="column">
        <div class="row">
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
      <div class="column">
        <div class="row">
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
      <div class="column">
        <div class="row">
          <!-- Header and the clickable options -->
          <h3>SouthWest</h3>
          <a href="../RosterPage/roster.php?TeamID=7">Dallas Mavericks</a>
          <a href="../RosterPage/roster.php?TeamID=11">Houston Rockets</a>
          <a href="../RosterPage/roster.php?TeamID=15">Memphis Grizzlies</a>
          <a href="../RosterPage/roster.php?TeamID=19">New Orleans Pelicans</a>
          <a href="../RosterPage/roster.php?TeamID=27">San Antonio Spurs</a>
        </div>
      </div>
    </div>
  </div> 
  <a href="../StandingsPage/standings.php">Standings</a> <!-- Takes you to the standings page -->
  <a href="../Site/php_resources.php">News</a>            <!-- Takes you to the news page -->
  <a href="../Site/git_resources.php">About</a>
  <a href="https://github.com/PatrickSkrebel/SE_266_PHP/tree/main">My GitHub Repo</a>
</div>


<script>
/* When the user clicks on the button, 
toggle between hiding and showing the dropdown content */
function dropDown() {
  document.getElementById("myDropdown").classList.toggle("show");
}

// Close the dropdown if the user clicks outside of it
window.onclick = function(e) {
  if (!e.target.matches('.dropbtn')) {
  var myDropdown = document.getElementById("myDropdown");
    if (myDropdown.classList.contains('show')) {
      myDropdown.classList.remove('show');
    }
  }
}
</script>