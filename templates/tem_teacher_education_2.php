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
<a href="tem_home.php">Main Menu</a>
  <a  href="tem_teacher_profile.php">Home</a>
  <a href="tem_teacher_edit_profile.php">Edit Profile</a>
  <a  href="tem_teacher_course.php">Courses</a>
  <a class="active" href="tem_teacher_education.php">Educational Records</a>

 
</div>

<div class="content">
<div id="navbar">

<a href="tem_teacher_education.php">Get Info</a>
            <a href="tem_teacher_education_2.php">Update Info</a>

           
        </div>
    <div class="new_content">

    <div class="form_section">

            <form action="tem_teacher_education_2.php" method="POST">

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
                        <input type="text" name="department" placeholder="deparment">
                        </td>
                        <td></td>

                    </tr>

                    <tr>
                        <td></td>
                        <td>
                            <button style="margin-top: 50px;" type="submit" class="sub_btn"
                                name="REGISTER">REGISTER</button>
                        </td>
                        <td></td>



                    </tr>

                </table>

            </form>


        </div>
      <hr>


      <?php
session_start();
$db_servername = "localhost";
      $db_username = "user2";
      $db_password = "passuser2";
      $db_name = "db1";

      $conn = mysqli_connect($db_servername, $db_username, $db_password, $db_name);

     if(isset($_POST['REGISTER']))
     {





        $sql = "select teacher_course_name from teacher_courses where teacher_id='$teacher_id';";

        $course_name = array();
        $course_name2 = array();
    
    
    
        if(mysqli_query($conn,$sql))
        {
    
            $result = mysqli_query($conn,$sql);
            while($row = mysqli_fetch_assoc($result))
            {   
                $dept = $row['teacher_course_name'];
                $val = substr($dept, 0, strpos($dept, "-"));
                if(strtoupper($val) == "CSE")
                {
                    array_push($course_name, str_ireplace(array('-'), '_', $row['teacher_course_name']));
                }
                else{
                    array_push($course_name2, str_ireplace(array('-'), '_', $row['teacher_course_name']));
                }
            }
    
            $year = $_POST['year'];
            $semester = $_POST['semester'];
            $session = $_POST['session'];
            $student_id = $_POST['student_id'];
            $department = $_POST['department'];
    
            $email = "";
    
            $sql = "select email from reg where student_id='$student_id';";
    
            if(mysqli_query($conn,$sql))
            {
                $result = mysqli_query($conn, $sql);
                $email = mysqli_fetch_assoc($result); 
                $email = $email['email'];
            }
            else{
                echo "ERROR1 : Non Valid Student Id";
                echo $sql;
            }
    
            $_SESSION['tt_year'] = $year;
            $_SESSION['tt_semester'] = $semester;
            $_SESSION['tt_session'] = $session;
            $_SESSION['tt_department'] = $department;
            $_SESSION['tt_email'] = $email;
            $_SESSION['tt_student_id'] = $student_id;


    
    
    
    
    
            $sql = "show columns from education_cse";
    
            $column = array();
    
            if(mysqli_query($conn, $sql))
            {
              $result = mysqli_query($conn, $sql);
              $i = 0;
              while($row = mysqli_fetch_assoc($result))
              {
                    array_push($column,$row['Field']);
                    $i++;
                    if($i > 5)
                    {
                        break;
                    }
              }
            }
            else{
              echo "ERROR1 : ".mysqli_error($conn);
            }
    
    
    
            $sql_cse = "select ";
            for($i = 0; $i < count($column)-1; $i++)
            {
                $sql_cse = $sql_cse.$column[$i].',';
            }
    
            for($i = 0; $i < count($course_name)-1; $i++)
            {
                $sql_cse = $sql_cse.$course_name[$i].",";
            }
    
            $sql_cse = $sql_cse.$course_name[count($course_name)-1]." from education_cse where student_email = '$email'
            and year='$year' and semester='$semester' and session='$session' ;";
    
    
            // echo "<br>".$sql_cse;
    
            $sql_eee = "select ";
            for($i = 0; $i < count($column)-1; $i++)
            {
                $sql_eee = $sql_eee.$column[$i].',';
            }
    
            for($i = 0; $i < count($course_name2)-1; $i++)
            {
                $sql_eee = $sql_eee.$course_name2[$i].",";
            }
    
            $sql_eee = $sql_eee.$course_name2[count($course_name2)-1]." from education_eee where student_email='$email'
            and year='$year' and semester='$semester' and session='$session' ;";
    
    
    
    
            echo $sql_cse."<br>";
            echo $sql_eee."<br>";
    
    
    
    
            if(strtoupper($department) == 'CSE')
            {

                $sql = $sql_cse;                

                if(mysqli_query($conn,$sql))
                {
                  $result = mysqli_query($conn, $sql);
                  $row = mysqli_fetch_assoc($result);
                  echo "
                  <form action='../php_config/db_teacher_education_2.php' method='POST'>
                  <table>";
                  for($i = 0; $i < count($course_name); $i++)
                  {
                        $pp = $course_name[$i];
                        $pp2 = $row[$pp];
                        echo "
                        <tr>
                        <td>$pp</td>
                        <td colspan='2'><input type='text' style='width: 100%' placeholder='$pp2' value='$pp2' name='$pp'>
                        </td>
                        </tr>
                    
                            ";
                    }

                    echo "
                    <tr colspan='3'>
                           <td></td>
                           <td><button style='margin-top: 50px;' type='submit' class='sub_btn'
                           name='REGISTER'>REGISTER</button></td>
                           <td></td>
                         </tr>
                        </table></form>
                    ";
                }
            
        //             if($i == 0)
        //             {
        //                 echo "
        //                 <tr>
        //                   <td>$pp</td>
        //                   <td colspan='2'><input type='text' style='width: 100%' placeholder='$pp2' value='$pp2' name='$pp'>
        //                   </td>
        //                 </tr>
                      
        //               ";
        //             }
        //             else if($i == 1)
        //             {
        //                 echo "
        //                 <tr>
        //                   <td>$pp</td>
        // <td style='background-color: white;'>$pp2</td>
                          
    
        //                   <td>
        //                   <select id='year' class='input_class' name='$pp'>
        //                             <option value='$pp2' selected>Choose a Year</option>
        //                             <option value='1y'>First Year</option>
        //                             <option value='2y'>Second Year</option>
        //                             <option value='3y'>Third Year</option>
        //                             <option value='4y'>Fourth Year</option>
        //                         </select>
        //                   </td>
        //                 </tr>
                      
        //               ";
        //             }
        //             else if($i == 2)
        //             {
        //                 echo "
        //                 <tr>
        //                   <td>$pp</td>
        // <td style='background-color: white;'>$pp2</td>
                          
    
        //                   <td>
        //                   <select id='semester' class='input_class' name='$pp'>
        //                   <option value='$pp2' selected>Choose a Semesterr</option>
        //                   <option value='1s'>First Semester</option>
        //                   <option value='2s'>Second Semester</option>
        //                   <option value='3s'>Third Semester</option>
        //                   <option value='4s'>Fourth Semester</option>
        //               </select>
        //                   </td>
        //                 </tr>
                      
        //               ";
        //             }
        //             else if($i == 3)
        //             {
        //                 echo "
        //                 <tr>
        //                   <td>$pp</td>
        // <td style='background-color: white;'>$pp2</td>
                          
    
        //                   <td>
        //                   <select id='session' class='input_class' name='$pp'>
        //                             <option value='$pp2' selected>Choose a Session</option>
        //                             <option value='15_16'>2015-2016</option>
        //                             <option value='16_17'>2016-2017</option>
        //                             <option value='17_18'>2017-1018</option>
        //                             <option value='18_19'>2018-2019</option>
        //                         </select>
        //                   </td>
        //                 </tr>
                      
        //               ";
        //             }
        //             else{
        //                 echo "
        //                 <tr>
        //                   <td>$pp</td>
        //                   <td colspan='2'><input type='text' style='width: 100%' placeholder='$pp2' value='$pp2' name='$pp'>
        //                   </td>
        //                 </tr>
                      
        //               ";
        //             }
                      
        //           }
        //           echo "
        //           <tr>
        //                   <td></td>
        //                   <td><button style='margin-top: 50px;' type='submit' class='sub_btn'
        //                   name='REGISTER'>REGISTER</button></td>
        //                   <td></td>
        //                 </tr>
        //           </table>
                 
        //           </form>";
        //         }
        //         else{
        //           echo "ERROR IS GETIING RESULT FROM education_cse";
        //         }







            }
            else if(strtoupper($department) == "EEE")
            {

            }
            else{
                echo "Non valid department (CSE or EEE)";
            }
    
    
    
    
    
        }

     }


      
    //   $sql = "select * from teacher_info";
       








































    //   if(isset($_POST['REGISTER']))
    //   {
    //     $db_servername = "localhost";
    //     $db_username = "user2";
    //     $db_password = "passuser2";
    //     $db_name = "db1";
    //     $conn = mysqli_connect($db_servername, $db_username, $db_password, $db_name);
        
    //     $value = $_POST['student_id'];

    //     $sql = "select email,department from reg where student_id='$value'";
        
    //     if(mysqli_query($conn,$sql))
    //     {
    //       $result = mysqli_query($conn, $sql);
    //       $row = mysqli_fetch_assoc($result);

    //       $email = $row['email'];
    //       $department = strtoupper($row['department']);
    //       $year = $_POST['year'];
    //       $semester = $_POST['semester'];
    //       $session = $_POST['session'];

    //       $_SESSION['db_admin_edu_email']    = $email;
    //       $_SESSION['db_admin_edu_year']     = $year;
    //       $_SESSION['db_admin_edu_semester'] = $semester;
    //       $_SESSION['db_admin_edu_session']    = $session;


    //       if($department == "CSE")
    //       {
    //         $sql = "show columns from education_cse";
    //         $course_name = array();

    //         if(mysqli_query($conn, $sql))
    //         {
    //           $result = mysqli_query($conn, $sql);
    //           $i = 0;
    //           while($row = mysqli_fetch_assoc($result))
    //           {
    //                 array_push($course_name,$row['Field']);
               
    //           }
    //         }
    //         else{
    //           echo "ERROR : ".mysqli_error($conn);
    //         }

    //         $sql = "select * from education_cse where student_email='$email' and year='$year' and semester='$semester' and session='$session';";
            
    //         if(mysqli_query($conn,$sql))
    //         {
    //           $result = mysqli_query($conn, $sql);
    //           $row = mysqli_fetch_assoc($result);
    //           echo "
    //           <form action='../php_config/db_admin_edu_2.php' method='POST'>
    //           <table>";
    //           for($i = 0; $i < count($course_name); $i++)
    //           {
    //             $pp = $course_name[$i];
    //             $pp2 = $row[$pp];
    //             if($i == 0)
    //             {
    //                 echo "
    //                 <tr>
    //                   <td>$pp</td>
    //                   <td colspan='2'><input type='text' style='width: 100%' placeholder='$pp2' value='$pp2' name='$pp'>
    //                   </td>
    //                 </tr>
                  
    //               ";
    //             }
    //             else if($i == 1)
    //             {
    //                 echo "
    //                 <tr>
    //                   <td>$pp</td>
    // <td style='background-color: white;'>$pp2</td>
                      

    //                   <td>
    //                   <select id='year' class='input_class' name='$pp'>
    //                             <option value='$pp2' selected>Choose a Year</option>
    //                             <option value='1y'>First Year</option>
    //                             <option value='2y'>Second Year</option>
    //                             <option value='3y'>Third Year</option>
    //                             <option value='4y'>Fourth Year</option>
    //                         </select>
    //                   </td>
    //                 </tr>
                  
    //               ";
    //             }
    //             else if($i == 2)
    //             {
    //                 echo "
    //                 <tr>
    //                   <td>$pp</td>
    // <td style='background-color: white;'>$pp2</td>
                      

    //                   <td>
    //                   <select id='semester' class='input_class' name='$pp'>
    //                   <option value='$pp2' selected>Choose a Semesterr</option>
    //                   <option value='1s'>First Semester</option>
    //                   <option value='2s'>Second Semester</option>
    //                   <option value='3s'>Third Semester</option>
    //                   <option value='4s'>Fourth Semester</option>
    //               </select>
    //                   </td>
    //                 </tr>
                  
    //               ";
    //             }
    //             else if($i == 3)
    //             {
    //                 echo "
    //                 <tr>
    //                   <td>$pp</td>
    // <td style='background-color: white;'>$pp2</td>
                      

    //                   <td>
    //                   <select id='session' class='input_class' name='$pp'>
    //                             <option value='$pp2' selected>Choose a Session</option>
    //                             <option value='15_16'>2015-2016</option>
    //                             <option value='16_17'>2016-2017</option>
    //                             <option value='17_18'>2017-1018</option>
    //                             <option value='18_19'>2018-2019</option>
    //                         </select>
    //                   </td>
    //                 </tr>
                  
    //               ";
    //             }
    //             else{
    //                 echo "
    //                 <tr>
    //                   <td>$pp</td>
    //                   <td colspan='2'><input type='text' style='width: 100%' placeholder='$pp2' value='$pp2' name='$pp'>
    //                   </td>
    //                 </tr>
                  
    //               ";
    //             }
                  
    //           }
    //           echo "
    //           <tr>
    //                   <td></td>
    //                   <td><button style='margin-top: 50px;' type='submit' class='sub_btn'
    //                   name='REGISTER'>REGISTER</button></td>
    //                   <td></td>
    //                 </tr>
    //           </table>
             
    //           </form>";
    //         }
    //         else{
    //           echo "ERROR IS GETIING RESULT FROM education_cse";
    //         }





    //       }
    //       else if($department == "EEE")
    //       {
    //           echo "education eee";
    //       }
    //       else{
    //         echo "NO SUCH DEPARTMENT or styudent";
    //       }



    //     }
    //     else{
    //       echo "Error : ".mysqli_error($conn);
    //     }

        








    //   }
      
      
      
      
      ?>


    </div>

</body>
</html>

