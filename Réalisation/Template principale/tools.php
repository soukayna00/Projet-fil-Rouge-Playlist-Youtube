<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    
    
    <link rel="stylesheet" href="css/styleTimer.css">
   
   <title>Tools page</title>
 </head>
 <body>
   <header>
            <!-- navbar -->

     <img class='logo' src="assets\img\GooFocus_free-file.png" alt="logo">
     <nav>
       <ul class="nav-links">
         <li><a href="home.php"style="color:white;">Home</a></li>
         <li><a href="search.php">Get started</a></li>
         <li><a href="YourPlaylist.php"style="color:white;">Your Playlist</a></li>
         <li><a href="tools.php"style="color:white;">Your Tools</a></li>
         
         
       </ul>
     </nav>
     <a href="login-register.html" class="cta"><button>Login/Register</button></a>
   </header>
<br>
                
    <!-- container 1           -->

  <div class="content">
    <h3>keep your Study hours on track by setting a timer </h3>
        <video id="backcontent" src="assets\video\production ID_4778714.mp4" muted loop autoplay plays-inline 
        ></video>
        <div id="timer">
          <span id="hours">00:</span>
          <span id="mins">00:</span>
          <span id="seconds">00</span>  
        </div>
        <br>
        <div id="controls">
        <button  id="start">Start</button>
        <button class="material-stop" id="stop">Stop</button>
        <button id="reset">Reset</button>
        <br><br>
        </div>
  </div>
  <script src="js/tools.js"></script>
    </body>

    <!-- footer -->

	
   


</html>
</html>





