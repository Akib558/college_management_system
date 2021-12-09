<?php 
    session_start();
    if(isset($_SESSION['name']))
    {
      header("Location: templates/tem_home.php");
    }
    include 'templates/tem_navbar.php';
    

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HOME PAGE</title>
</head>
<body> 
    


<!-- body started -->



<!-- <form action="php_config/db_input.php" method="POST">
  <input type="number" name="num" placeholder="num" ><br>
  <input type="text" name="name" placeholder="name" ><br>
  <input type="text" name="style" placeholder="style" ><br>
  <input type="number" name="year" placeholder="year" ><br> 

  <button type="submit" name="submit">Sign Up</button>
</form>



 -->
 <!-- <a href="templates/tem_login.php">GOTO LOGIN</a> -->













<script>
function myFunction() {
  var x = document.getElementById("myTopnav");
  if (x.className === "topnav") {
    x.className += " responsive";
  } else {
    x.className = "topnav";
  }
}
</script>

</body>
</html>
