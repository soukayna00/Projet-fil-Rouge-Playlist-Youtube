
<?php

include 'config.php';


    define("MAX_RESULTS", 40);
    
     if (isset($_POST['submit']) )
     {
        $keyword = $_POST['keyword'];
               
        if (empty($keyword))
        {
            $response = array(
                  "type" => "error",
                  "message" => "Please enter the keyword."
                );
        } 
    }

            
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel='stylesheet' href='css/search.css'>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <title>search</title>
</head>
<body>
<body>
<!-- nav bar start -->
<nav>
<img class='logo' src="assets\img\GooFocus_free-file.png" alt="logo">
    <ul>
     <li><a href="home.php">Home</a></li>
     <li><a href="search.php">Get started</a></li>
     <li><a href="YourPlaylist.php">Your Playlist</a></li>
     <li><a href="tools.php">Your Tools</a></li>
    </ul>

 <a href="login.php" class="cta"><button>Login/Register</button></a>
 </nav>
  <style>
    @import url('https://fonts.googleapis.com/css2?family=DM+Serif+Display:ital@0;1&family=Poppins:wght@200&family=Roboto&family=Rosarivo:ital@1&family=Rozha+One&display=swap');


    * {
      font-family: poppins;
    }
    nav>ul>li>a {

      text-decoration: none;
      color: black;
    }
    nav {

      display: flex;
      justify-content: space-between;
      align-items: center;
      height: 70px;
      width: 100%;
      position: sticky;
      top: 0;
      left: 0;
      z-index: 1;
    }
    .logo{
  cursor: pointer; 

}
    nav ul {
      list-style: none;
      display: flex;
      align-items: center;
      margin: 0;
      padding: 0;
      
    }
    nav>ul>li {
      width: 150px;
    }
    nav img {
      /* background-color: antiquewhite; */
      margin-left: 30px;
    }
    nav>a button {
      /* background-color: #c9c9c9; */
      color: white;
      border: none;
      padding: 10px;
      font-size: 15px;
      border-radius: 5px;
      margin-right: 30px;
    }
  </style>
<!-- nav bar end -->



<br>
</body>
</html>

<div class="container">

        <div class="search-form-container">
        <h1 id='title'>Search on Goofocus</h1>
            <form id="keywordForm" method="post" action="">
                <div class="input-row">
                <input class="input-field" type="search" id="keyword" name="keyword"  placeholder="Please search the subject you want to study"></div>
                <input class="btn-submit"  type="submit" name="submit" value="Search">
              </form></div>
        <!-- <div class="imagegetstarted">
        <img  src="assets\img\cta.png" style="width:200px ;" alt="hello"></div>
  </div> -->
        
        <?php if(!empty($response)) { ?>
                <div class="response <?php echo $response["type"]; ?>"> <?php echo $response["message"]; ?> </div>
        <?php }?>

        <?php
            if (isset($_POST['submit']) )
            {
                                         
              if (!empty($keyword))
              {
                $apikey = 'AIzaSyDdi8y1wCTzDGzluQ3rEEYlg5qrFZ00ttU'; 
                $googleApiUrl = 'https://www.googleapis.com/youtube/v3/search?part=snippet&q=' . preg_replace('/\s+/', '+', $keyword) . '&maxResults=' . MAX_RESULTS . "&type=video" . '&key=' . $apikey;

                // initialisation a cURL session

                $ch = curl_init();

                curl_setopt($ch, CURLOPT_HEADER, 0);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
                curl_setopt($ch, CURLOPT_URL, $googleApiUrl);
                curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
                curl_setopt($ch, CURLOPT_VERBOSE, 0);
                curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
                $response = curl_exec($ch);

                curl_close($ch);
                $data = json_decode($response);
                $value = json_decode(json_encode($data), true);
            ?>

            <div class="result-heading">About <?php echo MAX_RESULTS; ?> Results</div>
            <div class="videos-data-container" id="SearchResultsDiv">

            <?php
                if(isset($value)){
                for ($i = 0; $i < MAX_RESULTS; $i++) {
                    if(isset($value['items'][$i]['id']['videoId'])){
                        $videoId = $value['items'][$i]['id']['videoId'];
                    }
                    $title = $value['items'][$i]['snippet']['title'];
                    $description = $value['items'][$i]['snippet']['description'];
                    ?> 
    
                        <div class="video-tile">
                        <div  class="videoDiv">
                            <iframe id="iframe" style="width:100%;height:100%" src="//www.youtube.com/embed/<?php echo $videoId;?>" 
                                    data-autoplay-src="//www.youtube.com/embed/<?php echo $videoId;?>?autoplay=1"></iframe>                     
                        </div>
                        <div class="videoInfo">
                        <div class="videoTitle"><b><?php echo $title; ?></b></div>
                        <div class="videoDesc"><?php echo $description; ?></div>
                       <a href="YourPlaylist.php?id=<?php echo $videoId; ?>&title=<?php echo $title; ?>&description=<?php echo $description; ?>"> <button type='submit' name="AddToPlaylist">+</button></a>
                        </div>
                        </div>
           <?php 
                    }
                }
                } 
           
            }
            ?> 
            
        </div>
        
    
        
     
    </body>
</html>














