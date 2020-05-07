@extends('layouts.app')
<style>
    #video-wrapper {
        transition: all .2s;
        position: relative;
    }

    #logoPreview {
        top: 0;
        left: 0;
        position: absolute;
        opacity: 0;
        visibility: hidden;
    }

    #video-wrapper:hover #logoPreview {
        opacity: 1;
        visibility: visible;
    }
</style>

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-12 text-center">
                        <h3>VCDN - New Player Configurator</h3>

                        <div id="video-wrapper">
                            <video id="myVideo" class="video-js vjs-big-play-centered w-100" controls preload="auto"
                                   poster=""
                                   data-setup="{}">
                                <source src="//vjs.zencdn.net/v/oceans.mp4" type="video/mp4"/>
                            </video>
                            <img width="80" src="{{ asset('logo1.png') }}" id="logoPreview" alt="logo">
                        </div>

                    </div>
                </div>

                <div class="row mt-3">
                    <div class="col-md-7">
                        <div class="form-group">
                            <label for="playerName">Player Name</label>
                            <input id="playerName" type="text" name="playername" class="form-control"
                                   placeholder="player name"/>
                        </div>

                        <label>Action after video</label>
                        <div class="form-group">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="DecidePER" id="closePlayer" checked
                                       value="1"/>
                                <label class="form-check-label" for="closePlayer">Close player</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="DecidePER" id="stopAtLast"
                                       value="2"/>
                                <label class="form-check-label" for="stopAtLast">Stop at last video frame</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="DecidePER" id="posterImg" value="3"/>
                                <label class="form-check-label" for="posterImg">Poster image</label>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="videoUrl">Video URL</label>
                            <input id="videoUrl" type="text" name="videourl" class="form-control"
                                   placeholder="video url" value="{{ asset('v3.mp4') }}"/>
                        </div>

                        <label>To test correct playback choose either</label>
                        <div class="form-group">
                            <div class="btn-group" role="group">
                                <button class="btn btn-success" onclick=AddSympleUrl(1)>Vast 4.0 prefetch with video
                                </button>
                                <button class="btn btn-warning" onclick=AddSympleUrl(2)>Vast 4.0 prefetch - no
                                    adressable
                                    video
                                </button>
                            </div>
                        </div>

                        <label>Branding & Sponsor Setting</label>
                        <div class="form-group">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="SponsorTitle" id="sponsorTitleOn"
                                       checked
                                       value="on"/>
                                <label class="form-check-label" for="sponsorTitleOn">Sponsor Title On</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="SponsorTitle" id="sponsorTitleOff"
                                       value="off"/>
                                <label class="form-check-label" for="sponsorTitleOff">Sponsor Title Off</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="OutstremLogo" id="outstreamLogoOn"
                                       checked value="on"/>
                                <label class="form-check-label" for="outstreamLogoOn">Outstream Logo On</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="OutstremLogo" id="outstreamLogoOn"
                                       value="off"/>
                                <label class="form-check-label" for="outstreamLogoOn">Outstream Logo Off</label>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="adsUrl">Custom Vast 4.0 Tag</label>
                            <input type="text" class="form-control" name="adsUrl" id="adsUrl"
                                   value="https://pubads.g.doubleclick.net/gampad/ads?iu=/21759686865/P9_Test/Test_ros_outstream_alpha&description_url=[placeholder]&env=vp&impl=s&correlator=&tfcd=0&npa=0&gdfp_req=1&output=vast&sz=400x300|500x275|640x480&cust_params=is_test_environment%3Dtrue&unviewed_position_start=1"
                                   placeholder="Ads url">
                        </div>

                        <div class="form-group d-flex justify-content-between align-content-center">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="audioOnOff" id="audioOn" checked
                                       value="on"/>
                                <label class="form-check-label" for="audioOn">Audio On</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="audioOnOff" id="audioOff"
                                       value="off"/>
                                <label class="form-check-label" for="audioOff">Audio Off</label>
                            </div>

                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="logoOnOff" id="logoOn" value="on"/>
                                <label class="form-check-label" for="logoOn">Logo On</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="logoOnOff" id="logoOff" checked
                                       value="off"/>
                                <label class="form-check-label" for="logoOff">Logo Off</label>
                            </div>

                            <div class="form-check form-check-inline">
                                <label class="form-check-label mr-1" for="colorPicker">Color</label>
                                <input type="color" class="form-check-input" id="colorPicker" name="color"
                                       pattern="^#+([a-fA-F0-9]{6}|[a-fA-F0-9]{3})$" value="#000000">
                                <div class="hex"></div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="videoUrl">Poster URL</label>
                                    <input id="posterUrl" type="text" name="posterurl" class="form-control"
                                           placeholder="poster url" value="{{ asset('poster.png') }}"/>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="logoUrl">Logo URL</label>
                                    <input id="logoUrl" type="text" name="logourl" class="form-control"
                                           placeholder="logo url" value="{{ asset('logo1.png') }}"/>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <button class="btn btn-info btn-block" id="previewBtn">Preview player</button>
                        </div>
                    </div>
                    <div class="col-md-5 mt-3">
                        <div class="form-group">
                            <button type="button" onclick="savePlayer()" class="btn btn-primary btn-lg btn-block">Save
                                Player
                            </button>
                        </div>

                        <div class="form-group">
                            <label for="code">Embed Code</label>
                            <textarea class="form-control" name="code" id="code" cols="30" rows="10"></textarea>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script type="text/javascript">
        function AddSympleUrl(i) {
            if (i == 1) {
                document.getElementById("adsurl").value =
                    'https://pubads.g.doubleclick.net/gampad/ads?sz=640x480&iu=/124319096/external/ad_rule_samples&ciu_szs=300x250&ad_rule=1&impl=s&gdfp_req=1&env=vp&output=vmap&unviewed_position_start=1&cust_params=deployment%3Ddevsite%26sample_ar%3Dpreonly&cmsid=496&vid=short_onecue&correlator='
            } else {
                document.getElementById("adsurl").value =
                    'https://pubads.g.doubleclick.net/gampad/ads?iu=/21759686865/P9_Test/Test_ros_outstream_alpha&description_url=[placeholder]&env=vp&impl=s&correlator=&tfcd=0&npa=0&gdfp_req=1&output=vast&sz=400x300|500x275|640x480&unviewed_position_start=1'
            }
        }
    </script>
    <script>
        var myVideo = document.querySelector("#myVideo");
        var playerName = document.querySelector("#playerName");
        var posterUrl = document.querySelector("#posterUrl");
        var colorPicker = document.querySelector("#colorPicker");
        var srcUrl = document.querySelector("#videoUrl").value;
        var adsUrl = document.querySelector("#adsUrl");
        var previewBtn = document.querySelector("#previewBtn");
        var DecidePER = document.querySelector('input[name="DecidePER"]:checked').value;
        var SponsorTitle = document.querySelector('input[name="SponsorTitle"]:checked').value;
        var OutstremLogo = document.querySelector('input[name="OutstremLogo"]:checked').value;
        var audioOnOff = document.querySelector('input[name="audioOnOff"]:checked').value;
        var logoOnOff = document.querySelector('input[name="logoOnOff"]:checked').value;

        var myPlayer = videojs("myVideo", {});


        function handleInputs() {
            var logoPreview = document.querySelector("#logoPreview");
            var logoUrl = document.querySelector("#logoUrl").value;
            var videoUrl = document.querySelector("#videoUrl").value;
            var actionAfterVideo = document.querySelector('input[name="DecidePER"]:checked').value;
            var sponsorTitle = document.querySelector('input[name="SponsorTitle"]:checked').value;
            var outstremLogo = document.querySelector('input[name="OutstremLogo"]:checked').value;
            var audioOnOff = document.querySelector('input[name="audioOnOff"]:checked').value;
            var logoOnOff = document.querySelector('input[name="logoOnOff"]:checked').value;

            var colorPickerValue = () => colorPicker.value;
            colorPicker.addEventListener("input", colorPickerValue, false);

            myPlayer.src(videoUrl || '');
            logoPreview.src = logoUrl;

            myPlayer.play(true);

            if (audioOnOff === 'off') {
                myPlayer.muted(true);
            } else {
                myPlayer.muted(false);
            }
        }

        previewBtn.addEventListener("click", handleInputs);

        var height, width;

        myPlayer.on('loadedmetadata', function () {
            height = this.videoHeight();
            width = this.videoWidth();
        });

        function savePlayer() {
            var playerData = {
                'id': 0,
                'name': name,
                'src': srcUrl,
                'logo': logoUrl,
                'poster': posterUrl,
                'color': colorPicker,
                'imaUrl': adsUrl,
                'audioOnOff': audioOnOff,
                'logoOnOff': logoOnOff,
                'width': width,
                'height': height,
                'decide_pre': DecidePER,
                'sponsor_title': SponsorTitle,
                'outstrem_logo': OutstremLogo,
            };

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
                success: function (res) {
                    //console.log(res);
                    document.getElementById("code").value = res
                }
            });
        }
    </script>
@endsection



