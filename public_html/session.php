<?php
// Every page includes this php file ,so if someone without authentication tries to access any page without the
   include('config.php'); // appropriate cradentials , redirects him on index.php
   session_start();
   
   $user_check = $_SESSION['login_user'];
   
   $ses_sql = mysqli_query($db,"SELECT NAME, USERNAME FROM Teachers WHERE USERNAME = '$user_check'");
   $row = mysqli_fetch_array($ses_sql,MYSQLI_ASSOC);
   $_SESSION['NAME'] = $row['NAME'];
 
   
   if( $_SESSION['checking'] == false){ //only with correct authentication, $_SESSION['checking'] equals true
      header("location:index.php");
      die();
   }
?>