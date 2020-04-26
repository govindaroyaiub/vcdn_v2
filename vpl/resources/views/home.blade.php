@extends('layouts.app')
<style>
    .video-js {
        width: 1140px;
        height: 400px;
    }
</style>
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="text-center">
            <p>VCDN - New Player Configurator</p>
            <video id="my_video_1" class="video-js vjs-default-skin"    preload="auto" autoplay="" muted="muted"></video>
        </div>
        <div class="col-md-8 mt-3">
          <div class="form-group">
            <label for="srcurl">Player Name</label>
            <input type="text" class="form-control" id="playername" placeholder="Player Name">
          </div>
          <div class="form-group  mb-3">
            <div class="orm-group">Action after video:</div>
            <div class="form-check form-check-inline">
              <input class="form-check-input" type="radio" name="DecidePER" id="goWay" value="1" checked>
              <label class="form-check-label" for="goWay">Close player</label>
            </div>
            <div class="form-check form-check-inline">
              <input class="form-check-input" type="radio" name="DecidePER" id="endAtLastVideoFrame" value="2">
              <label class="form-check-label" for="endAtLastVideoFrame">Stop at last video frame</label>
            </div>
            <div class="form-check form-check-inline">
              <input class="form-check-input" type="radio" name="DecidePER" id="showPoster" value="3">
              <label class="form-check-label" for="showPoster">Poster image</label>
            </div>
          </div>
          <div class="form-group">
            <label for="srcurl">Video File URL</label>
            <input type="text" class="form-control" id="srcurl" value="{{ asset('v1.mp4') }}" placeholder="Sourch url">
          </div>
          <div class="form-group">
            <label>To test correct playback choose either</label><br>
            <button class="btn btn-success" onclick=AddSympleUrl(1)>Vast 4.0 prefetch with video</button>
            <button class="btn btn-warning" onclick=AddSympleUrl(2)>Vast 4.0 prefetch - no adressable video</button>
            
          </div>

          <div class="form-group">Branding & Sponsor Setting:</div>
          <div class="row mb-3">
            <div class="col">
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="SponsorTitle" id="SponsorTitle1" value="true" checked>
                <label class="form-check-label" >Sponsor Title on</label>
              </div>
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="SponsorTitle" id="SponsorTitle2" value="false">
                <label class="form-check-label" >Sponsor Title off</label>
              </div>
            </div>
            <div class="col">
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="OutstremLogo" value="true" id="OutstremLogo1" checked>
                <label class="form-check-label">Outstream Logo on</label>
              </div>
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="OutstremLogo"  value="false" id="OutstremLogo2">
                <label class="form-check-label" >Outstream Logo off</label>
              </div>
            </div>
          </div>

          <div class="form-group">
            <label for="srcurl">Custom Vast 4.0 Tag</label>
            <input type="text" class="form-control" id="adsurl" value="https://pubads.g.doubleclick.net/gampad/ads?iu=/21759686865/P9_Test/Test_ros_outstream_alpha&description_url=[placeholder]&env=vp&impl=s&correlator=&tfcd=0&npa=0&gdfp_req=1&output=vast&sz=400x300|500x275|640x480&cust_params=is_test_environment%3Dtrue&unviewed_position_start=1" placeholder="Ads url">
          </div>

         

          <div class="row mb-3">
            <div class="col">
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="audio" id="inlineRadio1" value="true">
                <label class="form-check-label" >Audio on</label>
              </div>
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="audio" id="inlineRadio2" value="false" checked>
                <label class="form-check-label" >Audio off</label>
              </div>
            </div>
            <div class="col">
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="logoOnOff" value="true" id="inlineRadio3">
                <label class="form-check-label">Logo on</label>
              </div>
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="logoOnOff"  value="false" id="inlineRadio4" checked>
                <label class="form-check-label" >Logo off</label>
              </div>
            </div>
            <div class="col">
              <div class="form-check form-check-inline">
              <label class="form-check-label" for="colorpicker">Color:</label>
                <input type="color" class="form-check-input" id="colorpicker" name="color" pattern="^#+([a-fA-F0-9]{6}|[a-fA-F0-9]{3})$" value="#281b1b">
            </div>
            </div>
          </div>
          
          <div class="form-group mb-3">
            <label for="posterurl">Poster URL</label>
            <input type="text" class="form-control" id="posterurl" value="{{ asset('poster.png') }}"  placeholder="Poster url">
          </div>
          <div class="form-group mb-3">
            <label for="logourl">Logo URL</label>
            <input type="text" class="form-control" id="logourl" value="{{ asset('logo1.png') }}" placeholder="Logo url">
          </div>

          

      
          <button type="button" id="prePlayer" onclick="initVideoPlayer()" class="btn btn-info btn-lg btn-block mt-3">Preview Player</button>
        </div>

        <div class="col-md-4 mt-3">
          <button type="button" onclick="savePlayer()" class="btn btn-primary btn-lg btn-block">Save Player</button>

          <div class="form-group mt-3">
            <label for="code">Embed Code</label>
            <textarea class="form-control" id="code" rows="12"></textarea>
          </textarea>
        </div>
    </div>
</div>

@endsection


@section('scripts')
<script type="text/javascript">
     function AddSympleUrl(i){
        if(i ==1){
          document.getElementById("adsurl").value = 'https://pubads.g.doubleclick.net/gampad/ads?sz=640x480&iu=/124319096/external/ad_rule_samples&ciu_szs=300x250&ad_rule=1&impl=s&gdfp_req=1&env=vp&output=vmap&unviewed_position_start=1&cust_params=deployment%3Ddevsite%26sample_ar%3Dpreonly&cmsid=496&vid=short_onecue&correlator='
        }else{
          document.getElementById("adsurl").value = 'https://pubads.g.doubleclick.net/gampad/ads?iu=/21759686865/P9_Test/Test_ros_outstream_alpha&description_url=[placeholder]&env=vp&impl=s&correlator=&tfcd=0&npa=0&gdfp_req=1&output=vast&sz=400x300|500x275|640x480&unviewed_position_start=1'
        }
        
      }


</script>
 <script src="{{ asset('js/script.js') }}" defer></script>

@stop