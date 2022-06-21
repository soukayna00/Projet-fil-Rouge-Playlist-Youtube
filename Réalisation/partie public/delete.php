<?php

// quand l'utililisateur clique sur delete il le supprime de la base de donnée
include "config.php";


// connection à la base de donnée
       $connect = mysqli_connect ('localhost', 'root','','goofocus');
 


 if (isset($_GET['id'])) {  
      $id = $_GET['id'];  
      $query = "DELETE FROM `video` WHERE id = '$id'";  
      $run = mysqli_query($connect,$query);  
      if (  $run ) {
          echo "
           $id deleted";
         }
      
 } 

 header('location:YourPlaylist.php'); 