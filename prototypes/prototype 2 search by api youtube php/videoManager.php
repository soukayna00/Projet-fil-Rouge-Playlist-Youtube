<?php  

include 'video.php';

class videoManager {

  private $Connection = null;

  private function getConnection(){
      if(is_null($this->Connection)){
          $this->Connection = mysqli_connect('localhost', 'root', '', 'goofocus');

          if(!$this->Connection){
              $message = 'Connection Error: ' .mysqli_connect_error();
              throw new Exception($message);
          }
      }
      return $this->Connection;
  }


  public function insertvideo($video){
      $Video_Id = $video->getVideo_Id();
      $title = $video->getTitle();
      $description = $video->getDescription();
    

           // sql insert query
  $sqlInsertQuery = "INSERT INTO video (Video_Id, title, description) 
                      VALUES('$Video_Id', 
                              '$title,
                              '$description')";

  mysqli_query($this->getConnection(), $sqlInsertQuery);
  }


  public function deleteEmployee($id){
      $sqlDeleteQuery = "DELETE FROM video WHERE id= '$id'";

      mysqli_query($this->getConnection(), $sqlDeleteQuery);
  }


}




?>