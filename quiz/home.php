<!DOCTYPE HTML>
<?php
session_start();
include('connection.php');
@$name=NULL;$email=NULL;$img=NULL;@$f=0;
@$detail= $_GET["uid"];
$det = explode('!', $detail);
@$name=$det[0];
@$email=$det[1];
@$img=$det[2];
if(@$name!=NULL)
{@$f=1;@$_SESSION["user"]=$name;}
if(@$name==NULL)
@$name=$_POST['uname'];
@$query = mysqli_query($conn, "SELECT * FROM age WHERE username='".$name."'");
if(@$name!=NULL&&mysqli_num_rows($query)==0)
{
	$s="INSERT into age(username) values('$name')";
	$conn->query($s);
	//if($email!=NULL&&$img!=NULL){
    $sql="UPDATE age SET email = '$email', image= '$img' WHERE username='$name';";
	$conn->query($sql);
//}
}
if(@$f==0)
@$_SESSION["user"]=$_POST['uname'];
if(isset($_POST['submit'])||@$f==1){
	header("Location: ques.php");
	exit;
}
?>
<html>
<head>
<title>INFINITY</title>
<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <meta name="google-signin-client_id" content="238069766951-skbd436ujefonjthgdngn0mmke00p03n.apps.googleusercontent.com">
  <script src="https://apis.google.com/js/platform.js" async defer></script>
  <style>
body {
  background-color: white;
  font-family: "Open Sans", Helvetica;
}

label {
  display: block;
  margin:5px;
  letter-spacing: 7px;
  padding-top: 30px;
  text-align: center;
}
label .label-text {
  color: #9B9B9B;
  cursor: text;
  font-size: 20px;
  line-height: 20px;
  text-transform: uppercase;
  -moz-transform: translateY(-34px);
  -ms-transform: translateY(-34px);
  -webkit-transform: translateY(-34px);
  transform: translateY(-34px);
  transition: all 0.3s;
}
label input {
  background-color: transparent;
  border: 0;
  border-bottom: 2px solid #4A4A4A;
  color: black;
  font-size: 20px;
  letter-spacing: -1px;
  outline: 0;
  padding: 5px 10px;
  text-align: center;
  transition: all 0.3s;
  width: 200px;
}
label input:focus {
  width: 400px;
}
label input:focus + .label-text {
  color: #F0F0F0;
  font-size: 13px;
  -moz-transform: translateY(-74px);
  -ms-transform: translateY(-74px);
  -webkit-transform: translateY(-74px);
  transform: translateY(-74px);
}
label input:valid + .label-text {
  font-size: 13px;
  -moz-transform: translateY(-74px);
  -ms-transform: translateY(-74px);
  -webkit-transform: translateY(-74px);
  transform: translateY(-74px);
}
img{
    display: block;
    margin-top: 160px;
    margin-bottom: 70px;
    margin-left:auto;
    margin-right:auto;
}
.data{
display:block;
}
</style>
<script>
function onSignIn(googleUser) {
  var profile = googleUser.getBasicProfile();
  console.log('ID: ' + profile.getId());// Do not send to your backend! Use an ID token instead.
  console.log('Name: ' + profile.getName());
  console.log('Image URL: ' + profile.getImageUrl());
  console.log('Email: ' + profile.getEmail()); // This is null if the 'email' scope is not present.
   var id_token = googleUser.getAuthResponse().id_token;
   var name=profile.getName();
   var email=profile.getEmail();
   var image=profile.getImageUrl();
   var detail= name+"!"+email+"!"+image;
   window.location.href="home.php?uid=" + detail;
}
function signOut() {
    var auth2 = gapi.auth2.getAuthInstance();
    auth2.signOut().then(function () {
      console.log('User signed out.');
    });
	window.location.href = "ques.php";
  }
  console.log(detail);
</script>
  </head>
<body class="content">
<center><img src="Infinity2.png" width="145" height="150" alt="infinity" style=";"></center>
<form  method="post" style="margin-top:-60px;">
<label>  <input type="text" name="uname" required />  <div class="label-text" >Username</div></label>
<label>  <input type="text" name="testid" required />  <div class="label-text" >Test ID</div></label>
<center><button type="submit" name="submit" style="margin-top:20px;" class="btn btn-info">GO</button></center>
</form>
<center><div class="g-signin2" style="margin-top:80px;" data-onsuccess="onSignIn"></div></center>
</body>
</html>