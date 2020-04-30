<!DOCTYPE html>
<html lang="en">

<head>

    @include('auth/includes/header')

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
                                                    <h1 class="h4 text-gray-900 mb-4">Assets Links</h1>
                                                </div>
                                                <hr>
                                                @include('auth/includes/alert')
                                                <ul>
                                                    <li>The assets has been uploaded.</li>
                                                    <li>All the assets links are provided.</li>
                                                    <li>The Text Fields are not editable.</li>
                                                </ul>
                                                <hr>
                                                <div class="alert alert-info" role="alert">
                                                    Files are uploaded for: <br> <b> {{$client_name->first_name}} {{$client_name->first_name}} ({{$client_name->company_name}}) </b>
                                                    <button type="button" class="close" aria-label="Close"
                                                        data-dismiss="alert">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                </p>
                                                <div class="form-group">
                                                    <div class="form-group">
                                                        <label for="logo"><b>Logo URL:</b></label>
                                                        <textarea name="" id="logo_url" cols="55" rows="2"
                                                            readonly>{{$params['logo_url']}}</textarea>
                                                        <button class="btn btn-primary btn-user btn-block"
                                                            onclick="copyLogo()">Copy Logo URL <i
                                                                class="far fa-copy"></i></button>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="poster"><b>Poster URL:</b></label>
                                                        <textarea name="" id="poster_url" cols="55" rows="2"
                                                            readonly>{{$params['poster_url']}}</textarea>
                                                        <button class="btn btn-primary btn-user btn-block"
                                                            onclick="copyPoster()">Copy Poster URL <i
                                                                class="far fa-copy"></i></button>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="video"><b>Video URL:</b></label>
                                                        <textarea name="" id="video_url" cols="55" rows="2"
                                                            readonly>{{$params['video_url']}}</textarea>
                                                        <button class="btn btn-primary btn-user btn-block"
                                                            onclick="copyVideo()">Copy Video URL <i
                                                                class="far fa-copy"></i></button>
                                                    </div>
                                                    <hr>
                                                    <a href="/create-vast-tag" target="_blank"
                                                        class="btn btn-primary btn-user btn-block">CREATE VAST</a>
                                                    <input type="button" value="BACK"
                                                        class="btn btn-primary btn-user btn-block" onclick="goBack()">
                                                </div>
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

            function copyLogo() {
                var copyText = document.getElementById("logo_url");
                copyText.select();
                copyText.setSelectionRange(0, 99999)
                document.execCommand("copy");
                alert("Copied the text: " + copyText.value);
            }

            function copyPoster() {
                var copyText = document.getElementById("poster_url");
                copyText.select();
                copyText.setSelectionRange(0, 99999)
                document.execCommand("copy");
                alert("Copied the text: " + copyText.value);
            }

            function copyVideo() {
                var copyText = document.getElementById("video_url");
                copyText.select();
                copyText.setSelectionRange(0, 99999)
                document.execCommand("copy");
                alert("Copied the text: " + copyText.value);
            }

        </script>

</body>

</html>
