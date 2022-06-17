<?php

include "config.php";

if (ISSET ($_GET['id'])) {
 

 $VideoId = $_GET['id'];
 $title = $_GET['title'];
 $description = $_GET['description'];

      $connect = mysqli_connect ('localhost', 'root','','goofocus');


     

     mysqli_query($connect, "INSERT INTO  video (VideoId,title,description,User_Id) values('$VideoId','$title','$description','1')");
  
     mysqli_close($connect);


 } else {'echo not registered in the database!';}




 ?> 


<!DOCTYPE html>
 <html lang="en">
 <head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/stylePlaylist.css">
    

   <title>home page</title>
 </head>
 <body>
   <header>
     <img class='logo' src="assets\img\GooFocus_free-file.png" alt="logo">
     <nav>
       <ul class="nav-links">
         <li><a href="home.php">Home</a></li>
         <li><a href="search.php">Get started</a></li>
         <li><a href="YourPlaylist.php">Your Playlist</a></li>
         <li><a href="tools.php">Your Tools</a></li>
       </ul>
     </nav>
     <a href="login.php" class="cta"><button>Login/Register</button></a>
    </header>
  

     <?php
       $connect = mysqli_connect ('localhost', 'root','','goofocus');
   $sql ="SELECT * FROM video";
$result =mysqli_query($connect,$sql);
foreach($result as $row){
 
 
?>
<div class="videoDiv ">
   <iframe id="iframe" style="width:100%;height:100%" src="//www.youtube.com/embed/ <?php echo $row['VideoId']; ?>" 
                                    data-autoplay-src="//www.youtube.com/embed/<?php echo $row['VideoId']; ?>?autoplay=1"></iframe>
                                    <?php   echo $row['title']; ?>
                                   

</div>   
<?php }?>

 </body>
 <style>
    .videoDiv{
      display: inline-block;
      width: 50%;
      height: 50%;
 </style>
</html>


     



  