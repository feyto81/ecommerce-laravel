@extends('layout')
@section('content')
<div class="col-sm-9 padding-right">
                    <div class="product-details"><!--product-details-->
                        <div class="col-sm-5">
                            <div class="view-product">
                                <img src="{{URL::to($product_by_details->product_image)}}" alt="" />
                                <a href="{{URL::to($product_by_details->product_image)}}" target="_blank"><h3>ZOOM</h3></a>
                            </div>
                            
                        </div>
                        <div class="col-sm-7">
                            <div class="product-information"><!--/product-information-->
                                <img src="images/product-details/new.jpg" class="newarrival" alt="" />
                                <h2>{{$product_by_details->product_name}}</h2>
                                <p>Color : {{$product_by_details->product_color}}</p>
                                <img src="{{URL::to('frontend/images/product-details/rating.png')}}" alt="" />
                                <span>
                                    <span>Rp.{{$product_by_details->product_price}}</span>
                                    <form action="{{url('add-to-cart')}}" method="post">
                                        {{ csrf_field() }}
                                        <label>Quantity:</label>
                                        <input name="qty" type="number" value="1" />
                                        <input type="hidden" name="product_id" value="{{$product_by_details->product_id}}">
                                        <button type="submit" class="btn btn-fefault cart">
                                            <i class="fa fa-shopping-cart"></i>
                                            Add to cart
                                        </button>
                                    </form>
                                </span>
                                <p><b>Availability:</b> In Stock</p>
                                <p><b>Condition:</b> New</p>
                                <p><b>Brand:</b>{{$product_by_details->manufacture_name}}</p>
                                <p><b>Category:</b>{{$product_by_details->manufacture_name}}</p>
                                <p><b>Size:</b>{{$product_by_details->product_size}}</p>
                               
                            </div><!--/product-information-->
                        </div>
                    </div><!--/product-details-->
                    
                    <div class="category-tab shop-details-tab"><!--category-tab-->
                        <div class="col-sm-12">
                            <ul class="nav nav-tabs">
                                <li><a href="#details" data-toggle="tab">Details</a></li>
                                
                                <li><a href="#reviews" data-toggle="tab">Definition</a></li>
                            </ul>
                        </div>
                        <div class="tab-content">
                            <div class="tab-pane fade active in" id="details" >
                                <p>{{$product_by_details->product_long_description}}</p>
                            </div>
                            <div class="tab-pane fade" id="reviews" >
                                <p>{{$product_by_details->product_short_description}}</p>
                            </div>
                        </div>
                    </div><!--/category-tab-->                    
                </div>
@endsection