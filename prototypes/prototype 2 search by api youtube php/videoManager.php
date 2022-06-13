<?php  

include 'video.php';

class videoManager {

  private $Connection = null;

  private function getConnection(){
      if(is_null($this->Connection)){
          $this->Connection = mysqli_connect('localhost', 'maskoul', 'test123', 'employees_db');

          if(!$this->Connection){
              $message = 'Connection Error: ' .mysqli_connect_error();
              throw new Exception($message);
          }
      }
      return $this->Connection;
  }

}


?>