<!DOCTYPE html>
<html lang="en">

<head>

  @include('auth/includes/header')
</head>

<body class="bg-gradient" style="background: #E5E9EC;">

  <div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center">

      <div class="col-xl-6 col-lg-6 col-md-6">

        <div class="card o-hidden border-0 shadow-lg my-5">
          <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">

              <div class="col-lg-12">
                <div class="p-4">
                  <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-4">Sign In</h1>
                    <span id="error"></span>
                  </div>
                  <form method="POST" action="{{ route('login') }}">
                  {{ csrf_field() }}
                  @include('auth/includes/alert')
                    <div class="form-group">
                      <input type="email" class="form-control form-control-user" id="email" name="email" aria-describedby="emailHelp" placeholder="Enter Email Address...">
                    </div>
                    <div class="form-group">
                      <input type="password" class="form-control form-control-user" id="password" name="password" placeholder="Enter Password">
                    </div>
                    <button type="submit" value="Sign In" id="login" class="btn btn-primary btn-user btn-block">
                                    {{ __('Login') }}
                    </button>
                  </form>
                  <hr>
                  <!-- <div class="text-center">
                    <a class="small" href="/forgotpassword">Forgot Password?</a>
                  </div> -->
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="{{ URL::to('/vendor/jquery/jquery.min.js')}}"></script>
  <script src="{{ URL::to('/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

  <!-- Core plugin JavaScript-->
  <script src="{{ URL::to('/vendor/jquery-easing/jquery.easing.min.js')}}"></script>

  <!-- Custom scripts for all pages-->
  <script src="{{ URL::to('/js/sb-admin-2.min.js')}}"></script>

</body>

</html>