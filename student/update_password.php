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
    <link rel="stylesheet" href="Style.css">
    <title>Update_password</title>
    <style>
    body{
        height:1200px;
        width:100%;
        background-image: url("image/Home.jpg");  
    background-position: center;
    background-repeat: no-repeat;
    background-size: cover;
    }
    .form-control{
        height:70px;
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
    .wrapper{
        height:350px;
    width:450px;
    background-color:#030002;
    margin:40px auto;
    opacity: .8;
    color:white;
    border:5px solid white;
    border-radius: 20%

    }
    .password{
        padding:0px 100px;
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
        <?php
          if(isset($_SESSION['login_user'])){
              ?>
            <nav>
                <ul>
                    <li><a href="Home.php">HOME</a></li>
                    <li><a href="profile.php">PROFILE</a></li>
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
     <div class="wrapper">
     <h1 style="text-align:center;">Library Management System</h1>
     <h1 style="text-align:center;">Change your password</h1>
     <div class="password">
     <form name="" action="" method="POST">
                  Roll:<input type="text" name="roll" required="" style="margin-left: 30px;"><br><br>
                  Email:<input type="text" name="email" required=""style="margin-left: 20px;"><br><br>
                  Password:<input type="password" name="password" required=""><br><br>
                  <input type="submit" name="submit" value="UPDATE"required=""style="margin-left: 100px;">
    </form>
    </div>
    </div>
    <?php
        if(isset($_POST['submit'])){
            $count=0;
            $res=mysqli_query($db,"UPDATE student  SET password='$_POST[password]' WHERE roll='$_POST[roll]' && email='$_POST[email]';");
       //$db=connection variable
       ?>
       <script type="text/javascript">
        alert("The password updated successfully");
       </script>
<?php
            }
        ?>
</body>
</html>