<?php
session_start();
static $test;
?>
<!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <style>
body {
	width: 100wh;
	height: 90vh;
	color: black;
	background: linear-gradient(-45deg, #EE7752, #E73C7E, #23A6D5, #23D5AB);
	background-size: 400% 400%;
	-webkit-animation: Gradient 15s ease infinite;
	-moz-animation: Gradient 15s ease infinite;
	animation: Gradient 15s ease infinite;
}

@-webkit-keyframes Gradient {
	0% {
		background-position: 0% 50%
	}
	50% {
		background-position: 100% 50%
	}
	100% {
		background-position: 0% 50%
	}
}

@-moz-keyframes Gradient {
	0% {
		background-position: 0% 50%
	}
	50% {
		background-position: 100% 50%
	}
	100% {
		background-position: 0% 50%
	}
}

@keyframes Gradient {
	0% {
		background-position: 0% 50%
	}
	50% {
		background-position: 100% 50%
	}
	100% {
		background-position: 0% 50%
	}
}
input[type="radio"]{
  margin: 0 10px 0 10px;
}
  </style>
<title>Infinity IQ Test</title>
<script>
var i=-1,j,k,count=0;
document.cookie="i=1";
document.cookie="mycount=0";
function func(){
	var xmlhttp = new XMLHttpRequest();
	xmlhttp.open("GET", "grammar.json", true);
xmlhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
       var myObj = JSON.parse(this.responseText);
	   /*if(myObj[i].id==1)
	   {var s='<?phpecho $test=0;?>';}*/
	   if(i<10){
        document.getElementById("quest").innerHTML=myObj[i].question;
		document.getElementById("opt1").innerHTML=myObj[i].opt1;
		document.getElementById("opt2").innerHTML=myObj[i].opt2;
		document.getElementById("opt3").innerHTML=myObj[i].opt3;
	   document.getElementById("opt4").innerHTML=myObj[i].opt4;}
    }
};
xmlhttp.send();
    if(i<10)
	{i++;}	
    else if(i==10)
	{
	window.location.href="result.php?grammar=" + count;
	}
}
function checkans(){
	k=-1;
	var clicked;
for(j=0;j<4;j++)
{
if(document.getElementsByName("ans")[j].checked)
{k=j;break;}
}
if(k==-1){document.getElementById("a").innerHTML="*Please answer the question*";i--;}
else{document.getElementById("a").innerHTML="";}
var xmlobj = new XMLHttpRequest();
	xmlobj.open("GET", "grammar.json", true);
xmlobj.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
       var myobj = JSON.parse(this.responseText);
	   if(k==0)clicked=myobj[i-1].opt1;
	   else if(k==1)clicked=myobj[i-1].opt2;
	    else if(k==2)clicked=myobj[i-1].opt3;
		 else if(k==3)clicked=myobj[i-1].opt4;
		 if(k>-1){
	     if(clicked==myobj[i-1].answer)
		 { 
		   count++;}
		 }	 
    }
};
xmlobj.send();
for(j=0;j<4;j++)
	document.getElementsByName("ans")[j].checked = false;
}


var d = new Date();
d.setMinutes(d.getMinutes() + 10);

// Update the count down every 1 second
var x = setInterval(function() {

    // Get todays date and time
    var now = new Date().getTime();
    
    // Find the distance between now an the count down date
    var distance = d - now;
    
    // Time calculations for days, hours, minutes and seconds
    var days = Math.floor(distance / (1000 * 60 * 60 * 24));
    var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
    var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
    var seconds = Math.floor((distance % (1000 * 60)) / 1000);
    
    // Output the result in an element with id="demo"
    document.getElementById("timer").innerHTML = minutes + "m " + seconds + "s ";
    
    // If the count down is over, write some text 
    if (distance < 0) {
        clearInterval(x);
        window.location.href=window.location.href="result.php?grammar=" + count;
    }
}, 1000);
</script>

</head>
<body onload="func();">
<br><br>
<img src="Infinity2.png" width="145" height="140" alt="infinity" style="display:block;margin:auto;">
<br>
<p id="timer" style="text-align: center;font-size: 30px;margin-top:0px;"></p><br>
<div class="container" style="text-align:center;">
<div class="well" style="width: 800px;display:block;margin:auto;">
<p id="quest" style="text-align:center;display:block;margin:auto;"></p>
<!--A train running at the speed of 60 km/hr crosses a pole in 9 seconds. What is the length of the train?-->
</div>
<br><br>
</div>
<div class="container" style="text-align:center;">
<div class="well" style="width: 600px;display:block;margin:auto;">
<form method="post" name="myForm">
<input type="radio" name="ans"><span id="opt1" style="text-align:center;"></span><br><br>
<input type="radio" name="ans"><span id="opt2" style="text-align:center;"></span><br><br>
<input type="radio" name="ans"><span id="opt3" style="text-align:center;"></span><br><br>
<input type="radio" name="ans"><span id="opt4" style="text-align:center;"></span><br>
</div><br>
</form>
<p id="a" style="font-size:20px;color:white;"></p>
<button type="button" class="btn btn-success" onclick="func();checkans();">Next</button>
<button type="submit" class="btn btn-danger" onclick="window.location.href='ques.php'">Stop</button>
</div>
<br><br>
</body>
</html>