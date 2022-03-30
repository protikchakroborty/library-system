<?php
    SESSION_START();
    if(isset($_SESSION['login_user'])){
        unset($_SESSION['login_user']) ;
    }
    header("location:../Home.php");
?>