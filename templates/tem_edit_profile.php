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
    <title>Edit Profile</title>
    <style>
    <?php include '../styles/edit_profile.css';
    ?>
    </style>
</head>

<body>

    <div class="sidebar">
        <a href="tem_home.php">Main Menu</a>
        <a href="tem_profile.php">Home</a>
        <a class="active" href="tem_edit_profile.php">Edit Profile</a>
        <a href="tem_courses.php">Courses</a>
        <a href="tem_education.php">Educational Records</a>
        <a href="tem_fees.php">Fees</a>

    </div>

    <div class="content">
        <div class="pic">
            <div class="pic-in">
                <img id="my-img" src="/home/akib/Pictures/Screenshot from 2021-10-02 16-37-05.png" alt="">
            </div>
            <hr>
        </div>
        <div class="info">
            <form action="../php_config/db_edit_profile.php" method="POST">
                <table class="main-table">
                    <tr>

                        <td><input type="text" id="login" class="input_1" name="reg_f_name"
                                placeholder="<?php echo $fname ?>" value="<?php echo $fname ?>"></td>
                        <td><input type="text" id="login" class="input_1" name="reg_l_name"
                                placeholder="<?php echo $lname ?>" value="<?php echo $lname ?>"></td>
                    </tr>
                    <tr>
                        <td><input type="text" id="login" class="input_1" name="department"
                                placeholder="<?php echo $department ?>" value="<?php echo $department ?>"></td>
                        <td><input type="text" id="login" class="input_1" name="section"
                                placeholder="<?php echo $section ?>" value="<?php echo $section ?>"></td>
                    </tr>
                    <tr>
                        <td><input type="text" id="login" class="input_1" name="blood_group"
                                placeholder="<?php echo $blood_grop ?>" value="<?php echo $blood_grop ?>"></td>
                        <td><input type="text" id="login" class="input_1" name="address"
                                placeholder="<?php echo $address ?>" value="<?php echo $address ?>"></td>
                    </tr>
                    <tr>
                        <td><input type="text" id="login" class="input_1" name="reg_email"
                                placeholder="<?php echo $email ?>" value="<?php echo $email ?>"></td>
                        <td><input type="text" id="password" class="input_1" name="reg_pass"
                                placeholder="<?php echo $password ?>" value="<?php echo $password ?>"></td>
                    </tr>
                </table>






                <!-- <input type="submit" class="fadeIn fourth" value="REGISTER"> -->
                <button type="submit" class="sub_btn" name="REGISTER">REGISTER</button>
            </form>
            <!-- <p>Name</p>
    <p>Department</p>
    <p>section</p>
    <p>roll</p>
    <p>blood grouup</p>
    <p>place</p> -->
        </div>
    </div>


</body>

</html>