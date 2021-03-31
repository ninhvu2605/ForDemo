<?php 
	$conn_string = "host=ec2-54-145-102-149.compute-1.amazonaws.com port=5432 dbname=d1tv9knvpdnlv1 user=gbvkqgmomzactx password=0ee20d0250395d4060ae69886de9e408dcb6801fee8ce79660b592699f0a3667";
	$conn = pg_connect($conn_string);
	  	if($conn){
	      	echo "Good";
	  	}
 ?>
