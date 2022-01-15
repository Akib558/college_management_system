<?php
    session_start();

    
   
  
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
<a href="tem_home.php">Main Menu</a>
  <a  href="tem_teacher_profile.php">Home</a>
  <a class="active" href="tem_teacher_edit_profile.php">Edit Profile</a>
  <a  href="tem_teacher_course.php">Courses</a>
  <a  href="tem_teacher_education.php">Educational Records</a>
 
</div>

<div class="content">
    

    
  <div class="new_content">



  <?php

  session_start();

$db_servername = "localhost";
$db_username = "user2";
$db_password = "passuser2";
$db_name = "db1";
$conn = mysqli_connect($db_servername, $db_username, $db_password, $db_name);

$value = $_SESSION['teacher_id'];

$sql = "select * from teacher_info where teacher_id='$value'";
if(mysqli_query($conn,$sql))
{
    $result = mysqli_query($conn, $sql);
        
          $data = mysqli_fetch_assoc($result);


            $teacher_id = $data['teacher_id'];
            $teacher_name = $data['teacher_name'];
            $teacher_phone = $data['teacher_phone'];
            $teacher_dept = $data['teacher_dept'];
            $teacher_email = $data['teacher_email'];
            $teacher_password = $data['password'];


            echo "
<div class='info'>
<form action='../php_config/db_teacher_edit_profile.php' method='POST'>
    <table class='main-table'>
        <tr>

            <td><input type='text' id='login' class='input_1' name='teacher_id'
                    placeholder='$teacher_id' value='$teacher_id'></td>
            <td><input type='text' id='login' class='input_1' name='teacher_name'
                    placeholder='$teacher_name' value='$teacher_name'></td>
        </tr>
        <tr>
            <td><input type='text' id='login' class='input_1' name='teacher_phone'
                    placeholder='$teacher_phone' value='$teacher_phone'></td>
            <td><input type='text' id='login' class='input_1' name='teacher_dept'
                    placeholder='$teacher_dept' value='$teacher_dept'></td>
        </tr>
        
        <tr>
            <td><input type='text' id='login' class='input_1' name='teacher_email'
                    placeholder='$teacher_email' value='$teacher_email'></td>
            <td><input type='text' id='login' class='input_1' name='teacher_password'
                    placeholder='$teacher_password' value='$teacher_password'></td>
        </tr>

    </table>

    <button type='submit' class='sub_btn' name='REGISTER'>REGISTER</button>
</form>

</div>
";

}



      
  ?>


  </div>

   
</div>

</body>
</html>

