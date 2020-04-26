
<?php


if (isset($_SERVER['HTTP_REFERER'])) {
  $domain = parse_url($_SERVER['HTTP_REFERER']);
  $url = urlencode($domain['scheme']."://".$domain['host']);
  \Log::info($url);
}
else{
  $url = "https%3A%2F%2Fvcdn.planetnine.com";
}
?>
<html lang="en">
<head>
<meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">
  <!-- <script src="{{ asset('js/videojs-ie8.min.js') }}"></script> -->
  <script src="{{ asset('js/video.js') }}"></script>
  <script src="{{ asset('js/videojs-logobrand.js') }}"></script>




  <!-- Styles -->
  <link href="{{ asset('css/app.css') }}" rel="stylesheet">
  <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
  <link href="{{ asset('css/custom.css') }}" rel="stylesheet">
  <link href="{{ asset('css/video-js.css') }}" rel="stylesheet">
  <link href="{{ asset('css/videojs.ads.css') }}" rel="stylesheet">
  <link href="{{ asset('css/videojs.ima.min.css') }}" rel="stylesheet">
  <link href="{{ asset('css/videojs.logobrand.css') }}" rel="stylesheet">
<style>
    .emptyAdHide{ display:none !important}
     body{
      padding: 0px !important;
      margin: 0px !important;
    }
    .video-js{
      width: 100%;
      height:100vh
    }

    .sponsored-text{
      display: flex;
    }

    .sponsored-text hr, .sponsored-text p{
      display: inline-block;
      vertical-align: middle;
    }

    .sp-text{
      color: gray;
      text-align: center;
      padding-bottom: 0px !important;
      margin-bottom: 0px !important;
      padding-top: 5px;
      font-size:x-small;
    }

    .hr1{
      width: 38%;
    }
    .p-brand{
      color: gray;
      display: -webkit-flex; /* Safari */
      -webkit-flex-direction: row-reverse; /* Safari 6.1+ */
      display: flex;
      flex-direction: row-reverse;
      font-size:x-small;
      padding-top:10px !important;
      padding-bottom:10px !important;
    }

    .video-js { height: 380px;}

    @media only screen and (max-width: 600px) {
      .sp-text{
       font-size: 8px;
       margin-bottom: 0px;
       padding-top: 5px;
      }
      .hr1{
        width: 33%;
      }
      .video-js { height: 280px;}
    }
</style>
<head>
<body class='<?php if(!isset($data->imaUrl)){ echo"emptyAdHide";} ?>'>
<div class="sponsored-text" id="sponsored_text_{{$p}}">
  <hr size="1" class="hr1" align="left" style="color: gray;">
  <p class="sp-text">sponsored content</p>
  <hr id="line" class="hr1" size="1" align="right" width="34%" style="color: gray;">
</div>
<video id="my_video_{{$p}}" class="video-js vjs-default-skin vjs-tech vjs-fluid" preload="auto" autoplay muted data-setup='' playsinline webkit-playsinline> </video>
<div class="p-brand" id="p_brand_{{$p}}">
  <div><img src="{{ asset('planetnine_logo_gray.png') }}" width="160px"></div>
  <div>outstream by</div>
</div>



<!-- Scripts -->
<script src="{{ asset('js/jquery.min.js') }}"></script>
<!-- <script src="{{ asset('js/bootstrap.min.js') }}" defer></script> -->
  <script type="text/javascript" src="//imasdk.googleapis.com/js/sdkloader/ima3.js"></script>
  <script src="{{ asset('js/videojs.ads.min.js') }}"></script>
  <script src="{{ asset('js/videojs.ima.js') }}"></script>
<script type="text/javascript">

var endVideo;
var iframeH = 0 // default heifht 460
function initVideoPlayer() {
  var AdoriUrl = "<?= $data->imaUrl ?>";
  var encodeUrl = "<?= $url ?>";
  var res = AdoriUrl.replace("description_url=[placeholder]", "description_url="+encodeUrl);
  var srcUrl = "{{$data->src}}";
  var imaUrl = "<?= $data->imaUrl ?>";
  console.log("ad requested url--->", res)
  var height = "<?= $data->height ?>";
  var logoUrl = "{{$data->logo}}";
  var posterUrl = "{{$data->poster}}";
  var color = "{{$data->color}}";
  var audioOnOff = "{{$data->isAudionOn}}";
  var logoOnOff = "{{$data->islogoshow}}";
  var decide_pre = "{{$data->decide_pre}}";
  var sponsor_title = "{{$data->sponsor_title}}";
  var outstrem_logo = "{{$data->outstrem_logo}}";
  var video_setup = {
    'controls': false,
    'playbackRates': [0.5, 0.75, 1, 1.25, 1.5, 1.75, 2, 3],
    'poster': posterUrl
  }


  videojs('my_video_{{$p}}', video_setup, function() {
    var player = this;

    if(sponsor_title === 'false'){
      console.log('sponsor_title',sponsor_title);
      $(".sponsored-text").hide();
    }else{
      console.log('outstrem_logo',sponsor_title);
      $(".sponsored-text").show();
    }
    if(outstrem_logo === 'false'){
      console.log('outstrem_logo',outstrem_logo);
      $(".p-brand").hide();
    }else{
      console.log('outstrem_logo',outstrem_logo);
      $(".p-brand").show();
    }


    if(logoOnOff === 'true'){
      console.log('logoOnOff if');
      player.logobrand({
        height: "100px",
        width: "100px",
        image: logoUrl, //image to use "http://localhost/video-js/graphics.png"
        destination: "#" //destination when clicked
      });
    }

    player.on('ended', function() {
      player.exitFullscreen();
      player.hasStarted(false);
    });

    player.on(['loadstart', 'play', 'playing', 'firstplay', 'pause', 'ended', 'adplay','adserror', 'adplaying', 'adfirstplay', 'adpause', 'adended', 'contentplay', 'contentplaying', 'contentfirstplay', 'contentpause', 'contentended'], function(e) {
      if(e.type == "loadstart"){

        if (e.target.offsetHeight>0) {
          iframeH = (e.target.offsetHeight+70)+"px" // (e.target.offsetHeight+50)+"px"
        }else{
          iframeH = "0px"
        }
        console.warn('VIDEOJS player offsetHeight: ',  e.target.offsetHeight,iframeH);
      }

    });

    // ads

    var options = {
      id: "my_video_{{$p}}",
      vpaidMode: google.ima.ImaSdkSettings.VpaidMode.INSECURE,
      adTagUrl: imaUrl,
    };


    // This must be called before player.play() below.
    try {
      if(imaUrl !=""){
        player.ima(options);
        //window.top.postMessage({'dis':'contents','height': iframeH, 'id':{{$data->id}}}, "*");
      }
    }catch(err) {
      window.top.postMessage({'dis':'contents','height':'0px','id':{{$data->id}}}, "*");
      $('#p_brand_{{$p}}').hide(100);
      $('#my_video_{{$p}}').hide(100);
      $('#sponsored_text_{{$p}}').hide(100);
      console.log('player.ima catch',err)
    }


    player.src({type: 'video/mp4', src:srcUrl });
    var element = document.getElementById("my_video_{{$p}}");
    element.setAttribute('style', 'color:'+color+'!important');

    player.on(['loadstart', 'play', 'playing', 'firstplay', 'pause', 'ended', 'adplay','adserror', 'adplaying', 'adfirstplay', 'adpause', 'adended', 'contentplay', 'contentplaying', 'contentfirstplay', 'contentpause', 'contentended'], function (e) {
      if(e.type == 'playing'){
        iframeH = 460
      }
      if(e.type == 'adserror'){
        endVideo ="end"
        window.top.postMessage({'dis':'contents','height':'0px','id':{{$data->id}}}, "*");
        $('#p_brand_{{$p}}').hide(100);
        $('#my_video_{{$p}}').hide(100);
        $('#sponsored_text_{{$p}}').hide(100);
        console.info(e.type);
      }
      // at end ads show poster
      if((decide_pre !=null || decide_pre !="0") && decide_pre == "3"){
        if(e.type == 'playing'){
          console.info(e.type,decide_pre);
          this.pause();
          this.currentTime(0);
          document.getElementsByClassName("vjs-poster")[0].setAttribute("style", "background-image: url("+posterUrl+");display:block !important");
        }
      }
      // at end player hide
      if((decide_pre !=null || decide_pre !="0") && decide_pre == "1"){
        if(e.type == 'playing'){
          player.pause()
          $('#p_brand_{{$p}}').hide(1000);
          $('#my_video_{{$p}}').hide(1000);
          $('#sponsored_text_{{$p}}').hide(1000);
          endVideo ="end"
          console.info(e.type);
        }
      }

    });


  // at end player puase last frame
  player.on('ads-manager', function(response){

    if((decide_pre !=null || decide_pre !="0") && decide_pre == "2"){
      interval = setInterval(() => {
        console.log("getRemainingTime",response.adsManager.getRemainingTime())
        if (response.adsManager.getRemainingTime() <= 1) {
          clearInterval(interval);
          console.log("getRemainingTime",response.adsManager.getRemainingTime())
          player.ima.pauseAd();
          $('.ima-controls-div').hide();
        }
      }, 500);
    }
  })

      // player.play() //start on load

  });



}
initVideoPlayer();


setInterval(function() {
  if(endVideo =="end"){
   window.top.postMessage({'dis':'contents','height':'0px','id':{{$data->id}}}, "*");
  }else{
    window.top.postMessage({'dis':'block','height':iframeH,'id':{{$data->id}}}, "*");
  }
}, 1000);


</script>

</body>
</html>
