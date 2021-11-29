<?php 
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
    
<div class="wrapper fadeInDown">
  <div id="formContent">

    <p class="login_reg_head">REGISTRATION</p>

    <!-- Login Form -->
    <form action="../php_config/db_reg.php" method="POST">
      <input type="text" id="login" class="fadeIn second" name="reg_name" placeholder="Name">
      <input type="text" id="login" class="fadeIn second" name="reg_email" placeholder="Email">
      <input type="text" id="password" class="fadeIn third" name="reg_pass" placeholder="Password">
      <input type="submit" class="fadeIn fourth" value="Log In">
    </form>

    <!-- Remind Passowrd -->
    <div id="formFooter">
      <a class="underlineHover" href="#">Forgot Password?</a>
      <br>
      <p>Already have an account?&nbsp;&nbsp;<a href="../templates/tem_login.php">Login</a></p> 
    </div>

  </div>
</div>


</body>
</html>