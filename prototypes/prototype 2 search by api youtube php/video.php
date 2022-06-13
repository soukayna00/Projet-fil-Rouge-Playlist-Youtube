<?php

class video{
  private $id;
  private $Video_Id;
  private $title;
  private $description;

  
      public function getId(){
        return $this->id;
      }
      public function setId($id){
        $this->id = $id;
      }
     
      public function getVideo_Id(){
        return $this->Video_Id;
      }
      public function setVideo_Id($Video_Id){
        $this->Video_Id = $Video_Id;
      }
      public function getTitle(){
        return $this->title;
      }
      public function setTitle($title){
        $this->title = $title;
      }
      public function getDescription(){
        return $this->description;
      }
      public function setDescription($description){
        $this->description = $description;
      }





}























?>