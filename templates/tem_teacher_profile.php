<?php
    session_start();

  $teacher_id =   $_SESSION['teacher_id'];
  $teacher_name =   $_SESSION['teacher_name'];    
  $teacher_phone =   $_SESSION['teacher_phone'];   
  $teacher_dept =   $_SESSION['teacher_dept'] ; 
  $teacher_email =   $_SESSION['teacher_email'];   
  $teacher_password =   $_SESSION['teacher_password'];
    
    
    
    
    
    
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
  <a class="active" href="tem_teacher_profile.php">Home</a>
  <a href="tem_teacher_edit_profile.php">Edit Profile</a>
  <a href="tem_teacher_course.php">Courses</a>
  <a href="tem_teacher_education.php">Educational Records</a>

 
</div>

<div class="content">
    

  <div class="info">
    <table class="main-table">
      <tr>
        <?php
         
          echo "<td colspan='2'>$teacher_id</td>";
        ?>
        
      </tr>

      <tr>
        <?php
          echo "<td colspan='2'>$teacher_name</td>";
        ?>
      </tr>

      <tr>
        <?php echo "<td>$teacher_phone</td><td>$teacher_dept</td>"; ?>

      </tr>
    
      <tr>
      <?php echo "<td>$teacher_email</td><td>$teacher_password</td>"; ?>

      </tr>
      <tr></tr>
    </table>
   
  </div>


</div>

</body>
</html>

