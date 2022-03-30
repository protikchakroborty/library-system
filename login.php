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
    <title>Student Login</title>
    <link rel="stylesheet" href="Style.css">
    <style>
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
section{
    height:850px;
    width:100%;
    background-color: grey; 
    text-align:center;
    background-image: url("image/common.jpg");  
    background-position: center;
    background-repeat: no-repeat;
    background-size: cover;
}

.head{
    width:500px;
    float:left;
    color:white;
    padding-top:0px;
    margin-left: 5px;
}
.Box{
    height:200px;
    width:500px;
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
.log_img{
    height:500px;
    width:100%;
    margin-top: 0px;
    background-image: url("image/Home.jpg");  
    background-position: center;
    background-repeat: no-repeat;
    background-size: cover;
}

.Box4{
    height:700px;
    width:650px;
    background-color:#030002;
    margin:0px auto;
    opacity: .8;
    color:white;
    border:5px solid white;
    border-radius: 20%;
    margin-top:20px;
}
.login{
   
}
form .login{
    padding:auto 70px;
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
        <nav>
            <ul>
                <li><a href="Home.php">HOME</a></li>
                <li><a href="books.php">BOOKS</a></li>
                <li><a href="login.php"><span class="log login">LOGIN</span></a></li>
                <li><a href="login.php"><span class="log logout">LOGOUT</span></a></li>
                <li><a href="registration.php"><span class="log reg">SIGN_UP</span</a></li>
                <li><a href="feedback.php">FEEDBACK</a></li>
            </ul>
        </nav>
    </header>
    <section>
    <div class="log_img">
              <br><br><br>
              <div class="Box4">
              <h1 style="text-align:center;">Library Management System</h1>
              <h1 style="text-align:center; font-size:35px;">User Login Form</h1>
              <form name="login" action="" method="POST">
              <div class="Box">
                   <b><p style="font-size:25px;font-weight:700;padding-left: 70px"><u>Login As</u></p></b>
                      <div class="Box1">
                      <input type="radio" name="user" id="admin" value="admin" style="margin-top: 115px;" >
</div>
                      <div class="Box2">
                      <input type="radio" name="user" id="student" value="student" style="margin-top: 115px;" >
                      </div>
                  </div>
                  <div class="login">
                  Username:<input type="text" name="username" required="" style="margin-left: 7px;margin-top: 35px;"><br><br>
                  Roll:    <input type="text" name="roll" required="" style="margin-left: 30px;"><br><br>
                  Password:<input type="password" name="password" required=""><br><br>
                  <input type="submit" name="submit" value="LOG IN"required=""style="margin-left: 15px;">
                   </div>
              </form>
              <p>
                  <br>
                  <a style="color:white" href="update_password.php">Change password?</a><br>
                  <a style="color:white" href="registration.php">Sign Up</a>
              </p>
            </div>
          </div>
         
    </section>
    <?php
        if(isset($_POST['submit'])){
            if($_POST['user']=='admin'){
                $count=0;
                $res=mysqli_query($db,"SELECT *FROM `admin` WHERE username='$_POST[username]' && password='$_POST[password]';");
                $row=mysqli_fetch_assoc($res);
                $_SESSION['picture']=$row['picture'];
                $count=mysqli_num_rows($res);  //count number of row if roll and password match
                if($count==0){
                    ?>
                      <div class="alert" style="width:300px; margin-left:300px; color:white; border:2px solid black; background-color:#de1313">
                      <strong>The roll and password doesn't match.</strong>
                      </div>
                    <?php
                }
                else{
                    $_SESSION['login_user']=$_POST['username']  // if the admin login successfully
                    ?>
                    <script type="text/javascript">
                     window.location="admin/profile.php";
                    </script>
                    <?php  
                }
            }
            else{
            $count=0;
            $res=mysqli_query($db,"SELECT *FROM `student` WHERE roll='$_POST[roll]' && password='$_POST[password]';");
            $count=mysqli_num_rows($res);  //count number of row if roll and password match
            $row=mysqli_fetch_assoc($res);
            $_SESSION['picture']=$row['picture'];
            if($count==0){
                ?>
                  <div class="alert" style="width:300px; margin-left:300px; color:white; border:2px solid black; background-color:#de1313">
                  <strong>The roll and password doesn't match.</strong>
                  </div>
            
                <?php
            }
            else
            {
                $_SESSION['login_user']=$_POST['roll']
                ?>
                <script type="text/javascript">
                 window.location="student/profile.php";
                </script>
                <?php  
            }
        }
        }
    ?>
    <footer>
            <a href="#" style="text-decoration: none; margin:400px; color:white; font-size: 20px;">&#128231 Email:protikchakroborty2@gmail.com</a> <br>
            <b style="margin:450px; color:white; font-size: 20px;">&#128222 Mobile No:01743-149225</b><br>
         </footer>
    
</body>
</html>