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
            <a href="tem_admin_profile_5.php">Add Courses to Teacher</a>


        
        </div>
    
  <div class="new_content">
    <div class="info">

    <form action="../php_config/db_admin_profile_3.php" method="POST">
                <table class='main-table'>
                    <tr>

                        <td><input type='text' id='login' class='input_1' name='teacher_id'
                                placeholder='Teacher Id'></td>
                        <td><input type='text' id='login' class='input_1' name='teacher_name'
                                placeholder='Teacher Name' ></td>
                    </tr>
                    <tr>
                        <td><input type='text' id='login' class='input_1' name='teacher_phone'
                                placeholder='Teacher Phone'></td>
                        <td><input type='text' id='login' class='input_1' name='teacher_dept'
                                placeholder='Teacher Department' ></td>
                    </tr>
                    
                
                </table>

                <button type='submit' class='sub_btn' name='REGISTER'>REGISTER</button>

    </form>


    </div>
    


  </div>

   
</div>

</body>
</html>

