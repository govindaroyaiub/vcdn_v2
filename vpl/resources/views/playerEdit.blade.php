@extends('layouts.app')
<!DOCTYPE html>
<html lang="en">

<head>

    @include('auth/includes/header')
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
</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">
        <!-- Sidebar -->
        @include('auth/includes/sidebar2')

        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                @include('auth/includes/topbar')
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <div class="container">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-md-12 text-center">
                                        <h3>VCDN - New Player Configurator</h3>

                                        <div id="video-wrapper">
                                            <video id="myVideo" class="video-js vjs-big-play-centered w-100" controls
                                                preload="auto" poster="" data-setup="{}">
                                                <source src="//vjs.zencdn.net/v/oceans.mp4" type="video/mp4" />
                                            </video>
                                            <img width="80" src="{{ asset('logo1.png') }}" id="logoPreview" alt="logo">
                                        </div>

                                    </div>
                                </div>

                                <div class="row mt-3">
                                    <div class="col-md-7">
                                        <div class="form-group">
                                            <label for="playerName">Player Name</label>
                                            <input id="playerName" type="text" name="playername" class="form-control" value="{{$player->name}}"
                                                placeholder="player name" />
                                        </div>

                                        <div class="form-group">
                                            <p class="text-danger">The VAST Tag will be generated for the following Client:</p>
                                            <select class="form-control select2" id="client_id"
                                                name="client_id" disabled>
                                                <option value="">Select Client
                                                </option>
                                                @foreach($client_info as $row)
                                                <option value="{{$row->id}}" @if($player['client_id'] == $row->id) selected @endif>{{$row->first_name}} {{$row->last_name}} ({{$row->company_name}})</option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <label>Action after video</label>
                                        <div class="form-group">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="DecidePER"
                                                    id="closePlayer" value="1" @if($player['decide_pre'] == 1) checked @endif/>
                                                <label class="form-check-label" for="closePlayer">Close player</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="DecidePER"
                                                    id="stopAtLast" value="2" @if($player['decide_pre'] == 2) checked @endif/>
                                                <label class="form-check-label" for="stopAtLast">Stop at last video
                                                    frame</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="DecidePER"
                                                    id="posterImg" value="3" @if($player['decide_pre'] == 3) checked @endif/>
                                                <label class="form-check-label" for="posterImg">Poster image</label>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="videoUrl">Video URL</label>
                                            <input id="videoUrl" type="text" name="videourl" class="form-control"
                                                placeholder="video url" value="{{ asset('v3.mp4') }}" />
                                        </div>

                                        <label>To test correct playback choose either</label>
                                        <div class="form-group">
                                            <div class="btn-group" role="group">
                                                <button class="btn btn-success" onclick=AddSympleUrl(1)>Vast 4.0
                                                    prefetch with video
                                                </button>
                                                <button class="btn btn-warning" onclick=AddSympleUrl(2)>Vast 4.0
                                                    prefetch - no
                                                    adressable
                                                    video
                                                </button>
                                            </div>
                                        </div>

                                        <label>Branding & Sponsor Setting</label>
                                        <div class="form-group">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="SponsorTitle"
                                                    id="sponsorTitleOn" value="true" @if($player['sponsor_title'] == 'true') checked @endif/>
                                                <label class="form-check-label" for="sponsorTitleOn">Sponsor Title
                                                    On</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="SponsorTitle"
                                                    id="sponsorTitleOff" value="false" @if($player['sponsor_title'] == 'false') checked @endif/>
                                                <label class="form-check-label" for="sponsorTitleOff">Sponsor Title
                                                    Off</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="OutstremLogo"
                                                    id="outstreamLogoOn" value="true" @if($player['outstrem_logo'] == 'true') checked @endif/>
                                                <label class="form-check-label" for="outstreamLogoOn">Outstream Logo
                                                    On</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="OutstremLogo"
                                                    id="outstreamLogoOn" value="false" @if($player['outstrem_logo'] == 'false') checked @endif/>
                                                <label class="form-check-label" for="outstreamLogoOn">Outstream Logo
                                                    Off</label>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="srcurl">Custom Vast 4.0 Tag</label>
                                            <input type="text" class="form-control" id="adsurl"
                                                value="{{$player['imaUrl']}}"
                                                placeholder="Ads url">
                                        </div>

                                        <div class="form-group d-flex justify-content-between align-content-center">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="audioOnOff"
                                                    id="audioOn" value="true" @if($player['isAudionOn'] == 'false') checked @endif/>
                                                <label class="form-check-label" for="audioOn">Audio On</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="audioOnOff"
                                                    id="audioOff" value="false" @if($player['isAudionOn'] == 'false') checked @endif/>
                                                <label class="form-check-label" for="audioOff">Audio Off</label>
                                            </div>

                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="logoOnOff"
                                                    id="logoOn" value="true" @if($player['islogoshow'] == 'true') checked @endif/>
                                                <label class="form-check-label" for="logoOn">Logo On</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="logoOnOff"
                                                    id="logoOff" value="false" @if($player['islogoshow'] == 'false') checked @endif/>
                                                <label class="form-check-label" for="logoOff">Logo Off</label>
                                            </div>

                                            <div class="form-check form-check-inline">
                                                <label class="form-check-label mr-1" for="colorPicker">Color</label>
                                                <input type="color" class="form-check-input" id="colorPicker"
                                                    name="color" pattern="^#+([a-fA-F0-9]{6}|[a-fA-F0-9]{3})$"
                                                    value="{{$player['color']}}">
                                                <div class="hex"></div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="videoUrl">Poster URL</label>
                                                    <input id="posterUrl" type="text" name="posterurl"
                                                        class="form-control" placeholder="poster url"
                                                        value="{{ $player['poster'] }}" />
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="logoUrl">Logo URL</label>
                                                    <input id="logoUrl" type="text" name="logourl" class="form-control"
                                                        placeholder="logo url" value="{{ $player['logo'] }}" />
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <button class="btn btn-info btn-block" id="previewBtn">Preview
                                                player</button>
                                        </div>
                                    </div>
                                    <div class="col-md-5 mt-3">
                                        <div class="form-group">
                                            <button type="button" onclick="savePlayer()"
                                                class="btn btn-primary btn-lg btn-block">Update
                                                Player
                                            </button>
                                        </div>

                                        <div class="form-group">
                                            <label for="code">Embed Code</label>
                                            <textarea class="form-control" name="code" id="code" cols="30"
                                                rows="10">{{ $player['iframe_code'] }}</textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->
            <!-- End of Main Content -->

            <!-- Footer -->
            @include('auth.includes.footer')
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Bootstrap core JavaScript-->
    <script src="{{ URL::to('/vendor/jquery/jquery.min.js')}}" defer></script>
    <script src="{{ URL::to('/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

    <!-- Core plugin JavaScript-->
    <script src="{{ URL::to('/vendor/jquery-easing/jquery.easing.min.js')}}"></script>

    <!-- Custom scripts for all pages-->
    <script src="{{ URL::to('/js/sb-admin-2.min.js')}}"></script>
    <script src="https://vjs.zencdn.net/7.7.5/video.js"></script>
    <script src="https://vjs.zencdn.net/ie8/1.1.2/videojs-ie8.min.js"></script>
    <script src="https://imasdk.googleapis.com/js/sdkloader/ima3.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/videojs-contrib-ads/6.6.5/videojs-contrib-ads.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/videojs-ima/1.5.0/videojs.ima.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/videojs-logobrand@1.0.3/src/videojs.logobrand.js"></script>

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
        var myPlayer = videojs("myVideo", {});
        var height, width;
        myPlayer.on('loadedmetadata', function () {
            height = this.videoHeight();
            width = this.videoWidth();
            // console.log(this.videoHeight());

        });

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

            myPlayer.play(true);

            if (audioOnOff === 'false') {
                myPlayer.muted(true);
            } else {
                myPlayer.muted(false);
            }

            if (logoOnOff == 'true') {
                document.getElementById("logoPreview").style.opacity = "1";
                logoPreview.src = logoUrl;
            } else if (logoOnOff == 'false') {
                document.getElementById("logoPreview").style.opacity = "0";
            }
        }

        previewBtn.addEventListener("click", handleInputs);

        function savePlayer() {
            var name = document.getElementById("playerName").value;
            var adsurl = document.getElementById("adsurl").value;
            var srcUrl = document.querySelector("#videoUrl").value;
            var logoUrl = document.querySelector("#logoUrl").value;
            var posterUrl = document.querySelector("#posterUrl").value;
            var color = document.getElementById("colorPicker").value;
            var audioOnOff = document.querySelector('input[name="audioOnOff"]:checked').value;
            var logoOnOff = document.querySelector('input[name="logoOnOff"]:checked').value;
            var decide_pre = document.querySelector('input[name="DecidePER"]:checked').value;
            var SponsorTitle = document.querySelector('input[name="SponsorTitle"]:checked').value;
            var OutstremLogo = document.querySelector('input[name="OutstremLogo"]:checked').value;
            var client_id = document.getElementById("client_id").value;
            var id = {{$id}};
            
            var playerData = {
                'id': id,
                'name': name,
                'src': srcUrl,
                'logo': logoUrl,
                'poster': posterUrl,
                'client_id': client_id,
                'color': color,
                'imaUrl': adsurl,
                'audioOnOff': audioOnOff,
                'logoOnOff': logoOnOff,
                'width': width,
                'height': height,
                'decide_pre': decide_pre,
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
                url: "/playerUpdate",
                data: playerData,
                cache: false,
                success: function (res) {
                    //console.log(res);
                    document.getElementById("code").value = res
                }
            });
        }

    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
    <script>
        $('.select2').select2();
    </script>

</body>

</html>
