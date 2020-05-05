@extends('admin_layout')

@section('admin_content')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Slider</h1>
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="./">Dashboard</a></li>
              <li class="breadcrumb-item">Slider</li>
              <li class="breadcrumb-item active" aria-current="page">All Slider</li>
            </ol>
          </div>
	 <div class="col-lg-12">
              <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">All Slider</h6>
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
                      	<th>Slider ID</th>
                        <th>Slider Image</th>
                        <th>Status</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                    @foreach($all_slider as $v_slider)
                      <tr>
                        <td>{{$v_slider->slider_id}}</td>
                        <td><img style="width: 140px;height: 80px" src="{{URL::to($v_slider->slider_image)}}"></td>
                        <td class="center">
                          @if($v_slider->publication_status==1)
                            <span class="badge badge-success">Active</span>
                          @else
                            <span class="badge badge-danger">Unactive</span>
                          @endif
                        </td>
                        <td class="center">
                          @if($v_slider->publication_status==1)
                          <a href="{{URL::to('/unactive_slider/'.$v_slider->slider_id)}}" class="btn btn-sm btn-danger">
                            <i class="fas fa-thumbs-down fa-fw"></i>
                          </a>
                          @else
                          <a href="{{URL::to('/active_slider/'.$v_slider->slider_id)}}" class="btn btn-sm btn-success">
                            <i class="fas fa-thumbs-up fa-fw"></i>
                          </a>
                          @endif
                          <a href="{{URL::to('/delete-slider/'.$v_slider->slider_id)}}" id="delete" class="btn btn-sm btn-danger">
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