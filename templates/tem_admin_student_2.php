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
            <a style="background-color: #2bff00;" href="tem_admin_student_2.php">Edit Student</a>
            <a href="tem_admin_student_3.php">Add Student</a>
            <a href="tem_admin_student_4.php">Remove Student</a>

        </div>
    <div class="new_content">

    <form action="tem_admin_student_2.php" method="POST">
      <input type="text" name="student_id" placeholder="Student Id">
      <button style="margin-top: 50px;" type="submit" class="sub_btn"
                                name="REGISTER">Get Info</button>
      <!-- <button type="submit" class="sub_btn" name="search">SEARCH</button> -->

  </form>

  <hr>

  <?php
      if(isset($_POST['REGISTER']))
      {
        // $_SESSION['tem_value'] = 1;
        $db_servername = "localhost";
        $db_username = "user2";
        $db_password = "passuser2";
        $db_name = "db1";
        $conn = mysqli_connect($db_servername, $db_username, $db_password, $db_name);
        
        $value = $_POST['student_id'];

        // $sql = "select * from teacher_info where teacher_id='$value'";
        $sql = "select * from reg where position='student' and student_id = '$value';";

        if(mysqli_query($conn, $sql))
        {
            $result = mysqli_query($conn, $sql);
            $row = mysqli_fetch_assoc($result);

            $student_fname = $row['fname'];
            $student_lname = $row['lname'];
            $student_department = $row['department'];
            $student_section = $row['section'];
            $student_blood_group = $row['blood_group'];
            $student_address = $row['address'];
            $student_email = $row['email'];
            $student_password = $row['password'];
            $student_id = $row['student_id'];
            
            echo "
            
            <div class='info'>
            <form action='../php_config/db_admin_student_2.php' method='POST'>
                <table class='main-table'>
                    <tr>

                        <td><input type='text' id='login' class='input_1' name='reg_f_name'
                                placeholder='$student_fname' value='$student_fname'></td>
                        <td><input type='text' id='login' class='input_1' name='reg_l_name'
                                placeholder='$student_lname' value='$student_lname'></td>
                    </tr>
                    <tr>
                        <td><input type='text' id='login' class='input_1' name='department'
                                placeholder='$student_department' value='$student_department'></td>
                        <td><input type='text' id='login' class='input_1' name='section'
                                placeholder='$student_section' value='$student_section'></td>
                    </tr>
                    <tr>
                        <td><input type='text' id='login' class='input_1' name='blood_group'
                                placeholder='$student_blood_group' value='$student_blood_group'></td>
                        <td><input type='text' id='login' class='input_1' name='address'
                                placeholder='$student_address' value='$student_address'></td>
                    </tr>
                    <tr>
                        <td><input type='text' id='login' class='input_1' name='reg_email'
                                placeholder='$student_email' value='$student_email'></td>
                        <td><input type='text' id='password' class='input_1' name='reg_pass'
                                placeholder='$student_password' value='$student_password'></td>
                    </tr>
                    <tr>
                        <td colspan='2'><input type='text' id='login' class='input_1' name='student_id'
                                placeholder='$student_id' value='$student_id'></td>
                     
                    </tr>
                </table>

                <button type='submit' class='sub_btn' name='REGISTER'>Update Info</button>
            </form>
          
        </div>
            
            
            ";
        
        
        
        
        
        
        }
    }

?>









    </div>









<script>
var coll = document.getElementsByClassName("collapsible");
var i;

for (i = 0; i < coll.length; i++) {
  coll[i].addEventListener("click", function() {
    this.classList.toggle("active");
    var content = this.nextElementSibling;
    if (content.style.display === "block") {
      content.style.display = "none";
    } else {
      content.style.display = "block";
    }
  });
}
</script>

</body>
</html>

