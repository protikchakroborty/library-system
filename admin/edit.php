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
    <title>Admin Registration</title>
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
            <div class="Box2">
            <h1 style="text-align:center;">Library Management System</h1>
            <h1 style="text-align:center; font-size:35px;">Update Information</h1>
            <form name="Registration" action="" method="POST">
                <div class="login">
                <?php
                $roll=$_SESSION['login_user'];
                ?>
                First Name:<input type="text" name="first" required=""><br><br>
                Last Name:<input type="text" name="last" required=""><br><br>
                Email:<input type="text" name="email" required=""style="margin-left: 30px;"><br><br>
                <label for="phone">Contact-No:</label>
                <input type="tel" id="contact" name="contact" placeholder="01***-******" pattern="[0-9]{5}-[0-9]{6}" required><br><br>
                Picture No:<input type="picture" name="picture" required=""style="margin-left: 8px;"><br><br>
                <input type="submit" name="submit" value="UPDATE"required=""style="margin-left: 8px;">
                 </div>
            </form>
          </div>
        </div>
  </section>
<?php
    if(isset($_POST['submit'])){
      $r1=$_SESSION['login_user'];
      $first=$_POST['first'];
      $last=$_POST['last'];
      $email=$_POST['email'];
      $contact=$_POST['contact'];
      $picture=$_POST['picture'];

      mysqli_query($db,"UPDATE `admin` SET `first`='$first',`last`='$last',`email`='$email',
      `contact`='$contact',`picture`='$picture' WHERE username='$r1';");
    }



?>
</body>
</html>