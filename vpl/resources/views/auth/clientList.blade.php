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
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-4 text-gray-800">Client List</h1>
                    <div class="card shadow mb-4">
                        @include('auth/includes/alert')
                        <div class="card-header py-3 text-right">
                            <a href="/create/company" target="_blank"> Add New <i class="fas fa-plus"></i></a>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="clientlist" class="table table-bordered" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Company Name</th>
                                            <th>Website</th>
                                            <th>Address</th>
                                            <th>Country</th>
                                            <th>City</th>
                                            <th>State</th>
                                            <th>Zip Code</th>
                                            <th style="text-align: center">Action</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        <?php $i = 1; ?>
                                        @foreach($data as $data)
                                        <tr>
                                            <td>{{$i++}}</td>
                                            <td>{{$data->company_name}}</td>
                                            <td>{{$data->website}}</td>
                                            <td>{{$data->address}}</td>
                                            <td>{{$data->country}}</td>
                                            <td>{{$data->city}}</td>
                                            <td>{{$data->state}}</td>
                                            <td>{{$data->zip}}</td>
                                            <td width="6%">
                                                <div class="row">
                                                    <a style="color:#fff" href="/company/edit/{{$data->id}}"
                                                        target="_blank"><button type="button" class="btn btn-success"><i
                                                                class="fas fa-edit"></i></button></a>
                                                    <hr>
                                                    <form action="/company/delete/{{$data->id}}" method="post">
                                                        @csrf
                                                        <button class="btn btn-danger" type="submit"><i
                                                                class="fas fa-trash"></i></button>
                                                    </form>
                                                </div>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
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
    <!-- Page level plugins -->
    <script src="{{ URL::to('/vendor/datatables/jquery.dataTables.min.js')}}" defer></script>
    <script src="{{ URL::to('vendor/datatables/dataTables.bootstrap4.min.js')}}" defer></script>

    <script type="text/javascript">
        $(document).ready(function () {
            $('#clientlist').DataTable({
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
