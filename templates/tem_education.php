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
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Education Information</title>
    <style>
    <?php include '../styles/profile.css';

    ?>
    
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
        <a href="tem_profile.php">Home</a>
        <a href="tem_edit_profile.php">Edit Profile</a>
        <a href="tem_courses.php">Courses</a>
        <a class="active" href="tem_education.php">Educational Records</a>
        <a href="tem_fees.php">Fees</a>

    </div>

    <div class="content">

        <div class="form_section">

            <form action="tem_education.php" method="POST">

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
                            <button style="margin-top: 50px;" type="submit" class="sub_btn"
                                name="REGISTER">Get Result</button>
                        </td>
                        <td></td>



                    </tr>

                </table>

            </form>


        </div>

        <hr>

        <div class="info">
        <table class='main-table' style="margin-top: 0px;">
                <?php
        session_start();


        if (isset($_POST['REGISTER'])) {

          $db_servername = "localhost";
          $db_username = "user2";
          $db_password = "passuser2";
          $db_name = "db1";
          $conn = mysqli_connect($db_servername, $db_username, $db_password, $db_name);

        //   echo $_POST['year'] . "    " . $_POST['semester'] . "     " . $_POST['session'];
          $email = $_SESSION['email'];
          $year = $_POST['year'];
          $semester = $_POST['semester'];
          $session = $_POST['session'];
          $department = $_SESSION['department'];

          // echo $email;
          if ($department == 'cse') {
            $sql = "select * from education_cse where student_email='$email' and year='$year' and semester='$semester' and session='$session';";

            $result = mysqli_query($conn, $sql);
            if (mysqli_query($conn, $sql)) {
              $row = mysqli_fetch_assoc($result);
            //   echo "SUCCESS" . "<br>";

            //   echo $row['CSE_3000'];
              for ($i = 0; $i <= 9; $i++) {
                $val = 'CSE-300' . "$i";
                $val2 = 'CSE_300' . "$i";
                $val2 = $row[$val2];
                echo "<tr>
                        <td>$val</td>
                        <td>$val2</td>
                      </tr>";
              }

              for ($i = 10; $i <= 21; $i++) {
                $val = 'CSE-30' . "$i";
                $val2 = 'CSE_30' . "$i";
                $val2 = $row[$val2];
                echo "<tr>
                        <td>$val</td>
                        <td>$val2</td>
                      </tr>";
              }
            } else {
              echo "Error: " . mysqli_error($conn);
            }
          } else {
            echo "not success";
          }
        }


        ?>
            </table>

        </div>

    </div>

</body>

</html>