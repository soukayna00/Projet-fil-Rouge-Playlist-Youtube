<?php

       
if (ISSET ($_GET['id'])) {
 


  $VideoId = $_GET['id'];
  $title = $_GET['title'];
  $description = $_GET['description'];

       $connect = mysqli_connect ('localhost', 'root','','goofocus');


      

      mysqli_query($connect, "INSERT INTO  video (VideoId,title,description,User_Id) values('$VideoId','$title','$description','1')");
   
      mysqli_close($connect);


  } else {'echo not registered in the database!';}




 ?> 