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
  background-color: black;
  overflow-x: hidden;
  transition: 0.5s;
  padding-top: 60px;
}

.sidenav a {
  padding: 8px 8px 8px 32px;
  text-decoration: none;
  font-size: 25px;
  color: white;
  display: black;
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
.container{
    opacity:0.8;
    align:center;
    color:white;
    width:100%;
    background-image: url("image/Home.jpg");  
    background-position: center;
    background-repeat: no-repeat;
    background-size: cover;
}
.table1{
    text-align:center;
    color:black;
    width:100%;
    height:500px;
    padding-left:10px;
   
    margin-top:10px;
    padding-top:50px;
}
.search_books{
  margin-top:20px;
    width:300px;
    height:150px;
    float:left;
    border:2px solid #aa5a41;
    background-color:#26a9dd;
    opacity:75%;
    border-radius:10%;
    margin-left:20px;
    padding-top:20px;
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
.request_books{
    width:300px;
    height:150px;
    float:right;
    border:2px solid #aa5a41;
    background-color:#26a9dd;
    border-radius:10%;
    padding-top:17px;
    margin-right:30px;
    opacity:75%;
}
.table{
  margin-top:100px;
  background-color:white;
  margin:auto;
  border:2px solid black;
  width:80%;
  
}
th{
  background-color:#87CEFA;
  border:2px solid black;
}
td{
  border:2px solid black;
  background-color:rgba(255,255,222,.6);
  color:black;
}
tr:hover{
        background-color: gray;
        color:white;
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

    <div class="container">
    <!---------side bar-------->
<div id="mySidenav" class="sidenav">
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
  <div class="h"><a href="books.php">Books</a></div>
  <div class="h"><a href="request.php">Book Request</a></div>
  <div class="h"><a href="issue_info.php">Issue Information</a></div>
  <div class="h"><a href="instruction.php">Instructions</a></div>
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
<!-------------search-books--------->
<div id="main">
  <span style="font-size:30px;cursor:pointer;float: left;" onclick="openNav()">&#9776; open</span>
 <div class="search_books">
 <div class="header" style="color:white; background-color:#87cefa;border:1px solid #26a9dd; border-radius:30%; margin-top:2px;margin-left:15px; margin-right:15px;width:80%;height:50px;">
    <h4 style="padding-left:45px;font-size:20px;margin-top:15px;">Searching Book</h4>
    </div>
    <form class="example" method="post" name="form">
  <input type="text" placeholder="Search.." name="search" required=" " style="width:150px; margin-top:5px">
  <button type="submit" name="submit"style="width:100px; height:42px; margin-top:5px;">Search<i class="glyphicon glyphicon-search"></i></button>
</form>
 </div>
 <br>
<!----------request books----->
<div class="request_books">
<div class="header" style="color:white; background-color:#87cefa;border:1px solid #26a9dd; border-radius:30%; margin-top:8px;margin-left:15px; margin-right:15px;width:80%;height:50px;">
    <h4 style="padding-left:55px;font-size:20px;margin-top:15px;">Book Request</h4>
    </div>
    <form class="example" method="post" name="form">
  <input type="text" placeholder="Enter Book_ID" name="bid" required=" " style="width:150px;  margin-top:5px;">
  <button type="submit" name="submit1" style="width:100px; margin-top:5px;"><i>Request</i></button>
</form>
</div>

<div class="header" style="margin-left:400px;width:30%;height:60px; color:black; background-color:#aa5a41;opacity:0.8; border:1px solid black; border-radius:30%; margin-top:250px;">
    <h1 style="padding-left:10px;color:White;margin-top:10px; text-align:center;">List Of Books</h1>
</div>


<div class="table1">
    

  <!-------------search-button-works--------->
    <?php
    if(isset($_POST['submit'])){
      $search=$_POST['search'];
      $sql="SELECT *from books where name like '%$search%'";
        $result=mysqli_query($db,$sql);
        //$json_array=array();
        if($result){
          echo "<table class='table table-bordered table-hover' >";
          echo "<tr style='background-color:white;'>";
          echo "<th>"; echo "ID"; echo "</th>";
          echo "<th>"; echo "Book-Name"; echo "</th>";
          echo "<th>"; echo "Authors Name"; echo "</th>";
          echo "<th>"; echo "Edition"; echo "</th>";
          echo "<th>"; echo "Status"; echo "</th>";
          echo "<th>"; echo "Quantity"; echo "</th>";
          echo "<th>"; echo "Department"; echo "</th>";
          echo "</tr>";
            while($row=mysqli_fetch_assoc($result)){
              echo "<tr>";
              echo "<td>"; echo $row['bid']; echo "</td>";
        echo "<td>"; echo $row['name']; echo "</td>";
        echo "<td>"; echo $row['authors']; echo "</td>";
        echo "<td>"; echo $row['edition']; echo "</td>";
        echo "<td>"; echo $row['status']; echo "</td>";
        echo "<td>"; echo $row['quantity']; echo "</td>";
        echo "<td>"; echo $row['department']; echo "</td>"; 
        echo "</tr>";    
            }
            echo "</table>";
          }
          else{
            alert("sorry! No book found.Try searching");
          }   
        
    }

  else{
    if($db){
        $sql="SELECT *from books";
        $result=mysqli_query($db,$sql);
        if($result){
          echo "<table class='table table-bordered table-hover' >";
          echo "<tr style='background-color:white;'>";
          echo "<th>"; echo "ID"; echo "</th>";
          echo "<th>"; echo "Book-Name"; echo "</th>";
          echo "<th>"; echo "Authors Name"; echo "</th>";
          echo "<th>"; echo "Edition"; echo "</th>";
          echo "<th>"; echo "Status"; echo "</th>";
          echo "<th>"; echo "Quantity"; echo "</th>";
          echo "<th>"; echo "Department"; echo "</th>";
          echo "</tr>";
            while($row=mysqli_fetch_assoc($result)){
              echo "<tr>";
              echo "<td>"; echo $row['bid']; echo "</td>";
        echo "<td>"; echo $row['name']; echo "</td>";
        echo "<td>"; echo $row['authors']; echo "</td>";
        echo "<td>"; echo $row['edition']; echo "</td>";
        echo "<td>"; echo $row['status']; echo "</td>";
        echo "<td>"; echo $row['quantity']; echo "</td>";
        echo "<td>"; echo $row['department']; echo "</td>"; 
        echo "</tr>";    
            }
            echo "</table>";
    }
  }
    else{
        echo "Database Connection Failed";
    }
  } 
    ?>


<!-------------request-button-works--------->
<?php
if(isset($_POST['submit1'])){

if(isset($_SESSION['login_user'])){
mysqli_query($db,"INSERT INTO `issue_book`(`roll`, `bid`, `status`, `issue`, `return_date`) 
VALUES ($_SESSION[login_user],$_POST[bid],'','','');");
echo "$_POST[bid]";
?>
<script type="text/javascript">
window.location="request.php";
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
</div>
</div>
</div>
</body>
</html>