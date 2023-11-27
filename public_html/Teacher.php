<?php
   include('session.php');
   session_start();
   $user_name = $_SESSION['NAME'];
?>
<html>
   <body style ="background-image: url('img1.jpg');">
      <style >
         table {
         align:center;
         font-family: arial, sans-serif;
         border-collapse: collapse;
         width: 50%;
         background-color: #daa520;
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
            color:#fefd00;
            font-style:italic;
            border-bottom-width: medium;
            border-bottom-color: green;
            border-bottom-style: double;


         }
         form {
            text-align:center;
            border-width: medium;
            border-color: green;
            borders-style: double;
         }
         input {
            padding: 8px;
            
         }
      </style>
      <h3> Welcome to our site <?php echo $user_name; ?> </h3>
      <h4>Insert the id for the student you want to edit,delete or search. For insertion just press the Insert button. </h4>
      <!-- BUTTONS CREATION -->
      <form action = "settings.php" method = "post">
         <input type = "submit" " value = "Insert Student" name = "ins" style="background-color: #e600ee; "/>
         <input type = "submit" " value = "Delete Student" name = "del" style="background-color: #e600ee; "/>
         <input type = "submit" " value = "Edit Student" name = "edi" style="background-color: #e600ee; "/>
         <input type = "submit" " value = "Search Student" name = "sea" style="background-color: #e600ee; "/>
         <input type = "submit" " value = "Log out" name = "lgt" style="background-color: #e600ee; "/><br></br>
         <input type="text" name="ID">
      </form>
         <!-- THIS TABLE SHOWS SOME INORMATION ABOUT ALL STUDENTS HELPING USERS TO FIND IDs -->
   <table>
   <tr>
      <th>ID</th>
      <th>NAME</th>
      <th>SURNAME</th>
   </tr>
   <?php
      $sql = "SELECT * FROM Students";
      $result = mysqli_query($db,$sql);
      if($result->num_rows > 0){
         while($row=$result->fetch_assoc()){
            echo "<tr><td>". $row["ID"] ."</td><td>". $row["NAME"]. "</td><td>". $row["SURNAME"] ."</td><tr>";
           
         }
         echo "</table>" ;
      }
   ?>
</body>

   
   
</html>