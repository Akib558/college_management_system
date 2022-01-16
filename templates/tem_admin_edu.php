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
.input_class {
        width: 100%;
        text-align: center;
        height: 30px;
    }

    tr {
        /* background-color: red; */
        text-align: center;
    }

    table {
        width: 100%;
        table-layout: fixed;
    }

    label {
        text-align: center;
    }

    hr {
        width: 100%;
        margin-top: 50px;
        height: 5px;
        background-color: gray;
    }

    </style>
</head>
<body>

<div class="sidebar">
  <a href="tem_home.php">Home</a>
  <a  href="tem_admin_profile.php">Teacher</a>
  <a  href="tem_admin_student.php">Student</a>
  <a  href="tem_admin_notice.php">Notice Board</a>
  <a class="active" href="tem_admin_edu.php">Educational Records</a>
  <a href="tem_admin_fee.php">Fees</a>
 
</div>

<div class="content">
    
<div id="navbar">

<a style="background-color: #2bff00;" href="tem_admin_edu.php">Get Info</a>
            <a href="tem_admin_edu_2.php">Update Info</a>
            <a href="tem_admin_edu_3.php">Insert New Student</a>
           
        </div>
    <div class="new_content">

    <div class="form_section">

            <form action="tem_admin_edu.php" method="POST">

                <table>

                    <tr>

                        <td>
                            <label for="year">Choose a Year:</label>
                            <!-- <p>Choose a Year</p> -->
                            <select id="year" class="input_class" name="year">
                                <option value="1y">First Year</option>
                                <option value="2y">Second Year</option>
                                <option value="3y">Third Year</option>
                                <option value="4y">Fourth Year</option>
                            </select>
                        </td>

                        <td>
                            <label for="semester">Choose a Semester:</label>
                            <!-- <p>Choose a Year</p> -->
                            <select id="semester" class="input_class" name="semester">
                                <option value="1s">First Semester</option>
                                <option value="2s">Second Semester</option>
                                <option value="3s">Third Semester</option>
                                <option value="4s">Fourth Semester</option>
                            </select>

                        </td>

                        <td>
                            <label for="semester">Choose a Session:</label>
                            <!-- <p>Choose a Year</p> -->
                            <select id="session" class="input_class" name="session">
                                <option value="15_16">2015-2016</option>
                                <option value="16_17">2016-2017</option>
                                <option value="17_18">2017-1018</option>
                                <option value="18_19">2018-2019</option>
                            </select>

                        </td>

                    </tr>
                    <tr>
                        <td></td>
                        <td>
                        <input type="text" name="student_id" placeholder="Studnet Id">
                        </td>
                        <td></td>



                    </tr>

                    <tr>
                        <td></td>
                        <td>
                            <button style="margin-top: 50px;" type="submit" class="sub_btn"
                                name="REGISTER">Get Info</button>
                        </td>
                        <td></td>



                    </tr>

                </table>

            </form>


        </div>
      <hr>



      <?php
      
      if(isset($_POST['REGISTER']))
      {
        $db_servername = "localhost";
        $db_username = "user2";
        $db_password = "passuser2";
        $db_name = "db1";
        $conn = mysqli_connect($db_servername, $db_username, $db_password, $db_name);
        
        $value = $_POST['student_id'];

        $sql = "select email,department from reg where student_id='$value'";
        
        if(mysqli_query($conn,$sql))
        {
          $result = mysqli_query($conn, $sql);
          $row = mysqli_fetch_assoc($result);

          $email = $row['email'];
          $department = strtoupper($row['department']);
          $year = $_POST['year'];
          $semester = $_POST['semester'];
          $session = $_POST['session'];

          if($department == "CSE")
          {
            $sql = "show columns from education_cse";
            $course_name = array();

            if(mysqli_query($conn, $sql))
            {
              $result = mysqli_query($conn, $sql);
              $i = 0;
              while($row = mysqli_fetch_assoc($result))
              {
                  if($i >= 4)
                  {
                    array_push($course_name,$row['Field']);
                  }
                  $i++;
              }
            }
            else{
              echo "ERROR : ".mysqli_error($conn);
            }

            $sql = "select * from education_cse where student_email='$email' and year='$year' and semester='$semester' and session='$session';";

            $result = mysqli_query($conn, $sql);
            $count = mysqli_num_rows($result);
            $row = mysqli_fetch_assoc($result);


            
            if($count > 0)
            {
              $result = mysqli_query($conn, $sql);
              $row = mysqli_fetch_assoc($result);
              echo "<div class='info'><table class='main-table'>";
              for($i = 0; $i < count($course_name); $i++)
              {
                $pp = $course_name[$i];
                $pp2 = $row[$pp];
                  echo "
                    <tr>
                      <td>$pp</td>
                      <td>$pp2</td>
                    </tr>
                  
                  ";
              }
              echo "</table></div>";
            }
            else{
              echo "ERROR IS GETIING RESULT FROM education_cse";
            }





          }
          else if($department == "EEE")
          {


            $sql = "show columns from education_eee";
            $course_name = array();

            if(mysqli_query($conn, $sql))
            {
              $result = mysqli_query($conn, $sql);
              $i = 0;
              while($row = mysqli_fetch_assoc($result))
              {
                  if($i >= 4)
                  {
                    array_push($course_name,$row['Field']);
                  }
                  $i++;
              }
            }
            else{
              echo "ERROR : ".mysqli_error($conn);
            }

            $sql = "select * from education_eee where student_email='$email' and year='$year' and semester='$semester' and session='$session';";
            $result = mysqli_query($conn, $sql);
            $count = mysqli_num_rows($result);
            $row = mysqli_fetch_assoc($result);



            if($count > 0)
            {
              
              echo "<div class='info'><table class='main-table'>";
              for($i = 0; $i < count($course_name); $i++)
              {
                $pp = $course_name[$i];
                $pp2 = $row[$pp];
                  echo "
                    <tr>
                      <td>$pp</td>
                      <td>$pp2</td>
                    </tr>
                  
                  ";
              }
              echo "</table></div>";
            }
            else{
              // echo "ERROR IS GETIING RESULT FROM education_cse";
            echo "<p style='color:red;'><b>No Result Avaliable</b></p>";

            }

              



          }
          else{
            
            echo "NO SUCH DEPARTMENT or styudent";
          }



        }
        else{
          echo "Error : ".mysqli_error($conn);
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

