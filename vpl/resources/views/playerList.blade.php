<!DOCTYPE html>
<html lang="en">

<head>

    @include('auth/includes/header')
    <style>
        .dataTables_wrapper .dataTables_filter {
            float: right;
            text-align: left;
        }

        .dataTables_filter input {
            width: 250px;
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

                    <!-- Page Heading -->
                    <h1 class="h3 mb-4 text-gray-800">VAST-Tag Player List</h1>
                    <div class="card shadow mb-4">
                        <div class="card-header py-3 text-right">
                            <!--<a href="/create/company"> Add New <i class="fas fa-plus"></i></a>-->
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="playerList" class="table table-striped table-bordered" width="100%"
                                    cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Player name</th>
                                            <th>Video SRC</th>
                                            <th>iframe Code</th>
                                            <th>Date & Time</th>
                                            <th style="text-align: center">Action</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        <?php $i = 1; ?>
                                        @foreach($players as $key=>$val)
                                        <tr>
                                            <td>{{$i++}}</td>
                                            <td width="13%">{{$val->name}}</td>
                                            <td width="25%" style="max-width: 160px; word-wrap: break-word">
                                                {{$val->src}}</td>
                                            <td style="max-width: 280px;">
                                                <textarea name="" id="" cols="60" rows="6"
                                                    readonly>{{$val->iframe_code}}</textarea>
                                            </td>
                                            <td width="12%">
                                                {{$val->created_at}}
                                            </td>
                                            <td width="9%">
                                                <div class="row">
                                                    <a style="color:#fff" href="/player/edit/{{$val->id}}" title="Edit"><button
                                                            type="button" class="btn btn-success"><i
                                                                class="fas fa-edit"></i></button></a>

                                                    <hr>
                                                    <button type="button" class="btn btn-primary view_button" title="View Details"
                                                        id="{{$val->id}}" data-toggle="modal" data-target="#view_modal">
                                                        <i class="fas fa-eye"></i>
                                                    </button>
                                                    <hr>
                                                    <form action="{{ route('player.delete',$val->id)}}" method="post">
                                                        @csrf
                                                        <button class="btn btn-danger" type="submit" title="Delete"><i
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
                        <table id="clientlist" class="table table-bordered" width="100%" cellspacing="0">
                            <tr>
                                <th>Player Name</th>
                                <td id="player_name"></td>
                            </tr>
                            <tr>
                                <th>Video Source</th>
                                <td id="video_source"></td>
                            </tr>
                            <tr>
                                <th>iFrame</th>
                                <td style="max-width: 280px;"><textarea id="iFrame_value" cols="80" rows="5"
                                        style="resize: none;" readonly></textarea></td>
                            </tr>
                            <tr>
                                <th>Player Data</th>
                                <td>
                                    <ol>
                                        <li><b>Skin Color: </b><input type="color" name="color" id="player_skin_color"
                                                pattern="^#+([a-fA-F0-9]{6}|[a-fA-F0-9]{3})$"></li>
                                        <li><b>Audion Mute: </b><label id="audio_label"></li>
                                        <li><b>Logo Show: </b><label id="logo_label"></li>
                                        <li><b>Logo URl: </b><label id="logo_url"></li>
                                    </ol>
                                </td>
                            </tr>
                            <tr>
                                <th>Ads URL</th>
                                <td>
                                    <textarea name="" id="ads_url_value" cols="80" rows="5" style="resize: none;"
                                        readonly></textarea>
                                </td>
                            </tr>
                            <tr>
                                <th>Poster URL</th>
                                <td>
                                    <label id="poster_url_label"></li>
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

    <script type="text/javascript">
        $(document).ready(function () {
            $('#playerList').DataTable({
                responsive: true,
                "lengthMenu": [
                    [10, 25, 50, -1],
                    [10, 25, 50, "All"]
                ]
            });
        });

    </script>
    <script type="text/javascript">
        $(document).ready(function () {
            $('.view_button').click(function (e) {
                var id = $(this).attr("id");
                var _token = $('input[name="_token"]').val();
                $.ajax({
                    url: "{{route('getplayerInfo')}}",
                    method: "POST",
                    data: {
                        id: id,
                        _token
                    },
                    success: function (result) {
                        $("#player_name").text(result.name);
                        $("#video_source").text(result.src);
                        $('#iFrame_value').text(result.iframe_code);
                        document.getElementById("player_skin_color").value = result.color;
                        $("#audio_label").text(result.isAudionOn);
                        $('#logo_label').text(result.islogoshow);
                        $('#logo_url').text(result.logo);
                        $('#ads_url_value').text(result.imaUrl);
                        $('#poster_url_label').text(result.poster);

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
