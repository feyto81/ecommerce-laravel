@extends('admin_layout')
@section('admin_content')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Category</h1>
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="./">Dashboard</a></li>
              <li class="breadcrumb-item">Category</li>
              <li class="breadcrumb-item active" aria-current="page">All Category</li>
            </ol>
          </div>
	<div class="row">
            <div class="col-lg-12">
              <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Add Category</h6>
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
                  <form action="{{url('/save-category')}}" method="post">
                  	{{ csrf_field() }}
                    <div class="form-group row">
                      <label for="inputEmail3" class="col-sm-3 col-form-label">Category Name</label>
                      <div class="col-sm-9">
                        <input type="text" class="form-control" id="category_name" name="category_name" placeholder="" required="">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="inputPassword3" class="col-sm-3 col-form-label">Category Description</label>
                      <div class="col-sm-9">
                        <textarea class="cleditor" name="category_description" id="category_description" rows="3" required=""></textarea>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="inputPassword3" class="col-sm-3 col-form-label">Publication Status</label>
                      <div class="col-sm-9">
                        <input type="checkbox" name="publication_status" value="1">
                      </div>
                    </div>
                    <div class="form-group row">
                      <div class="col-sm-10">
                        <button type="submit" class="btn btn-primary btn-sm">Add Category</button>
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