<?php  include "connection.php";


?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="C:\xampp\htdocs\Projet fil Rouge Playlist Youtube\Réalisation\Template principale\css\styleHome.css">
</head>
<body>
  
</body>

</head>
 <body>
   <header>
     <img class='logo' src="assets\img\GooFocus_free-file.png" alt="logo">
     <nav>
       <ul class="nav-links">
         <li><a href="./index.php">Home</a></li>
         <li><a href="./playlistpage.html">Your Playlist</a></li>
         <li><a href="tools.html">Your Tools</a></li>
         <li><a href="aboutUs.html">About Us</a></li>
       </ul>
     </nav>
     <a href="login-register.html" class="cta"><button>Login/Register</button></a>
   </header>
   <?php
   $sql ="SELECT * FROM video";
$result =mysqli_query($conn,$sql);
foreach($result as $row){
 
 
?>
<div class="videoDiv ">
   <iframe id="iframe" style="width:100%;height:100%" src="//www.youtube.com/embed/ <?php echo $row['VideoId']; ?>" 
                                    data-autoplay-src="//www.youtube.com/embed/<?php echo $row['VideoId']; ?>?autoplay=1"></iframe>
                                    <?php   echo $row['title']; ?>
                                   

                                    </div>   
<?php }?>
<style>
     .videoDiv {
                width: 250px;
                height: 150px;
                display: inline-block;
            }
</style>
 </body>
 
</html>