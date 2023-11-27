<?
   include("config.php"); //Used for database connection
   session_start();
   
   if($_SERVER["REQUEST_METHOD"] == "POST") {
      // username and password sent from form 
      
      $myusername = mysqli_real_escape_string($db,$_POST['username']);
      $mypassword = mysqli_real_escape_string($db,$_POST['password']); 
      
      $sql = "SELECT ID, NAME FROM Teachers WHERE USERNAME = '$myusername' and PASSWORD = '$mypassword'";
      $result = mysqli_query($db,$sql);
      while($row = $result->fetch_array()){
         $mymane = $row['NAME'];
         
   }
     
      
      $count = mysqli_num_rows($result);
      
      // If result matched $myusername and $mypassword, table row must be 1 row
      $_SESSION['checking'] = false;
      if($count == 1) {
         $_SESSION['login_user'] = $myusername;
         $_SESSION['NAME'] = $myname;
         $_SESSION['checking'] = true; // When $myusername and $mypassword are matched,  makes this value as true , 
         header("location: Teacher.php"); // where it is used in session.php
      }else {
         $error = "Your Login Name or Password is invalid";
      }
   }
?>
<html>
      
      <style>
         body {
            background-image: url("img1.jpg");
            font-family:Arial, Helvetica, sans-serif;
            font-size:14px;
            
         }
         label {
            font-weight:bold;
            width:100px;
            font-size:14px;
         }
         .box {
          
            border:#666666 solid 1px;
         }
      </style>
   
   <body bgcolor = "#FFFFFF">
	
      <div align = "center">
         <div style = "width:400px; height:50%; border: solid 1px #333333; background-color:#FFFFFF;" align = "left">
            <div style = "background-color:#333333; color:#FFFFFF; padding:3px;"><b>Login</b></div>
				
            <div style = "margin:20%" >
               
               <form action = "" method = "post">
                  <label>UserName  :</label><input type = "text" name = "username" class = "box"/><br /><br />
                  <label>Password  :</label><input type = "password" name = "password" class = "box" /><br/><br />
                  <input type = "submit" value = " Submit "/><br />
               </form>
               
               <div style = "font-size:15px; color:#cc000c; margin-top:10px"><?php echo $error; ?></div>
					
            </div>
				
         </div>
			
      </div>

   </body>
</html>

