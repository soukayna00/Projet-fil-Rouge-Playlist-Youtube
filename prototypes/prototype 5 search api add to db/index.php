
<?php

include 'connection.php';


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
// when click on button addto playlist sends data to database
       
//  if (ISSET ($_POST['AddToPlaylist'])) {

//     $VideoId = $_GET['VideoId'];
//     $title = $_GET['title'];
//     $description = $_GET['description,'];


//         $connect = mysqli_connect ('localhost', 'root','', 'goofocus');

//         mysqli_query ($connect, "INSERT INTO  video (VideoId,title,'description') values ($VideoId,$title,$description)");

//         mysqli_close($connect);


//     } else {'echo not registered in the database!';}
    
            
?>
<!doctype html>
<html>
    <head>
        <title>Search Videos </title>

        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

        <style>

            body {
                font-family: Arial;
                width: 900px;
                padding: 10px;
            }
            .search-form-container {
                background: #F0F0F0;
                border: #e0dfdf 1px solid;
                padding: 20px;
                border-radius: 2px;
            }
            .input-row {
                margin-bottom: 20px;
            }
            .input-field {
                width: 100%;
                border-radius: 2px;
                padding: 10px;
                border: #e0dfdf 1px solid;
            }
            .btn-submit {
                padding: 10px 20px;
                background: #333;
                border: #1d1d1d 1px solid;
                color: #f0f0f0;
                font-size: 0.9em;
                width: 100px;
                border-radius: 2px;
                cursor:pointer;
            }
            .videos-data-container {
                background: #F0F0F0;
                border: #e0dfdf 1px solid;
                padding: 20px;
                border-radius: 2px;
            }
            
            .response {
                padding: 10px;
                margin-top: 10px;
                border-radius: 2px;
            }

            .error {
                 background: #fdcdcd;
                 border: #ecc0c1 1px solid;
            }

           .success {
                background: #c5f3c3;
                border: #bbe6ba 1px solid;
            }
            .result-heading {
                margin: 20px 0px;
                padding: 20px 10px 5px 0px;
                border-bottom: #e0dfdf 1px solid;
            }
            iframe {
                border: 0px;
            }
            .video-tile {
                display: inline-block;
                margin: 10px 10px 20px 10px;
            }
            
            .videoDiv {
                width: 250px;
                height: 150px;
                display: inline-block;
            }
            .videoTitle {
                text-overflow: ellipsis;
                white-space: nowrap;
                overflow: hidden;
            }
            
            .videoDesc {
                text-overflow: ellipsis;
                white-space: nowrap;
                overflow: hidden;
            }
            .videoInfo {
                width: 250px;
            }
        </style>
        
    </head>
    <body>
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
<br>
</html>
        <h2>Search Videos by keyword using YouTube Data API V3</h2>
        <div class="search-form-container">
            <form id="keywordForm" method="post" action="">
                <div class="input-row">
                    Search Keyword : <input class="input-field" type="search" id="keyword" name="keyword"  placeholder="Enter Search Keyword">
                </div>

                <input class="btn-submit"  type="submit" name="submit" value="Search">
            </form>
        </div>
        
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
                            <iframe id="iframe" style="width:100%;height:100%" src="//www.youtube.com/embed/ <?php echo $videoId; ?>" 
                                    data-autoplay-src="//www.youtube.com/embed/<?php echo $videoId; ?>?autoplay=1"></iframe>                     
                        </div>
                        <div class="videoInfo">
                        <div class="videoTitle"><b><?php echo $title; ?></b></div>
                        <div class="videoDesc"><?php echo $description; ?></div>
                       <a href="addtoplaylist.php?id=<?php echo $videoId; ?>&title=<?php echo $title; ?>&description=<?php echo $description; ?>"> <button type='submit' name="AddToPlaylist">+</button></a>
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