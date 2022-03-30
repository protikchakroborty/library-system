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
    <title>Books</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="Style.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

<style>
.search_books{
    padding-top:20px;
    padding-left:30px;
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
.table1{
  width:100%;
  background-image: url("image/home.jpg");  
    background-position: center;
    background-repeat: no-repeat;
    background-size: cover;
    background-size:1200px 850px;
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

.book{
    width:400px;
}
.head{
    width:500px;
    float:left;
    color:white;
    padding-top:0px;
    margin-left: 5px;
}
.container{
    height:550px;
    width:450px;
    background-color:#26a9dd;
    border:5px solid blue;
    margin:0px auto;
    opacity: 0.8;
    color:white;
    border-radius: 20%;
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

    <!---------side bar-------->
<div class="table1">
  <div id="mySidenav" class="sidenav">
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
  <div class="h"><a href="add.php">Add Books</a></div>
  <div class="h"><a href="delete.php">Delete Books</a></div>
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
  <span style="font-size:30px;cursor:pointer;color:white;" onclick="openNav()">&#9776; open</span>
  <div class="container">
  <div class="header" style="color:black; background-color:#87cefa; border:1px solid black; border-radius:50%; margin:20px;">
    <h2 style="padding-left:115px;">Add New Books</h2>
    </div>
  <form class="book" action="" method="post">
   <input type="text" name="bid" class="form-control" placeholder="Book Id" required="" style="margin-top:8px;border-radius:30%;border:1px solid black; color:black; height:35px; width:90%; margin-left:40px; "><br>
   <input type="text" name="name" class="form-control" placeholder="Book Name" required="" style="margin-top:8px;border-radius:30%;border:1px solid black; color:black; height:35px; width:90%; margin-left:40px;"><br>
   <input type="text" name="authors" class="form-control" placeholder="Authors Name" required="" style="margin-top:8px;border-radius:30%;border:1px solid black; color:black; height:35px; width:90%; margin-left:40px;"><br>
   <input type="text" name="edition" class="form-control" placeholder="Edition" required="" style="margin-top:8px;border-radius:30%;border:1px solid black; color:black; height:35px; width:90%; margin-left:40px;"><br>
   <input type="text" name="status" class="form-control" placeholder="Status" required="" style="margin-top:8px;border-radius:30%;border:1px solid black; color:black; height:35px; width:90%; margin-left:40px;"><br>
   <input type="text" name="quantity" class="form-control" placeholder="Quantity" required="" style="margin-top:8px;border-radius:30%;border:1px solid black; color:black; height:35px; width:90%; margin-left:40px;"><br>
   <input type="text" name="department" class="form-control" placeholder="Department" required="" style="margin-top:8px;border-radius:30%;border:1px solid black; color:black; height:35px; width:90%; margin-left:40px;"><br>
   <input type="submit" name="submit" value="ADD"required=""style="margin-left: 160px; color:black; background-color:blue; margin-top:18px; height:35px;  width:30%;">
  </form>
  </div>
</div>

<?php

    if(isset($_POST['submit'])){


        if(isset($_SESSION['login_user'])){
      mysqli_query($db,"INSERT INTO `books`(`bid`, `name`, `authors`, `edition`, `status`, `quantity`, `department`)
       VALUES ('$_POST[bid]','$_POST[name]','$_POST[authors]','$_POST[edition]','$_POST[status]',
       '$_POST[quantity]','$_POST[department]') ;");
       ?>
       <script type="text/javascript">
       alert("Books Added Successfully.");
       </script>        
    <?php  
    }
    else{
        ?>
         <script type="text/javascript">
       alert("You need to log in first.");
       </script>
        <?php
    }
    }  
       
?>
</header>
</div>
  </div>
</body>
