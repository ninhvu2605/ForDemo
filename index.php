<?php 
	session_start();
	$conn_string = "host=ec2-23-21-229-200.compute-1.amazonaws.com port=5432 dbname=d45cnbrd3f2d7l user=qqhhlmrdigauql password=637e31a7084d8a47a567ba0f2fb9d51707920f4751f53b734bb438a6485f1395";
	$conn = pg_connect($conn_string);
	if(isset($_POST['login'])){
	    $uname = $_POST['uname'];
	    $pwd = $_POST['psw'];
	    $sql = "SELECT * FROM tbl_user WHERE username = '$uname' and password = '$pwd'"; 
	    $query = pg_query($conn,$sql);
	    $login_check = pg_num_rows($query);
	    if($login_check == 1){ 
		$_SESSION['user'] = $uname;
        	header("Location: welcome.php");
	    }else{
		echo "Invalid Details";
	    }
	
	 }
?>
<!DOCTYPE html>
<html>
<head>
  <title>Hello</title>
</head>
<style type="text/css">
  /* Bordered form */
  form {
    border: 3px solid #f1f1f1;
  }

  /* Full-width inputs */
  input[type=text], input[type=password] {
    width: 100%;
    padding: 12px 20px;
    margin: 8px 0;
    display: inline-block;
    border: 1px solid #ccc;
    box-sizing: border-box;
  }

  /* Set a style for all buttons */
  button {
    background-color: #4CAF50;
    color: white;
    padding: 14px 20px;
    margin: 8px 0;
    border: none;
    cursor: pointer;
    width: 100%;
  }

  /* Add a hover effect for buttons */
  button:hover {
    opacity: 0.8;
  }

  /* Extra style for the cancel button (red) */
  .cancelbtn {
    width: auto;
    padding: 10px 18px;
    background-color: #f44336;
  }

  /* Center the avatar image inside this container */
  .imgcontainer {
    text-align: center;
    margin: 24px 0 12px 0;
  }

  /* Avatar image */
  img.avatar {
    width: 40%;
    border-radius: 50%;
  }

  /* Add padding to containers */
  .container {
    padding: 16px;
  }

  /* The "Forgot password" text */
  span.psw {
    float: right;
    padding-top: 16px;
  }

  /* Change styles for span and cancel button on extra small screens */
  @media screen and (max-width: 300px) {
    span.psw {
      display: block;
      float: none;
    }
    .cancelbtn {
      width: 100%;
    }
  }
</style>
<body>
  <form method="post">
    <div class="imgcontainer">
      <img src="img_avatar2.png" alt="Avatar" class="avatar">
    </div>

    <div class="container">
      <label for="uname"><b>Username</b></label>
      <input type="text" placeholder="Enter Username" name="uname" required>

      <label for="psw"><b>Password</b></label>
      <input type="password" placeholder="Enter Password" name="psw" required>

      <button name ="login" type="submit">Login</button>
    </div>
  </form>
</body>
</html>
