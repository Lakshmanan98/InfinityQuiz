<?php
$sername="localhost";
$username="root";
$password="";
$dbname="quiz";
$conn= new mysqli($sername,$username,$password,$dbname);
if($conn->connect_error){
	die("Connection Failed ".$conn->connect_error);
}
?>