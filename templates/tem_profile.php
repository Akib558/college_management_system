<?php
    session_start();

  $fname = $_SESSION['fname'];
  $lname = $_SESSION['lname'];
  $department = $_SESSION['department'];
  $section = $_SESSION['section'];
  $blood_grop = $_SESSION['blood_group'];
  $address = $_SESSION['address'];
  $email = $_SESSION['email'];
  $password = $_SESSION['password'];
  
?>

<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<style>
<?php include '../styles/profile.css'; ?>


</style>
</head>
<body>

<div class="sidebar">
  <a href="tem_home.php">Main Menu</a>
  <a class="active" href="tem_profile.php">Home</a>
  <a href="tem_edit_profile.php">Edit Profile</a>
  <a href="tem_courses.php">Courses</a>
  <a href="tem_education.php">Educational Records</a>
  <a href="tem_fees.php">Fees</a>
 
</div>

<div class="content">
    
  <!-- <div class="pic">
    <div class="pic-in">
      <img id="my-img" src="/home/akib/Pictures/Screenshot from 2021-10-02 16-37-05.png" alt="">
    </div>
    <hr>
  </div> -->
  <div class="info">
    <table class="main-table">
      <!-- <tr>NAME</tr> -->
      <tr colspan='2'>
        <?php
         
          echo "<td colspan='2'>$fname&nbsp$lname</td>" 
        ?>
        
      </tr>
      <tr>
        <?php
         
          echo "<td>$fname</td><td>$lname</td>" 
        ?>
        
      </tr>
      <tr>
        <?php echo "<td>$department</td><td>$section</td>" ?>

      </tr>
      <tr>
        <?php echo "<td>$blood_grop</td><td>$address</td>" ?>

      </tr>
      <tr>
      <?php echo "<td>$email</td><td>$password</td>" ?>

      </tr>
      <tr></tr>
    </table>
   
  </div>


</div>

</body>
</html>

