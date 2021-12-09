<?php 
  session_start();
  if(isset($_SESSION['name']))
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
    </style>
</head>
<body>

<div class="main_div">
		<div class="div2">

			<p>LOG IN</p>
			<form action="../php_config/db_login.php" method="POST">
        <input type="text" class="input_1" name="login_email" placeholder="Email">
        <input type="text"  class="input_1" name="login_pass" placeholder="Password">
        <input type="submit" class="sub_btn" value="Log In">
      </form>
      <p>No account Yet?&nbsp;&nbsp;<a href="../templates/tem_reg.php">Create account</a></p> 

			<!-- <p>Already have an account?&nbsp;&nbsp;<a href="../templates/tem_login.php">Login</a></p>  -->

		

			
			


		</div>


</div>



</body>
</html>