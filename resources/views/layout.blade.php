<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>@yield('title','Home | Dewangga Store')</title>
    <link href="{{asset('frontend/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('frontend/css/font-awesome.min.css')}}" rel="stylesheet">
    <link href="{{asset('frontend/css/prettyPhoto.css')}}" rel="stylesheet">
    <link href="{{asset('frontend/css/price-range.css')}}" rel="stylesheet">
    <link href="{{asset('frontend/css/animate.css')}}" rel="stylesheet">
    <link href="{{asset('frontend/css/main.css')}}" rel="stylesheet">
    <link href="{{asset('frontend/css/responsive.css')}}" rel="stylesheet">
    
    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->       
    <link rel="shortcut icon" href="{{asset('frontend/images/ico/favicon.ico')}}">
    <link href="{{asset('backend/img/logo/logo.png')}}" rel="icon">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="{{URL::to('frontend/images/ico/apple-touch-icon-144-precomposed.png')}}">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="{{URL::to('frontend/images/ico/apple-touch-icon-114-precomposed.png')}}">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="{{URL::to('frontend/images/ico/apple-touch-icon-72-precomposed.png')}}">
    <link rel="apple-touch-icon-precomposed" href="{{URL::to('frontend/images/ico/apple-touch-icon-57-precomposed.png')}}">
    <link rel="stylesheet" href="{{asset('backend/package/dist/sweetalert2.min.css')}}">
</head><!--/head-->

<body>
    <header id="header"><!--header-->
        <div class="header_top" style="background-color: #f9a73b"><!--header_top-->
            <div class="container">
                <div class="row">
                    <div class="col-sm-6">
                        <div class="contactinfo">
                            <ul class="nav nav-pills">
                                <?php
        $all_published_setting = DB::table('tbl_setting')
                                    ->get();
        foreach ($all_published_setting as $v_setting) {?>
                                <li><a href="{{$v_setting->whattapp_api}}" target="_blank" style="color: white"><i class="fa fa-phone"></i> {{$v_setting->whattapp}}</a></li>
                                <li><a  style="color: white" href="mailto:link{{$v_setting->email_link}}"><i class="fa fa-envelope"></i> {{$v_setting->email_link}}</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="social-icons pull-right">
                            <ul class="nav navbar-nav">
                                <li><a  style="color: white" href="{{$v_setting->facebook_link}}"><i class="fa fa-facebook"></i></a></li>
                                <li><a  style="color: white" href="{{$v_setting->twitter_link}}"><i class="fa fa-twitter"></i></a></li>
                            </ul>
                        </div>
                    </div>
                            <?php }?>

                </div>
            </div>
        </div><!--/header_top-->
        
        <div class="header-middle"><!--header-middle-->
            <div class="container">
                <div class="row">
                    <div class="col-md-4 clearfix">
                        <div class="logo pull-left">
                            <a href="{{url('/')}}"><img src="{{asset('frontend/images/home/logo.png')}}"  alt="" /></a>
                        </div>
                       <div class="btn-group pull-right clearfix">
                            <div class="btn-group">
                                <button type="button" class="btn btn-default  usa" data-toggle="">
                                    IDN
                                    <span class="caret"></span>
                                </button>
                                
                            </div>
                            
                            <div class="btn-group">
                                <button type="button" class="btn btn-default dropdown-toggle usa" data-toggle="dropdown">
                                    Rupiah
                                    <span class="caret"></span>
                                </button>
                               
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-8 clearfix">
                        <div class="shop-menu clearfix pull-right">
                            <ul class="nav navbar-nav">
                                
                                

                            <?php $customer_id = Session::get('customer_id');
                                  $shipping_id = Session::get('shipping_id');
                             ?>
                                <!-- <?php if($customer_id !=NULL && $shipping_id==NULL){?>
                                     <li><a href="{{URL::to('/checkout')}}"><i class="fa fa-crosshairs"></i> Checkout</a></li>

                                    <?php }if($customer_id !=NULL && $shipping_id!=NULL){?>
                                <li><a href="{{URL::to('/payment')}}"><i class="fa fa-crosshairs"></i> Checkout</a></li>
                                <?php }else{?>
                                    <li><a href="{{URL::to('/login-check')}}"><i class="fa fa-crosshairs"></i> Checkout</a></li>
                                <?php }?> -->
                                <?php $customer_id = Session::get('customer_id'); ?>
                                <?php if($customer_id !=NULL){?>
                                     <li><a href="{{URL::to('/checkout')}}">Checkout</a></li>

                                    <?php }else{?>
                                <li><a href="{{URL::to('/login-check')}}">Checkout</a></li>
                                <?php }?> 
                                    
                                <li><a href="{{URL::to('/show-cart')}}"><i class="fa fa-shopping-cart"></i> Cart({{Cart::count()}} items)&nbsp;(Rp.{{Cart::total()}})</a></li>
                                <?php $customer_id = Session::get('customer_id');?>
                                <?php $customer_name = Session::get('customer_name'); ?>
                                <?php $customer_email = Session::get('customer_email'); ?> 
                                <?php if($customer_id !=NULL){?>
                                    <li><a href="{{URL::to('/customer_logout')}}"><i class="fa fa-lock"></i> Logout</a></li>
                                <?php }else{?>
                                    <li><a href="{{URL::to('/login-check')}}"><i class="fa fa-lock"></i> Login</a></li>
                                
                                <?php }?>

                            </ul>
                        </div>
                    </div>

                </div>
            </div>
        </div><!--/header-middle-->
    
        <div class="header-bottom"><!--header-bottom-->
            <div class="container">
                <div class="row">
                    <div class="col-sm-9">
                        <div class="navbar-header">
                            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                                <span class="sr-only">Toggle navigation</span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>
                        </div>
                        <div class="mainmenu pull-left">
                            <ul class="nav navbar-nav collapse navbar-collapse">
                                <li><a href="{{url('/')}}" class="active">Home</a></li>
                                <li class="dropdown"><a href="#">Shop<i class="fa fa-angle-down"></i></a>
                                    <ul role="menu" class="sub-menu">
                                        <?php $customer_id = Session::get('customer_id'); ?>
                                <?php if($customer_id !=NULL){?>
                                     <li><a href="{{URL::to('/checkout')}}">Checkout</a></li>

                                    <?php }else{?>
                                <li><a href="{{URL::to('/login-check')}}">Checkout</a></li>
                                <?php }?> 
                                        <li><a href="{{URL::to('/show-cart')}}">Cart({{Cart::count()}} items)</a></li>  
                                    </ul>
                                </li> 

                                 <?php $customer_id = Session::get('customer_id');?>
                                <?php $customer_name = Session::get('customer_name'); ?>
                                <?php $customer_email = Session::get('customer_email'); ?> 
                                <?php if($customer_id !=NULL){?>

                                <li class="dropdown"><a href="#">{{$customer_name}}<i class="fa fa-angle-down"></i></a>
                                    <ul role="menu" class="sub-menu">
                                        
                                     <li><a href="{{url('/order')}}">My Order</a></li>
                                     <!-- <li><a href="">My Address</a></li>
                                      <li><a href="">Change Password</a></li>   -->
                                    </ul>
                                </li> 
                                <?php }?>
                                <li><a href="{{url('/contact-us')}}">Contact Us</a></li>



                            </ul>
                             
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="search_box pull-right">
                            <form action="{{ url('/product/search') }}" target="" method="get"> 
                                <input type="text" placeholder="Cari Product" style="width: auto;" name="q" />
                                <button type="submit" class="btn btn-success btn-sm" style="border:0px; height:33px; margin-left:-3px">Cari</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div><!--/header-bottom-->
    </header><!--/header-->
    
    
   @yield('slider');
    <section>
        <div class="container">
            <div class="row">
                <div class="col-sm-3">
                    <div class="left-sidebar">
                        @yield('pages.partials.categorymanufacture')
                        @include('pages.partials.categorymanufacture')
                    
                    </div>
                </div>
                
                <div class="col-sm-9 padding-right">
                    <div class="features_items"><!--features_items-->
                        @yield('content')
                    </div>
            </div>
        </div>
    </section>
    
    <footer id="footer"><!--Footer-->

        
        <div class="footer-widget">
            <div class="container">
                <div class="row">
                    <div class="col-sm-2">
                        <div class="single-widget">
                            <h2>Service</h2>
                            <ul class="nav nav-pills nav-stacked">
                                <li><a href="javascript::void">Online Help</a></li>
                                <li><a href="javascript::void">Contact Us</a></li>
                                <li><a href="javascript::void">Order Status</a></li>
                                <li><a href="javascript::void">Change Location</a></li>
                                <li><a href="javascript::void">FAQ’s</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-sm-2">
                        <div class="single-widget">
                            <h2>Quock Shop</h2>
                            <ul class="nav nav-pills nav-stacked">
                                <li><a href="javascript::void">T-Shirt</a></li>
                                <li><a href="javascript::void">Mens</a></li>
                                <li><a href="javascript::void">Womens</a></li>
                                <li><a href="javascript::void">Gift Cards</a></li>
                                <li><a href="javascript::void">Shoes</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-sm-2">
                        <div class="single-widget">
                            <h2>Policies</h2>
                            <ul class="nav nav-pills nav-stacked">
                                <li><a href="javascript::void">Terms of Use</a></li>
                                <li><a href="javascript::void">Privecy Policy</a></li>
                                <li><a href="javascript::void">Refund Policy</a></li>
                                <li><a href="javascript::void">Billing System</a></li>
                                <li><a href="javascript::void">Ticket System</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-sm-2">
                        <div class="single-widget">
                            <h2>About Shopper</h2>
                            <ul class="nav nav-pills nav-stacked">
                                <li><a href="javascript::void">Company Information</a></li>
                                <li><a href="javascript::void">Careers</a></li>
                                <li><a href="javascript::void">Store Location</a></li>
                                <li><a href="javascript::void">Affillate Program</a></li>
                                <li><a href="javascript::void">Copyright</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-sm-3 col-sm-offset-1">
                        <div class="single-widget">
                            <h2>About Shopper</h2>
                            <form action="{{url('/save-subcriber')}}" method="post" class="searchform">
                                 {{ csrf_field() }}
                                <input type="email" required="" id="email" name="email" placeholder="Your email address" />
                                <button type="submit" class="btn btn-default"><i class="fa fa-arrow-circle-o-right"></i></button>
                                <p>Get the most recent updates from <br />our site and be updated your self...</p>
                            </form>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
        
        <div class="footer-bottom">
            <div class="container">
                <div class="row">
                    <p class="pull-left">Copyright © 2020 Dewangga-Store.Net Inc. All rights reserved.</p>
                    <p class="pull-right">Designed by <span><a target="_blank" href="">Feyto Dev</a></span></p>
                </div>
            </div>
        </div>
         @include('sweetalert::alert')
        
    </footer><!--/Footer-->

    

  
    <script src="{{asset('frontend/js/jquery.js')}}"></script>
    
    <script src="{{asset('frontend/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('frontend/js/jquery.scrollUp.min.js')}}"></script>
    <script src="{{asset('frontend/js/price-range.js')}}"></script>
    <script src="{{asset('frontend/js/jquery.prettyPhoto.js')}}"></script>
    <script src="{{asset('frontend/js/main.js')}}"></script>
    <script src="{{asset('backend/package/dist/sweetalert2.all.min.js')}}"></script>
    <script src="{{asset('backend/package/dist/sweetalert2.all.js')}}"></script>
    <script src="{{asset('backend/package/dist/sweetalert2.min.js')}}"></script>
</body>
</html>