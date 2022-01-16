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
<title>Teacher_admin</title>
<style>
    <?php include '../styles/edit_profile.css';
    ?><?php include '../styles/course.css';
    ?>
    .new_content{
    /* background-color: red; */
    margin-top: 50px;
  }
    </style>
</head>
<body>

<div class="sidebar">
  <a href="tem_home.php">Home</a>
  <a class="active" href="tem_admin_profile.php">Teacher</a>
  <a href="tem_admin_student.php">Student</a>
  <a href="tem_admin_notice.php">Notice Board</a>
  <a href="tem_admin_edu.php">Educational Records</a>
  <a href="tem_admin_fee.php">Fees</a>
 
</div>

<div class="content">
    
<div id="navbar">
            <a href="tem_admin_profile.php">Teachers Info</a>
            <a href="tem_admin_profile_2.php">Edit Teachers</a>
            <a href="tem_admin_profile_3.php">Add Teacher</a>
            <a href="tem_admin_profile_4.php">Remove Teacher</a>
            <a style="background-color: #2bff00;" href="tem_admin_profile_5.php">Add Courses to Teacher</a>
            <a  href="tem_admin_profile_6.php">Remove Courses from Teacher</a>

        
        </div>
    
  <div class="new_content">
    
  <form action="tem_admin_profile_5.php" method="POST">
      <input type="text" name="teacher_id" placeholder="Teacher ID">
      <input type="text" name="course_id" placeholder="Course ID">

      <button style="margin-top: 50px;" type="submit" class="sub_btn"
                                name="REGISTER">Add Course</button>
      <!-- <button type="submit" class="sub_btn" name="search">SEARCH</button> -->

  </form>

  <hr>


  <?php
      if(isset($_POST['REGISTER']))
      {
        $_SESSION['tem_value'] = 1;
        $db_servername = "localhost";
        $db_username = "user2";
        $db_password = "passuser2";
        $db_name = "db1";
        $conn = mysqli_connect($db_servername, $db_username, $db_password, $db_name);
        
        $value = $_POST['teacher_id'];
        $value2 = $_POST['course_id'];

        
        $sql = "select * from teacher_info where teacher_id='$value';";
        $result = mysqli_query($conn,$sql);
        $count = mysqli_num_rows($result);
        
        
        if($count > 0)
        {
          
          $sql = "insert into teacher_courses(teacher_course_name, teacher_id) values ('$value2', '$value');";
          if(mysqli_query($conn,$sql))
          {
            echo "<P style='color: green'>Course with Id :$value2 added to Teacher with Id : $value </p>";

          }
          
        }
        else{
          echo "<P style='color: red'><b> No Teacher with Id : $value </b></p>";
          
        }



        
      
      
      }
      
  ?>


  </div>

   
</div>

</body>
</html>

