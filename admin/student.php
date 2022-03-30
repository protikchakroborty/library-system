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
    <title>Student information</title>
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
    padding-top:50px;
}

.table{
  background-color:white;
  margin:auto;
  border:5px solid #26a9dd;
  width:80%;
  margin-top:40px;
}
th{
  background-color:#808000;
  border:3px solid black;
}
td{
  border:2px solid #87cefa;
}
tr:hover{
        background-color: gray;
        color:white;
}
.search_students{
  margin-top:20px;
    width:300px;
    height:150px;
    float:left;
    border:5px solid blue;
    background-color:#26a9dd;
    border-radius:10%;
    margin-left:30px;
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
<!-------------search-books--------->
 <div class="search_students">
 <div class="header" style="color:black; background-color:#87cefa;border:1px solid #26a9dd; border-radius:30%; margin-top:8px;margin-left:30px; margin-right:15px;width:80%;height:50px;">
    <h4 style="padding-left:4px;font-size:20px;margin-top:15px;">Searching Student</h4>
    </div>
    <form class="example" method="post" name="form">
  <input type="text" placeholder="Search.." name="search" required=" " style="width:150px; margin-top:5px; margin-left:10px;">
  <button type="submit" name="submit" style="width:100px; height:42px; margin-top:5px; background-color:#87cefa"><i class="glyphicon glyphicon-search"></i></button>
</form>
 </div>

 <div class="header" style="margin-left:400px;width:30%;height:60px; color:black; background-color:#aa5a41;opacity:0.8; border:1px solid black; border-radius:30%; margin-top:250px;">
    <h1 style="padding-left:10px;color:White;margin-top:10px; text-align:center;">List Of Students</h1>
</div>
    
    <?php
    if(isset($_POST['submit'])){
      $search=$_POST['search'];
      $sql="SELECT first,last,username,roll,dept,email,contact from student where username like '%$search%'";
        $result=mysqli_query($db,$sql);
        $result=mysqli_query($db,$sql);
        //$json_array=array();
        if($result){
          echo "<table class='table table-bordered table-hover' >";
          echo "<tr style='background-color:white;'>";
          echo "<th>"; echo "First"; echo "</th>";
          echo "<th>"; echo "Last"; echo "</th>";
          echo "<th>"; echo "User Name"; echo "</th>";
          echo "<th>"; echo "Roll"; echo "</th>";
          echo "<th>"; echo "Department"; echo "</th>";
          echo "<th>"; echo "Email"; echo "</th>";
          echo "<th>"; echo "Contact"; echo "</th>";
          echo "</tr>";
            while($row=mysqli_fetch_assoc($result)){
              echo "<tr>";
              echo "<td>"; echo $row['first']; echo "</td>";
        echo "<td>"; echo $row['last']; echo "</td>";
        echo "<td>"; echo $row['username']; echo "</td>";
        echo "<td>"; echo $row['roll']; echo "</td>";
        echo "<td>"; echo $row['dept']; echo "</td>";
        echo "<td>"; echo $row['email']; echo "</td>";
        echo "<td>"; echo $row['contact']; echo "</td>"; 
        echo "</tr>";    
            }
            echo "</table>";
          }
          else{
            alert("sorry! No student found.Try searching");
          }    
        
    }
//if button is not pressed
  else{
    if($db){
        $sql="SELECT first,last,username,roll,dept,email,contact FROM `student` order by `student`.`first` ASC";
        $result=mysqli_query($db,$sql);
        echo "<table class='table table-bordered table-hover' >";
          echo "<tr style='background-color:white;'>";
          echo "<th>"; echo "First"; echo "</th>";
          echo "<th>"; echo "Last"; echo "</th>";
          echo "<th>"; echo "User Name"; echo "</th>";
          echo "<th>"; echo "Roll"; echo "</th>";
          echo "<th>"; echo "Department"; echo "</th>";
          echo "<th>"; echo "Email"; echo "</th>";
          echo "<th>"; echo "Contact"; echo "</th>";
          echo "</tr>";
            while($row=mysqli_fetch_assoc($result)){
              echo "<tr>";
              echo "<td>"; echo $row['first']; echo "</td>";
        echo "<td>"; echo $row['last']; echo "</td>";
        echo "<td>"; echo $row['username']; echo "</td>";
        echo "<td>"; echo $row['roll']; echo "</td>";
        echo "<td>"; echo $row['dept']; echo "</td>";
        echo "<td>"; echo $row['email']; echo "</td>";
        echo "<td>"; echo $row['contact']; echo "</td>"; 
        echo "</tr>";    
            }
            echo "</table>";
    }
    else{
        echo "Database Connection Failed";
    }
  }  
    ?>
    </div>
    </div>
</body>
</html>