<?php
SESSION_START();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Library Management System</title>
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
    <div class="wrapper">
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
                    <li><a href="../login.php">LOGIN</a></li>
                    <li><a href="feedback.php">FEEDBACK</a></li>
                    <li><a href="../com-index.php">BACK</a></li>
                </ul>
            </nav>
            <?php
          }
        ?>
         </header>
         <section>
             <div class="sec_img">
                 <br><br><br>
                  <div class="Box">
                  <h1 style="text-align: center; padding-top: 20px; font-size: 35px;">FOR STUDENT,</h1>
                <h1 style="text-align: center; padding-top: 0px; font-size: 35px;">WELCOME TO THE LIBRARY</h1>
                  </div>
              </div>
         </section>
         <footer>
            <a href="#" style="text-decoration: none; margin:400px; color:white; font-size: 20px;">&#128231 Email:protikchakroborty2@gmail.com</a> <br>
            <b style="margin:450px; color:white; font-size: 20px;">&#128222 Mobile No:01743-149225</b><br>
         </footer>
    </div>  
</div>
</body>
</html>