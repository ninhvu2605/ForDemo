<?php 
ob_start(); // fix header();
session_start();
include('connect.php');

$_SESSION['purchased'] = 0;


if(isset($_POST['check-out'])){
	$name = $_POST['name'];
	$address = $_POST['address'];
	$phone = $_POST['phone'];
	$total_amount = $_POST['total_amount'];
	$time = current_timestamp();
	
	$sql = "INSERT INTO order(customer_name, customer_address, total_price, date_modified, customer_phone) VALUES('$name', '$address', '$total_amount', '$time', '$phone') RETURNING orderid";

	$query = pg_query($conn, $sql);
	if($row = pg_fetch_row($query)){

		$orderID = $row[0];
		
		foreach ($_SESSION['cart'] as $item) {

			$productID = $item['product_id']; 

			$image = $item['image'];

			$quantity = $item['quantity'];

			$price = $item['price'];

			$sql = "INSERT INTO order_detail VALUES ($orderID, $productID,'$quantity','$price', '$image')";

			$ins =pg_query($conn,$sql);
		}
		

		$_SESSION['purchased']=1;
		header('location:index.php');
	}
	else{
		echo "Loiiiixxxxxxxxxxxxxxxxxxxxxxx";
	}	
	
}


ob_flush();
?>
