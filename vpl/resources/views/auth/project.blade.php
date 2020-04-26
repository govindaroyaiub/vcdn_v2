<!DOCTYPE html>
<html lang="en">

<head>

    @include('auth/includes/header')

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        @if(Auth::guard('client')->user())
            @include('auth/includes/sidebar')
        @endif

        @if(Auth::guard('staff')->user())
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
          <h1 class="h3 mb-2 text-gray-800">List of Campaigns</h1>
          <!-- <p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below. For more information about DataTables, please visit the <a target="_blank" href="https://datatables.net">official DataTables documentation</a>.</p> -->

          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3 text-right">
              <a href="/addcampaigns"> Add New <i class="fas fa-plus"></i></a>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Client Name</th>
                      <th>Project/Campaign Type</th>
                      <th>Start Date</th>
                      <th>End Date</th>
                      <th>Asset</th>
                      <th>Data Source</th>
                    </tr>
                  </thead>

                  <tbody>
                    <tr>
                      <td>Tiger Nixon</td>
                      <td>Banner</td>
                      <td>2011/04/25</td>
                      <td>2011/04/25</td>
                      <td>Image, GIF</td>
                      <td>Google API, Facebook API</td>
                    </tr>
                    <tr>
                      <td>Garrett Winters</td>
                      <td>DEV 360</td>
                      <td>2011/04/25</td>
                      <td>2011/04/25</td>
                      <td>Image, GIF</td>
                      <td>Google API, Facebook API</td>
                    </tr>
                    <tr>
                      <td>Ashton Cox</td>
                      <td>HPTO</td>
                      <td>2011/07/25</td>
                      <td>2011/04/25</td>
                      <td>Image, GIF</td>
                      <td>Google API, Facebook API</td>
                    </tr>
                    <tr>
                      <td>Cedric Kelly</td>
                      <td>HPTO</td>
                      <td>2011/07/25</td>
                      <td>2011/04/25</td>
                      <td>Image, GIF</td>
                      <td>Google API, Facebook API</td>
                    </tr>
                    <tr>
                      <td>Airi Satou</td>
                      <td>Banner</td>
                      <td>2011/07/25</td>
                      <td>2011/04/25</td>
                      <td>Image, GIF</td>
                      <td>Google API, Facebook API</td>
                    </tr>
                    <tr>
                      <td>Brielle Williamson</td>
                      <td>HPTO</td>
                      <td>2011/04/25</td>
                      <td>2011/04/25</td>
                      <td>Image, GIF</td>
                      <td>Google API, Facebook API</td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
          </div>

        </div>

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


</body>

</html>
