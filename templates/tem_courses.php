<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Courses</title>
    <style>
    <?php include '../styles/profile.css';
    ?><?php include '../styles/course.css';
    ?>
    </style>
</head>

<body>
    <div class="sidebar">
        <a href="tem_home.php">Main Menu</a>
        <a href="tem_profile.php">Home</a>
        <a href="tem_edit_profile.php">Edit Profile</a>
        <a class="active" href="tem_courses.php">Courses</a>
        <a href="tem_education.php">Educational Records</a>
        <a href="tem_fees.php">Fees</a>

    </div>

    <div class="content">


        <div id="navbar">
            <a style="background-color: #2bff00;" href="tem_courses.php">Enrolled Courses</a>
            <a href="tem_courses_2.php">Edit Courese</a>
            <a href="tem_courses_3.php">All Courses</a>
        </div>

        <div class="info">

        

            <table class="main-table">






                <?php

        session_start();

        $db_servername = "localhost";
        $db_username = "user2";
        $db_password = "passuser2";
        $db_name = "db1";

        $conn = mysqli_connect($db_servername, $db_username, $db_password, $db_name);
        $name = $_SESSION['email'];
        $department = $_SESSION['department'];
        $pp = str_ireplace(array('@', '.'), '_', $name);

        // $sql = "select * from course where course_title in (select course_title from $pp) and department='$department';";
        $sql = "select * from teacher_courses where teacher_course_name in (select course_title from $pp);";

        // echo $sql;

        $result = mysqli_query($conn, $sql);

        if (mysqli_query($conn, $sql)) {

          echo "
    <tr class='table_head'>
      <td>COURSES</td>
      <td>TEACHER ID</td>
    </tr>";

          while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr><td>" . $row['teacher_course_name'] . "</td><td>" . $row['teacher_id'] . "</td></tr>";
          }
        } else {

          echo "<p>YOU HAVE NO COURSES ENROLLED</p>";
        }

        ?>



            </table>


        </div>

    </div>




</body>

</html>