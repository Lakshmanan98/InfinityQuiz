<?php
session_start();
include ('connection.php');
@$_SESSION["iqflag"]=0;
$mem=0;$aps=0;$gram=0;$puz=0;
$name=@$_SESSION["user"];
if(isset($_GET["iq"]))
{
$iq=$_GET["iq"]*10;
$s="UPDATE age SET iq='$iq' where username='$name'";
$conn->query($s);
}
if(isset($_GET["aps"]))
{
$aps=$_GET["aps"]*10;
$s="UPDATE age SET aptitude='$aps' where username='$name'";
$conn->query($s);
}
if(isset($_GET["grammar"]))
{
$gram=$_GET["grammar"]*10;
$s="UPDATE age SET grammar='$gram' where username='$name'";
$conn->query($s);
}
@$_SESSION["flag"]=0;
$sql="SELECT iq from age where username='$name'";
$res=$conn->query($sql);
if($res->num_rows>0){
$row=$res->fetch_assoc();
$iq=$row["iq"];
@$_SESSION["iqflag"]=$row["iq"];
}
$sql="SELECT aptitude from age where username='$name'";
$res=$conn->query($sql);
if($res->num_rows>0){
$row=$res->fetch_assoc();
$aps=$row["aptitude"];
@$_SESSION["apsflag"]=$row["aptitude"];
}
$sql="SELECT grammar from age where username='$name'";
$res=$conn->query($sql);
if($res->num_rows>0){
$row=$res->fetch_assoc();
$gram=$row["grammar"];
@$_SESSION["gramflag"]=$row["grammar"];
}
?>
<!DOCTYPE HTML>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<title>Infinity RESULTS</title>
<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
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
.icon-bar {
  position: fixed;
  top: 60%;
  -webkit-transform: translateY(-50%);
  -ms-transform: translateY(-50%);
  transform: translateY(-50%);
}

.icon-bar a {
  display: block;
  text-align: center;
  padding: 16px;
  transition: all 0.3s ease;
  color: white;
  font-size: 25px;
}

.icon-bar a:hover {
    background-color: #000;
}

.facebook {
  background: #3B5998;
  color: white;
}

.twitter {
  background: #55ACEE;
  color: white;
}

.google {
  background: #dd4b39;
  color: white;
}

.linkedin {
  background: #007bb5;
  color: white;
}

.youtube {
  background: #bb0000;
  color: white;
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
#myProgress {
  width: 100%;
  background-color: #ddd;
  display:block;
  margin:auto;
}

#myBar {
  width: 10%;
  height: 30px;
  background-color: #4CAF50;
}
.progress {height: 0px;width:250px;display:block;margin:auto;}
.alert{
width:40%;
display:block;
margin:auto;
background-color:#ff4d4d;
}
.progress{
width:40%;
height:20px;
text-align:center;
margin-right:330px;
}
</style>
<meta name="google-signin-cookiepolicy" content="single_host_origin" />
<meta name="google-signin-requestvisibleactions" content="https://schema.org/AddAction" />
<meta name="google-signin-scope" content="https://www.googleapis.com/auth/plus.login" />
<meta name="google-signin-client_id" content="238069766951-skbd436ujefonjthgdngn0mmke00p03n.apps.googleusercontent.com">
  <script src="https://apis.google.com/js/platform.js" async defer></script>
<script>
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
</head>
<body>
<div class="icon-bar">
  <a href="#" class="facebook"><i class="fa fa-facebook"></i></a> 
  <a href="#" class="twitter"><i class="fa fa-twitter"></i></a> 
  <a href="#" class="google"><i class="fa fa-google"></i></a> 
  <a href="#" class="linkedin"><i class="fa fa-linkedin"></i></a>
  <a href="#" class="youtube"><i class="fa fa-youtube"></i></a> 
</div>
<br>
<img src="Infinity2.png" width="145" height="140" alt="infinity" style="display:block;margin:auto;"><br>
<nav class="navbar navbar-inverse topnav" style="text-align:center;background-color:black;">
<div class="container-fluid" id="navi">
<div class="navbar-header">
<a class="navbar-brand" href="#">infinity</a>
</div>
<ul class="nav navbar-nav" >
<li><a href="ques.php">Home</a></li>
<li class="active"><a href="result.php">Results</a></li>
<li><a href="leader.php">Leaderboard</a></li>
<li><a href="#">About Us</a></li>
</ul>
<div class="search-container">
<input type="text" placeholder="Hello! <?php echo $_SESSION["user"]?>" name="search">
<button type="submit"><i class="fa fa-search"></i></button>
</div>
</div>
</nav>
<br><br>
<div class="container" >
  <div class="jumbotron" id="answ">
<div class="container" style="text-align:center;">
<p style="text-align:center;"><b>IQ Test</b></p>
<?php if($iq==0){?>
<div style="text-align:center;" class="alert alert-danger">
<p style="font-family:Verdana;color:black;">You have not attempted the test!!</p>
</div>
</div>
<?php }else {?>
<div class="progress">
    <?php echo "<div class='progress-bar progress-bar-success' role='progressbar' style='width:$iq%;'>";?>
	<?php echo $iq;?>%
    <?php echo "</div>"; ?>
  </div>
<?php }?>
  <br>
  <!--Commented Part in complete.php-->
<p style="text-align:center;"><b>Aptitude Test</b></p>
<div class="container" style="text-align:center;">
<?php if($aps==0){?>
<div style="text-align:center;" class="alert alert-danger">
<p style="font-family:Verdana;color:black;">You have not attempted the test!!</p>
</div>
</div>
<?php }else { ?>
<div class="progress">
    <?php echo "<div class='progress-bar progress-bar-success' role='progressbar' style='width:$aps%;'>";?>
	<?php echo $aps;?>%
    <?php echo "</div>"; ?>
  </div>
  <?php } ?>
  <br>
<p style="text-align:center;"><b>Grammar Test</b></p>
<div class="container" style="text-align:center;">
<?php if($gram==0){?>
<div style="text-align:center;" class="alert alert-danger">
<p style="font-family:Verdana;color:black;">You have not attempted the test!!</p>
</div>
</div>
<?php }else { ?>
<div class="progress">
    <?php echo "<div class='progress-bar progress-bar-success' role='progressbar' style='width:$gram%;'>";?>
	<?php echo $gram;?>%
    <?php echo "</div>"; ?>
  </div>
  <?php } ?>
  <br>
<!--<p style="text-align:center;"><b>Puzzles</b></p>
<div class="container" style="text-align:center;">
<?php if($_SESSION["flag"]==0){?>
<div style="text-align:center;" class="alert alert-danger">
<p style="font-family:Verdana;color:black;">You have not attempted the test!!</p>
</div>
</div>
<?php }else { ?>
<div class="progress">
    <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width:50%">
      50%
    </div>
  </div>
  <?php } ?>-->
  </div>
  </div>
  <br><br>
  <center style="margin-top:-35px;" ><a href="#" onclick="signOut();">Sign out</a></center>
<script src="https://apis.google.com/js/platform.js?onload=onLoad" async defer></script>
<br>
</body>
</html>