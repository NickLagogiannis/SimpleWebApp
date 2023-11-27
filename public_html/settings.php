<?php
   include('session.php');
session_start();
   if($_POST['ins']){
      header("location: AddStudent.php");
   }
   elseif($_POST['edi']){  //EDIT STUDENT

      $temp =$_POST['ID'];
      $sql = "SELECT ID  FROM Students WHERE ID = $temp"; //check if there is already an ID like this
         $result = $db->query($sql);
         
         $count =0;
         if(!$result){
            header("location: Teacher.php"); // If there is no id
         }
         $count = mysqli_num_rows($result);
         if($count==0){
      
            header("location: Teacher.php"); // If id does not exist
      
         }else{
            while($row = $result->fetch_array()){  //If id is ok
               $_SESSION['ID']= $row["ID"];               
         }

            header("location: EditStudent.php");
         }
   

   }
   elseif($_POST['del']){  //DELETE STUDENT
      $temp =$_POST['ID'];
      $sql = "SELECT ID  FROM Students WHERE ID = $temp"; //check if there is already an ID like this
      $result = $db->query($sql);
      if(!$result){
         header("location: Teacher.php");
      }
      $count =0;
      
      $count = mysqli_num_rows($result);
      if($count==0){
   
         header("location: Teacher.php");
   
      }else{
         while($row = $result->fetch_array()){
            $_SESSION['ID']= $row["ID"];
      }

      header("location: DeleteStudent.php");
      }
      
      
   }
   elseif($_POST['sea']){
      $temp =$_POST['ID'];
      $sql = "SELECT ID  FROM Students WHERE ID = $temp"; //check if there is already an ID like this
      $result = $db->query($sql);
      if(!$result){
         header("location: Teacher.php");
      }
      $count =0;
      
      $count = mysqli_num_rows($result);
      if($count==0){
   
         header("location: Teacher.php");
   
      }else{
         while($row = $result->fetch_array()){
            $_SESSION['ID']= $row["ID"];
      }

      header("location: SearchStudent.php");
      }
   
      
   }
   elseif($_POST['opt']){  //FOR OPTIONS BUTTON
      header("location: Teacher.php");
      
   }
   else{
      header("location: logout.php");
      
   }
?>
<html">
   <body>
      <h2><a href = "logout.php">Sign Out</a></h2>
   </body>
   
</html>