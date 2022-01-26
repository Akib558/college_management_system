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

    .active,
    .collapsible:hover {
        background-color: #555;
    }

    .content2 {
        padding: 0 18px;
        display: none;
        overflow: hidden;
        background-color: #f1f1f1;
    }

    .demo_table {
        width: 100%;
        table-layout: fixed;
    }

    tr {
        text-align: center;
    }
    </style>
</head>

<body>

    <div class="sidebar">
        <a href="tem_home.php">Home</a>
        <a href="tem_admin_profile.php">Teacher</a>
        <a href="tem_admin_student.php">Student</a>
        <a class="active" href="tem_admin_notice.php">Notice Board</a>
        <a href="tem_admin_edu.php">Educational Records</a>
        <a href="tem_admin_fee.php">Fees</a>

    </div>

    <div class="content">

        <div id="navbar">

            <a href="tem_admin_notice.php">Notices</a>
            <a style="background-color: #2bff00;" href="tem_admin_notice_2.php">Edit Notice</a>
            <a href="tem_admin_notice_3.php">Add Notice</a>
            <a href="tem_admin_notice_4.php">Delete Notice</a>
        </div>
        <div class="new_content">

            <form action="tem_admin_notice_2.php" method="POST">
                <input type="text" name="board_id" placeholder="Notice Id">
                <button style="margin-top: 50px;" type="submit" class="sub_btn" name="REGISTER">Get Notice</button>
            </form>
            <hr>

            <?php
    if(isset($_POST['REGISTER']))
    {
      // $_SESSION['tem_value'] = 1;
      $db_servername = "localhost";
      $db_username = "user2";
      $db_password = "passuser2";
      $db_name = "db1";
      $conn = mysqli_connect($db_servername, $db_username, $db_password, $db_name);
      
      $value = $_POST['board_id'];

      // $sql = "select * from teacher_info where teacher_id='$value'";
      $sql = "select * from board where board_id='$value'";

      if(mysqli_query($conn, $sql))
      {
          $result = mysqli_query($conn, $sql);
          $row = mysqli_fetch_assoc($result);

        $board_id = $row['board_id'];
        $board_name = $row['board_name'];                                       
        $board_date = $row['board_date'];
        $board_desc = $row['board_desc'];
                                //    board_description

        echo "
            
            <div class='info'>
            <form action='../php_config/db_admin_notice_2.php' method='POST'>
                <table class='main-table'>
                    <tr>

                        <td><input type='text' id='login' class='input_1' name='board_id'
                                placeholder='$board_id' value='$board_id'></td>
                    </tr>
                    <tr>
                        <td><input type='text' id='login' class='input_1' name='board_name'
                                placeholder='$board_name' value='$board_name'></td>
                        
                    </tr>
                    <tr>
                        <td><input type='text' id='login' class='input_1' name='board_date'
                                placeholder='$board_date' value='$board_date'></td>
                        
                    </tr>
                    <tr>
                        <td><input type='text' id='login' class='input_1' name='board_desc' style='height:200px; width:100%'
                                placeholder='$board_desc' value='$board_desc'></td>
                        
                    </tr>
                   
                </table>

                <button type='submit' class='sub_btn' name='REGISTER'>Update Notice</button>
            </form>
          
        </div>
            
            
            ";
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