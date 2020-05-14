<?php
    
   include("../user_dbconnection.php");
   
   session_start();
   
   $user_check = $_SESSION['login_user'];
   
   $ses_sql = mysqli_query($conn,"SELECT `userid`  FROM `newuser` WHERE  userid = '$user_check' ");
   
   $row = mysqli_fetch_array($ses_sql,MYSQLI_ASSOC);
   
   $login_session = $row['userid'];
   
   if(!isset($_SESSION['login_user'])){
      $uid=$_SESSION['login_user'];
      $sql1="UPDATE newuser set last_login=CURRENT_TIMESTAMP WHERE userid='$uid' ";
      $result1 = mysqli_query($conn,$sql1);
      header("location:../index.php");
      die();
   }
?>