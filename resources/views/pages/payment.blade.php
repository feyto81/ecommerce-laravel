@extends('layout')
@section('content')
	<section id="cart_items">
		<div class="container col-sm-12">
			<div class="breadcrumbs">
				<ol class="breadcrumb">
				  <li><a href="#">Home</a></li>
				  <li class="active">Shopping Cart</li>
				</ol>
			</div>
			<div class="table-responsive cart_info">
				<?php
					$contents = Cart::content();
					// echo "<pre>";
					// print_r($contents);
					// echo "</pre>";
					// exit();
				?>
				<table class="table table-condensed">
					<thead>
						<tr class="cart_menu">
							<td class="image">Image</td>
							<td class="description">Name</td>
							<td class="price">Price</td>
							<td class="quantity">Quantity</td>
							<td class="total">Total</td>
							<td>Action</td>
						</tr>
					</thead>
					<tbody>
						<?php foreach($contents as $v_contents) {?>
						<tr>
							<td class="cart_product">
								<a href=""><img src="{{URL::to($v_contents->options->image)}}" height="80px;" width="80px;" alt=""></a>
							</td>
							<td class="cart_description">
								<h4><a href="">{{$v_contents->name}}</a></h4>
							</td>
							<td class="cart_price">
								<p>{{$v_contents->price}}</p>
							</td>
							<td class="cart_quantity">
								<div class="cart_quantity_button">
									<form action="{{url('/update-cart')}}" method="post">
										{{ csrf_field() }}
										<input class="cart_quantity_input" type="text" name="qty" value="{{$v_contents->qty}}" autocomplete="off" size="2">
										<input type="hidden" name="rowId" value="{{$v_contents->rowId}}">
										<input type="submit" name="submit" class="btn btn-sm btn-default" value="update">
									</form>
								</div>
							</td>
							<td class="cart_total">
								<p class="cart_total_price">{{$v_contents->total}}</p>
							</td>
							<td class="cart_delete">
								<a class="cart_quantity_delete" href="{{URL::to('/delete-to-cart/'.$v_contents->rowId)}}"><i class="fa fa-times"></i></a>
							</td>
						</tr>
						<?php } ?>
					</tbody>
				</table>
			</div>
		</div>
	</section> <!--/#cart_items-->

	<section id="do_action">
		<div class="container">
			<div class="heading">
				<h3>What Would You Like To Do Next?</h3>
				<p>Choose if you have a discount code or reward points you want to use or would like to estimate your delivery cost.</p>
			</div>
			<div class="breadcrumbs">
				<ol class="breadcrumb">
					<li><a href="">Home</a></li>
					<li class="active">Payment Method</li>
				</ol>
			</div>
			<div class="paymentCont col-sm-8">
				<div class="headingWrap">
					<h3 class="headingTop text-center">Select Your Payment Method</h3>
					<p class="text-center">Created with bootstrap button and using radio button</p>
				</div>
					
							<form action="{{url('/order-place')}}" method="post" enctype="multipart/form-data">
							{{csrf_field() }}
								<label class="btn paymentMethod">
									<div class="method visa">Cash</div>
									<input type="radio" name="payment_method" value="CASH" checked>
								</label>
								
								<label class="btn paymentMethod">
									<div class="method master-card">BRI</div>
									<input type="radio" name="payment_method" value="BRI">
								</label>
								<label class="btn paymentMethod">
									<div class="method master-card">BCA</div>
									<input type="radio" name="payment_method" value="BCA">
								</label>
								<label class="btn paymentMethod">
									<div class="method master-card">OVO</div>
									<input type="radio" name="payment_method" value="OVO">
								</label>
								<div class="col-sm-12">
						<div class="order-">
							<p class="text-center">Kirim Ke No rekening Di Bawah Ini</p>
							<?php
        $all_published_setting = DB::table('tbl_setting')
                                    ->get();
        foreach ($all_published_setting as $v_setting) {?>
							<div class="col-md-12" style="background-color: #e0cece">
									<p>-{{$v_setting->rek_bri}}</p>
									<p>-{{$v_setting->rek_bca}}</p>
									<p>-{{$v_setting->ovo}}</p>
							</div>
        <?php }?>
							
							
						</div>	
						<br>
					</div>	
								<h4 class="text-center mt-9">Upload Bukti Pembayaran</h4>
								<hr>

			                      <div class="col-sm-12">
			                        <input type="file" class="input-file uniform-on" id="img_payment" name="img_payment" placeholder="" required="">
								<small><span>&nbsp;Max. File : 1MB</span></small>
			                        
			                        <br>
			                      </div>

			                      



								
								<!-- <label class="btn paymentMethod">
									<div class="method amex"><img src="{{asset('frontend/images/payment/paypal.jpg')}}" width="140px" width="100px"></div>
									<input type="radio" name="payment_method" value="paypal">
								</label> -->
								<br>

								<input style="margin-left: 12px;" type="submit" name="Done" class="btn btn-success">

							</form>
							<!-- <form action="{{url('/order-place')}}" method="post">
								{{csrf_field() }}
								<input type="radio" name="payment_gateway" value="handcash"> Hand Cash<br>
								<input type="radio" name="payment_gateway" value="paypal"> Paypal<br>
								<input type="radio" name="payment_gateway" value="bkash"> B-Kash<br>
								<input type="submit" name="Done">
							</form> -->

				<br>

				
			</div>
		</div>
	</section>

@endsection