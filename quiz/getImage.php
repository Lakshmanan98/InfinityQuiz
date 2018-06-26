<!DOCTYPE HTML>
<html>
<?php
session_start();
$id = @$_SESSION["user"];;
  // do some validation here to ensure id is safe
  $link = mysqli_connect("localhost", "root", "");
  mysqli_select_db("quiz");
  $sql = "SELECT image FROM age WHERE username='".$id."'";
  $result = mysqli_query("$sql");
  $row = mysqli_fetch_assoc($result);
  mysqli_close($link);
  header("Content-type: image/jpeg");
  echo $row['image'];
?>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <meta name="google-signin-client_id" content="238069766951-skbd436ujefonjthgdngn0mmke00p03n.apps.googleusercontent.com">
  <script src="https://apis.google.com/js/platform.js" async defer></script>
</head>
<body>
</body>
</html>