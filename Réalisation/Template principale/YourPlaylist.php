<?php


// si le bouton est cliqué ajoute a la base de données
if (ISSET ($_GET['id'])) {
 

  $VideoId = $_GET['id'];
  $title = $_GET['title'];
  $description = $_GET['description'];
 
       $connect = mysqli_connect ('localhost', 'root','','goofocus');
 
 
      
 
      mysqli_query($connect, "INSERT INTO  video (VideoId,title,description,User_Id) values('$VideoId','$title','$description','1')");
   
      mysqli_close($connect);
 
 
  } else {'echo not registered in the database!';}

// if (ISSET ($_GET['id'])) {
 

//   $VideoId = $_GET['id'];
//   $title = $_GET['title'];
//   $description = $_GET['description'];
  
 

      
         
//       mysqli_query($connect, "DELETE FROM  video WHERE id='$id'");
   
//       mysqli_close($connect);
 
 
//   } else {'echo not registered in the database!';}
 


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
  <div class=title style="text-align:center">
  <h2>Here is your playlist </h2>
  </div>

     <?php
    //  afficher les video ajouter à la base de donnée

       $connect = mysqli_connect ('localhost', 'root','','goofocus');
   $sql ="SELECT * FROM video";
$result =mysqli_query($connect,$sql);

foreach($result as $row){
  // print_r($row);
?>
<div class='container'>
 <div class="videoDiv"> 

   <iframe id="iframe" style="width:100%;height:100%" src="//www.youtube.com/embed/<?php echo $row['VideoId']; ?>" 
   data-autoplay-src="//www.youtube.com/embed/<?php echo $row['VideoId']; ?>?autoplay=1"></iframe>
                                    <?php   echo $row['title']; ?>
                                     <br><br>
 
 
</div> 
<a  href="delete.php?id=<?php echo $row['id']?>">Delete</a></form>   
</div>
<?php }?>

 </body>
 <style>
  
  .heading{
  color: rgb(36, 29, 29);
  font-size: 40px;
  text-align: center;
  padding: 10px;
}

body{
  background-color: #eee;
}
.container{
  display: grid;
  grid-template-columns: 2fr 1fr ;
  gap :8px;
  align-items: flex-start;
  /* padding:5px 5; */

}
.videoDiv{
width:800px;
height: 400px;
}
     
    
 </style>
</html>


     

    

  