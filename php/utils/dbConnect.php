<?php
  function dbConnect() {
      $servername = "localhost:3306";
      $username = "root";
      $password = "";
      $dbname = "cafe";
      $conn = new mysqli($servername, $username, $password, $dbname);
      if ($conn->connect_error) {
          echo "Connection failed:. $conn->connect_error<br>";
          return False;
      } else {
          return $conn;
      }
  }
?>