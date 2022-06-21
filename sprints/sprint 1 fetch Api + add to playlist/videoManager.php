<?php
include 'connection.php';
include 'video.php';



$conn = new Connection();
$conn = $conn->conn;


function addtoplaylist($conn, $VideoId,$video) {
    $VideoId = $video->getVideo_Id();
    $title = $video->getTitle();
    $description =$video->getDescription();

    $sql = "INSERT INTO video (Video_Id,title,description) VALUES ($VideoId,$title,$description)";
    $result = $conn->query($sql);
    if ($result) {
        return true;
    } else {
        return false;
    }
}













?>