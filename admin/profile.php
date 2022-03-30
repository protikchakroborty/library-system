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
    <title>Profile</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="Style.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <style>
.search_books{
    padding-top:20px;
    padding-left:30px;
}
form.example input[type=text] {
  padding: 10px;
  font-size: 17px;
  border: 1px solid grey;
  float: left;
  width: 20%;
  background: #f1f1f1;
}

form.example button {
  float: left;
  width: 10%;
  padding: 10px;
  background: #2196F3;
  color: white;
  font-size: 17px;
  border: 1px solid grey;
  border-left: none;
  cursor: pointer;
}

form.example button:hover {
  background: #0b7dda;
}

form.example::after {
  content: "";
  clear: both;
  display: table;
}
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
.table1{
    text-align:center;
    color:black;
    width:98%;
    padding-left:10px;
    background-image: url("image/Home.jpg");  
    background-position: center;
    background-repeat: no-repeat;
    background-size: cover;
    border:5px solid #800000;
    height:1500px;
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
.table{
  background-color:white;
  margin:auto;
  border:5px solid #26a9dd;
  width:80%;
  margin-top:40px;
  padding-left:40px;
}
th{
  background-color:#808000;
  border:3px solid black;
  text-align:center;
}
td{
  border:2px solid #87cefa;
  text-align:center;
  margin-left:40px;
}
tr:hover{
        background-color: gray;
        color:white;
}
.wrapper{
    width:335px;
    background-color:white;
    opacity:0.7;
    height:650px;
    margin-left:400px;
    margin-top:0px;
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
                    <li><a href="student.php">S.INFORMATION</a></li>
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

    <div class="table1">
 <!---------side bar-------->
 <div id="mySidenav" class="sidenav">
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
  <div class="h"><a href="profile.php">Profile</a></div>
  <div class="h"><a href="books.php">Books</a></div>
  <div class="h"><a href="request.php">Book Request</a></div>
  <div class="h"><a href="issue_info.php">Issue Information</a></div>
</div>



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
  <span style="font-size:30px;cursor:pointer;color:white;float:left;" onclick="openNav()">&#9776; open</span>

  <form action="" method="post">
      <button style="float:right;width:100px;height:50px;background-color:#26a9dd;font-size:20px;" name="submit1">Edit</button>
</form>
<?php
if(isset($_POST['submit1'])){
    ?>
                <script type="text/javascript">
                 window.location="edit.php";
                </script>
                <?php
}
?>
<div class="wrapper">
    <?php
    $r1=$_SESSION['login_user'];
           $sql="SELECT * from admin where username='$r1'";
           $result=mysqli_query($db,$sql);
    ?>
    <div class="header" style="margin-left:75px;margin-top:50px;width:50%;height:60px; color:black; background-color:#aa5a41;opacity:0.8; border:1px solid black; border-radius:30%; margin-top:250px;">
    <h1 style="padding-left:10px;color:White;margin-top:10px; text-align:center;">My Profile</h1>
</div>
<?php
     $row=mysqli_fetch_assoc($result);
?>
<?php
echo
"<div style='width:90%;margin-left:15px;'><img src='image/".$_SESSION['picture']."'></div>";
?>
     <div style="text-align:center;">welcome,</b>
     <h4>
         <?php
         echo $_SESSION['login_user'];
         ?>
     </h4>
     <div>

     <?php
          echo "<table>";
                 echo "<tr>";
                         echo  "<td>";
                              echo "<b>First Name: </b>";
                         echo  "</td>";

                         echo  "<td>";
                               echo $row['first'];
                         echo  "</td>";
                 echo "</tr>";
                 echo "<tr>";
                         echo  "<td>";
                             echo "<b>Last Name: </b>";
                         echo  "</td>";

                         echo  "<td>";
                         echo $row['last'];
                         echo  "</td>";
                 echo "</tr>";
                 echo "<tr>";
                         echo  "<td>";
                         echo "<b>Username: </b>";
                         echo  "</td>";

                         echo  "<td>";
                         echo $row['username'];
                         echo  "</td>";
                 echo "</tr>";
                 echo "<tr>";
                         echo  "<td>";
                         echo "<b>Email: </b>";
                         echo  "</td>";

                         echo  "<td>";
                         echo $row['email'];
                         echo  "</td>";
                 echo "</tr>";
                 echo "<tr>";
                         echo  "<td>";
                         echo "<b>Contact No: </b>";
                         echo  "</td>";

                         echo  "<td>";
                         echo $row['contact'];
                         echo  "</td>";
                 echo "</tr>";
                 
          echo "</table>";
     ?>
</div>
</div>
</div>
</body>
</html>