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
            <a href="tem_admin_student_4.php">Remove Student</a>

        </div>
    <div class="new_content">
    <form action="../php_config/db_admin_student_3.php" method="POST">
        <table>
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
          <tr>
            <td><input type="text" id="login" class="input_1" name="student_id" placeholder="Student ID"></td>
            <td></td>
          </tr>
        </table>

        

				
				
				
				<!-- <input type="submit" class="fadeIn fourth" value="REGISTER"> -->
				<button type="submit" class="sub_btn" name="REGISTER">REGISTER</button>
			</form>





    </div>
</body>
</html>

