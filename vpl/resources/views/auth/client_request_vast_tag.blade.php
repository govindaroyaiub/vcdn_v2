<!DOCTYPE html>
<html lang="en">

<head>

    @include('auth/includes/header')

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        @include('auth/includes/sidebar')
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                @include('auth/includes/topbar')
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container">

                    <!-- Outer Row -->
                    <div class="row justify-content-center">

                        <div class="col-xl-6 col-lg-6 col-md-6">

                            <div class="card o-hidden border-0 shadow-lg my-5">
                                <div class="card-body p-0">
                                    <!-- Nested Row within Card Body -->
                                    <div class="row">
                                        <div class="col-lg-15">
                                            <div class="p-5">
                                                <div class="text-center">
                                                    <h1 class="h4 text-gray-900 mb-4">VAST Tag Request</h1>
                                                </div>
                                                <hr>
                                                @include('auth/includes/alert')
                                                <ul>
                                                    <li>Please provide the download URL of the assets <br> (video,
                                                        poster, logo etc) in the <b> URL </b> box.</li>
                                                    <li>The requested data will be submitted and we will generate the
                                                        <b>VAST Tag </b>.</li>
                                                    <li>After submitting the credentials, please keep an eye out in <b> Dashboard, My VAST Tags </b> section.</li>
                                                    <li>If there is anything that you would like to mention please,
                                                        write in the <b> Comment </b> box.</li>
                                                </ul>
                                                <hr>
                                                <form class="user" action="/request-vast-tag" method="POST">
                                                    {{ csrf_field() }}
                                                    <div class="form-group  mb-3">
                                                        <div class="form-group"><b>Action after video:</b></div>
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="radio"
                                                                name="DecidePER" id="goWay" value="1" checked>
                                                            <label class="form-check-label" for="goWay">Close
                                                                player</label>
                                                        </div>
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="radio"
                                                                name="DecidePER" id="endAtLastVideoFrame" value="2">
                                                            <label class="form-check-label"
                                                                for="endAtLastVideoFrame">Stop at last video
                                                                frame</label>
                                                        </div>
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="radio"
                                                                name="DecidePER" id="showPoster" value="3">
                                                            <label class="form-check-label" for="showPoster">Poster
                                                                image</label>
                                                        </div>
                                                    </div>
                                                    <div class="form-group"><b>Branding & Sponsor Settings:</b></div>
                                                    <div class="row mb-3">
                                                        <div class="col">
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="radio"
                                                                    name="SponsorTitle" id="SponsorTitle1" value="true"
                                                                    checked>
                                                                <label class="form-check-label">Sponsor Title on</label>
                                                            </div>
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="radio"
                                                                    name="SponsorTitle" id="SponsorTitle2"
                                                                    value="false">
                                                                <label class="form-check-label">Sponsor Title
                                                                    off</label>
                                                            </div>
                                                        </div>
                                                        <div class="col">
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="radio"
                                                                    name="OutstremLogo" value="true" id="OutstremLogo1"
                                                                    checked>
                                                                <label class="form-check-label">Outstream Logo
                                                                    on</label>
                                                            </div>
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="radio"
                                                                    name="OutstremLogo" value="false"
                                                                    id="OutstremLogo2">
                                                                <label class="form-check-label">Outstream Logo
                                                                    off</label>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="form-group"><b>Additional Settings:</b></div>
                                                    <div class="row mb-3">
                                                        <div class="col">
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="radio"
                                                                    name="audio" id="inlineRadio1" value="true">
                                                                <label class="form-check-label">Audio on</label>
                                                            </div>
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="radio"
                                                                    name="audio" id="inlineRadio2" value="false"
                                                                    checked>
                                                                <label class="form-check-label">Audio off</label>
                                                            </div>
                                                        </div>
                                                        <div class="col">
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="radio"
                                                                    name="logoOnOff" value="true" id="inlineRadio3"
                                                                    checked>
                                                                <label class="form-check-label">Logo on</label>
                                                            </div>
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="radio"
                                                                    name="logoOnOff" value="false" id="inlineRadio4">
                                                                <label class="form-check-label">Logo off</label>
                                                            </div>
                                                        </div>
                                                        <div class="col">
                                                            <div class="form-check form-check-inline">
                                                                <label class="form-check-label"
                                                                    for="colorpicker">Color:</label>
                                                                <input type="color" class="form-check-input"
                                                                    id="colorpicker" name="color"
                                                                    pattern="^#+([a-fA-F0-9]{6}|[a-fA-F0-9]{3})$">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <input type="text" class="form-control form-control-user"
                                                            name="url" id="url" aria-describedby="UrlHelp"
                                                            placeholder="Enter URL">
                                                    </div>
                                                    <div class="form-group">
                                                        <textarea class="form-control form-control-user" id="comment"
                                                            name="comment" rows="4" cols="50"
                                                            placeholder="Enter Comment"></textarea>
                                                    </div>
                                                    <hr>
                                                    <input type="submit" name="submit" value="REQUEST"
                                                        class="btn btn-primary btn-user btn-block">
                                                    <input type="button" value="BACK"
                                                        class="btn btn-primary btn-user btn-block" onclick="goBack()">
                                                </form>
                                                <hr>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>

                    </div>
                    <!-- /.container-fluid -->

                </div>
                <!-- End of Main Content -->

                <!-- Footer -->
                @include('auth/includes/footer')
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

        <script>
            function goBack() {
                window.history.back();
            }

        </script>

</body>

</html>
