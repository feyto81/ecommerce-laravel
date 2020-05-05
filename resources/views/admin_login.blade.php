<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <link href="{{asset('backend/img/logo/logo.png')}}" rel="icon">
  <title>Admin | Login</title>
  <link href="{{asset('backend/vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">
  <link href="{{asset('backend/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css">
  <link href="{{asset('backend/css/ruang-admin.min.css')}}" rel="stylesheet">
  <link href="{{asset('backend\js/jquery.msgbox.css')}}" rel="stylesheet">
  <link href="{{asset('backend\js/jquery.toast.min.css')}}" rel="stylesheet">
  <link href="{{asset('toastr.css')}}" rel="stylesheet"/>
   @toastr_css

</head>

<body class="bg-gradient-login">
  <!-- Login Content -->
  <div class="container-login">
    <div class="row justify-content-center">
      <div class="col-xl-10 col-lg-12 col-md-9">
        <div class="card shadow-sm my-5">
          <div class="card-body p-0">
            <div class="row">
              <div class="col-lg-12">
                <div class="login-form">
                  <p class="alert-danger">
                    <?php
                    $messege = Session::get('messege');
                      if($messege) {
                        echo $messege;
                        Session::put('messege',null);
                      }
                    ?>
                  </p>
                  <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-4">Start Your Session</h1>

                  </div>
                  <form class="user" action="{{url('/admin_dashboard')}}" method="post">
                    {{ csrf_field() }}
                    <div class="form-group">
                      <input type="email" class="form-control" name="admin_email" id="admin_email" autocomplete="off" aria-describedby="emailHelp"
                        placeholder="Enter Email Address">
                    </div>
                    <div class="form-group">
                      <input type="password" class="form-control" id="admin_password" name="admin_password" placeholder="Password">
                    </div>
                    <div class="form-group{{ $errors->has('g-recaptcha-response') ? ' has-error' : '' }}">
                    <label class="col-md-4 control-label">Captcha</label>
                     
                    <div class="col-md-6 pull-center">
                    {!! app('captcha')->display() !!}
                     
                    @if ($errors->has('g-recaptcha-response'))
                    <span class="help-block">
                    <strong>{{ $errors->first('g-recaptcha-response') }}</strong>
                    </span>
                    @endif
                    </div>
                    <div class="form-group">
                      <div class="custom-control custom-checkbox small" style="line-height: 1.5rem;">
                        <input type="checkbox" class="custom-control-input" id="customCheck">
                        <label class="custom-control-label" for="customCheck">Remember
                          Me</label>
                      </div>
                    </div>
                    <div class="form-group">
                      <button type="submit" class="btn btn-primary btn-block">Login</button>
                    </div>
                  </form>
                  <div class="text-center">
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  @include('sweetalert::alert')
  <!-- Login Content -->
  <script src="{{asset('backend/vendor/jquery/jquery.min.js')}}"></script>
  <script src="{{asset('backend/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
  <script src="{{asset('backend/vendor/jquery-easing/jquery.easing.min.js')}}"></script>
  <script src="{{asset('backend/js/ruang-admin.min.js')}}"></script>
  <script src="{{asset('backend\js/jquery.toast.min.js.download')}}"></script>
  <script src='https://www.google.com/recaptcha/api.js'></script>
  <script type="text/javascript">
    
  </script>
  <script src="jquery.min.js"></script>
  <script src="toastr.js"></script>

   @jquery
    @toastr_js
    @toastr_render
</body>

</html>