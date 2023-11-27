<?php  include("config.php");
    session_start();
    $user_name = $_SESSION['NAME'];
?>
<html>
   <body style ="background-image: url('img1.jpg');">

      <style >
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
         h3 {
            text-align:right;
            color: #fefd00;
            font-style:italic;
            border-bottom-width: medium;
            border-bottom-color: green;
            border-bottom-style: double;
         }
      </style>

         <!-- BUTTONS FOR EXIT AND GO BACK ON TEACHER.PHP -->
    <form style ="text-align:center;border-block-style: none;" action = "settings.php" method = "post">
    <input type = "submit" " value = "Exit" name = "log" style="background-color: #e800ee; padding: 3px;"/>
    <input type = "submit" " value = "Options" name = "opt" style="background-color: #e800ee; padding: 3px; "/>
    </form>
    <h3> Welcome to our site <?php echo $user_name; ?> </h3>
        <h2 style ="text-align:center; font-style:italic;"> This is the requested student </h2>

        <!-- THIS TABLE SHOWS ALL DATA ABOYT THE SELEXTED USER -->
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
   </body>
</html>
