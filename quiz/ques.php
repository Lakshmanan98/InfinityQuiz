<?php
session_start();
$name=@$_SESSION["user"];
?>
<!DOCTYPE HTML>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<title>Infinity HOME</title>
<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<style>
#navi{
background-color:#ff3399;
font-family:arial;
color:black;
}
#navi ul li a {
    display: block;
    color: #FFF;
    text-align: center;   
    }
	a{
	width: 110px;
    -webkit-transition: width 2s; /* Safari */
    transition: width 1.5s;
	}
a:hover{
width:120px;

}
.topnav .search-container {
  float: right;
}

.topnav input[type=text] {
  padding: 6px;
  margin-top: 8px;
  font-size: 17px;
  border: none;
}

.topnav .search-container button {
  float: right;
  padding: 6px 10px;
  margin-top: 8px;
  margin-right: 16px;
  background: #ddd;
  font-size: 17px;
  border: none;
  cursor: pointer;
}

.topnav .search-container button:hover {
  background: #ccc;
}
@media screen and (max-width: 600px) {
  .topnav .search-container {
    float: none;
  }
  .topnav a, .topnav input[type=text], .topnav .search-container button {
    float: none;
    display: block;
    text-align: left;
    width: 100%;
    margin: 0;
    padding: 14px;
  }
  .topnav input[type=text] {
    border: 1px solid #ccc;  
  }
}
.accordion {
	display:block;
	margin:auto;
    background-color: #80ff80;
    color: black;
    cursor: pointer;
    padding: 20px;
    width: 50%;
    border: none;
    text-align: center;
    outline: none;
    font-size: 15px;
    transition: 0.4s;
}
.accordion:hover {
    background-color: lightblue;
}
.accordion:after {
    content: '\0002B';
    color: #777;
    font-weight: bold;
    float: right;
    margin-left: 5px;
}
.panel {
	text-align:center;
	display:block;
	margin:auto;
    padding: 0 18px;
    background-color: white;
    max-height: 0;
    overflow: hidden;
    transition: max-height 0.2s ease-out;
}
</style>
<script>
function check(a){
//	document.write(a);
if(a==0)
	window.location.href='iq.php';
else
document.getElementById("second").innerHTML="You have already attempted the test";
}
function chec(a){
//	document.write(a);
if(a==0)
	window.location.href='aps.php';
else
{document.getElementById("seco").innerHTML="You have already attempted the test";}
}
function checgram(a){
//	document.write(a);
if(a==0)
	window.location.href='grammar.php';
else
{document.getElementById("sec").innerHTML="You have already attempted the test";}
}
</script>
<meta name="google-signin-cookiepolicy" content="single_host_origin" />
<meta name="google-signin-requestvisibleactions" content="https://schema.org/AddAction" />
<meta name="google-signin-scope" content="https://www.googleapis.com/auth/plus.login" />
<meta name="google-signin-client_id" content="238069766951-skbd436ujefonjthgdngn0mmke00p03n.apps.googleusercontent.com">
  <script src="https://apis.google.com/js/platform.js" async defer></script>
</head>
<body>
<br>
<img src="Infinity2.png" width="145" height="140" alt="infinity" style="display:block;margin:auto;"><br>
<nav class="navbar navbar-inverse topnav" style="text-align:center;background-color:black;">
<div class="container-fluid" id="navi">
<div class="navbar-header">
<a class="navbar-brand" href="#">infinity</a>
</div>
<ul class="nav navbar-nav" >
<li class="active"><a href="#">Home</a></li>
<li style="text-color:black;"><a href="result.php">Results</a></li>
<li style="color:black;"><a href="leader.php">Leaderboard</a></li>
<li style="color:black;"><a href="#">About Us</a></li>
</ul>
<div class="search-container">
<input type="text" placeholder="Hello! <?php echo $_SESSION["user"]?>" name="search">
<button type="submit"><i class="fa fa-search"></i></button>
</div>
</nav>
<br><br>
<br><br>
<button class="accordion cla">IQ Test</button>
<div class="panel">
<p>An IQ test is a psychological measure of a person's “intelligence quotient” (IQ). </p>
<?php 
include ('connection.php');
$sql="SELECT iq from age where username='$name'";
$res=$conn->query($sql);
if($res->num_rows>0){
$row=$res->fetch_assoc();
}
?>
<button id="first" type="button" class="btn btn-danger" onclick="check(<?php echo $row['iq'];?>);">Take test</button><br><br>
<p id="second" style="color:red;font-weight: bold;"></p>
<br>
</div>
<!--<button class="accordion cla">Memory Test</button>
<div class="panel">
  <p>How is your memory today? The memory test is fun and informative. </p>
 <button type="button" class="btn btn-primary">Take Test</button><br><br>
</div>
-->
<button class="accordion cla">Aptitude Test</button>
<div class="panel">
  <p>An aptitude is a component of a competence to do a certain kind of work at a certain level.</p>
  <?php 
$s="SELECT aptitude from age where username='$name'";
$res=$conn->query($s);
if($res->num_rows>0){
$row=$res->fetch_assoc();
}
?>
 <button id="first" type="button" class="btn btn-info" onclick="chec(<?php echo $row['aptitude'];?>);">Take Test</button><br><br>
 <p id="seco" style="color:red;font-weight:bold;"></p><br>
</div>
<button class="accordion cla">Grammar Test</button>
<div class="panel">
  <p>Get some practice English Grammar questions with this Elementary level exam. </p>
  <?php 
$s="SELECT grammar from age where username='$name'";
$res=$conn->query($s);
if($res->num_rows>0){
$row=$res->fetch_assoc();
}
?>
 <button id="first" type="button" class="btn btn-success" onclick="checgram(<?php echo $row['grammar'];?>);">Take Test</button><br><br>
 <p id="sec" style="color:red;font-weight:bold;"></p><br>
</div>
<button class="accordion cla">Puzzles</button>
<div class="panel">
  <p>A puzzle is a game, problem, or toy that tests a person's ingenuity or knowledge.</p>
 <button type="button" class="btn btn-warning" onclick="window.location.href='puzzle.php'">Try Today's Puzzle</button><br><br>
 <p>If you solve the puzzle, it will not be added to the total Score. It is just to test your practical knowledge.</p>
</div>
<script>
var acc = document.getElementsByClassName("accordion");
var i;

for (i = 0; i < acc.length; i++) {
  acc[i].addEventListener("click", function() {
    this.classList.toggle("active");
    var panel = this.nextElementSibling;
    if (panel.style.maxHeight){
      panel.style.maxHeight = null;
    } else {
      panel.style.maxHeight = panel.scrollHeight + "px";
    } 
  });
}
function signOut() {
    var auth2 = gapi.auth2.getAuthInstance();
    auth2.signOut().then(function () {
      console.log('User signed out.');
    });
	window.location.href = "home.php";
  }
  function onLoad() {
      gapi.load('auth2', function() {
        gapi.auth2.init();
      });
    }
</script>
<center style="margin-top:50px;" ><a href="#" onclick="signOut();">Sign out</a></center>
<script src="https://apis.google.com/js/platform.js?onload=onLoad" async defer></script>
</body>
</html>