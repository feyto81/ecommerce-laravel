@extends('admin_layout')

@section('admin_content')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Manufacture</h1>
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="./">Dashboard</a></li>
              <li class="breadcrumb-item">Manufacture</li>
              <li class="breadcrumb-item active" aria-current="page">All Manufacture</li>
            </ol>
          </div>
	 <div class="col-lg-12">
              <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">All Manufacture</h6>
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
                  <table class="table align-items-center table-flush table-hover" name="dataTable" id="dataTable">
                    <thead class="thead-light">
                      <tr>
                      	<th>No</th>
                        <th>Manufacture ID</th>
                        <th>Manufacture Name</th>
                        <th>Manufacture Description</th>
                        <th>Status</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                    @foreach($all_manufacture_info as $v_manufacture)
                      <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{$v_manufacture->manufacture_id}}</td>
                        <td>{{$v_manufacture->manufacture_name}}</td>
                        <td>{{$v_manufacture->manufacture_description}}</td>
                        <td class="center">
                        	@if($v_manufacture->publication_status==1)
                        		<span class="badge badge-success">Active</span>
                        	@else
                        		<span class="badge badge-danger">Unactive</span>
                        	@endif
                        </td>
                        <td class="center">
                        	@if($v_manufacture->publication_status==1)
                        	<a href="{{URL::to('/unactive_manufacture/'.$v_manufacture->manufacture_id)}}" class="btn btn-sm btn-danger">
                        		<i class="fas fa-thumbs-down fa-fw"></i>
                        	</a>
                        	@else
                        	<a href="{{URL::to('/active_manufacture/'.$v_manufacture->manufacture_id)}}" class="btn btn-sm btn-success">
                        		<i class="fas fa-thumbs-up fa-fw"></i>
                        	</a>
                        	@endif
                        	<a href="{{URL::to('/edit-manufacture/'.$v_manufacture->manufacture_id)}}" class="btn btn-sm btn-primary">
                        		<i class="fas fa-edit fa-fw"></i>
                        	</a>
                        	<a href="{{URL::to('/delete-manufacture/'.$v_manufacture->manufacture_id)}}" id="delete" class="btn btn-sm btn-danger">
                        		<i class="fas fa-trash fa-fw"></i>
                        	</a>
                        </td>
                      </tr>
                      @endforeach
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
@endsection
@push('bottom')
  <script>
    $(document).ready(function () {
            $('#dataTable').DataTable({
                dom: 'lBfrtip',
                buttons: []
            });
        });
  </script>
@endpush