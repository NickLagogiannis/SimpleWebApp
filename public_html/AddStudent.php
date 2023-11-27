<?php
    include("config.php");
    include('session.php');
    session_start();
    $user_name = $_SESSION['NAME'];

  

    if($_SERVER["REQUEST_METHOD"] == "POST") {
      
      $idstu = test_input($_POST["idstu"]);
      $name = test_input($_POST["name"]);
      $surname = test_input($_POST["surname"]);
      $fathername = test_input($_POST["fathername"]);
      $grade = test_input($_POST["grade"]);
      $mobnum = test_input($_POST["mobnum"]);
      $birthday = test_input($_POST["birthday"]);
   
         
   // check ID valididty 

      $sql = "SELECT ID , NAME FROM Students WHERE ID = $idstu"; //check if there is already an ID like this
      $result = $db->query($sql);
      $count =0;
      
      $count = mysqli_num_rows($result);
      if($count>0){
         $error ='There is already a children with this ID';
      }
      else{
         // Values insertion
         $sql = "INSERT INTO Students (ID, NAME, SURNAME, FATHERNAME, GRADE, MOBILENUMBER, Birthday)
         VALUES ('$idstu', '$name', '$surname', '$fathername', '$grade', '$mobnum' ,'$birthday')";

         if(mysqli_query($db,$sql) ){
            $msg ="new student created succsessful";
         }else{
            $error= "Your data are incorrect.Please check your data form." ;
         }


      }

      
   }
  
  function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }
    

?>
<html>
   <body style ="background-image: url('img1.jpg');">
      <style >
         table {
         align:center;
         font-family: arial, sans-serif;
         border-collapse: collapse;
         width: 50%;
         background-color: #ffffb3;
         }

         td, th {
            
         border: 1px solid #dddddd;
         text-align: center;
         padding: 8px;
         width: 50%;
         }

         tr:nth-child(even) {
         background-color: #ccccff;
         }
         h3 {
            text-align:right;
            color: #fefd00;
            font-style:italic;
            border-bottom-width: medium;
            border-bottom-color: green;
            border-bottom-style: double;
         }
         form {
            text-align:center;
            border-width: medium;
            border-color: orangered;
            border-block-style: double;
         }
         
         p {
            color:#ff0000;
         }
      </style>
      
      <h3> Welcome to our site <?php echo $user_name ?> </h3>
      <!-- BUTTONS FOR EXIT AND GO BACK ON TEACHER.PHP -->
      <form style ="text-align:left;border-block-style: none;" action = "settings.php" method = "post">
         <input type = "submit" " value = "Exit" name = "log" style="background-color: #e600ee; padding: 3px;"/>
         <input type = "submit" " value = "Options" name = "opt" style="background-color: #e600ee; padding: 3px; "/>
      </form>

      <form action = "" method = "post">
      <p style = "font-size:15px; color:008000; font-style:italic;" ><?php echo $msg;?></p> 
         <p>Student Id</p><input type="text" name="idstu"><br>
         <div style = "font-size:15px; color:#cc000c; margin-top:10px"><?php echo $error; ?></div>
         <p>Name</p><input type="text" name="name"><br>
         <p>Surname</p><input type="text" name="surname"><br>
         <p>Fathername  </p><input type="text" name="fathername"><br>
         <p>Grade</p><input type="text" name="grade"><br>
         <p>Mobile Number</p> <input type="text" name="mobnum"><br>
         <p>Birthday</p> <input type="text" name="birthday"><br>
         <input type="submit" value ="Add Student">
         
      </form>

</body>

   
   
</html>