<?php
   define('DB_SERVER', 'db');
   define('DB_USERNAME', 'devuser');
   define('DB_PASSWORD', 'devpass');
   define('DB_DATABASE', 'schoolbase');
   $db = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);
?>