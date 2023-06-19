<?php
require('admin_dbcon.php');
$select="SELECT * FROM `users`";
	$query=mysqli_query($dbcon,$select);
	 $result=mysqli_num_rows($query);
	
?>


<!DOCTYPE HTML>
<html lang="en-US">
<head>
	<meta charset="UTF-8">
	<title></title>
	<style type="text/css"> 
		body{
			background:pink;
		}
		.box{
			width:250px;
			background:#fff;
			margin:50px auto;
			text-align:center;
			padding:20px;
		}
		.box p{
			font-size:30px;
		}
	
	</style>
</head>
<body>
	<div class="box">
		<h1>Total Student</h1>
		<p><?php
		if($result==0){echo "<span style='color:red;'>data not found</span>";}else{echo $result;}
		
		
		?></p>
	</div>
</body>
</html>