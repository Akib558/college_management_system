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
  <a  href="tem_teacher_profile.php">Home</a>
  <a href="tem_teacher_edit_profile.php">Edit Profile</a>
  <a class="active" href="tem_teacher_course.php">Courses</a>
  <a  href="tem_teacher_education.php">Educational Records</a>

 
</div>

<div class="content">
    
 
  <div class='info'>

  <?php

    $db_servername = "localhost";
    $db_username = "user2";
    $db_password = "passuser2";
    $db_name = "db1";
    $conn = mysqli_connect($db_servername, $db_username, $db_password, $db_name);


    $sql = "select * from course where teacher_name='$teacher_name'";

    // $sql = "select * from teacher_courses where teacher_id = '$teacher_id';";

    // echo $sql;
    if(mysqli_query($conn,$sql))
    {
        $result = mysqli_query($conn,$sql);
        echo "<table class='main-table'>";
        while($row = mysqli_fetch_assoc($result)){
            $course_name = $row['course_title'];
            $department = $row['department'];
            $teacher = $row['teacher_name'];


            // echo $department;

            echo "
                <tr>
                    <td>$course_name</td>
                    <td>$department</td>
                    <td>$teacher</td>


                </tr>

            ";

        }
        echo "</table>";

    }

  
  ?>



</div>


</div>

</body>
</html>

