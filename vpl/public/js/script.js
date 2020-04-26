var srcUrl = document.getElementById("srcurl").value;
var adsurl = document.getElementById("adsurl").value;
var logoUrl = document.getElementById("logourl").value;
var posterUrl = document.getElementById("posterurl").value;
var color = document.getElementById("colorpicker").value;
var audioOnOff =  $('input[name="audio"]:checked').val();
var logoOnOff =  $('input[name="logoOnOff"]:checked').val();


var video_setup = { 
  'autoplay':true,
  'controls': false,
  'playbackRates': [0.5, 0.75, 1, 1.25, 1.5, 1.75, 2, 3],
  'poster': posterUrl
}


var player = videojs('my_video_1',video_setup);
player.src({type: 'video/mp4', src:srcUrl });
// ads
 var options = {
  id: "my_video_1",
  adTagUrl: adsurl
};
// This must be called before player.play() below.
if(adsurl !=""){
 player.ima(options);
}


var height,width;
player.on('loadedmetadata', function() {
  height = this.videoHeight();
  width = this.videoWidth();
  console.log(this.videoHeight());
  
});
// end ads

function initVideoPlayer() {
    player.ready(function() {
      if(audioOnOff == 'true'){
        console.log('if audioOnOff');
        console.log("d",player2.muted());
        player.muted(true);
      }else{
        console.log('else audioOnOff',audioOnOff);
        player.muted(true);
      }

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
        $("#vjs-logobrand-image-destination").hide();
      }
      document.getElementsByClassName("vjs-poster")[0].removeAttribute("style"); 
      document.getElementsByClassName("vjs-poster")[0].setAttribute("style", "background-image: url("+posterUrl+")");

      // ads
      if(adsurl !=""){
        var newUrl = document.getElementById("adsurl").value;
        player.ima.changeAdTag(newUrl); // really null
        player.ima.requestAds();
     
      }
      // end ads
      var element = document.getElementById("my_video_1");
      element.setAttribute('style', 'color:'+color+'!important');
      player.on(['loadstart', 'play', 'playing', 'firstplay', 'pause', 'ended', 'adplay','adserror', 'adplaying', 'adfirstplay', 'adpause', 'adended', 'contentplay', 'contentplaying', 'contentfirstplay', 'contentpause', 'contentended'], function (e) {
          if(e.type == 'adserror'){
            $("#my_video_1").hide();
          }
          console.info(e.type);
      });
      player.play()
      
  });
            

}

function savePlayer(){
  console.log('df',height,width);
  var name = document.getElementById("playername").value;
  var adsurl = document.getElementById("adsurl").value;
  var srcUrl = document.getElementById("srcurl").value;
  var logoUrl = document.getElementById("logourl").value;
  var posterUrl = document.getElementById("posterurl").value;
  var color = document.getElementById("colorpicker").value;
  var audioOnOff =  $('input[name="audio"]:checked').val();
  var logoOnOff =  $('input[name="logoOnOff"]:checked').val();
  var decide_pre =  $('input[name="DecidePER"]:checked').val();

  var SponsorTitle =  $('input[name="SponsorTitle"]:checked').val();
  var OutstremLogo =  $('input[name="OutstremLogo"]:checked').val();


  // var dataString = 'src=' + srcUrl + '&logo=' + logoUrl + '&poster=' + posterUrl + '&width=' + width + '&height=' + height + '&color='+color + '&imaUrl='+adsurl;

  var playerData = {
    'id': 0,
    'name':name,
    'src': srcUrl,
    'logo': logoUrl,
    'poster': posterUrl,
    'color': color,
    'imaUrl': adsurl,
    'audioOnOff': audioOnOff,
    'logoOnOff': logoOnOff,
    'width': width,
    'height': height,
    'decide_pre':decide_pre,
    'sponsor_title':SponsorTitle,
    'outstrem_logo':OutstremLogo,
};
  // console.log(adsurl)
  $.ajaxSetup({
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
  });
  $.ajax({
    type: "POST",
    url: "/savePlayer",
    data: playerData,
    cache: false,
    success: function(res) {
        //console.log(res);
        document.getElementById("code").value = res
    }
  });

}
