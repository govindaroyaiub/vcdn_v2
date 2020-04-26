
function initVideoPlayer() {

  console.log('ads',document.getElementById("adsurl").value)
 
  
  var srcUrl = document.getElementById("srcurl").value;
  var adsurl = document.getElementById("adsurl").value;
  var logoUrl = document.getElementById("logourl").value;
  var posterUrl = document.getElementById("posterurl").value;
  var width = document.getElementById("width").value;
  var height = document.getElementById("height").value;
  var color = document.getElementById("colorpicker").value;
  var audioOnOff =  $('input[name="audio"]:checked').val();
  var logoOnOff =  $('input[name="logoOnOff"]:checked').val();
  

  
  var video_setup = { 
                      'autoplay': true,
                      'controls': false,
                      'playbackRates': [0.5, 0.75, 1, 1.25, 1.5, 1.75, 2, 3],
                      'poster': posterUrl
                      }
            
  var video = videojs('my_video_1', video_setup, function () {
      
      var player = this;

      player.reset()

      if(audioOnOff === 'true'){
        console.log('if');
        player.autoplay('unmuted');
      }else{
        console.log('else');
        player.autoplay('muted');
      }
     
      

      player.width(width);
      player.height(height);
      
      if(logoOnOff === 'true'){
        console.log('logoOnOff if');
        player.logobrand({
          height: "100px",
          width: "100px",
          image: logoUrl, //image to use "http://localhost/video-js/graphics.png"
          destination: "#" //destination when clicked
        });
      }else{
        console.log('logoOnOff else');
        document.getElementById("vjs-logobrand-image-destination").style.display = "none";
      }
      document.getElementsByClassName("vjs-poster")[0].removeAttribute("style"); 
      document.getElementsByClassName("vjs-poster")[0].setAttribute("style", "background-image: url("+posterUrl+")");

      
      player.on('ended', function () {
          console.log('[initVideoPlayer] video ended listener');
          player.exitFullscreen();
          player.hasStarted(false);
      });


  
      // ads
    
      var options = {
        id: "my_video_1",
        adTagUrl: adsurl,
        nativeControlsForTouch: false,
      };
   
      // This must be called before player.play() below.
      if(adsurl !=""){
        
        player.ima(options);
        // Remove controls from the player on iPad to stop native controls from stealing
        // our click
        var contentPlayer =  document.getElementById('my_video_1_html5_api');
       
        if ((navigator.userAgent.match(/iPad/i) ||
              navigator.userAgent.match(/Android/i)) &&
            contentPlayer.hasAttribute('controls')) {
          contentPlayer.removeAttribute('controls');
        }

        // Initialize the ad container when the video player is clicked, but only the
        // first time it's clicked.
        var initAdDisplayContainer = function() {
          player.ima.initializeAdDisplayContainer();
          wrapperDiv.removeEventListener(startEvent, initAdDisplayContainer);
        }

        var startEvent = 'click';
        if (navigator.userAgent.match(/iPhone/i) ||
            navigator.userAgent.match(/iPad/i) ||
            navigator.userAgent.match(/Android/i)) {
          startEvent = 'touchend';
        }

        var wrapperDiv = document.getElementById('my_video_1');
        wrapperDiv.addEventListener(startEvent, initAdDisplayContainer);
       
      }
      // end ads

      // myPlayer.src({type: "video/mp4", src: videoSrc});'http://localhost/video-js/v1.mp4'
      player.src({type: 'video/mp4', src:srcUrl });
      var element = document.getElementById("my_video_1");
      element.setAttribute('style', 'color:'+color+'!important');

      player.on(['loadstart', 'play', 'playing', 'firstplay', 'pause', 'ended', 'adplay','adserror', 'adplaying', 'adfirstplay', 'adpause', 'adended', 'contentplay', 'contentplaying', 'contentfirstplay', 'contentpause', 'contentended'], function (e) {
        if(e.type == 'adserror'){
          $('#my_video_1').hide();
        }
       
        console.info(e.type);
    });
      player.ready(function () {
        player.play() //start on load
        document.querySelector('#my_video_1_ima-mute-div').click();
        
      })

     
     

    //   player.on("adserror", function(){
    //     console.log('df')
    //     player.ima.changeAdTag(adTagUrl);
    //     player.ima.requestAds();
    //     player.play();
    // });

      


});

}
initVideoPlayer();


function savePlayer(){
  var adsurl = document.getElementById("adsurl").value;
  var srcUrl = document.getElementById("srcurl").value;
  var logoUrl = document.getElementById("logourl").value;
  var posterUrl = document.getElementById("posterurl").value;
  var width = document.getElementById("width").value;
  var height = document.getElementById("height").value;
  var color = document.getElementById("colorpicker").value;

  // var dataString = 'src=' + srcUrl + '&logo=' + logoUrl + '&poster=' + posterUrl + '&width=' + width + '&height=' + height + '&color='+color + '&imaUrl='+adsurl;

  var playerData = {
    'src': srcUrl,
    'logo': logoUrl,
    'poster': posterUrl,
    'width': width,
    'height': height,
    'color': color,
    'imaUrl': adsurl,
};
  // console.log(adsurl)
  $.ajax({
    type: "POST",
    url: "save.php",
    data: {pData:playerData},
    cache: false,
    success: function(res) {
        //console.log(res);
        document.getElementById("code").value = res
    }
  });



//   $.post('save.php',  {pData: playerData}, function(response){
//     /* do something with response if needed*/
//     document.getElementById("code").value = res
//  });
}