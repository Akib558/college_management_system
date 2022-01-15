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
  <a  href="tem_admin_edu.php">Educational Records</a>
  <a class="active" href="tem_admin_fee.php">Fees</a>
 
</div>

<div class="content">
    
<div id="navbar">
            
            <a href="tem_admin_fee.php">Get Info</a>
            <a href="tem_admin_fee_2.php">Update Info</a>
            <a href="tem_admin_fee_3.php">Add Month</a>

        </div>
    <div class="new_content">

    <div class="form_section">

            <form action="tem_admin_fee_3.php" method="POST">

                <table>

                   
                    <tr>
                        <td></td>
                        <td>
                        <input type="text" name="month_id" placeholder="Month Name">
                        </td>
                        <td></td>



                    </tr>

                    <tr>
                        <td></td>
                        <td>
                        <input type="text" name="month_money" placeholder="Month Value">
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
      
      if(isset($_POST['REGISTER']))
      {
        $db_servername = "localhost";
        $db_username = "user2";
        $db_password = "passuser2";
        $db_name = "db1";
        $conn = mysqli_connect($db_servername, $db_username, $db_password, $db_name);
        
        $value = $_POST['month_id'];
        $value2 = $_POST['month_money'];



        $sql = "alter table fee add $value int default $value2;";
        $sql2 = "alter table dues add $value int default 0;";


        // echo $sql;

        if(!mysqli_query($conn,$sql))
        {
            echo "ERROR1 : ".mysqli_error($conn);
        }

        if(!mysqli_query($conn,$sql2))
        {
            echo "ERROR2 : ".mysqli_error($conn);
        }
        
        
    }

?>

    
    </div>




</body>
</html>

