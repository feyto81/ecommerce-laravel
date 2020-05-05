@extends('admin_layout')

@section('admin_content')
@toastr_css
<div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Order</h1>
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="./">Dashboard</a></li>
              <li class="breadcrumb-item">Order</li>
              <li class="breadcrumb-item active" aria-current="page">Order Details</li>
            </ol>
          </div>
	 <div class="col-lg-12">
              <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Order Details</h6>
                </div>
                <div class="table-responsive p-3">
                  <table class="table align-items-center table-flush table-hover" id="DataTable" name="DataTable">
                    <thead class="thead-light">
                      <tr>
                      	<th>Order ID</th>
                        <th>Customer Name</th>
                        <th>Order Total</th>
                        <th>Proof of Payment</th>
                        <th>Status Order</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    
                    <tbody>
                      @foreach($all_order_info as $v_order)
                      <tr>
                        <td>{{$v_order->order_id}}</td>
                        <td>{{$v_order->customer_name}}</td>
                        <td>Rp.{{$v_order->order_total}}</td>
                        <td><a target="_blank" href="{{url($v_order->img_payment)}}"><img style="width: 140px;height: 80px" src="{{URL::to($v_order->img_payment)}}"></a></td>
                       <td class="center">
                          @if($v_order->order_status==1)
                            <span class="badge badge-success">success</span>
                          @else
                            <span class="badge badge-danger">pending</span>
                          @endif
                        </td>
                        <td class="center">
                        	@if($v_order->order_status==1)
                        	<a href="{{URL::to('/success-order/'.$v_order->order_id)}}" class="btn btn-sm btn-danger">
                        		Change Pending
                        	</a>
	                         @else
                          <a href="{{URL::to('/pending-order/'.$v_order->order_id)}}" class="btn btn-sm btn-success">
                            Change Success
                          </a>
                          @endif
                        	<!-- <a href="{{URL::to('/active/'.$v_order->order_id)}}" class="btn btn-sm btn-success">
                        		<i class="fas fa-thumbs-up fa-fw"></i>
                        	</a> -->
                        	
                        	<a href="{{URL::to('/view-order/'.$v_order->order_id)}}" class="btn btn-sm btn-primary">
                        		Details
                        	</a>
                        	
                        </td>
                      </tr>
                      @endforeach
                    </tbody>
                    <tfoot>
                      <tr>
                        <th>Order ID</th>
                        <th>Customer Name</th>
                        <th>Order Total</th>
                        <th>Payment Image</th>
                        <th>Status</th>
                        <th>Action</th>
                      </tr>
                    </tfoot>
                      
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
		$(document).ready(function () {
            $('#DataTable').DataTable({
                dom: 'lBfrtip',
                buttons: []
            });
        });
	</script>
@endpush