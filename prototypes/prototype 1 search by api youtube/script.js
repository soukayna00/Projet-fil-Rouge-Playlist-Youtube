// $(document).ready(function(){

//   var API_KEY="AIzaSyDdi8y1wCTzDGzluQ3rEEYlg5qrFZ00ttU"
//   var video='';
  
  
  
  
//   $("#form").submit(function(event){
  
//     event.preventDefault()
    
  
//     var search = $("#search").val();
//     VideoSearch(API_KEY,search,20)
  
  
//   })
//   function VideoSearch(key,search,maxResults){
  
//     $.get("https://www.googleapis.com/youtube/v3/search?key="+key
//     +"&type=video&part=snippet&maxResults="+maxResults+"&q="+search,function(data){
//       console.log(data)
//       data.items.forEach(items => {
//         video=`
//         <iframe width="420" height="315" src="https://www.youtube.com/embed/${items.id.videoId}" frameborder="0" allowfullscreen></iframe>
//         <button class='addtoplay'>Add to playlist</button>`  
       
//       $("#videos").append(video)
//       });
//     })
 
//   }
//    function AddTplaylist(){
        
//    }



// })