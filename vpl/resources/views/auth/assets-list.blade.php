<!DOCTYPE html>
<html lang="en">

<head>

    @include('auth/includes/header')

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        @if(Auth::guard('web')->user()->user_type == 'client')
        @include('auth/includes/sidebar')
        @endif

        @if(Auth::guard('web')->user()->user_type == 'staff')
        @include('auth/includes/sidebar2')
        @endif

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

                    <!-- Page Heading -->
                    <div class="row">
                        <div class="col-xl-12 col-lg-7">
                            <div class="card shadow mb-4">
                                <!-- Card Header - Dropdown -->
                                <div
                                    class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-primary">Assets List</h6>
                                </div>
                                <!-- Card Body -->
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table id="assetsList" class="table table-striped" width="100%" cellspacing="0">
                                            <thead>
                                                <tr>
                                                    <th scope="col">#</th>
                                                    <th>Client Name</th>
                                                    <th>Logo</th>
                                                    <th>Poster</th>
                                                    <th>Video</th>
                                                    <th>Created At</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php $i = 1; ?>
                                                @foreach($data as $key=>$val)
                                                <tr>
                                                    <td>{{$i++}}</td>
                                                    <td>{{$val->first_name}} {{$val->last_name}}
                                                        ({{$val->company_name}})</td>
                                                    <td>
                                                        <textarea name="" id="logo_url" cols="35" rows="3"
                                                            readonly>https://vcdn-dev.planetnine.com/uploads/logo/{{$val->logo_url}} </textarea>
                                                        <br>
                                                        <img src="{{URL::asset("/uploads/poster/$val->logo_url")}}"
                                                            class="img-thumbnail" width="200" height="100">
                                                    </td>
                                                    <td>
                                                        <textarea name="" id="poster_url" cols="35" rows="3"
                                                            readonly>https://vcdn-dev.planetnine.com/uploads/poster/{{$val->poster_url}} </textarea>
                                                        <br>
                                                        <img src="{{URL::asset("/uploads/poster/$val->poster_url")}}"
                                                            class="img-thumbnail" width="200" height="100">
                                                    </td>
                                                    <td>
                                                        <textarea name="" id="poster_url" cols="35" rows="3"
                                                            readonly>https://vcdn-dev.planetnine.com/uploads/video/{{$val->video_url}} </textarea>
                                                        <br>
                                                        <video width="320" height="240" controls>
                                                            <source
                                                                src="{{URL::asset("/uploads/video/$val->video_url")}}"
                                                                type="video/mp4">
                                                        </video>
                                                    </td>
                                                    <td width="10%">{{$val->created_at}}</td>
                                                    <td>
                                                        <form action="/asset/delete/{{$val->id}}" method="post">
                                                            @csrf
                                                            <button class="btn btn-danger" type="submit"><i
                                                                    class="fas fa-trash"></i></button>
                                                        </form>
                                                    </td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
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
    <script src="{{ URL::to('/vendor/datatables/jquery.dataTables.min.js')}}" defer></script>
    <script src="{{ URL::to('vendor/datatables/dataTables.bootstrap4.min.js')}}" defer></script>
    <script type="text/javascript">
        $(document).ready(function () {
            $('#assetsList').DataTable({
                responsive: true,
                "lengthMenu": [
                    [10, 25, 50, -1],
                    [10, 25, 50, "All"]
                ]
            });
        });

    </script>
</body>

</html>
