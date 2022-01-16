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

  .collapsible {
  background-color: #777;
  color: white;
  cursor: pointer;
  padding: 18px;
  width: 100%;
  border: none;
  text-align: left;
  outline: none;
  font-size: 15px;
}

.active, .collapsible:hover {
  background-color: #555;
}

.content2 {
  padding: 0 18px;
  display: none;
  overflow: hidden;
  background-color: #f1f1f1;
}

.demo_table{
  width: 100%;
  table-layout: fixed;
}
tr{
  text-align: center;
}

    </style>
</head>
<body>

<div class="sidebar">
  <a href="tem_home.php">Home</a>
  <a  href="tem_admin_profile.php">Teacher</a>
  <a class="active" href="tem_admin_student.php">Student</a>
  <a href="tem_admin_notice.php">Notice Board</a>
  <a href="tem_admin_edu.php">Educational Records</a>
  <a href="tem_admin_fee.php">Fees</a>
 
</div>

<div class="content">
    
<div id="navbar">

            <a href="tem_admin_student.php">Student Info</a>
            <a href="tem_admin_student_2.php">Edit Student</a>
            <a href="tem_admin_student_3.php">Add Student</a>
            <a style="background-color: #2bff00;" href="tem_admin_student_4.php">Remove Student</a>

        </div>
    <div class="new_content">

    <form action="tem_admin_student_4.php" method="POST">
      <input type="text" name="student_id" placeholder="Student Id">
      <button style="margin-top: 50px;" type="submit" class="sub_btn"
                                name="REGISTER">Remove Student</button>
      <!-- <button type="submit" class="sub_btn" name="search">SEARCH</button> -->

  </form>

    <?php

        if(isset($_POST['REGISTER']))
        {
            $_SESSION['tem_value'] = 1;
            $db_servername = "localhost";
            $db_username = "user2";
            $db_password = "passuser2";
            $db_name = "db1";
            $conn = mysqli_connect($db_servername, $db_username, $db_password, $db_name);
            
            $value = $_POST['student_id'];

            
            $sql = "select * from reg where student_id='$value';";
            $result = mysqli_query($conn, $sql);
            $count = mysqli_num_rows($result);


            
            if($count > 0)
            {
              $sql = "delete from reg where student_id='$value'";
              if(mysqli_query($conn,$sql))
              {
                echo "<p style='color:green'><b> Student with ID $value Removed </b></p>";
              }
                
            
            }
            else{
            echo "<p style='color:red'><b> There is not Student with ID $value </b></p>";
          }

        
        
        }
    
    
    ?>

</div>
    

</body>
</html>

