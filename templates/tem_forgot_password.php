<?php 
  session_start();
  if(isset($_SESSION['valid']))
  {
    header("Location: templates/tem_home.php");
  }
    include 'navbar.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <style>
       <?php include '../styles/login.css'; ?>
       <?php include '../styles/index.css'; ?>
       .forgot_password{
         text-decoration: none;
       }
    </style>
</head>
<body>


<div class="main_div">
		<div class="div2">

			<p>Forgot Password</p>
			<form action="../php_config/db_forgot_password.php" method="POST">
        <input type="text" class="input_1" name="email" placeholder="Email">
        <!-- <input type="submit" class="sub_btn" value="Log In" style="margin-top: 10px;"> -->
        <button type="submit" class="sub_btn" name="REGISTER" style="margin-top: 10px;">Get Link</button>

      </form>
    

			<p>Remembered Password?&nbsp;&nbsp;<a href="../templates/tem_login.php">Login</a></p> 

		

			
			


		</div>


</div>



</body>
</html>