<?php

include "config.php";



       $connect = mysqli_connect ('localhost', 'root','','goofocus');
 


 if (isset($_GET['VideoId'])) {  
      $id = $_GET['id'];  
      $query = "DELETE FROM `video` WHERE id = '$id'";  
      $run = mysqli_query($connect,$query);  
      if (  $run ) {
          echo "
           $id deleted";
         }
      
 } 

 header('location:YourPlaylist.php');  