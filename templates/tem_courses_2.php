<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Courses</title>
    <style>
    <?php include '../styles/edit_profile.css';?>
    <?php include '../styles/course.css';?>
    
    td {
        /* background-color: blue; */
        text-align: center;
    }

    .cl1 {
        background-color: blue;
    }

    .cl2 {
        background-color: orange;
    }
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
            <a href="tem_courses.php">Enrolled Courses</a>
            <a href="tem_courses_2.php">Edit Courese</a>
            <a href="tem_courses_3.php">All Courses</a>
        </div>

        <div class="course_info">




            <form action="../php_config/db_courses2.php" method="POST">

                <table class="main-table">


                    <?php
                    session_start();


                    $db_servername = "localhost";
                    $db_username = "user2";
                    $db_password = "passuser2";
                    $db_name = "db1";

                    $name = $_SESSION['fname'];


                    $conn = mysqli_connect($db_servername, $db_username, $db_password, $db_name);


                    $name = $_SESSION['email'];
                    $pp = str_ireplace(array('@', '.'), '_', $name);
                    $department = $_SESSION['department'];

                    $check = 0;

                    $sql = "select * from course where course_title in (select course_title from $pp) and department='$department';";
                    $result = mysqli_query($conn, $sql);
                    $count = 0;

                    if (mysqli_query($conn, $sql)) {
                        while ($row = mysqli_fetch_assoc($result)) {
                            $val = $row['course_title'];

                            echo "<tr class='cl2'><td><p><input type='checkbox' value=$val name =$count checked><label for=$count>$val</label></p></td></tr>";

                            $count++;
                        }
                        $_SESSION['count'] = $count;

                        $check = 1;
                    } else {

                        $sql = "select * from course";

                        $result = mysqli_query($conn, $sql);
                        if (mysqli_query($conn, $sql)) {
                            while ($row = mysqli_fetch_assoc($result)) {
                                $val = $row['course_title'];

                                echo "<tr class='cl1'><td><p><input type='checkbox' value=$val name =$count><label for=$count>$val</label></p></td></tr>";

                                $count++;
                            }
                            $_SESSION['count'] = $count;
                        } else {
                            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
                        }
                    }

                    $sql = "select * from course where course_title not in (select course_title from $pp) and department='$department';";
                    $result = mysqli_query($conn, $sql);
                    if (mysqli_query($conn, $sql) && $check) {
                        while ($row = mysqli_fetch_assoc($result)) {
                            $val = $row['course_title'];

                            echo "<tr class='cl1'><td><p><input type='checkbox' value=$val name =$count><label for=$count>$val</label></p></td></tr>";

                            $count++;
                        }
                        $_SESSION['count'] = $count;
                    } else {
                        if ($check == 1) {
                            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
                        }
                    }



                    ?>


                    <tr>
                        <td><button type="submit" class="sub_btn" name="REGISTER">REGISTER</button></td>
                    </tr>
                </table>



            </form>








        </div>

    </div>




</body>

</html>