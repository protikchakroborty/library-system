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
                <li><a href="../login.php">LOGIN</a></li>
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
            <div class="Box2" style="height:600px;">
            <h1 style="text-align:center;">Library Management System</h1>
            <h1 style="text-align:center; font-size:35px;">User Registration Form</h1>
            <form name="Registration" action="" method="POST">
                <div class="login">
                First Name:<input type="text" name="first" required=""><br><br>
                Last Name:<input type="text" name="last" required=""><br><br>
                User Name:<input type="text" name="username" required=""><br><br>
                Email:<input type="text" name="email" required=""style="margin-left: 30px;"><br><br>
                Department:
                <select id="dept" name="dept" required="">
                  <option value="EEE">EEE</option>
                  <option value="CSE">CSE</option>
                  <option value="ETE">ETE</option>
                  <option value="ECE">ECE</option>
                  <option value="CE">CE</option>
                  <option value="GCE">GCE</option>
                  <option value="MTE">MTE</option>
                  <option value="MSE">MSE</option>
                  <option value="IPE">IPE</option>
                  <option value="ME">ME</option>
                  <option value="ARCH">ARCH</option>
                  <option value="URP">URP</option>
                  <option value="BECM">BECM</option>
                  <option value="CFPE">CFPE</option>
                </select>
                <br><br>
                Roll:<input type="text" name="roll" required=""style="margin-left: 45px;"><br><br>
                <label for="phone">Contact-No:</label>
                <input type="tel" id="contact" name="contact" placeholder="01***-******" pattern="[0-9]{5}-[0-9]{6}" required><br><br>
                Password:<input type="password" name="password" required=""style="margin-left: 8px;"><br><br>
                Picture No:<input type="picture" name="picture" required=""style="margin-left: 8px;"><br><br>
                <input type="submit" name="submit" value="SIGN UP"required=""style="margin-left: 8px;">
                 </div>
            </form>
          </div>
        </div>
  </section>
<?php

    if(isset($_POST['submit'])){
      $first=$_POST['first'];
      $last=$_POST['last'];
      $username=$_POST['username'];
      $roll=$_POST['roll'];
      $dept=$_POST['dept'];
      $email=$_POST['email'];
      $contact=$_POST['contact'];
      $password=$_POST['password'];
      $picture=$_POST['picture'];


      $count=0;
      $sql="SELECT roll from `student`";
      $res=mysqli_query($db,$sql);
      while($row=mysqli_fetch_assoc($res))
      {

        if($row['roll']==$roll){
          $count=$count+1;
        }
      }


     if($count==0)
      {mysqli_query($db,"INSERT INTO `student` ( `first`, `last`, `username`, `roll`, `dept`, `email`, `contact`, `password`,`picture`) VALUES ( '$first','$last','$username','$roll','$dept','$email','$contact','$password', '$picture');");
  ?>
  <script type="text/javascript">
     alert("Registration Successful");
     window.location="../login.php";
  </script>
<?php
      }
      else{
        ?>
  <script type="text/javascript">
     alert("Registration UnSuccessful, The roll is already exist");
  </script>
<?php  
      }
    }



?>
</body>
</html>