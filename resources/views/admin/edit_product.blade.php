@extends('admin_layout')
@section('admin_content')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Product</h1>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="./">Dashboard</a></li>
          <li class="breadcrumb-item">Product</li>
          <li class="breadcrumb-item active" aria-current="page">Add Product</li>
        </ol>
      </div>
	<div class="row">
            <div class="col-lg-12">
              <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Update Product</h6>
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
                  <form action="{{url('/update-product', $product_info->product_id)}}" method="post">
                  	{{ csrf_field() }}
                    <div class="form-group row">
                      <label for="inputEmail3" class="col-sm-3 col-form-label">Product Name Name</label>
                      <div class="col-sm-9">
                        <input type="text" class="form-control" id="product_name" name="product_name" placeholder="" value="{{$product_info->product_name}}" required="">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="inputPassword3" class="col-sm-3 col-form-label">Category Description</label>
                      <div class="col-sm-9">
                        <textarea class="cleditor" name="product_description" id="product_description" rows="3" required="">{{$product_info->product_description}}</textarea>
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