<?php
   $conn = mysqli_connect('localhost', 'root', '', 'goofocus');

   // check connection
 if(!$conn){
      echo 'Connection error: ' . mysqli_connect_error(); 
  }
?>