<?php
  session_start();
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <script src="https://kit.fontawesome.com/3cb50b8537.js" crossorigin="anonymous"></script> -->
    <style>
    <?php include 'styles/index.css'; ?>


    </style>
   

    <!-- <title>HOME</title> -->

</head>



<body>

<section id="sec-11"></section>

<div id="navbar">
    <a href="#sec-1" style="padding-left: 10px; color: white;">Home</a>
    <a href="#sec-2" style="padding-left: 40px; color: white;">Notice</a>
    <!-- <a href="#sec-3" style="padding-left: 40px; color: white;">How to use</a> -->
    <!-- <a href="#sec-4" style="padding-left: 40px; color: white;">Helps</a> -->
</div>
      

<div class="header">
    <a href="#default" class="logo">Random College</a>
    <div class="header-right">
      <!-- <a href="templates/tem_login.php"> -->
     
        <?php
          if(!isset($_SESSION['valid']))
          { 

            echo '<a href="templates/tem_login.php">Login</a>';
            
          }
          else{
            $position = $_SESSION['position'];
            
            if($position == 'admin')
            {
              echo "<a href='tem_admin_profile.php'>".$_SESSION['fname']."</a>";
              
            }
            else if($position == 'teacher')
            {
              echo "<a href='tem_teacher_profile.php'>".$_SESSION['teacher_name']."</a>";
            }
            else{
              echo "<a href='tem_profile.php'>".$_SESSION['fname']."</a>";

            }



            // echo $_SESSION['name'];
          }
        ?>
      
      <a href="tem_session_remove.php">
        <?php
          if(isset($_SESSION['valid']))
          {
            echo "Logout";
          }
          else
          {
            echo "";
          }
        ?>
      </a>
    </div>
  </div>

<!-- <div class="clear_div"></div> -->

<section id="sec-0">
    <div class="my_nav" style="background-color: #47d88f; height: 50px; width: 100%; text-align: center; margin: 0;">
        <div style="padding-top: 12px;">
        
            <a href="#sec-1" style="padding-left: 10px; color: white;">Home</a>
            <!-- <a href="#sec-" style="padding-left: 40px; color: white;">Academic</a> -->
            <a href="#sec-2" style="padding-left: 40px; color: white;">Notice Board</a>
        
        </div>
        </div>
</section>



    
<script>
// When the user scrolls down 20px from the top of the document, slide down the navbar
    window.onscroll = function() {scrollFunction()};

    function scrollFunction() {
        if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
        document.getElementById("navbar").style.top = "0";
        } else {
        document.getElementById("navbar").style.top = "-50px";
        }
    }
</script>

    


</body>
</html>

