$(document).ready(function(){

var API_KEY="AIzaSyDx1ysoAa0fRENT09k59a4WQK0fW6dFCY0"
var video='';




$("#form").submit(function(event){

  event.preventDefault()
  alert("form is prevented")

  var search$("#search").val();
  VideoSearch(API_KEY,search,10)


})
function VideoSearch(key,search,maxResults){

  $.get("https://www.googleapis.com/youtube/v3/search?key="+key
  +"&type=video&part=snippet&maxResults="+maxResults+"&q="+search,function(data){})
  console.lof(data)
  data.items.forEach(items => {
    video=`
    <iframe width="420" height="315" src="https://www.youtube.com/embed/${items.id.videoId}" frameborder="0" allowfullscreen></iframe>`  
  $("#videos").append(video)
  });
}
});