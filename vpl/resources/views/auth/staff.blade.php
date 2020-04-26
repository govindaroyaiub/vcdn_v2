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
                    <h1 class="h3 mb-4 text-gray-800"></h1>
                    @include('auth/includes/alert')
                    <div class="row"> 

                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                Employees Account Active</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{$employees_account_active}}</div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-calendar fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Pending Requests Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-warning shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                                Pending Requests</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{$pending_requests}}</div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-comments fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <!-- Area Chart -->
                        <div class="col-xl-8 col-lg-7">
                            <div class="card shadow mb-4">
                                <!-- Card Header - Dropdown -->
                                <div
                                    class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-primary">VAST Tag Requests</h6>
                                </div>
                                <!-- Card Body -->
                                <div class="card-body">
                                    <div>
                                    <div class="table-responsive">
                                            <table id="requestList" class="table table-striped" width="100%"
                                                cellspacing="0">
                                                <thead>
                                                    <tr>
                                                        <th scope="col">#</th>
                                                        <th>Client Name</th>
                                                        <th>Assets URL</th>
                                                        <th>Comment</th>
                                                        <th>Created At</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php $i = 1; ?>
                                                    @foreach($client_requests as $key=>$val)
                                                    <tr>
                                                        <td>{{$i++}}</td>
                                                        <td>{{$val->first_name}} {{$val->last_name}}</td>
                                                        <td><a href="{{$val->url}}" target="_blank">{{$val->url}}</a>
                                                        </td>
                                                        <td>{{$val->comment}}</td>
                                                        <td>{{$val->created_at}}</td>
                                                        <td width="15%">
                                                            <div class="row">
                                                                <form action="/vast-tag/accept/{{$val->id}}" method="post">
                                                                    @csrf
                                                                    <button class="btn btn-secondary" type="submit"
                                                                        id="{{$val->id}}">
                                                                        <i class="fas fa-check-circle"></i>
                                                                    </button>
                                                                </form>

                                                                <button type="button"
                                                                    class="btn btn-primary view_button"
                                                                    id="{{$val->id}}" data-toggle="modal"
                                                                    data-target="#view_modal">
                                                                    <i class="fas fa-eye"></i>
                                                                </button>

                                                                <form action="/vast-tag/delete/{{$val->id}}" method="post">
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
                        </div>

                        <div class="col-xl-4 col-lg-5">
                            <div class="card shadow mb-4">
                                <!-- Card Header - Dropdown -->
                                <div
                                    class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-primary">Employee Status</h6>
                                </div>
                                <!-- Card Body -->
                                <div class="card-body">
                                    <div class="chart-pie pt-4 pb-2">
                                        <canvas id="myPieChart"></canvas>
                                    </div>
                                    <div class="mt-4 text-center small">
                                        <span class="mr-2">
                                            <i class="fas fa-circle text-primary"></i> Male
                                        </span>
                                        <span class="mr-2">
                                            <i class="fas fa-circle text-success"></i> Female
                                        </span>
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

    <div class="modal fade " id="view_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalTitle">Player Details</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" width="100%" cellspacing="0">
                            <tr>
                                <th>Assets URL</th>
                                <td id="url"></td>
                            </tr>
                            <tr>
                                <th>Action after video</th>
                                <td style="max-width: 280px;" id="decide_pre"></td>
                            </tr>
                            <tr>
                                <th>Sponsor Title</th>
                                <td>
                                <label id="sponsor_title"></li>
                                </td>
                            </tr>
                            <tr>
                                <th>Outstream Logo</th>
                                <td>
                                    <label id="outstrem_logo"></li>
                                </td>
                            </tr>
                            <tr>
                                <th>Audio</th>
                                <td>
                                    <label id="isAudionOn"></li>
                                </td>
                            </tr>
                            <tr>
                                <th>Logo Show</th>
                                <td>
                                    <label id="islogoshow"></li>
                                </td>
                            </tr>
                            <tr>
                                <th>Skin Color</th>
                                <td>
                                    <input type="color" name="color" id="player_skin_color"
                                                pattern="^#+([a-fA-F0-9]{6}|[a-fA-F0-9]{3})$"></li>
                                </td>
                            </tr>
                            <tr>
                                <th>Comment</th>
                                <td>
                                <label id="comment"></li>
                                </td>
                            </tr>
                            <tr>
                                <th>Created At</th>
                                <td>
                                    <label id="created_at_label"></li>
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
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

    <!-- Page level plugins -->
    <script src="{{ URL::to('/vendor/chart.js/Chart.min.js')}}"></script>

    <!-- Page level custom scripts -->
    <script type="text/javascript">
        $(document).ready(function () {
            $('#requestList').DataTable({
                responsive: true,
                "lengthMenu": [
                    [10, 25, 50, -1],
                    [10, 25, 50, "All"]
                ]
            });
        });

    </script>
    <script>
        Chart.defaults.global.defaultFontFamily = 'Nunito',
            '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
        Chart.defaults.global.defaultFontColor = '#858796';

        // Pie Chart Example
        var ctx = document.getElementById("myPieChart");
        var myPieChart = new Chart(ctx, {
            type: 'doughnut',
            data: {
                labels: ["Male", "Female"],
                datasets: [{
                    data: [{{$male_employees}}, {{$female_employees}}],
                    backgroundColor: ['#4e73df', '#1cc88a'],
                    hoverBackgroundColor: ['#2e59d9', '#17a673'],
                    hoverBorderColor: "rgba(234, 236, 244, 1)",
                }],
            },
            options: {
                maintainAspectRatio: false,
                tooltips: {
                    backgroundColor: "rgb(255,255,255)",
                    bodyFontColor: "#858796",
                    borderColor: '#dddfeb',
                    borderWidth: 1,
                    xPadding: 15,
                    yPadding: 15,
                    displayColors: false,
                    caretPadding: 10,
                },
                legend: {
                    display: false
                },
                cutoutPercentage: 80,
            },
        });

    </script>

<script type="text/javascript">
        $(document).ready(function () {
            $('.view_button').click(function (e) {
                var id = $(this).attr("id");
                var _token = $('input[name="_token"]').val();
                $.ajax({
                    url: "{{route('getrequestinfo')}}",
                    method: "POST",
                    data: {
                        id: id,
                        _token
                    },
                    success: function (result) {
                        $("#url").text(result.url);
                        $("#decide_pre").text(result.decide_pre);
                        $("#sponsor_title").text(result.sponsor_title);
                        $("#outstrem_logo").text(result.outstrem_logo);
                        $("#isAudionOn").text(result.isAudionOn);
                        $("#islogoshow").text(result.islogoshow);
                        document.getElementById("player_skin_color").value = result.color;
                        $("#comment").text(result.comment);


                        var date_text_from_db = result.created_at;
                        var date_part1 = date_text_from_db.slice(0, 10);
                        var date_part2 = date_text_from_db.slice(11, 19);
                        var full_date = date_part1 + " " + date_part2;
                        $('#created_at_label').text(full_date);
                    }
                })
            });
        });

    </script>

</body>

</html>
