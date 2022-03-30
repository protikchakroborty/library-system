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
.table1{
  width:100%;
  background-image: url("image/home.jpg");  
    background-position: center;
    background-repeat: no-repeat;
    background-size: cover;
    height:1200px;
}
.extend{
  margin-top:20px;
    width:250px;
    height:250px;
    float:left;
    border:5px solid #800000;
    background-color:#26a9dd;
    border-radius:10%;
    margin-left:30px;
    padding-top:20px;
    opacity:0.8;
}
.srch{
    width:250px;
    height:250px;
    float:right;
    border:5px solid #aa5a41;
    background-color:#26a9dd;
    border-radius:10%;
    padding-top:17px;
    margin-right:30px;
    opacity:75%;
    margin-top:20px;
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
              <h2>LIBRARY MANAGEMENT SYSTEM</h2>       </div>


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

    <div class="table1">
    <!---------side bar-------->
<div id="mySidenav" class="sidenav">
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
  <div class="h"><a href="books.php">Books</a></div>
  <div class="h"><a href="request.php">Book Request</a></div>
  <div class="h"><a href="issue_info.php">Issue Information</a></div>
  <div class="h"><a href="expired.php">Expired List</a></div>
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
  <span style="font-size:30px;cursor:pointer;float:left;color:white;" onclick="openNav()">&#9776; open</span>
<div class="extend">
    <div class="header" style="color:black; background-color:#87cefa; border:1px solid black; border-radius:30%; margin:20px;">
    <h3 style="padding-left:40px;">Extend date</h3>
    </div>
    <form method="POST" action="" name="form1" style="padding-left:30px; color:black">
      <input type="text" name="roll1" placeholder="roll" required="" style="margin-top:5px;border-radius:20%"><br>
      <input type="text" name="bid" placeholder="BID" required="" style="margin-top:5px; border-radius:20%"><br>
      <input type="text" name="return" placeholder="Return Date yyyy-mm-dd" required="" style="margin-top:5px; border-radius:20%"><br><br>
      <button name="submit1" type="submit" style="color:black; margin-left:60px ;margin-top:2px; border-radius:30%">Submit</button><br>
</form>
</div>
<?php
if(isset($_SESSION['login_user'])){
if(isset($_POST['submit1'])){
  mysqli_query($db,"UPDATE issue_book SET `status`='yes',`return_date`='$_POST[return]' 
  Where roll='$_POST[roll1]' and status='expired' and bid='$_POST[bid]';");
}
}
  ?>
  <div class="srch">
<div class="header" style="color:black; background-color:#87cefa; border:1px solid black; border-radius:30%; margin:20px;">
    <h3 style="padding-left:40px;">Return Book</h3>
</div>
    <form method="POST" action="" name="form1" style="padding-left:30px; color:black">
    <input type="text" name="roll1" placeholder="roll" required="" style="margin-top:5px;border-radius:20%"><br>
      <input type="text" name="bid" placeholder="BID" required="" style="margin-top:5px; border-radius:20%"><br>
      <button name="submit2" type="submit" style="color:black; margin-left:60px ;margin-top:10px; border-radius:30%">Submit</button><br>
</form>
</div>
<?php
if(isset($_SESSION['login_user'])){
if(isset($_POST['submit2'])){
    //echo  $_POST['roll2'];
    //echo $_POST['bid'];
  mysqli_query($db,"UPDATE issue_book SET status='returned' Where roll='$_POST[roll2]' and status='expired' and 
  bid='$_POST[bid]';");
  mysqli_query($db,"UPDATE books SET quantity=quantity+1 Where bid='$_POST[bid]';");
}
}
  ?>
<div class="header" style="margin-left:400px;width:30%;height:60px; color:black; background-color:#aa5a41;opacity:0.8; border:1px solid black; border-radius:30%; margin-top:350px;">
    <h1 style="padding-left:10px;color:White;margin-top:10px; text-align:center;">List Of Books</h1>
</div>
<div class="table2">

<?php
if(isset($_SESSION['login_user'])){
    ?>
    </br>
    <?php
    echo "<table>";
    $c=0;
    $sql="SELECT username,student.roll,books.bid,name,issue_book.status,authors,edition,issue,issue_book.return_date FROM student
    join issue_book using (roll) join books USING (bid) WHERE issue_book.status='expired'  
    ORDER BY issue_book.return_date ASC ";
    $result=mysqli_query($db,$sql);
    
        if($result){
          echo "<table class='table table-bordered table-hover' >";
          echo "<tr style='background-color:white;'>";
          echo "<th>"; echo "User-Name"; echo "</th>";
          echo "<th>"; echo "Roll"; echo "</th>";
          echo "<th>"; echo "ID"; echo "</th>";
          echo "<th>"; echo "Book-Name"; echo "</th>";
          echo "<th>"; echo "Status"; echo "</th>";
          echo "<th>"; echo "Authors Name"; echo "</th>";
          echo "<th>"; echo "Edition"; echo "</th>";
          echo "<th>"; echo "issue-date"; echo "</th>";
          echo "<th>"; echo "Return-date"; echo "</th>";
          echo "</tr>";
            while($row=mysqli_fetch_assoc($result)){
              echo "<tr>";
              echo "<td>"; echo $row['username']; echo "</td>";
              echo "<td>"; echo $row['roll']; echo "</td>";
              echo "<td>"; echo $row['bid']; echo "</td>";
        echo "<td>"; echo $row['name']; echo "</td>";
        echo "<td>"; echo $row['status']; echo "</td>";
        echo "<td>"; echo $row['authors']; echo "</td>";
        echo "<td>"; echo $row['edition']; echo "</td>";
        echo "<td>"; echo $row['issue']; echo "</td>";
        echo "<td>"; echo $row['return_date']; echo "</td>"; 
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
<h3>you need to login to see the issue informatiom</h3>;
<?php
}
?>



</div>
</div>
</div>
</body>
</html>