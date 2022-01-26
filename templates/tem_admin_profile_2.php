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

    ?>.new_content {
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
            <a style="background-color: #2bff00;" href="tem_admin_profile_2.php">Edit Teachers</a>
            <a href="tem_admin_profile_3.php">Add Teacher</a>
            <a href="tem_admin_profile_4.php">Remove Teacher</a>
            <a href="tem_admin_profile_5.php">Add Courses to Teacher</a>
            <a href="tem_admin_profile_6.php">Remove Courses from Teacher</a>


        </div>

        <div class="new_content">

            <div class="inner_new_content">
                <form action="tem_admin_profile_2.php" method="POST">
                    <input type="text" name="teacher_id" placeholder="Teacher Id">

                    <button style="margin-top: 50px;" type="submit" class="sub_btn" name="REGISTER">Get Info</button>

                    <!-- <button type="submit" class="sub_btn" name="search">SEARCH</button> -->

                </form>

            </div>


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

        $sql = "select * from teacher_info where teacher_id='$value'";




        if(mysqli_query($conn, $sql))
        {
          $result = mysqli_query($conn, $sql);
        
          $data = mysqli_fetch_assoc($result);
          

          if($data == NULL)
          {
            echo "THERE IS NO TEACHER WITH ID : $value";
            
          }
          else{

            $_SESSION['teacher_id_value'] = $value;
          
            $teacher_id = $data['teacher_id'];
            $teacher_name = $data['teacher_name'];
            $teacher_phone = $data['teacher_phone'];
            $teacher_dept = $data['teacher_dept'];
            $teacher_email = $data['teacher_email'];
            $teacher_password = $data['password'];


            if(isset($_SESSION['tem_value']))
            {
              

            $_SESSION['tem_value'] = 0;

            }

            echo "
            <div class='info'>
            <form action='../php_config/db_admin_profile_2.php' method='POST'>
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

                <button type='submit' class='sub_btn' name='REGISTER'>Update Info</button>
            </form>

        </div>
            ";

          }
        }
        else{
          echo "ERROR : ".mysqli_error($conn);
        }



        
      
      
      }
      
  ?>


        </div>


    </div>

</body>

</html>