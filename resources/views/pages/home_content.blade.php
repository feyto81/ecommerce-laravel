@extends('layout')
@section('content')
@include('slider')
<h2 class="title text-center">Products Items</h2>
    <?php foreach ($all_published_product as $v_product) {?>
            <div class="col-sm-4">
                <div class="product-image-wrapper">
                    <div class="single-products">
                            <div class="productinfo text-center">
                                <img src="{{URL::to($v_product->product_image)}}" style="height: 300px" alt="" />
                                <h2>Rp.{{$v_product->product_price}}</h2>
                                <p>{{$v_product->product_name}}</p>
                                 <?php $customer_id = Session::get('customer_id'); ?>
                                <?php if($customer_id !=NULL){?>
                                <a href="{{URL::to('/view_product/'.$v_product->product_id)}}" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                                <?php }else{?>
                                     <a href="{{URL::to('/login-check')}}" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                                     <?php }?> 
                            </div>
                            <div class="product-overlay">
                                <div class="overlay-content">
                                    <h2>Rp.{{$v_product->product_price}}</h2>
                                    <a href="{{URL::to('/view_product/'.$v_product->product_id)}}"><p>{{$v_product->product_name}}</p></a>
                                    <?php $customer_id = Session::get('customer_id'); ?>
                                <?php if($customer_id !=NULL){?>
                                <a href="{{URL::to('/view_product/'.$v_product->product_id)}}" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                                <?php }else{?>
                                     <a href="{{URL::to('/login-check')}}" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                                     <?php }?> 
                                </div>
                            </div>
                    </div>
                    <div class="choose">
                        <ul class="nav nav-pills nav-justified">
                            <li><a href=""><i class="fa fa-plus-square"></i>{{$v_product->manufacture_name}}</a></li>
                            <?php $customer_id = Session::get('customer_id'); ?>
                                <?php if($customer_id !=NULL){?>
                            <li><a href="{{URL::to('/view_product/'.$v_product->product_id)}}"><i class="fa fa-plus-square"></i>View Product</a></li> <?php }else{?>
                                 <li><a href="{{URL::to('/login-check')}}"><i class="fa fa-plus-square"></i>View Product</a></li> <?php }?> 
                        </ul>
                    </div>
                </div>
            </div>
            <?php } ?>
            
            
        </div><!--features_items-->
        {{ $all_published_product->links() }}
        
@endsection