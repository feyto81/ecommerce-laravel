<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <link href="{{asset('backend/img/logo/logo.png')}}" rel="icon">
  <title>Dewangga Store - Control Panel</title>
  <link href="{{asset('backend/vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">
  <link href="{{asset('backend/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css">
  <link href="{{asset('backend/css/ruang-admin.min.css')}}" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="{{asset('backend/js/cleditor/jquery.cleditor.css')}}">
  <link rel="stylesheet" href="{{asset('backend/package/dist/sweetalert2.min.css')}}">
  <link href="{{asset('backend/vendor/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet">
  @toastr_css
</head>

<body id="page-top">
  <div id="wrapper">
    <!-- Sidebar -->
    <ul class="navbar-nav sidebar sidebar-light accordion" id="accordionSidebar">
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-icon">
          <img src="{{asset('backend/img/logo/logo2.png')}}">
        </div>
        <?php
        $all_published_setting = DB::table('tbl_setting')
                                    ->get();
        foreach ($all_published_setting as $v_setting) {?>
        <div class="sidebar-brand-text mx-3">{{$v_setting->title_admin}}</div>
        <?php }?>
      </a>
      <hr class="sidebar-divider my-0">
      <li class="nav-item active">
        <a class="nav-link" href="{{URL::to('/dashboard')}}">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard</span></a>
      </li>
      <hr class="sidebar-divider">
      <div class="sidebar-heading">
        Features
      </div>
      <li class="nav-item">
        <a class="nav-link" href="{{URL::to('/all-category')}}">
          <i class="fab fa-fw fa-algolia"></i>
          <span>All Category</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{URL::to('/add-category')}}">
          <i class="fas fa-fw fa-archive"></i>
          <span>Add Category</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{URL::to('/all-manufacture')}}">
          <i class="fas fa-fw fa-box"></i>
          <span>All Manufacture</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{URL::to('/add-manufacture')}}">
          <i class="fas fa-fw fa-calendar-check"></i>
          <span>Add manufacture</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTable" aria-expanded="true"
          aria-controls="collapseTable">
          <i class="fas fa-fw fa-calendar-day"></i>
          <span>Product</span>
          <span class="badge badge-danger">New</span>
        </a>
        <div id="collapseTable" class="collapse" aria-labelledby="headingTable" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Tables</h6>
            <a class="collapse-item" href="{{URL::to('/add-product')}}">Add Product</a>
            <a class="collapse-item" href="{{URL::to('/all-product')}}">All Products</a>
          </div>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseBootstrap"
          aria-expanded="true" aria-controls="collapseBootstrap">
          <i class="far fa-fw fa-window-maximize"></i>
          <span>Slider</span>
        </a>
        <div id="collapseBootstrap" class="collapse" aria-labelledby="headingBootstrap" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Bootstrap UI</h6>
            <a class="collapse-item" href="{{URL::to('/add-slider')}}">Add Slider</a>
            <a class="collapse-item" href="{{URL::to('/all-slider')}}">All Slider</a>
          </div>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{URL::to('/manage-order')}}">
          <i class="fas fa-fw fa-store"></i>
          <span>Manage Order</span>
          <span class="badge badge-danger">New</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{URL::to('/contact_customer')}}">
          <i class="fab fa-facebook-messenger fa-fw"></i>
          <span>Services</span>
        </a>
      </li>
      <hr class="sidebar-divider">
      <div class="sidebar-heading">
        Users
      </div>
      <li class="nav-item">
        <a class="nav-link" href="{{URL::to('/customer-data')}}">
          <i class="fas fa-users"></i>
          <span>Customer</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{URL::to('/add-admin')}}">
          <i class="fas fa-user"></i>
          <span>Add Admin</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{URL::to('/admin-data')}}">
          <i class="fas fa-user"></i>
          <span>Admin</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{URL::to('/subcriber-data')}}">
          <i class="fas fa-user-friends"></i>
          <span>Subcriber</span>
        </a>
      </li>
      <hr class="sidebar-divider">
      <div class="sidebar-heading">
        Setting
      </div>
      <li class="nav-item">
        <a class="nav-link" href="{{URL::to('/edit-setting/4')}}">
          <i class="fas fa-cogs"></i>
          <span>Settings</span>
        </a>
      </li>
      
      <hr class="sidebar-divider">
    </ul>
    <!-- Sidebar -->
    <div id="content-wrapper" class="d-flex flex-column">
      <div id="content">
        <!-- TopBar -->
        <nav class="navbar navbar-expand navbar-light bg-navbar topbar mb-4 static-top">
          <button id="sidebarToggleTop" class="btn btn-link rounded-circle mr-3">
            <i class="fa fa-bars"></i>
          </button>
          <li class="fas fa-calendar-day" style="color: white;margin-right: 7px"> {{date('D-j-F-Y')}}</li>
          <a href="{{url('/')}}" target="_blank" style="margin-left: 40px"><li class="fas fa-share" style="color: white;margin-right: 7px">Visit Site</li></a>
          <ul class="navbar-nav ml-auto">
            <div class="topbar-divider d-none d-sm-block"></div>
            <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown"
                aria-haspopup="true" aria-expanded="false">
                <img class="img-profile rounded-circle" src="{{asset('backend/img/boy.png')}}" style="max-width: 60px">
                <span class="ml-2 d-none d-lg-inline text-white small">{{ Session::get('admin_name')}}</span>
              </a>
              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                
               
                
                <a class="dropdown-item" href="{{URL::to('/logout')}}">
                  <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                  Logout
                </a>
              </div>
            </li>
          </ul>
        </nav>
        <!-- Topbar -->

        <!-- Container Fluid-->
        <div class="container-fluid" id="container-wrapper">
          @yield('admin_content')
        </div>
        <!---Container Fluid-->
      </div>
      <!-- Footer -->
      <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>copyright &copy; 2020 - developed by
              <b><a href="" target="_blank">Dewangga-Store.Net</a></b>
            </span>
          </div>
        </div>
      </footer>
      <!-- Footer -->
    </div>
    @include('sweetalert::alert')

  </div>

  <!-- Scroll to top -->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <script src="{{asset('backend/vendor/jquery/jquery.min.js')}}"></script>
   <script src="{{asset('backend/js/cleditor/jquery.cleditor.js')}}"></script>
  <script src="{{asset('backend/js/cleditor/jquery.cleditor.min.js')}}"></script> 
  <script src="{{asset('backend/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
  <script src="{{asset('backend/vendor/jquery-easing/jquery.easing.min.js')}}"></script>
  <script src="{{asset('backend/js/ruang-admin.min.js')}}"></script>
  <script src="{{asset('backend/vendor/chart.js/Chart.min.js')}}"></script>
  <script src="{{asset('backend/js/demo/chart-area-demo.js')}}"></script>
 
  <script src="{{asset('backend/package/dist/sweetalert2.all.min.js')}}"></script>
  <script src="{{asset('backend/package/dist/sweetalert2.all.js')}}"></script>
  <script src="{{asset('backend/package/dist/sweetalert2.min.js')}}"></script>
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  
   @jquery
  <script src="{{asset('backend/vendor/datatables/jquery.dataTables.min.js')}}"></script>
  <script src="{{asset('backend/vendor/datatables/dataTables.bootstrap4.min.js')}}"></script>
    @toastr_js
    @toastr_render
</body>
@stack('bottom')

</html>