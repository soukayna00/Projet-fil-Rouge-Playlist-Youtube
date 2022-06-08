<?php
$url = "https://www.googleapis.com/youtube/v3/search?key=AIzaSyDdi8y1wCTzDGzluQ3rEEYlg5qrFZ00ttU&type=video&part=snippet&maxResutls=10+&q";


$handle = curl_init();

curl_setopt($handle,CURLOPT_URL, $url);
curl_setopt($handle,  CURLOPT_RETURNTRANSFER, TRUE);

/* Get the HTML or whatever is linked in $url. */
// $response = curl_exec($url);

/* Check for 404 (file not found). */
// $httpCode = curl_getinfo($handle, CURLINFO_HTTP_CODE);
$res = curl_exec($handle);
print_r($res);

curl_close($handle);

?>