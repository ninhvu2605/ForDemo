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
	$pay = $_POST['pay'];
	$time = current_timestamp();
	
	$sql = "INSERT INTO order(customer_name, customer_address, total_price, date_modified, customer_phone, pay) VALUES('$name', '$address', '$total_amount', '$time', '$phone', '$pay') RETURNING orderid";

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
<style type="text/css">
 	input{
 		color:#FF0094;
 		background:#343A40;
 		border: none;
 		outline:none; 
 		width: 70%;

 	}
 	label{
 		color: #FF40DC;
 	}
 	th, tr{
 		text-align: center;
 	}
 	input:hover[type="submit"] 
		{
			background: #B16CE3;
		}
	table{
		width: 100%;
	}
	td{
		color:#FF40DC;
	}
	textarea{
		width: 70%;
	}
</style>

<div class="row">
  	<div class="col-12">
 		<div class="card" style="background:#343A40; color: #EF7F9B; ">
           	<div class="card-header" style="text-align: center; font-family: sans-serif;">
           		<span style="font-size: 25px; ">
           			<i style="padding: 8px;" class="far fa-credit-card"></i>
           			<strong>Check Out</strong>
           		</span>
           	</div>
        </div>
 	</div> 
</div>
<div style="width: 100%;">
	<div style="width: 50%; margin-left: 25%; ">
	
	<form style="margin: 30px; " method="post">
		<table>
		    <tr>
		      <td align="right">Customer Name :</td>
		      <td align="left"><input type="text" name="name" value=""></td>
		    </tr>
		    <tr>
		      <td align="right">Address :</td>
		      <td align="left"><input type="text" name="address" value="<?= $row['address'] ?>"></td>
		    </tr>
		    <tr>
		      <td align="right">Phone :</td>
		      <td align="left"><input type="text" name="phone" value="<?= $row['phone'] ?>"></td>
		    </tr>
		    <tr>
		      <td align="right">Total Amount ($) :</td>
		      <td align="left"><input type="text" name="total_amount" value="<?= $_SESSION['total_amount']  ?>"></td>
		    </tr>
		    <tr>
		      <td align="right">Payment Methods :</td>
		      <td align="left">
		      	<select style="background:#343A40; color: #EF7F9B; outline: none;" name="pay">
					<option value="ATM TP-Bank">ATM TP-Bank</option>
					<option value="Master Card">Master Card</option>
					<option value="Visa">Visa</option>
				</select>
				<input style="width: 20%;margin-left: 30%;"  type="submit" name="check-out" value="Confirm">
			 </td>
		    </tr>

  		</table>
		
	</form>
</div>
</div>
 <section class="sub-below-address py-lg-4 py-md-3 py-sm-3 py-3">
         <div class="container py-lg-5 py-md-5 py-sm-4 py-3">
            <h3 class="title clr text-center mb-lg-5 mb-md-4 mb-sm-4 mb-3">Get In Touch Us</h3>
            <div class="icons mt-4 text-center">
               <ul>
                  <li><a href="#"><span class="fab fa-facebook-f"></span></a></li>
                  <li><a href="#"><span class="fas fa-envelope"></span></a></li>
                  <li><a href="#"><span class="fas fa-rss"></span></a></li>
                  <li><a href="#"><span class="fab fa-vk"></span></a></li>
               </ul>
               <p class="my-3">velit sagittis vehicula. Duis posuere 
                  ex in mollis iaculis. Suspendisse tincidunt
                  velit sagittis vehicula. Duis posuere 
                  velit sagittis vehicula. Duis posuere 
               </p>
            </div>
            <div class="email-sub-agile">
               <form action="#" method="post">
                  <div class="form-group sub-info-mail">
                     <input type="email" class="form-control email-sub-agile" placeholder="Email">
                  </div>
                  <div class="text-center">
                     <button type="submit" class="btn subscrib-btnn">Subscribe</button>
                  </div>
               </form>
            </div>
         </div>
      </section>
      <!--//subscribe-->
      <!-- footer -->
      <footer class="py-lg-4 py-md-3 py-sm-3 py-3 text-center">
         <div class="copy-agile-right">
            <p> 
               © 2018 Toys-Shop. All Rights Reserved | Design by <a href="http://www.W3Layouts.com" target="_blank">W3Layouts</a>
            </p>
         </div>
      </footer>
      <!-- //footer -->
      <!-- Modal 1-->
      <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
         <div class="modal-dialog" role="document">
            <div class="modal-content">
               <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Login</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                  </button>
               </div>
               <div class="modal-body">
                  <div class="register-form">
                     <form action="#" method="post">
                        <div class="fields-grid">
                           <div class="styled-input">
                              <input type="text" placeholder="Your Name" name="Your Name" required="">
                           </div>
                           <div class="styled-input">
                              <input type="email" placeholder="Your Email" name="Your Email" required="">
                           </div>
                           <div class="styled-input">
                              <input type="password" placeholder="password" name="password" required="">
                           </div>
                           <button type="submit" class="btn subscrib-btnn">Login</button>
                        </div>
                     </form>
                  </div>
               </div>
               <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
               </div>
            </div>
         </div>
      </div>
      <!-- //Modal 1-->
      <!--js working-->
      <script src='js/jquery-2.2.3.min.js'></script>
      <!--//js working-->
      <!-- cart-js -->
       <script src="js/minicart.js"></script>
      <script>
         toys.render();
         
         toys.cart.on('toys_checkout', function (evt) {
            var items, len, i;
         
            if (this.subtotal() > 0) {
               items = this.items();
         
               for (i = 0, len = items.length; i < len; i++) {}
            }
         });
      </script>
      <!-- //cart-js -->
      <!-- price range (top products) -->
      <script src="js/jquery-ui.js"></script>
      <script>
         //<![CDATA[ 
         $(window).load(function () {
            $("#slider-range").slider({
               range: true,
               min: 0,
               max: 9000,
               values: [50, 6000],
               slide: function (event, ui) {
                  $("#amount").val("$" + ui.values[0] + " - $" + ui.values[1]);
               }
            });
            $("#amount").val("$" + $("#slider-range").slider("values", 0) + " - $" + $("#slider-range").slider("values", 1));
         }); //]]>
      </script>
      <!-- //price range (top products) -->
      <!-- start-smoth-scrolling -->
       <script src="js/move-top.js"></script>
      <script src="js/easing.js"></script>
      <script>
         jQuery(document).ready(function ($) {
            $(".scroll").click(function (event) {
               event.preventDefault();
               $('html,body').animate({
                  scrollTop: $(this.hash).offset().top
               }, 900);
            });
         });
      </script>
      <!-- start-smoth-scrolling -->
      <!-- here stars scrolling icon -->
      <script>
         $(document).ready(function () {
         
            var defaults = {
               containerID: 'toTop', // fading element id
               containerHoverID: 'toTopHover', // fading element hover id
               scrollSpeed: 1200,
               easingType: 'linear'
            };
         
         
            $().UItoTop({
               easingType: 'easeOutQuart'
            });
         
         });
      </script>
      <!-- //here ends scrolling icon -->
      <!--bootstrap working-->
      <script src="js/bootstrap.min.js"></script>
      <!-- //bootstrap working--> 
   </body>
</html>
