<?php
session_start();
include ('connection.php');
$name=@$_SESSION["user"];
$ans=NULL;
if(@$ans==NULL)
@$ans=$_POST['answer'];
if(isset($_POST['submit'])){
	if(@ans==NULL){
	echo '<style type="text/css">
        #answ {
            background-color:grey;
        }
        </style>';
	}
	else if(@$ans=='M'||@$ans=='m'){
	echo '<style type="text/css">
        #answ {
            background-color:green;
        }
        </style>';
	}
	else{
	echo '<style type="text/css">
        #answ {
            background-color:red;
        }
        </style>';
	}
}
?>
<!DOCTYPE HTML>
<html>
<head>
<title>INFINITY Puzzle</title>
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
<div class="container" >
  <div class="jumbotron" id="answ">
    <h2 style="text-align:center;">Today's Puzzle</h2>
    <center><img src="puzz.png"/>
	<br><br>
    <b><p style="font-size:20px;">Enter the answer</p></b>
	<form method="POST">
	<input type="text" name="answer" required /><br>
	<button type="submit" name="submit" style="margin-top:20px;" class="btn btn-info">Submit</button>
	</form>
	</center>
	<br>
  </div>
  </div>
</body>
</html>