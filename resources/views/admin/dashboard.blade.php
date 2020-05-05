@extends('admin_layout')
@section('admin_content')
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
      <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="./">Home</a></li>
        <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
      </ol>
    </div>

    <div class="row mb-3">
      <!-- Earnings (Monthly) Card Example -->
      <div class="col-xl-3 col-md-6 mb-4">
        <div class="card h-100">
          <div class="card-body">
            <div class="row align-items-center">
              <div class="col mr-2">

                <div class="text-xs font-weight-bold text-uppercase mb-1">Income</div>
               <?php
                $servername = "localhost";
                $username = "root";
                $password = "laragonfull";
                $dbname = "wkr_toko";
                $con = mysqli_connect($servername,$username,$password,$dbname);

                $sql = "SELECT SUM(IF( YEAR(created_at) = 2020, product_price, 0)) AS jml_2020 FROM tbl_order_details";
                $result = mysqli_query($con,$sql);
                $values = mysqli_fetch_assoc($result);
                $num_rows = $values['jml_2020'];
                echo ($num_rows);
                ?>
                
                <div class="mt-2 mb-0 text-muted text-xs">
                  <span></span>
                </div>
              </div>
              <div class="col-auto">
                <i class="fa fa-dollar-sign fa-2x text-success"></i>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-xl-3 col-md-6 mb-4">
        <div class="card h-100">
          <div class="card-body">
            <div class="row align-items-center">
              <div class="col mr-2">

                <div class="text-xs font-weight-bold text-uppercase mb-1">Produk Terjual</div>
               <?php
                $servername = "localhost";
                $username = "root";
                $password = "laragonfull";
                $dbname = "wkr_toko";
                $con = mysqli_connect($servername,$username,$password,$dbname);

                $sql = "SELECT count(order_id) AS total FROM tbl_order";
                $result = mysqli_query($con,$sql);
                $values = mysqli_fetch_assoc($result);
                $num_rows = $values['total'];
                echo $num_rows;
                ?>
                
                <div class="mt-2 mb-0 text-muted text-xs">
                  <span></span>
                </div>
              </div>
              <div class="col-auto">
                <i class="fas fa-calendar fa-2x text-primary"></i>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- Earnings (Annual) Card Example -->
      <div class="col-xl-3 col-md-6 mb-4">
        <div class="card h-100">
          <div class="card-body">
            <div class="row no-gutters align-items-center">
              <div class="col mr-2">
                <div class="text-xs font-weight-bold text-uppercase mb-1">Transaksi Sukses</div>
                <?php
                $servername = "localhost";
                $username = "root";
                $password = "laragonfull";
                $dbname = "wkr_toko";
                $con = mysqli_connect($servername,$username,$password,$dbname);

                $sql = "SELECT count(order_id) AS total FROM tbl_order where order_status='1'";
                $result = mysqli_query($con,$sql);
                $values = mysqli_fetch_assoc($result);
                $num_rows = $values['total'];
                echo $num_rows;
                ?>
                <div class="h5 mb-0 font-weight-bold text-gray-800"></div>
                <div class="mt-2 mb-0 text-muted text-xs">
                 
                </div>
              </div>
              <div class="col-auto">
                <i class="fas fa-shopping-cart fa-2x text-success"></i>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- New User Card Example -->
      <div class="col-xl-3 col-md-6 mb-4">
        <div class="card h-100">
          <div class="card-body">
            <div class="row no-gutters align-items-center">
              <div class="col mr-2">
                <div class="text-xs font-weight-bold text-uppercase mb-1">Transaksi Pending</div>
                <?php
                $servername = "localhost";
                $username = "root";
                $password = "laragonfull";
                $dbname = "wkr_toko";
                $con = mysqli_connect($servername,$username,$password,$dbname);

                $sql = "SELECT count(order_id) AS total FROM tbl_order where order_status='pending'";
                $result = mysqli_query($con,$sql);
                $values = mysqli_fetch_assoc($result);
                $num_rows = $values['total'];
                echo $num_rows;
                ?>
                <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800"></div>
                <div class="mt-2 mb-0 text-muted text-xs">
                  
                </div>
              </div>
              <div class="col-auto">
                <i class="fas fa-shopping-cart fa-2x text-info"></i>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- Pending Requests Card Example -->
      <div class="col-xl-3 col-md-6 mb-4">
        <div class="card h-100">
          <div class="card-body">
            <div class="row no-gutters align-items-center">
              <div class="col mr-2">
                <div class="text-xs font-weight-bold text-uppercase mb-1">Customer Total</div>
                <?php
                $servername = "localhost";
                $username = "root";
                $password = "laragonfull";
                $dbname = "wkr_toko";
                $con = mysqli_connect($servername,$username,$password,$dbname);

                $sql = "SELECT count(customer_id) AS total FROM tbl_customer";
                $result = mysqli_query($con,$sql);
                $values = mysqli_fetch_assoc($result);
                $num_rows = $values['total'];
                echo $num_rows;
                ?>
                <div class="h5 mb-0 font-weight-bold text-gray-800"></div>
                <div class="mt-2 mb-0 text-muted text-xs">
                  
                </div>
              </div>
              <div class="col-auto">
                <i class="fas fa-users fa-2x text-warning"></i>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-xl-3 col-md-6 mb-4">
        <div class="card h-100">
          <div class="card-body">
            <div class="row no-gutters align-items-center">
              <div class="col mr-2">
                <div class="text-xs font-weight-bold text-uppercase mb-1">Product Total</div>
                <?php
                $servername = "localhost";
                $username = "root";
                $password = "laragonfull";
                $dbname = "wkr_toko";
                $con = mysqli_connect($servername,$username,$password,$dbname);

                $sql = "SELECT count(product_id) AS total FROM tbl_products";
                $result = mysqli_query($con,$sql);
                $values = mysqli_fetch_assoc($result);
                $num_rows = $values['total'];
                echo $num_rows;
                ?>
                <div class="h5 mb-0 font-weight-bold text-gray-800"></div>
                <div class="mt-2 mb-0 text-muted text-xs">
                  
                </div>
              </div>
              <div class="col-auto">
                <i class="fas fa-calendar-day fa-2x" style="color: pink"></i>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-xl-3 col-md-6 mb-4">
        <div class="card h-100">
          <div class="card-body">
            <div class="row no-gutters align-items-center">
              <div class="col mr-2">
                <div class="text-xs font-weight-bold text-uppercase mb-1">Subcriber</div>
                <?php
                $servername = "localhost";
                $username = "root";
                $password = "laragonfull";
                $dbname = "wkr_toko";
                $con = mysqli_connect($servername,$username,$password,$dbname);

                $sql = "SELECT count(id) AS total FROM tbl_subcriber";
                $result = mysqli_query($con,$sql);
                $values = mysqli_fetch_assoc($result);
                $num_rows = $values['total'];
                echo $num_rows;
                ?>
                <div class="h5 mb-0 font-weight-bold text-gray-800"></div>
                <div class="mt-2 mb-0 text-muted text-xs">
                  
                </div>
              </div>
              <div class="col-auto">
                <i class="fas fa-user-cog fa-2x" style="color: red"></i>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="row" style="margin-left: 10px">
        <div class="col-lg-12 mb-4">
          <div class="card bg-primary text-white shadow">
            <div class="card-body">
              <div class="list-inline"><i class="far fa-clock list-inline-item"></i><p class="list-inline-item" style="font-weight: bold;">Waktu Saat Ini</p></div>
              <h2 class="text-center" id="myclock"></h2>
            </div>
          </div>
        </div>
      </div>

    </div>
    <!--Row-->

    <div class="row">
      <div class="col-lg-12 text-center">
        
      </div>
  </div>
@endsection
@push('bottom')
<script src="{{ asset('js/jquery.counterup.js') }}"></script>
<script src="{{ asset('js/jquery.waypoints.js') }}"></script>
<script type="text/javascript">
$('.num').counterUp({delay:10,time:1000});

$(function() {
  $('.chart').easyPieChart({

  });
});

var clock = 0;
var interval_msec = 1000;
$(function() {
  clock = setTimeout("UpdateClock()", interval_msec);
});
function UpdateClock(){
  clearTimeout(clock);
  var asiaTime = new Date().toLocaleString("en-US", {timeZone: "Asia/Jakarta"});
  var dt_now = new Date(asiaTime);
  var weekday = new Array(7);
  weekday[0] = "Ahad";
  weekday[1] = "Senin";
  weekday[2] = "Selasa";
  weekday[3] = "Rabu";
  weekday[4] = "Kamis";
  weekday[5] = "Jumat";
  weekday[6] = "Sabtu";
  var day = weekday[dt_now.getDay()];
  var hh  = dt_now.getHours();
  var mm  = dt_now.getMinutes();
  var ss  = dt_now.getSeconds();
  if(hh < 10){
    hh = "0" + hh;
  }
  if(mm < 10){
    mm = "0" + mm;
  }
  if(ss < 10){
    ss = "0" + ss;
  }
  $("#myclock").html(day + ", " + hh + ":" + mm + ":" + ss);
  clock = setTimeout("UpdateClock()", interval_msec);
}
</script>
@endpush