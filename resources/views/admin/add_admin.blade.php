@extends('admin_layout')
@section('admin_content')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Admin</h1>
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="./">Dashboard</a></li>
              <li class="breadcrumb-item">Add admin</li>
            </ol>
          </div>
	<div class="row">
            <div class="col-lg-12">
              <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Add Admin</h6>
                </div>
                <p class="alert-success">
                  <?php
                    $messege = Session::get('messege');
                    if ($messege)
                    {
                      echo $messege;
                      Session::put('messege',null);
                    }
                    ?>
                </p>
                <div class="card-body">
                  <form action="{{url('/save-admin')}}" method="post">
                  	{{ csrf_field() }}
                    <div class="form-group row">
                      <label for="inputEmail3" class="col-sm-3 col-form-label">Admin email</label>
                      <div class="col-sm-9">
                        <input type="email" class="form-control" id="admin_email" name="admin_email" placeholder="" required="">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="inputEmail3" class="col-sm-3 col-form-label">Admin Password</label>
                      <div class="col-sm-9">
                        <input type="password" class="form-control" id="admin_password" name="admin_password" placeholder="" required="">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="inputEmail3" class="col-sm-3 col-form-label">Admin Name</label>
                      <div class="col-sm-9">
                        <input type="text" class="form-control" id="admin_name" name="admin_name" placeholder="" required="">
                      </div>
                    </div>
                   <div class="form-group row">
                      <label for="inputEmail3" class="col-sm-3 col-form-label">Admin Phone</label>
                      <div class="col-sm-9">
                        <input type="text" class="form-control" id="admin_phone" name="admin_phone" placeholder="" required="">
                      </div>
                    </div>
                    <div class="form-group row">
                      <div class="col-sm-10">
                        <button type="submit" class="btn btn-primary btn-sm">Add Admin</button>
                        <button type="reset" class="btn btn-danger btn-sm">Cancel</button>
                      </div>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
          @include('sweetalert::alert')
@endsection
@push('bottom')
	<script type="text/javascript">
      
    </script>
@endpush