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

                                        <div class="col-lg-12">
                                            <div class="p-5">
                                                <div class="text-center">
                                                    <h1 class="h4 text-gray-900 mb-4">Edit User</h1>
                                                </div>
                                                <hr>
                                                @include('auth/includes/alert')
                                                <form class="user" action="/user/edit/{{$user_data->id}}" method="POST">
                                                    {{ csrf_field() }}
                                                    <div class="form-group">
                                                        <select class="form-control select2" id="company"
                                                            name="company">
                                                            <option value="">Select Associated Company
                                                            </option>
                                                            @foreach($data as $row)
                                                            <option value="{{$row->id}}" {{ $row->id == $company_id ? 'selected':'' }}>{{$row->company_name}}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    <div class="form-group row">
                                                        <div class="col">
                                                            <input type="text" class="form-control" name="first_name" value="{{$user_data->first_name}}"
                                                                placeholder="First name">
                                                        </div>
                                                        <div class="col">
                                                            <input type="text" class="form-control" name="last_name" value="{{$user_data->last_name}}"
                                                                placeholder="Last name">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <select class="form-control" id="sel1" name="user_type">
                                                            <option value="">Select User Type</option>
                                                            <option value="client" @if($user_data['user_type'] == 'client') selected @endif>Client</option>
                                                            <option value="staff" @if($user_data['user_type'] == 'staff') selected @endif>Staff</option>
                                                        </select>
                                                    </div>
                                                    <div class="form-group">
                                                        <select class="form-control" id="sel2" name="gender">
                                                            <option value="">Select Gender</option>
                                                            <option value="male" @if($user_data['gender'] == 'male') selected @endif>Male</option>
                                                            <option value="female" @if($user_data['gender'] == 'female') selected @endif>Female</option>
                                                        </select>
                                                    </div>
                                                    <div class="form-group">
                                                        <input type="email" class="form-control" id="email" name="email" value="{{$user_data->email}}"
                                                            aria-describedby="emailHelp" placeholder="Enter email">
                                                    </div>
                                                    <div class="form-group">
                                                        <input type="text" class="form-control" value="{{$user_data->job_title}}"
                                                            id="job_title" name="job_title" placeholder="Enter Job Title">
                                                    </div>
                                                    <div class="form-group">
                                                        <input type="text" class="form-control" value="{{$user_data->phone}}"
                                                            id="phone" name="phone" placeholder="Enter Phone">
                                                    </div>
                                                    <div class="form-group">
                                                        <textarea class="form-control" id="address" value="{{$user_data->address}}"
                                                            name="address" placeholder="Enter Address"></textarea>
                                                    </div>
                                                    <hr>
                                                    <input type="submit" value="EDIT"
                                                        class="btn btn-primary btn-user btn-block">
                                                    <input type="button" value="BACK"
                                                        class="btn btn-primary btn-user btn-block"
                                                        onclick="window.history.back();">
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

        <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>

        <script>
            $('.select2').select2();

        </script>
</body>

</html>
