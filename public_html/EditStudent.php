<?php
    include("config.php");
    include('session.php');
    session_start();
  

    if($_SERVER["REQUEST_METHOD"] == "POST") {
      $idstu = $_SESSION['ID'];
      $name = test_input($_POST["name"]);
      $surname = test_input($_POST["surname"]);
      $fathername = test_input($_POST["fathername"]);
      $grade = test_input($_POST["grade"]);
      $mobnum = test_input($_POST["mobnum"]);
      $birthday = test_input($_POST["birthday"]);
   
         // Values update
         $sql = "UPDATE  Students SET NAME ='$name', SURNAME ='$surname', FATHERNAME ='$fathername', GRADE = '$grade',
         MOBILENUMBER ='$mobnum', Birthday = '$birthday'
         WHERE ID = '$idstu' ";

         if(mysqli_query($db,$sql) ){
            $msg ="student UPDATED succsessful";
         }else{
            $error= "Your data are incorrect.Please check your data form." ;
         }
         

      
   }else{
   $idstu = $_SESSION['ID'];
   $sql = "SELECT * FROM Students WHERE ID = $idstu"; //Find this student
      $result = $db->query($sql);

      while($row = $result->fetch_array()){
        $name = $row["NAME"];
        $surname =   $row["SURNAME"];
        $fathername =$row["FATHERNAME"];
        $grade = $row["GRADE"];
        $mobnum = $row["MOBILENUMBER"];
        $birthday = $row["Birthday"];
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
            font-style:italic;
            border-bottom-width: medium;
            color: #fefd00;
            border-bottom-color: green;
            border-bottom-style: double;
         }
         form {
            text-align:center;
            border-width: medium;
            border-color: orangered;
            border-block-style: double;
         }
         input {
            padding: 1px;
            
         }
         p {
            color:#ff0000;
         }
      </style>
      
      <h3> Welcome to our site <?php echo $_SESSION['NAME']; ?> </h3>
     <!-- BUTTONS FOR EXIT AND GO BACK ON TEACHER.PHP -->
      <form style ="text-align:left;border-block-style: none;" action = "settings.php" method = "post">
         <input type = "submit" " value = "Exit" name = "log" style="background-color: #e600ee; padding: 3px;"/>
         <input type = "submit" " value = "Options" name = "opt" style="background-color: #e600ee; padding: 3px; "/>
      </form>

   <form action = "" method = "post">
        <p style = "font-size:15px; color:008000; font-style:italic;" ><?php echo $msg;?></p> 
        <p style = "font-size:15px; color:#cc000c; font-style:italic;"><?php echo $error; ?></p>

        <p>Name</p><input type="text" name="name" value =<?php echo  $name;?>><br>
        <p>Surname</p><input type="text" name="surname" value =<?php echo  $surname;?>><br>
        <p>Fathername  </p><input type="text" name="fathername" value =<?php echo  $fathername;?>><br>
        <p>Grade</p><input type="text" name="grade" value =<?php echo  $grade;?>><br>
        <p>Mobile Number</p> <input type="text" name="mobnum" value =<?php echo  $mobnum;?>><br>
        <p>Birthday</p> <input type="text" name="birthday" value =<?php echo  $birthday;?>><br>
        <input type="submit" value ="Edit">  
   </form>
  
</body>  
</html>