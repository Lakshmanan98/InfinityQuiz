<?php
if(isset($_POST['ans']))
$k=$_POST['ans'];
$i=0;
$a=Array( 
       0 => Array('ques' => "A train running at the speed of 60 km/hr crosses a pole in 9 seconds. What is the length of the train?","ans" => "150 meters"),
	   1 => Array('ques' => "The cost price of 20 articles is the same as the selling price of x articles. If the profit is 25%, then the value of x is: ","ans" => "16")
	   );
?>
<!DOCTYPE HTML>
<html>
<body>
<div class="container" style="text-align:center;">
<div class="well">
<?php echo $a[$i]['ques'];$i++;?>
<!--A train running at the speed of 60 km/hr crosses a pole in 9 seconds. What is the length of the train?-->
</div>
</div>
<div class="container" style="text-align:center;">
<div class="well">
<form method="post">
<input type="radio" name="ans" value="120 metres">  120 metres<br><br>
<input type="radio" name="ans" value="180 metres">  180 metres<br><br>
<input type="radio" name="ans" value="324 metres">  324 metres<br><br>
<input type="radio" name="ans" value="150 metres">  150 metres<br>
</div><br>
<button type="submit" class="btn btn-info">Next</button>
<button type="submit" class="btn btn-danger" href="result.php">End</button>
</form>
</div>
</body>
</html>