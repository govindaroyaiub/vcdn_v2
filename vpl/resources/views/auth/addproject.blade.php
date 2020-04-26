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
        <div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center">

      <div class="col-xl-6 col-lg-6 col-md-6">

        <div class="card o-hidden border-0 shadow-lg my-5">
          <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">

              <div class="col-lg-12">
                <div class="p-5">
                  <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-4">Add Campaign</h1>
                  </div>
                  <form class="user" action="/addproject" method="POST">
                  {{ csrf_field() }}
                    <div class="form-group">
                      <input type="email" class="form-control form-control-user" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="Enter Type">
                    </div>
                    <div class="form-group">
                      <input type="date" class="form-control form-control-user" id="exampleInputPassword" placeholder="Star Date">
                    </div>
                    <div class="form-group">
                      <input type="date" class="form-control form-control-user" id="exampleInputPassword" placeholder="End Date">
                    </div>
                    <div class="form-group">
                      <input type="text" class="form-control form-control-user" id="exampleInputPassword" placeholder="Assets">
                    </div>
                    <div class="form-group">
                      <input type="text" class="form-control form-control-user" id="exampleInputPassword" placeholder="Data Source">
                    </div>
                    <input type="submit" name="submit" value="Create" class="btn btn-primary btn-user btn-block">
                    <input type="button" value="BACK" class="btn btn-primary btn-user btn-block" onclick="goBack()">
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
    function goBack()
    {
      window.history.back();
    }
  </script>

</body>

</html>
