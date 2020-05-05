@extends('admin_layout')
@section('admin_content')
  <div class="row">
            <div class="col-lg-12">
              <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Update Setting</h6>
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
                  <form action="{{url('/update-setting', $setting_info->id)}}" method="post">
                    {{ csrf_field() }}
                    <div class="form-group row">
                      <label for="inputEmail3" class="col-sm-3 col-form-label">Title Admin</label>
                      <div class="col-sm-9">
                        <input type="text" class="form-control" id="title_admin" name="title_admin" placeholder="" value="{{$setting_info->title_admin}}" required="">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="inputEmail3" class="col-sm-3 col-form-label">Facebook</label>
                      <div class="col-sm-9">
                        <input type="text" class="form-control" id="facebook_link" name="facebook_link" placeholder="" value="{{$setting_info->facebook_link}}" required="">
                      </div>
                    </div>
                     <div class="form-group row">
                      <label for="inputEmail3" class="col-sm-3 col-form-label">Email</label>
                      <div class="col-sm-9">
                        <input type="text" class="form-control" id="email_link" name="email_link" placeholder="" value="{{$setting_info->email_link}}" required="">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="inputEmail3" class="col-sm-3 col-form-label">Twitter</label>
                      <div class="col-sm-9">
                        <input type="text" class="form-control" id="twitter_link" name="twitter_link" placeholder="" value="{{$setting_info->twitter_link}}" required="">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="inputEmail3" class="col-sm-3 col-form-label">Whattapp</label>
                      <div class="col-sm-9">
                        <input type="text" class="form-control" id="whattapp" name="whattapp" placeholder="" value="{{$setting_info->whattapp}}" required="">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="inputEmail3" class="col-sm-3 col-form-label">Whattapp API</label>
                      <div class="col-sm-9">
                        <input type="text" class="form-control" id="whattapp_api" name="whattapp_api" placeholder="" value="{{$setting_info->whattapp_api}}" required="">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="inputEmail3" class="col-sm-3 col-form-label">Rek BRI</label>
                      <div class="col-sm-9">
                        <input type="text" class="form-control" id="rek_bri" name="rek_bri" placeholder="" value="{{$setting_info->rek_bri}}" required="">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="inputEmail3" class="col-sm-3 col-form-label">Rek BCA</label>
                      <div class="col-sm-9">
                        <input type="text" class="form-control" id="rek_bca" name="rek_bca" placeholder="" value="{{$setting_info->rek_bca}}" required="">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="inputEmail3" class="col-sm-3 col-form-label">OVO</label>
                      <div class="col-sm-9">
                        <input type="text" class="form-control" id="ovo" name="ovo" placeholder="" value="{{$setting_info->ovo}}" required="">
                      </div>
                    </div>
                    <div class="form-group row">
                      <div class="col-sm-10">
                        <button type="submit" class="btn btn-primary btn-sm">Save</button>
                        <button type="reset" class="btn btn-danger btn-sm">Cancel</button>
                      </div>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
          @jquery
    @toastr_js
    @toastr_render
@endsection
@push('bottom')
  <script type="text/javascript">
      $(document).ready(function() {
        $("#category_description").cleditor();
      });
    </script>
@endpush