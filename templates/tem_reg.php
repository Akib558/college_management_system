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
       <?php include '../styles/reg.css'; ?>
       <?php include '../styles/index.css'; ?>
    </style>
</head>
<body>
    
<div class="main_div">
		<div class="div2">

			<p>REGISTER</p>
			<form action="../php_config/db_reg.php" method="POST">
        <table class="reg_table">
          <tr>
            <td><input type="text" id="login" class="input_1" name="reg_f_name" placeholder="First Name"></td>
            <td><input type="text" id="login" class="input_1" name="reg_l_name" placeholder="Last Name"></td>
          </tr>
          <tr>
            <td><input type="text" id="login" class="input_1" name="department" placeholder="Department"></td>
            <td><input type="text" id="login" class="input_1" name="section" placeholder="Section"></td>
          </tr>
          <tr>
            <td><input type="text" id="login" class="input_1" name="blood_group" placeholder="Blood Grpup"></td>
            <td><input type="text" id="login" class="input_1" name="address" placeholder="Address"></td>
          </tr>
          <tr>
            <td><input type="text" id="login" class="input_1" name="reg_email" placeholder="Email"></td>
            <td><input type="text" id="password" class="input_1" name="reg_pass" placeholder="Password"></td>
          </tr>
        </table>

        

				
				
				
				<!-- <input type="submit" class="fadeIn fourth" value="REGISTER"> -->
				<button type="submit" class="sub_btn" name="REGISTER">REGISTER</button>
			</form>
			<p>Already have an account?&nbsp;&nbsp;<a href="../templates/tem_login.php">Login</a></p> 
      
      
      <?php
        if(!isset($_GET['signup']))
        {
          exit();
        }
        else{
          $reg_check = $_GET['signup'];
          if($reg_check == "empty")
          {
            echo "<p class='error'> Did not fill all the fields </p>";
            exit();
          }
          elseif($reg_check == "invalidemail")
          {
            echo "<p class='error'> Did not fill all the email </p>";
            exit();
          }
          elseif($reg_check == "success")
          {
            echo "<p class='error'> SUCCESS REGISTRATION </p>";
            exit();
          }
          elseif($reg_check == "error")
          {
            echo "<p class='error'> Have not click reg yet </p>";
            exit();
          }
        }
      ?>
			


		</div>

      




</body>
</html>