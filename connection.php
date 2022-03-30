<?php
   $server="localhost";
   $user_name="root";
   $password="";
   $database="library";
   $db=mysqli_connect($server,$user_name,$password,$database);

   if(!$db)
{
   // die("Connection to this database failed due to ".mysqli_connect_error());
}
else{
   // echo "connected successfully";
}
?>