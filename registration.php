<?php
include "connection.php";
SESSION_START();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration</title>
    <link rel="stylesheet" href="Style.css">
    <style>
      section{
    height:850px;
    width:100%;
    background-color: grey; 
    text-align:center;
    background-image: url("image/Home.jpg");  
    background-position: center;
    background-repeat: no-repeat;
    background-size: cover;
}
       .logo{
    background-image: url("image/logo.jpeg");
    height: 120px;
    width:105px;
    background-position: center;
    background-repeat: no-repeat;
    background-size: cover;
    margin-left: 5px;
    margin-top: 5px;
    float: left;
    border:2px solid white;
}
.head{
    width:500px;
    float:left;
    color:white;
    padding-top:0px;
    margin-left: 5px;
}
.Box4{
    height:1000px;
    width:650px;
    background-color:#030002;
    margin:0px auto;
    opacity: .8;
    color:white;
    border:5px solid white;
    border-radius: 20%;
    margin-top:20px;
}
.Box{
    height:200px;
    width:510px;
    background-color:#030002;
    color:white;
    float:right;
    margin-right:120px;
    margin-top:0px;
    opacity:0.8;
}
.Box1{
    height:90px;
    width:100px;
    float:left;
    margin:auto;
    padding:20px;
    border:1px solid blue;
    border-radius: 25%;
    background-color:white;
    margin-left:100px;
    background-image: url("image/Admin.png");  
    background-position: center;
    background-repeat: no-repeat;
    background-size: cover;
}
.Box2{
    height:90px;
    width:100px;
    float:right;
    margin:auto;
    background-color:white;
    padding:20px;
    border:1px solid blue;
    border-radius: 25%;
    background-image: url("image/student.png");  
    background-position: center;
    background-repeat: no-repeat;
    background-size: cover;
    margin-right:10px;
}
</style>
</head>
<body>
    <header>
        <div class="logo">
                
        </div>
        <div class="head">
        <h2>RAJSHAHI UNIVERSITY OF  ENGINEERING & TECHNOLOGY</h2>
              <h2>LIBRARY MANAGEMENT SYSTEM</h2>
        </div>
        <?php
          if(isset($_SESSION['login_user'])){
              ?>
            <nav>
                <ul>
                    <li><a href="Home.php">HOME</a></li>
                    <li><a href="books.php">BOOKS</a></li>
                    <li><a href="logout.php">LOGOUT</a></li>
                    <li><a href="feedback.php">FEEDBACK</a></li>
                </ul>
            </nav>
            <?php
          } 
          else{
            ?>
            <nav>
                <ul>
                <li><a href="Home.php">HOME</a></li>
                <li><a href="books.php">BOOKS</a></li>
                <li><a href="login.php">LOGIN</a></li>
                <li><a href="registration.php">SIGN_UP</a></li>
                <li><a href="feedback.php">FEEDBACK</a></li> 
                </ul>
            </nav>
            <?php
          }
        ?>
    </header>
    <section>
        <div class="reg_img">
            <br>
            <div class="Box4" style="height:500px;width:650px;">
            <h1 style="text-align:center;">Library Management System</h1>
            <h1 style="text-align:center; font-size:35px;">User Registration Form</h1>
            <form name="Registration" action="" method="POST">
            <div class="Box">
                   <b><p style="font-size:25px;font-weight:700;padding-left: 70px"><u>Sign Up As</u></p></b>
                      <div class="Box1">
                      <input type="radio" name="user" id="admin" value="admin" style="margin-top: 115px;" >
</div>
                      <div class="Box2">
                      <input type="radio" name="user" id="student" value="student" style="margin-top: 115px;" >
                      </div>
                      <input type="submit" name="submit1" value="OK"required=""style="margin-left: 8px;margin-top: 150px;">
                  </div>
         
            </form>
          </div>
        </div>
  </section>
<?php

    if(isset($_POST['submit1'])){
      if ($_POST['user']=='admin'){
        ?>
        <script type="text/javascript">
         window.location="admin/registration.php";
        </script>
        <?php
      }
      else{
        ?>
        <script type="text/javascript">
         window.location="student/registration.php";
        </script>
        <?php
      }
    }
?>
</body>
</html>