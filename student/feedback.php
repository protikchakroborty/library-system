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
    <link rel="stylesheet" href="Style.css">
    <title>Feedback</title>
    <style>
    body{
        height:1200px;
        width:100%;
        background-image: url("image/feedback.jpg");  
    background-position: center;
    background-repeat: no-repeat;
    background-size: cover;
    }
    .form-control{
        height:70px;
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
  border:5px solid #800000;
  width:80%;
  margin-top:40px;
}
th{
  background-color:#808000;
  border:2px solid black;
}
td{
  border:2px solid #800000;
}
tr:hover{
        background-color: blue;
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
                <li><a href="../login.php">LOGIN</a></li>
                <li><a href="registration.php">SIGN_UP</a></li>
                <li><a href="feedback.php">FEEDBACK</a></li> 
                </ul>
            </nav>
            <?php
          }
        ?>
    </header>
    <div style="height:200px; width:500px; color:white; background-color:#26a9dd; text-align:center; margin-left:400px; ">
    <h4>IF you have any suggestion or questions please comment below</h4>
    <form action="" method="POST">
    <br>
    Write something:<input type="text" class="form-control" name="comment" ><br><br>
    <input type="submit" name="submit" class="btn" value="COMMENT"required=""style="margin-left: 50px;">
    </form>
    </div>

    <div style="background-color:white; margin-top:200px; opacity:0.6; border:3px solid black; font-size:20px;">
    <?php
          if(isset($_POST['submit'])){
            $sql="INSERT INTO  `comments` VALUES ( '','$_POST[comment]')";
            if(mysqli_query($db,$sql)){
                $sql="SELECT comment from comments ORDER BY `id` DESC";
                $result=mysqli_query($db,$sql);
                //$json_array=array();
                if($result){
                  echo "<table class='table table-bordered table-hover' >";
                  echo "<tr style='background-color:white;'>";
                  echo "<th>"; echo "comment"; echo "</th>";
                  echo "</tr>";
                    while($row=mysqli_fetch_assoc($result)){
                      echo "<tr>";
                      echo "<td>"; echo $row['comment']; echo "</td>";
                      echo "</tr>";
                    }
        
                    echo "</table>";
                }
            }
          }
          else{

        $sql="SELECT comment from comments ORDER BY `id` DESC";
        $result=mysqli_query($db,$sql);
        $json_array=array();
        if($result){
            $i=0;
            echo "<table class='table table-bordered table-hover' >";
            echo "<tr style='background-color:white;'>";
            echo "<th>"; echo "comment"; echo "</th>";
            echo "</tr>";
              while($row=mysqli_fetch_assoc($result)){
                echo "<tr>";
                echo "<td>"; echo $row['comment']; echo "</td>";
                echo "</tr>";
              }
  
              echo "</table>";
        }

     }
    ?>
</div>
</body>
</html>