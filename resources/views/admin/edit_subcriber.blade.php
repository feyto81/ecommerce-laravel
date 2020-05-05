@extends('admin_layout')
@section('admin_content')
  <div class="row">
            <div class="col-lg-12">
              <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Update Category</h6>
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
                  <form action="{{url('/update-subcriber', $subcriber_info->id)}}" method="post">
                    {{ csrf_field() }}
                    <div class="form-group row">
                      <label for="inputEmail3" class="col-sm-3 col-form-label">Email</label>
                      <div class="col-sm-9">
                        <input type="text" class="form-control" id="email" name="email" placeholder="" value="{{$subcriber_info->email}}" required="">
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
@endsection
@push('bottom')
  <script type="text/javascript">
      $(document).ready(function() {
        $("#category_description").cleditor();
      });
    </script>
@endpush