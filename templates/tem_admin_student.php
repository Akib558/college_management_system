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

  <?php
      session_start();

      $db_servername = "localhost";
      $db_username = "user2";
      $db_password = "passuser2";
      $db_name = "db1";

      $conn = mysqli_connect($db_servername, $db_username, $db_password, $db_name);

      $sql = "select * from reg where position='student'";
      
     

      if(mysqli_query($conn, $sql))
      {
          $result = mysqli_query($conn, $sql);
          echo "SUCCESS";
          while($row = mysqli_fetch_assoc($result))
          {
            $student_fname = $row['fname'];
            $student_lname = $row['lname'];
            $student_department = $row['department'];
            $student_section = $row['section'];
            $student_blood_group = $row['blood_group'];
            $student_address = $row['address'];
            $student_email = $row['email'];
            $student_password = $row['password'];
            $student_id = $row['student_id'];


            $pp = str_ireplace(array('@', '.'), '_', $student_email);

            $sql2 = "select * from course where course_title in (select course_title from $pp) and department='$student_department';";

            // $sql2 = "select * from teacher_courses where teacher_id = '$teacher_id'";
            $course = array();

            $result2 = mysqli_query($conn,$sql2);
            while($row2 = mysqli_fetch_assoc($result2))
            {
              array_push($course, $row2['course_title']);
            }
            

            echo "
            <button type='button' class='collapsible'>$student_fname &nbsp $student_lname</button>
            <div class='content2'>
                <table class='demo_table'>
                <tr>
                  <td>Student ID : $student_id</td>
                  <td> Name : $student_fname &nbsp $student_lname</td>
                </tr>
                <tr>
                  <td>Department : $student_department</td>
                  <td>Section : $student_section</td>
                </tr>
                <tr>
                  <td>Blooad Group : $student_blood_group</td>
                  <td>Address : $student_address</td>
                </tr>
                <tr>
                  <td>Email : $student_email</td>
                  <td>Password : $student_password</td>
                </tr>
                <tr>";
                echo "<td>";
                echo "COURSES : &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp";
              for($i = 0; $i < count($course); $i++){echo strtoupper($course[$i])."&nbsp&nbsp&nbsp&nbsp&nbsp";}
                echo "</td>";
                echo " <td>Student Id : $student_id</td>
         

                </tr>
                <tr>
              </table></div>";


          }
      }
      else{
        echo "ERROR : ".mysqli_error($conn);
      }
  
  ?>










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

