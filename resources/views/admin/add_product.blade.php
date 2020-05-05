@extends('admin_layout')
@section('admin_content')
@toastr_css
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
                  <h6 class="m-0 font-weight-bold text-primary">Add Product</h6>
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
                  <form action="{{url('/save-product')}}" method="post" enctype="multipart/form-data">
                  	{{ csrf_field() }}
                    <div class="form-group row">
                      <label for="inputEmail3" class="col-sm-3 col-form-label">Product Name</label>
                      <div class="col-sm-9">
                        <input type="text" class="form-control" id="product_name" name="product_name" placeholder="" required="">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="inputEmail3" class="col-sm-3 col-form-label">Product Category</label>
                      <div class="col-sm-9">

                        <select class="form-control" name="category_id" id="category_id">
                          <option disabled selected="">--Select Category--</option>
                           <?php
                                $all_published_category = DB::table('tbl_category')
                                                        ->where('publication_status',1)
                                                        ->get();
                            foreach ($all_published_category as $v_category) {?>
                        <option value="{{$v_category->category_id}}">{{$v_category->category_name}}</option>
                        <?php } ?>
                      </select>
                    
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="inputEmail3" class="col-sm-3 col-form-label">Manufacture Name</label>
                      <div class="col-sm-9">
                        <select class="form-control" id="manufacture_id" name="manufacture_id">
                          <option disabled selected="">--Select Manufacture</option>
                          <?php
                                $all_published_manufacture = DB::table('tbl_manufacture')
                                                        ->where('publication_status',1)
                                                        ->get();
                            foreach ($all_published_manufacture as $v_manufacture) {?>
                          <option value="{{$v_manufacture->manufacture_id}}">{{$v_manufacture->manufacture_name}}</option>
                          <?php } ?>
                      </select>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="inputPassword3" class="col-sm-3 col-form-label">Product Short Description</label>
                      <div class="col-sm-9">
                        <textarea class="cleditor" name="product_short_description" id="product_short_description" rows="3" required=""></textarea>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="inputPassword3" class="col-sm-3 col-form-label">Product Long Description</label>
                      <div class="col-sm-9">
                        <textarea class="cleditor" name="product_long_description" id="product_long_description" rows="3" required=""></textarea>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="inputEmail3" class="col-sm-3 col-form-label">Product Price</label>
                      <div class="col-sm-9">
                        <input type="text" class="form-control" id="product_price" name="product_price" placeholder="" required="">
                      </div>
                    </div>
                    
                    <div class="form-group row">
                      <label for="inputEmail3" class="col-sm-3 col-form-label">Image</label>
                      <div class="col-sm-9">
                        <input type="file" class="input-file uniform-on" id="product_image" name="product_image" placeholder="" required="">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="inputEmail3" class="col-sm-3 col-form-label">Product Size</label>
                      <div class="col-sm-9">
                        <input type="text" class="form-control" id="product_size" name="product_size" placeholder="" required="">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="inputEmail3" class="col-sm-3 col-form-label">Product Color</label>
                      <div class="col-sm-9">
                        <input type="text" class="form-control" id="product_color" name="product_color" placeholder="" required="">
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
                        <button type="submit" class="btn btn-primary btn-sm">Add Product</button>
                        <button type="reset" class="btn btn-danger btn-sm">Cancel</button>
                      </div>
                    </div>
                  </form>
                </div>
              </div>
            </div>
            @jquery
    @toastr_js
    @toastr_render
          </div>
@endsection
@push('bottom')
	<script type="text/javascript">
      $(document).ready(function() {
        $("#product_short_description").cleditor();
        $("#product_long_description").cleditor();
      });
    </script>
@endpush