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
  <a class="active" href="tem_admin_teacher.php">Teacher</a>
  <a href="tem_admin_student.php">Student</a>
  <a href="tem_admin_notice.php">Notice Board</a>
  <a href="tem_admin_edu.php">Educational Records</a>
  <a href="tem_admin_fee.php">Fees</a>
 
</div>

<div class="content">
    
<div id="navbar">
            <a style="background-color: #2bff00;" href="tem_admin_profile.php">Teachers Info</a>
            <a href="tem_admin_profile_2.php">Edit Teachers</a>
            <a href="tem_admin_profile_3.php">Add Teacher</a>
            <a href="tem_admin_profile_4.php">Remove Teacher</a>
            <a href="tem_admin_profile_5.php">Add Courses to Teacher</a>
            <a  href="tem_admin_profile_6.php">Remove Courses from Teacher</a>

        
        </div>
    <div class="new_content">

  <?php
      session_start();

      $db_servername = "localhost";
      $db_username = "user2";
      $db_password = "passuser2";
      $db_name = "db1";

      $conn = mysqli_connect($db_servername, $db_username, $db_password, $db_name);

      $sql = "select * from teacher_info";
      
     

      if(mysqli_query($conn, $sql))
      {
          $result = mysqli_query($conn, $sql);
          // echo "SUCCESS";
          while($row = mysqli_fetch_assoc($result))
          {
            $teacher_id = $row['teacher_id'];
            $teacher_name = $row['teacher_name'];
            $teacher_phone = $row['teacher_phone'];
            $teacher_dept = $row['teacher_dept'];

            $sql2 = "select * from teacher_courses where teacher_id = '$teacher_id'";
            $course = array();

            $result2 = mysqli_query($conn,$sql2);
            while($row2 = mysqli_fetch_assoc($result2))
            {
              array_push($course, $row2['teacher_course_name']);
            }
            

            echo "
        
            <button type='button' class='collapsible kk-btn'><p class='kk'>$teacher_id</p></button>
            <div class='content2'>
                <table class='demo_table'>
                <tr>
                  <td>Teacher ID : $teacher_id</td>
                  <td>Teacher Name : $teacher_name</td>
                </tr>
                <tr>
                  <td>Teacher Phone : $teacher_phone</td>
                  <td>Teacher Department : $teacher_dept</td>
                </tr>
                <tr colspan='2'><td>";
                echo "COURSES : &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp";
              for($i = 0; $i < count($course); $i++){echo strtoupper($course[$i])."&nbsp&nbsp&nbsp&nbsp&nbsp";}



              echo "</td></tr></table></div>";


          }
      }
      else{
        echo "ERROR : ".mysqli_error($conn);
      }
  
  ?>








<!-- <p>Collapsible Set:</p>
<button type="button" class="collapsible">Open Section 1</button>
<div class="content2">
  <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
</div>
<button type="button" class="collapsible">Open Section 2</button>
<div class="content2">
  <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
</div>
<button type="button" class="collapsible">Open Section 3</button>
<div class="content2">
  <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
</div>

    </div>
   
</div> -->

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

