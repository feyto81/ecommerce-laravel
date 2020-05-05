@extends('admin_layout')

@section('admin_content')
@toastr_css
<div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Contact</h1>
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="./">Dashboard</a></li>
              <li class="breadcrumb-item">Contact</li>
            </ol>
          </div>
   <div class="col-lg-12">
              <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Contact Customer Data</h6>
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
                        <th>No</th>
                        <th>Customer Name</th>
                        <th>Customer Email</th>
                        <th>Mobile Number</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach($all_customer_info as $all_customer)
                      <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{$all_customer->customer_name}}</td>
                        <td>{{$all_customer->customer_email}}</td>
                        <td>{{$all_customer->mobile_number}}</td>
                        <td>
                          <a href="{{URL::to('/delete-customer/'.$all_customer->customer_id)}}" id="delete" class="btn btn-sm btn-danger">
                            <i class="fas fa-trash fa-fw"></i>
                          </a>
                          <a href="{{URL::to('/edit-customer/'.$all_customer->customer_id)}}" class="btn btn-sm btn-primary">
                            <i class="fas fa-edit fa-fw"></i>
                          </a>
                        </td>
                      </tr>
                      @endforeach
                    </tbody>
                  </table>
                </div>
              </div>
               @include('sweetalert::alert')
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