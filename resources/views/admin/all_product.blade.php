@extends('admin_layout')

@section('admin_content')
@toastr_css
<div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Product</h1>
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="./">Dashboard</a></li>
              <li class="breadcrumb-item">Product</li>
              <li class="breadcrumb-item active" aria-current="page">All Product</li>
            </ol>
          </div>
	 <div class="col-lg-12">
              <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">All Products</h6>
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
                <div class="table-responsive p-3">
                  <table class="table align-items-center table-flush table-hover" name="DataTable" id="DataTable">
                    <thead class="thead-light">
                      <tr>
                        <th>Product ID</th>
                        <th>Product Name</th>
                        <th>Product Image</th>
                        <th>Product Price</th>
                        <th>Category Name</th>
                        <th>Manufacture Name</th>
                        <th>Status</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                    @foreach($all_product_info as $v_product)

                      <tr>
                        <td>{{$v_product->product_id}}</td>
                        <td>{{$v_product->product_name}}</td>
                        <td><img style="width: 60px;height: 60px" src="{{URL::to($v_product->product_image)}}"></td>
                        <td>@currency($v_product->product_price)</td>
                        <td>{{$v_product->category_name}}</td>
                        <td>{{$v_product->manufacture_name}}</td>
                        <td class="center">
                        	@if($v_product->publication_status==1)
                        		<span class="badge badge-success">Active</span>
                        	@else
                        		<span class="badge badge-danger">Unactive</span>
                        	@endif
                        </td>
                        <td class="center">
                        	@if($v_product->publication_status==1)
                        	<a href="{{URL::to('/unactive_product/'.$v_product->product_id)}}" class="btn btn-sm btn-danger">
                        		<i class="fas fa-thumbs-down fa-fw"></i>
                        	</a>
                        	@else
                        	<a href="{{URL::to('/active_product/'.$v_product->product_id)}}" class="btn btn-sm btn-success">
                        		<i class="fas fa-thumbs-up fa-fw"></i>
                        	</a>
                        	@endif
                        	<a href="{{URL::to('/delete-product/'.$v_product->product_id)}}" id="delete" class="btn btn-sm btn-danger">
                        		<i class="fas fa-trash fa-fw"></i>
                        	</a>
                        </td>
                      </tr>
                      @endforeach
                      
                    </tbody>
                  </table>
                </div>
              </div>
              @jquery
    @toastr_js
    @toastr_render
            </div>

@endsection
@push('bottom')
	<script>
		$(document).ready(function() { var eventFired = function ( type ) { var n = $('#dataTable')[0]; n.innerHTML += '<div>'+type+' event - '+new Date().getTime()+'</div>'; n.scrollTop = n.scrollHeight; } $('#dataTable') .on( 'order.dt', function () { eventFired( 'Order' ); } ) .on( 'search.dt', function () { eventFired( 'Search' ); } ) .on( 'page.dt', function () { eventFired( 'Page' ); } ) .DataTable(); } );

	</script>
  <script>
    $(document).ready(function () {
            $('#DataTable').DataTable({
                dom: 'lBfrtip',
                buttons: []
            });
        });
  </script>
@endpush