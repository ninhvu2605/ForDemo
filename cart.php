<?php 
   session_start();
   include('connect.php');
   if(isset($_GET['del'])){
      unset($_SESSION['cart'][$_GET['del']]);
      header('location:cart.php');
   }
   $totalAmount = 0;
   $amountNew = null;
   if(isset($_POST['id'])){
     $id = $_REQUEST['id'];
     $q = pg_query($conn, "SELECT * FROM product WHERE product_id = $id");
     $product = pg_fetch_array($q);
     $_SESSION['cart'][$id] = $product;
     $_SESSION['cart'][$id]['quantity']++; 
   }
 ?>
<!DOCTYPE html>
<html lang="zxx">
   <head>
      <title>Toys Shop an Ecommerce Category Bootstrap Responsive Web Template | Home :: w3layouts</title>
      <!--meta tags -->
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta name="keywords" content="Toys Shop Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
         Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
      <script>
         addEventListener("load", function () {
            setTimeout(hideURLbar, 0);
         }, false);
         
         function hideURLbar() {
            window.scrollTo(0, 1);
         }
      </script>
      <!--//meta tags ends here-->
      <!--booststrap-->
      <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css" media="all">
      <!--//booststrap end-->
      <!-- font-awesome icons -->
      <link href="css/fontawesome-all.min.css" rel="stylesheet" type="text/css" media="all">
      <!-- //font-awesome icons -->
      <!-- For Clients slider -->
      <link rel="stylesheet" href="css/flexslider.css" type="text/css" media="all" />
      <!--flexs slider-->
      <link href="css/JiSlider.css" rel="stylesheet">
      <!--Shoping cart-->
      <link rel="stylesheet" href="css/shop.css" type="text/css" />
      <!--//Shoping cart-->
      <!--stylesheets-->
      <link href="css/style.css" rel='stylesheet' type='text/css' media="all">
      <!--//stylesheets-->
      <link href="//fonts.googleapis.com/css?family=Sunflower:500,700" rel="stylesheet">
      <link href="//fonts.googleapis.com/css?family=Open+Sans:400,600,700" rel="stylesheet">
   </head>
   <body>
   <div class="header-outs" id="home">
         <div class="header-bar">
            <div class="info-top-grid">
               <div class="info-contact-agile">
                  <ul>
                     <li>
                        <span class="fas fa-phone-volume"></span>
                        <p>+(000)123 4565 32</p>
                     </li>
                     <li>
                        <span class="fas fa-envelope"></span>
                        <p><a href="mailto:info@example.com">info@example1.com</a></p>
                     </li>
                     <li>
                     </li>
                  </ul>
               </div>
            </div>
            <div class="container-fluid">
               <div class="hedder-up row">
                  <div class="col-lg-3 col-md-3 logo-head">
                     <h1><a class="navbar-brand" href="index.php">Toys-Shop</a></h1>
                  </div>
                  <div class="col-lg-5 col-md-6 search-right">
                     <?php
                       if(isset($_POST['search_btn'])){
                           $s = $_POST['search_input']; 
                           header("Location:search.php?searchkey=$s");
                       }
                     ?>    
                     <form method="post" class="form-inline my-lg-0">
                        <input class="form-control mr-sm-2" type="search" placeholder="Search" name = "search_input">
                        <button class="btn" type="submit" name ="search_btn">Search</button>
                     </form>
                  </div>
               </div>
            </div>
            <nav class="navbar navbar-expand-lg navbar-light">
               <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
               <span class="navbar-toggler-icon"></span>
               </button>
               <div class="collapse navbar-collapse justify-content-center" id="navbarSupportedContent">
                  <ul class="navbar-nav ">
                     <li class="nav-item active">
                        <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
                     </li>
                     <li class="nav-item">
                        <a href="about.html" class="nav-link">About</a>
                     </li>
                     <li class="nav-item">
                        <a href="service.html" class="nav-link">Service</a>
                     </li>
                     <li class="nav-item">
                        <a href="shop.php" class="nav-link">Shop Now</a>
                     </li>
                     <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" id="navbarDropdown1" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Product
                        </a>
         
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                           <?php
                              $sql2 = "SELECT * FROM category";
                              $query2 = pg_query($conn,$sql2);
                              while($row2 = pg_fetch_array($query2)){ 
                           ?>
                           <a class="nav-link" href="search.php?searchkey=<?php echo $row2['cat_name']; ?>"><?php echo $row2['cat_name']; ?></a> 
                           <?php } ?>
                        </div>
                     </li>
                     <li class="nav-item">
                        <a href="contact.html" class="nav-link">Contact</a>
                     </li>
                  </ul>
               </div>
            </nav>
         </div>
      </div>
      <!--//headder-->
      <!-- banner -->
      <div class="inner_page-banner one-img">
      </div>
      <!--//banner -->
      <!-- short -->
      <div class="using-border py-3">
         <div class="inner_breadcrumb  ml-4">
            <ul class="short_ls">
               <li>
                  <a href="index.html">Home</a>
                  <span>/ /</span>
               </li>
               <li>Cart</li>
            </ul>
         </div>
      </div>
      <!-- //short-->
      <!--show Now-->  
      <!--show Now-->  
     <!-- CARTTTTTTTTTTTTTTTTTTTTTTTTTTTTT -->
       <div class="row">
   
        
        <table style="color:#FF0094; background: #343A40; border-color: black;" class="table table-dark">
        <thead>
          <tr>
            <th scope="col">Image</th>
            <th scope="col">Name</th>
            <th scope="col">Category</th>
            <th scope="col">Supplier</th>
            <th scope="col">Price</th>
            <th scope="col">Action</th>
          </tr>
        </thead>
        <tbody>
         <?php 

            if(isset($_SESSION['cart']) && $_SESSION['cart'] != null) {
               
                  foreach($_SESSION['cart'] as $item){
                     
          ?>
          <tr>
            <td><img style="width: 100px; height: 100px;" src="images/<?= $item['image'] ?>"></td>
            <td><?= $item['product_name'] ?></td>
            <td><?= $item['cat_name'] ?></td>
            <td><?= $item['supplier'] ?> $</td>
            <td><?= $item['price'] ?> $</td>
            <td style="text-align: center;"><a href="cart.php?del=<?= $item['product_id'] ?>"><span style="font-size: 20px;"><i style="color:#FF0094 ; " class="far fa-trash-alt"></i></span></a>
            </td>
          </tr>

          <?php 
               
            }
          }else if(!isset($_SESSION['cart'])){
               echo "<div class='cart-empty'><h1>Cart is empty</h1></div>";
            }     
            
                  
        
            ?>
            
            <td style="font-size: 20px;" colspan="5"><a href="index.php" style="margin-right: 40%;">Buy More Toys!</a><strong>Total</strong></td>
            <td style="font-size: 20px;">
               <?php 
                  $total = 0;
                if(isset($_SESSION['cart'])&& $_SESSION['cart'] != null){
                      foreach ($_SESSION['cart'] as $item) {
                        $total = $total + ($item['quantity'] * $item['price']);
                      }
                  }

                  $totalAmount = number_format($total,2);
               ?>
               <?php echo $totalAmount ?> $             
           </td>   
               <td><a href="<?php echo "order.php" ?>"><i style="padding: 10px;" class="far fa-credit-card"></i>Order Now</a></td>
          </tr>
        </tbody>
      </table>
</div>
<?php $_SESSION['total_amount'] = number_format($total,2); ?>




      <!-- ENDCARTTTTTTTTTTTTTTTTTTTTTTTTTT -->
      <!--//subscribe-address-->
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
