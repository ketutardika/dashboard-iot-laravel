@extends('layouts/master')

@section('content')
<div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
<div>
@foreach ($farms as $farm)
<h4 class="mb-3 mb-md-0">{{ $farm->name_organization }}</h4>
@endforeach  
</div>
<div class="d-flex align-items-center flex-wrap text-nowrap">
<div class="input-group date datepicker wd-200 me-2 mb-2 mb-md-0" id="dashboardDate">
  <span class="input-group-text input-group-addon bg-transparent border-primary"><i data-feather="calendar" class=" text-primary"></i></span>
  <input type="text" class="form-control border-primary bg-transparent">
</div>
</div>
</div>
@if (session('success'))
<div class="alert alert-success">
    {{ session('success') }}
</div>
@endif

@if (session('error'))
<div class="alert alert-error">
    {{ session('error') }}
</div>
@endif

<div class="row">
          <div class="col-12 col-xl-12 stretch-card">
            <div class="row flex-grow-1">
            @foreach ($controllings as $controlling)
              <div class="col-md-4 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <div class="d-flex justify-content-between align-items-baseline">
                      <h6 class="card-title mb-0">{{ $controlling->name }}</h6>
                    </div>
                    <div class="row">
                      <div class="col-6 col-md-12 col-xl-5">
                        <h3 class="mb-2 text-led-{{ $controlling->id }}">
                        @if($controlling->value==1)  
                          ON
                        @else
                          OFF      
                        @endif
                        </h3>
                      </div>
                      <div class="col-6 col-md-12 col-xl-7">
                        <div class="mb-3">
                    <div class="form-check form-switch mb-2">
                      <input data-id="{{ $controlling->id }}" type="checkbox" class="toggle-class form-check-input" id="formSwitch1" {{ $controlling->value ? 'checked' : '' }}>
                      <label class="form-check-label" for="formSwitch1">Switch {{ $controlling->name }}</label>
                    </div>
                  </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            @endforeach
            </div>
          </div>
</div> <!-- row -->
<?php $j=1; ?>
@foreach ($ProjectsSections as $ProjectSection)
<div class="row">
<div class="col-lg-6 col-xl-6 stretch-card">
<div class="card">
  <div class="card-body">
    <div class="d-flex justify-content-between align-items-baseline mb-2">
      <h6 class="card-title mb-0">{{ $ProjectSection->name_section }}</h6>
      <div class="dropdown mb-2">
        <button class="btn p-0" type="button" id="dropdownMenuButton7" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="icon-lg text-muted pb-3px" data-feather="more-horizontal"></i>
        </button>
        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton7">
          <a class="dropdown-item d-flex align-items-center" href="#" data-bs-toggle="modal" data-bs-target="#addSensor-{{ $ProjectSection->unique_id }}"><i data-feather="plus-circle" class="icon-sm me-2"></i> <span class="">Create Sensor</span></a>
          <a class="dropdown-item d-flex align-items-center" href="javascript:;"><i data-feather="eye" class="icon-sm me-2"></i> <span class="">View</span></a>
          <a class="dropdown-item d-flex align-items-center" href="javascript:;"><i data-feather="printer" class="icon-sm me-2"></i> <span class="">Print</span></a>
          <a class="dropdown-item d-flex align-items-center" href="javascript:;"><i data-feather="download" class="icon-sm me-2"></i> <span class="">Download</span></a>
        </div>
      </div>
    </div>
    <div class="table-responsive">
      <table class="table table-hover mb-0">
        <thead>
          <tr>
            <th class="pt-0">#</th>
            <th class="pt-0">Name</th>
            <th class="pt-0">L.Value</th>
            <th class="pt-0">L.Check</th>
            <th class="pt-0">Status</th>
          </tr>
        </thead>
        <tbody>
          <?php $i=1;  ?>
          @foreach($ProjectSection->sectionssensor as $sensor)
          <tr>
            <td><?php echo $i;?></td>
            <td><a href="{{ route('sensors.datalog', $sensor->unique_id) }}">{{ $sensor->name_sensor }}</a></td>
            <td>{{ $sensor->last_temp }}</td>
            <td>{{ $sensor->last_check }}</td>
            <td><span class="badge bg-danger">down</span></td>
          </tr>
          <?php $i++; ?>
          @endforeach        
        </tbody>
      </table>
    </div>

    <!-- Modal -->
              <div class="modal fade" id="addSensor-{{ $ProjectSection->unique_id }}" tabindex="-1" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalCenterTitle">Create Sensor {{ $ProjectSection->name_section }}</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="btn-close"></button>
                    </div>
                    <form class="forms-sample" action="{{ route('sensors.store') }}" method="POST">
                    @csrf
                    <div class="modal-body">
                    <input type="hidden" name="unique_id_section" value="{{ $ProjectSection->unique_id }}">                   
                      <div class="mb-3">
                        <label for="UniqueId" class="form-label">Unique ID</label>
                        <input type="text" class="form-control" id="UniqueId" name="unique_id" autocomplete="off" placeholder="4RPFBHFT7V">
                        <!-- error message untuk title -->
                              @error('unique_id')
                              <p class="mb-3">
                                  {{ $message }}
                              </p>
                              @enderror
                      </div>
                      <div class="mb-3">
                        <label for="SensorType" class="form-label">Sensor Type</label>
                        <select class="form-select" id="SensorType" name="sensor_type_id">
                            @foreach ($typesensors as $typesensor)
                            <option value ="{{$typesensor->id}}"> {{$typesensor->sensor_type_name }} ( {{$typesensor->sensor_type_code }} )</option>
                            @endforeach
                        </select>
                        @error('sensor_type_code')
                        <p class="mb-3">
                            {{ $message }}
                        </p>
                        @enderror
                      </div>
                      <div class="mb-3">
                        <label for="SensorName" class="form-label">Sensor Name</label>
                        <input type="text" class="form-control" id="SensorName" name="name_sensor" autocomplete="off" placeholder="Sensor Name">
                        <!-- error message untuk title -->
                              @error('name_sensor')
                              <p class="mb-3">
                                  {{ $message }}
                              </p>
                              @enderror
                      </div>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                      <button type="submit" class="btn btn-primary">Create Sensor</button>
                    </div>
                    </form>
                  </div>
                </div>
              </div>

  </div> 
</div>
</div>
<div class="col-lg-6 col-xl-6 grid-margin grid-margin-xl-0 stretch-card">
<div class="card">
  <div class="card-body">
  <div class="d-flex justify-content-between align-items-baseline mb-4 mb-md-3">
    <h6 class="card-title mb-0">Sensors</h6>
  </div>
  <div class="row align-items-start">
    <div id="live_container_<?php echo $j; ?>" style="min-width: 310px; height: 400px; margin: 0 auto; text-align:center;"><h4><span style="padding-top: 50px;">Loading...</span></h4>
    </div>
  </div>
  </div>
  </div>
</div>
<div class="clearfix"><hr></div>
</div> <!-- row -->
<?php $j++; ?>
@endforeach
          


<div class="row">
<div class="col-12 col-xl-12 grid-margin stretch-card">

</div>
</div> <!-- row -->

<div class="row">
<div class="col-12 col-xl-12 stretch-card">
<div class="row flex-grow-1">
<div class="col-md-12 grid-margin stretch-card">
<div class="card">
  <div class="card-header">{{ __('Dashboard') }}</div>
  <div class="card-body">
    <div class="row">
      <div class="col-12">
        @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
        @endif
        {{ __('You are logged in!') }}
      </div>        
      </div>

    </div>
  </div>
</div>
</div>
</div>
</div>
@endsection
