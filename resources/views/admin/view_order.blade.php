@extends('admin_layout')
@section('admin_content')
	<div class="row-fluid sortable">
		<div class="box span6">
			<div class="box-header">
				<h2><i class="halflings-icon align-justify"></i><span class="break"></span>Customer Details</h2>
			</div>
			<div class="box-content">
				<table class="table">
					<thead>
						<tr>
							<th>Customer name</th>
							<th>Mobile</th>

						</tr>
					</thead>
					<tbody>
						<tr>
							@foreach($order_by_id as $v_order)
							@endforeach

							<td>{{$v_order->customer_name}}</td>
							<td>{{$v_order->mobile_number}}</td>
						</tr>
					</tbody>
				</table>
			</div>
		</div>
		<div class="box span6">
			<div class="box-header">
				<h2><i class="halflings-icon align-justify"></i><span class="break"></span>Payment Status</h2>
			</div>
			<div class="box-content">
				<table class="table">
					<thead>
						<tr>
							<th>Order Status</th>
							<th>Payment Method</th>

						</tr>
					</thead>
					<tbody>
						<tr>
							@foreach($order_by_id as $v_order)
							@endforeach

							<td class="center">
                          @if($v_order->order_status==1)
                            <span class="badge badge-success">success</span>
                          @else
                            <span class="badge badge-danger">pending</span>
                          @endif
                        </td>
							<td>{{$v_order->payment_method}}</td>
						</tr>
					</tbody>
				</table>
			</div>
		</div>
		<div class="box span6">
			<div class="box-header">
				<h2><i class="halflings-icon align-justify"></i><span class="break"></span>Shipping Details</h2>
			</div>
			<div class="box-content">
				<table class="table table-striped">
					<thead>
						<tr>
							<th>Username</th>
							<th>Provinsi</th>
							<th>Kota</th>
							<th>Kecamatan</th>
							<th>Desa</th>
							<th>Jalan</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							@foreach($order_by_id as $v_order)
							@endforeach
							<td>{{$v_order->shipping_first_name}}</td>
							<td>{{$v_order->provinsi}}</td>
							<td>{{$v_order->kota}}</td>
							<td>{{$v_order->kecamatan}}</td>
							<td>{{$v_order->desa}}</td>
							<td>{{$v_order->jalan}}</td>
							
						</tr>
					</tbody>
				</table>
				<table class="table table-striped">
					<thead>
						<tr>
							
							<th>No Telp</th>
							<th>Email</th>
							<th>Expedisi</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							@foreach($order_by_id as $v_order)
							@endforeach
							<td>{{$v_order->shipping_mobile_number}}</td>
							<td>{{$v_order->shipping_email}}</td>
							<td>{{$v_order->expedisi}}</td>
						</tr>
					</tbody>
				</table>
			</div>
		</dir>
	</div>
	<div class="row-fluid sortable">
		<div class="box span12">
			<div class="box-header" data-original-title>
				<h2><i class="halflings-icon user"></i><span class="break"></span>Order Details</h2>
			</div>
			<div class="box-content">
				<table class="table table-striped">
					<thead>
						<tr>
							<th>Id</th>
							<th>Product Name</th>
							<th>Product price</th>
							<th>Product sales quantity</th>
							<th>Product Sub Total</th>
						</tr>
					</thead>
					<tbody>
						@foreach($order_by_id as $v_order)
						
						<tr>
							<td>{{$v_order->order_id}}</td>
							<td>{{$v_order->product_name}}</td>
							<td>{{$v_order->product_price}}</td>
							<td>{{$v_order->product_sales_quantity}}</td>
							<td>{{$v_order->product_price*$v_order->product_sales_quantity}}</td>
						</tr>
						@endforeach
					</tbody>
					<tfoot>
						<tr>
							<td colspan="4">Total with vat:</td>
							<td><strong>Rp. {{$v_order->order_total}}</strong></td>
						</tr>
					</tfoot>
				</table>
			</div>
		</div>
	</div>

@endsection