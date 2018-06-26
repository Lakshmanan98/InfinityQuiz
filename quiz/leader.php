<?php
session_start();
include('connection.php');
@$result = mysqli_query($conn,"SELECT username FROM age");
while (@$row = mysqli_fetch_array(@$result, MYSQLI_ASSOC)) {
    @$names[] =  @$row['username'];
}
@$result = mysqli_query($conn,"SELECT iq FROM age");
while(@$row = mysqli_fetch_array(@$result, MYSQLI_ASSOC)){
     @$iq[] =  @$row['iq'];
}
@$result = mysqli_query($conn,"SELECT memory FROM age");
while(@$row = mysqli_fetch_array(@$result, MYSQLI_ASSOC)){
     @$memory[] =  @$row['memory'];
}
@$result = mysqli_query($conn,"SELECT aptitude FROM age");
while(@$row = mysqli_fetch_array(@$result, MYSQLI_ASSOC)){
     @$aptitude[] =  @$row['aptitude'];
}
@$result = mysqli_query($conn,"SELECT grammar FROM age");
while(@$row = mysqli_fetch_array(@$result, MYSQLI_ASSOC)){
     @$grammar[] =  @$row['grammar'];
}
@$result = mysqli_query($conn,"SELECT puzzles FROM age");
while(@$row = mysqli_fetch_array(@$result, MYSQLI_ASSOC)){
     @$puzzle[] =  @$row['puzzles'];
}
@$result = mysqli_query($conn,"SELECT * FROM age");
while(@$row = mysqli_fetch_array(@$result, MYSQLI_ASSOC)){
     @$sum[] =  @$row['iq']+@$row['memory']+@$row['aptitude']+@$row['grammar']+@$row['puzzles'];
}
for($i=0;$i<count($sum);$i++){
for($j=$i+1;$j<count($sum);$j++){
if($sum[$i]<$sum[$j]){
$t=$sum[$i];
$sum[$i]=$sum[$j];
$sum[$j]=$t;
$p=$names[$i];
$names[$i]=$names[$j];
$names[$j]=$p;
}
}
}
?>
<!DOCTYPE HTML>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<title>Infinity LEADERBOARD</title>
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
  padding: 15px;
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
@media screen and (max-width: 500px) {
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
table, th, td {
    border: 2px solid black;
    border-collapse: collapse;
}
th, td {
    padding: 8px;
}
th {
	background-color: #99ff33;
    text-align: center;
}
td{
text-align:center;
}
tr:hover {background-color:#f5f5f5;}
</style>
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
<a href="ques.php"><img src="infinity2.png" width="145" height="140" alt="infinity" style="display:block;margin:auto;"></a><br>
<nav class="navbar navbar-inverse topnav" style="text-align:center;background-color:black;">
<div class="container-fluid" id="navi">
<div class="navbar-header">
<a class="navbar-brand" href="#">infinity</a>
</div>
<ul class="nav navbar-nav" >
<li><a href="ques.php">Home</a></li>
<li ><a href="result.php">Results</a></li>
<li class="active"><a href="leader.php">Leaderboard</a></li>
<li><a href="#">About Us</a></li>
</ul>
<div class="search-container">
<input type="text" placeholder="Hello! <?php echo $_SESSION["user"]?>" name="search">
<button type="submit"><i class="fa fa-search"></i></button></div>
</nav>
<br><br>
<center>
<p><b>TOP SCORERS</b></p><br>
<table style="width:50%">
<tr>
<th>Name</th>
<th>Score<br>(Out of 300)</th>
</tr>
<?php
for($i=0;$i<count($names);$i++){
	echo "<tr>";
	echo "<td>".$names[$i]."</td>";
	echo "<td>".$sum[$i]."</td>";
	echo "</tr>";
}
?>
</table>
</center>
</body>
</html>