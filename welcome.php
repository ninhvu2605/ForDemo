<?php 
	session_start();
	$conn_string = "host=ec2-23-21-229-200.compute-1.amazonaws.com port=5432 dbname=d45cnbrd3f2d7l user=qqhhlmrdigauql password=637e31a7084d8a47a567ba0f2fb9d51707920f4751f53b734bb438a6485f1395";
	$conn = pg_connect($conn_string);
	echo "Login Successfully <br>";
	echo "Welcome".$_SESSION['user'];
 ?>
