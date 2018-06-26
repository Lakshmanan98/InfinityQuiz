<!DOCTYPE HTML>
<html>
<head>
<script>
document.cookie = 'name=Khez' ; 
</script>
</head>
<body>
<?php
session_start();
var_dump($_COOKIE['name']);  
//echo @$_SESSION['count'];
?>
</body>
</html>

 <!--<div class="container" style="text-align:center;">
<p style="text-align:center;"><b>Memory Test</b></p>
<?php if($mem==0){?>
<div style="text-align:center;" class="alert alert-danger">
<p style="font-family:Verdana;color:black;">You have not attempted the test!!</p>
</div>
</div>
<?php }else { ?>
<div class="progress">
    <?php echo "<div class='progress-bar progress-bar-success' role='progressbar' aria-valuemin='0' aria-valuemax='100' style='width:$mem%'>";?>
	<?php echo "Hai"?>%
    </div>
  </div>
  <?php }?>
  <br>-->