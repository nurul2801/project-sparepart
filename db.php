<?php

  $dbhost = "localhost";
  $dbname = "asidatabase";
  $dbusername = "root";
  $dbpassword = "";

  $conn = new PDO("mysql:host=$dbhost;dbname=$dbname",$dbusername,$dbpassword);

?>