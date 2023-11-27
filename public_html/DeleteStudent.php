<?php  include("config.php");
include("session.php");
    session_start();
    $user_name =$_SESSION['NAME'];

    if($_SERVER["REQUEST_METHOD"] == "POST") {
        $idstu = $_SESSION['ID']; // Take the inserted id from Teachers.php
        
        $sql = "DELETE FROM Students WHERE ID = '$idstu' ";
         if(mysqli_query($db,$sql) ){ // Execute delete query
            $msg ="student deleted succsessful";
         }else{
            $error= "Error: " . $sql . "<br>" . mysqli_error($db);
         }
     }

?>
<html>
   <body style ="background-image: url('img1.jpg');">
      <style >
      h3 {
            text-align:right;
            color: #fefd00;
            font-style:italic;
            border-bottom-width: medium;
            border-bottom-color: green;
            border-bottom-style: double;
         }
         table {
         align:right;
         font-family: arial, sans-serif;
         border-collapse: collapse;
         width: 70%;
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
         </style>
          <h3> Welcome to our site <?php echo $user_name ?> </h3>
          <!-- BUTTONS FOR EXIT AND GO BACK ON TEACHER.PHP -->
        <form style ="text-align:center;border-block-style: none;" action = "settings.php" method = "post">
        <input type = "submit" " value = "Exit" name = "log" style="background-color: #e800ee; padding: 3px;"/>
        <input type = "submit" " value = "Options" name = "opt" style="background-color: #e800ee; padding: 3px; "/>
        </form>

         <h2 style ="text-align:center;"> Confirm this student for deletion? </h2>
         <p><?php echo $msg; ?> </p>
         <!-- SAME TABLE FROM SEARCH STUDENT. WE USE IT TO PROJECT ALL DATA FOR DELETED STUDENT -->
        <table > 
        <tr>
            <th>ID</th>
            <th>NAME</th>
            <th>SURNAME</th>
            <th>FATHERNAME</th>
            <th>GRADE</th>
            <th>MOBILE NUMBER</th>
            <th>Birthday</th>
        </tr>
        <?php
            $idstu = $_SESSION['ID'];
            $sql = "SELECT * FROM Students WHERE ID = $idstu"; //Find this student
            $result = mysqli_query($db,$sql);
            if($result->num_rows > 0){
                while($row=$result->fetch_assoc()){
                    echo "<tr><td>". $row["ID"] ."</td><td>". $row["NAME"]. "</td><td>". $row["SURNAME"] ."</td><td>". $row["FATHERNAME"] ."</td><td>". $row["GRADE"] ."</td><td>". $row["MOBILENUMBER"] ."</td><td>". $row["Birthday"] ."</td><tr>";
                }
                echo "</table>" ;
            }
        ?>
        <br></br>
        <!-- DELETE CONFIRMATION BUTTON -->
        <form style ="text-align:center;border-block-style: none;" action = "" method = "post">
            <input type = "submit" " value = "Delete" name = "del" style="background-color: #e800ee; padding: 10px; font-size:15px; "/>
        </form>
   </body>
</html>
