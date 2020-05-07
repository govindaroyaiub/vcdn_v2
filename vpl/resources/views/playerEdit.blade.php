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
            <video id="my_video_1" class="video-js vjs-default-skin"  preload="auto" autoplay="" muted="muted"></video>
        </div>
        <div class="col-md-8 mt-3">
          <input type="text" class="form-control" id="id" value="{{$player->id}}" style="display:none">
          <div class="form-group">
            <label for="srcurl">Player Name</label>
            <input type="text" class="form-control" id="playername" value="{{$player->name}}" placeholder="Player Name">
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
              <input type="text" class="form-control" id="srcurl" value="{{$player->src}}" placeholder="Sourch url">
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
            <label for="srcurl">Ads URL</label>
              <input type="text" class="form-control" id="adsurl" value="{{$player->imaUrl}}" placeholder="Ads url">
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
                <input class="form-check-input" type="radio" name="logoOnOff" value="true" id="inlineRadio3" checked>
                <label class="form-check-label">Logo on</label>
              </div>
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="logoOnOff"  value="false" id="inlineRadio4">
                <label class="form-check-label" >Logo off</label>
              </div>
            </div>
            <div class="col">
              <div class="form-check form-check-inline">
              <label class="form-check-label" for="colorpicker">Color:</label>
                <input type="color" class="form-check-input" id="colorpicker" name="color" pattern="^#+([a-fA-F0-9]{6}|[a-fA-F0-9]{3})$" value="{{$player->color}}">
            </div>
            </div>
          </div>

          <div class="form-group mb-3">
            <label for="posterurl">Poster URL</label>
              <input type="text" class="form-control" id="posterurl" value="{{$player->poster}}"  placeholder="Poster url">
          </div>
          <div class="form-group mb-3">
            <label for="logourl">Logo URL</label>
              <input type="text" class="form-control" id="logourl" value="{{$player->logo}}" placeholder="Logo url">
          </div>

          <button type="button" id="prePlayer" onclick="initVideoPlayer()" class="btn btn-secondary btn-lg btn-block">Preview Player</button>
        </div>

        <div class="col-md-4 mt-3">
          <button type="button" onclick="savePlayer()" class="btn btn-secondary btn-lg btn-block">Update Player</button>

          <div class="form-group mt-3">
            <label for="code">Embed Code</label>
            <textarea class="form-control" id="code" rows="12"></textarea>
        </div>
    </div>
</div>

@endsection


@section('scripts')
<script type="text/javascript">



</script>
 <script src="{{ asset('js/edit.js') }}" defer></script>

@stop
