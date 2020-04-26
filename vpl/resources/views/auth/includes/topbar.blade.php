<nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
      <!-- Sidebar Toggle (Topbar) -->
      <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
        <i class="fa fa-bars"></i>
      </button>

      <!-- Topbar Search -->
     
      <!-- Topbar Navbar -->
      <ul class="navbar-nav ml-auto">

        <!-- Nav Item - Alerts -->

        <!-- Nav Item - Messages -->
        <div class="topbar-divider d-none d-sm-block"></div>

        <!-- Nav Item - User Information -->
        <li class="nav-item dropdown no-arrow">
          <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown"
            aria-haspopup="true" aria-expanded="false">
            <span class="mr-2 d-none d-lg-inline text-gray-600 small">{{Auth::guard('web')->user()->first_name}} {{Auth::guard('web')->user()->last_name}}</span>
            @if(Auth::user()->gender == 'male')
            <img class="img-profile rounded-circle" src="male.png">
            @else
            <img class="img-profile rounded-circle" src="female.png">
            @endif
          </a>
          <!-- Dropdown - User Information -->
          <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
            <a class="dropdown-item" href="#" data-toggle="modal" data-target="#change-password">
              <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
              Change Password
            </a>

            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
              <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
              Logout
            </a>
          </div>
        </li>
      </ul>
    </nav>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
      aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body">Are You Sure You Want To Logout?</div>
          <div class="modal-footer">
            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
            <a class="btn btn-primary" href="{{ route('logout') }}" onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">
                {{ __('Logout') }}
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
          </div>
        </div>
      </div>
    </div>

    <!-- Change Password Modal -->
    <div class="modal fade" id="change-password" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
      aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Change Password</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="col-lg-12">
            <div class="p-2">
              <form class="user" action="/change-password" method="POST" autocomplete="off">
              {{ csrf_field() }}
                <div class="form-group">
                  <input type="password" class="form-control form-control-user password1" id="current_password" name="current_password" placeholder="Enter Current Password">
                  <div class="text-center">
                    <span id="error1"></span>
                  </div>
                </div>
                <div class="form-group">
                  <input type="password" class="form-control form-control-user password2" id="new_password" name="new_password" placeholder="Enter New Password">
                  <div class="text-center">
                    <span id="error3"></span>
                  </div>
                </div>
                <div class="form-group">
                  <input type="password" class="form-control form-control-user password3" id="repeat_password" name="repeat_password" placeholder="Repeat New Password">
                  <div class="text-center">
                    <span id="error2"></span>
                  </div>
                </div>
                <div class="modal-footer">
                  <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                  <input class="btn btn-primary" id="submit" type="submit"></button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script>
    $(document).ready(function()
    {
      $("#current_password").change(function()
      {
        var error_current_password = '';
        var current_password = $('#current_password').val();
        var _token = $('input[name="_token"]').val();

        if(current_password.length == 0)
        {
          $('#error1').html('<div class="alert alert-danger" role="alert">Please Enter Current Password</div>');
          $('#current_password').addClass('has-error');
          $('#submit').attr('disabled', true);
          $('#new_password').attr('disabled', true);
          $('#repeat_password').attr('disabled', true);
        }
        else
        {
          $.ajax({
            url: "{{route('current_password.check')}}",
            method: "POST",
            data: {current_password:current_password, _token},
            success: function(result)
            {
              if(result == 'true')
              {
                $('#error1').html('<div></div>');
                $('#current_password').removeClass('has-error');
                $('#submit').attr('disabled', false);
                $('#new_password').attr('disabled', false);
                $('#repeat_password').attr('disabled', false);
              }
              else
              {
                $('#error1').html('<div class="alert alert-danger" role="alert">Current Password Did Not Match</div>');
                $('#current_password').addClass('has-error');
                $('#submit').attr('disabled', true);
                $('#new_password').attr('disabled', true);
                $('#repeat_password').attr('disabled', true);
              }
            }
          })
        }
      });
    });
    </script>

    <script>
    $(document).ready(function()
    {
      $('#new_password').change(function()
      {
        var current_password = $('#current_password').val();
        var new_password = $('#new_password').val();
        var error = '';

        if(current_password != 0)
        {
          if(new_password == current_password)
          {
            $('#error3').html('<div class="alert alert-danger" role="alert">Please Enter A New Password</div>');
            $('#new_password').addClass('has-error');
            $('#submit').attr('disabled', true);
          }
          else
          {
            $('#error3').html('<div></div>');
            $('#new_password').removeClass('has-error');
            $('#submit').attr('disabled', false);
          }
        }
        else
        {
          if(current_password == 0)
          {
            $('#error1').html('<div class="alert alert-danger" role="alert">Please Enter Your Current Password</div>');
            $('#current_password').addClass('has-error');
            $('#submit').attr('disabled', true);
          }
          else {
            if(new_password == current_password)
            {
              $('#error3').html('<div class="alert alert-danger" role="alert">Please Enter A New Password</div>');
              $('#new_password').addClass('has-error');
              $('#submit').attr('disabled', true);
            }
            else
            {
              $('#error3').html('<div></div>');
              $('#new_password').removeClass('has-error');
              $('#submit').attr('disabled', false);
            }
          }
        }
      });
    });
    </script>

    <script>
    $(document).ready(function()
    {
      $('#repeat_password').change(function()
      {
        var new_password = $('#new_password').val();
        var repeat_password = $('#repeat_password').val();
        var error = '';

        if(new_password != repeat_password)
        {
          $('#error2').html('<div class="alert alert-danger" role="alert">Password Did Not Match</div>');
          $('#current_password').addClass('has-error');
          $('#submit').attr('disabled', true);
        }
        else
        {
          $('#error2').html('<div></div>');
          $('#current_password').removeClass('has-error');
          $('#submit').attr('disabled', false);
        }
      });
    });
    </script>
