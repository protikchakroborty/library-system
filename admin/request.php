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
    <title>Book Request</title>
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
    width:100%;
    background-image: url("image/request.jpg");  
    background-position: center;
    background-repeat: no-repeat;
    background-size: cover;
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
.container{
  text-align:center;
    color:black;
    width:98%;
    height:500px;
    padding-left:10px;
    background-image: url("image/Home.jpg");  
    background-position: center;
    background-repeat: no-repeat;
    background-size: cover;
    border:5px solid #800000;
    padding-top:30px;
}
.table{
  background-color:white;
  margin:auto;
  border:5px solid #26a9dd;
  width:80%;
  margin-top:40px;
}
th{
  background-color:#26a9dd;
  border:3px solid black;
}
td{
  border:2px solid #87cefa;
}
tr:hover{
        background-color: gray;
        color:white;
}
.srch{
  margin-top:20px;
    width:200px;
    height:100px;
    float:left;
    border:5px solid #800000;
    background-color:#26a9dd;
    border-radius:10%;
    margin-left:700px;
    padding-top:20px;
    opacity:0.8;
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
  <span style="font-size:30px;cursor:pointer;float:left;color:white;" onclick="openNav()">&#9776; open</span>

  <div class="srch">
    <form method="POST" action="" name="form1">
      <input type="text" name="roll1" placeholder="roll" required="" style="border:2px solid #800000"><br>
      <input type="text" name="bid" placeholder="BID" required="" style="border:2px solid #800000; margin-top:5px;"><br>
      <button name="submit" type="submit" style="color:black; margin-top:5px; border:2px solid #800000;">Submit</button><br>
</form>
</div>
<div class="book_heading" style="height:80px; width:80%; color:#800000; background-color:#87cefa; border:5px solid #800000; margin-left:110px;  border-radius:100%; text-align:center; margin-top:180px; ">
<h1>Request Of Book</h1><br><br><br>
</div>
<?php
if(isset($_SESSION['login_user'])){
    $sql="SELECT username,student.roll,books.bid,name,authors,edition,books.status FROM student
    join issue_book using (roll) join books USING (bid) WHERE issue_book.status=''";
    $result=mysqli_query($db,$sql);
        if($result){
            echo "<table class='table table-bordered table-hover' >";
            echo "<tr style='background-color:white;'>";
            echo "<th>"; echo "Username"; echo "</th>";
            echo "<th>"; echo "Roll"; echo "</th>";
            echo "<th>"; echo "Bid"; echo "</th>";
            echo "<th>"; echo "Name"; echo "</th>";
            echo "<th>"; echo "Authors"; echo "</th>";
            echo "<th>"; echo "Edition"; echo "</th>";
            echo "<th>"; echo "Status"; echo "</th>";
            echo "</tr>";
              while($row=mysqli_fetch_assoc($result)){
                echo "<tr>";
                echo "<td>"; echo $row['username']; echo "</td>";
          echo "<td>"; echo $row['roll']; echo "</td>";
          echo "<td>"; echo $row['bid']; echo "</td>";
          echo "<td>"; echo $row['name']; echo "</td>";
          echo "<td>"; echo $row['authors']; echo "</td>";
          echo "<td>"; echo $row['edition']; echo "</td>";
          echo "<td>"; echo $row['status']; echo "</td>"; 
          echo "</tr>";    
              }
              echo "</table>";
            }
          else{
              ?>
              <script>
            alert("There is no pending request");
            </script>
            <?php
}
}
else{
  ?>
<h3>you need to login to see the request</h3>;
<?php
}
if(isset($_POST['submit'])){
  $_SESSION['stu_roll']=$_POST['roll1'];
  $_SESSION['bid']=$_POST['bid']
  ?>
  <script type="text/javascript">
   window.location="approve.php";
  </script>
  <?php 
}
?>
</div>
</div>
</body>
</html>