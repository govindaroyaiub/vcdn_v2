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
                                                    <h1 class="h4 text-gray-900 mb-4">Upload Assets</h1>
                                                </div>
                                                <hr>
                                                @include('auth/includes/alert')
                                                <ul>
                                                    <li>Please provide the video file format in .mp4 format.</li>
                                                    <li>The logo must be in .png format.</li>
                                                    <li>the poster also should be in .png format</li>
                                                    <li>After upload, the urls will be provided after the following
                                                        page.</li>
                                                </ul>
                                                <hr>
                                                <form class="user" action="/asset-upload/{{$id}}" method="POST" enctype="multipart/form-data">
                                                    {{ csrf_field() }}
                                                    <div class="form-group">
                                                        <div class="form-group">
                                                            <label for="logo"><b>Upload Logo Here</b></label>
                                                            <input type="file" class="form-control-file"
                                                                id="logo" name="logo">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="poster"><b>Upload Poster Here</b></label>
                                                            <input type="file" class="form-control-file"
                                                                id="poster" name="poster">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="video"><b>Upload Video Here</b></label>
                                                            <input type="file" class="form-control-file"
                                                                id="video" name="video">
                                                        </div>
                                                        <hr>
                                                        <input type="submit" name="submit" value="UPLOAD"
                                                            class="btn btn-primary btn-user btn-block">
                                                        <input type="button" value="BACK"
                                                            class="btn btn-primary btn-user btn-block"
                                                            onclick="goBack()">
                                                    </div>
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
