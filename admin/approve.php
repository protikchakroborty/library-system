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
    <title>Approve Request</title>
    <link rel="stylesheet" href="Style.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

<style>
body {
  font-family: "Lato", sans-serif;
}

.sidenav {
  height: 100%;
  margin-top:125px;
  width: 0;
  position: fixed;
  z-index: 1;
  top: 0;
  left: 0;
  background-color: #111;
  overflow-x: hidden;
  transition: 0.5s;
  padding-top: 60px;
}

.sidenav a {
  padding: 8px 8px 8px 32px;
  text-decoration: none;
  font-size: 25px;
  color: #818181;
  display: block;
  transition: 0.3s;
}

.sidenav a:hover {
  color: #f1f1f1;
}

.sidenav .closebtn {
  position: absolute;
  top: 0;
  right: 25px;
  font-size: 36px;
  margin-left: 50px;
}

#main {
  transition: margin-left .5s;
  padding: 16px;
}

@media screen and (max-height: 450px) {
  .sidenav {padding-top: 15px;}
  .sidenav a {font-size: 18px;}
}
.h:hover{
  color:white;
  background-color:blue;
}
.request_books{
  padding-left:30px;
}
body{
    height:550px;
    width:98%;
    background-image: url("image/home.jpg");  
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
.display{
    height=50px;
    width=100px;
    padding-left;100px;
    color:white;
    background-color:black;
    opacity:0.8;
    text-align:center;
}
.container{
    text-align:center;
    color:white;
    height:500px;
}
.srch{
  padding-left:700px;
  padding-top:20px;
}
.approve{
    width:300px;
    height:300px;
    border:2px solid #aa5a41;
    background-color:#26a9dd;
    border-radius:10%;
    padding-top:20px;
    margin-right:30px;
    opacity:75%;
    margin-left:450px;
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


    <!---------side bar-------->
<div id="mySidenav" class="sidenav">
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
  <div class="h"><a href="books.php">Books</a></div>
  <div class="h"><a href="request.php">Book Request</a></div>
  <div class="h"><a href="issue_info.php">Issue Information</a></div>
</div>

<div class="container">

<script>
function openNav() {
  document.getElementById("mySidenav").style.width = "250px";
  document.getElementById("main").style.marginLeft = "250px";
}

function closeNav() {
  document.getElementById("mySidenav").style.width = "0";
  document.getElementById("main").style.marginLeft= "0";
}
</script>
<div id="main">
  <span style="font-size:30px;cursor:pointer;float:left;color:black;" onclick="openNav()">&#9776; open</span>
  <div class="approve">
  <div class="header" style="color:white; background-color:#87cefa;border:1px solid #26a9dd; border-radius:30%; margin-top:8px;margin-left:30px; margin-right:15px;width:80%;height:50px;">
    <h4 style="padding-left:15px;font-size:20px;margin-top:15px;color:black;">Approve Request</h4>
    </div>
    <?php
    ?>
    <form method="POST" action="" name="form1">
      <input type="text" name="status" placeholder="Approve or Not" required="" style="margin-top:15px;"><br><br>
      <input type="text" name="issue" placeholder="Issue Date yyyy-mm-dd" required=""><br><br>
      <input type="text" name="return" placeholder="Return Date yyyy-mm-dd" required=""><br><br>
      <button name="submit" type="submit" style="color:black;background-color:blue;">Approve</button><br><br>
</form>
</div>
</div>
<?php
if(isset($_POST['submit'])){
    //echo "$_POST[status]";
    $sql="UPDATE `issue_book` SET `status`= '$_POST[status]',
    `issue`= '$_POST[issue]',`return_date`='$_POST[return]' WHERE
    roll=$_SESSION[stu_roll] and bid=$_SESSION[bid]";
    $result=mysqli_query($db,$sql);
    mysqli_query($db,"UPDATE books SET quantity=quantity-1 Where bid='$_SESSION[bid]';");

    $res=mysqli_query($db,"SELECT quantity FROM books Where bid='$_SESSION[bid]';");

    while($row=mysqli_fetch_assoc($res)){
        if($row['quantity']==0){
            mysqli_query($db,"UPDATE books SET status='not-available' Where bid='$_SESSION[bid]';");
        }
    }
    ?>
    <script type="text/javascript">
   alert("updated successfuuly");
  </script>
  <?php
}
?>
</div>
</body>
</html>