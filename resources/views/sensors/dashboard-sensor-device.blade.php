@extends('layouts/master')

@section('content')
@foreach ($sections as $section)
<nav class="page-breadcrumb">
	<ol class="breadcrumb">
		<li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
		<li class="breadcrumb-item active" aria-current="page">Sensors {{ $section->name_section }}</li>
	</ol>
</nav>

<div class="row">
	<div class="col-md-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <a href="{{ route('sensors.createsensor', $section->unique_id) }}" class="btn btn-primary me-2 mb-3">Add New Sensor</a>
        <p class="text-muted mb-3">Read the <a href="#" target="_blank"> Official Aquamonia Documentation </a>for a full list of instructions and other options.</p>
        <!-- Notifikasi menggunakan flash session data -->
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
        <div class="table-responsive">
          <table id="dataTableExample" class="table">
            <thead>
              <tr>
                <th>Unique ID</th>
                <th>Sensor Name</th>
                <th>API Key</th>
                <th>Status Device</th>
                <th>Options</th>
              </tr>
            </thead>
            <tbody>
              @forelse ($sensors as $sensor)
              <tr>
                <td>{{ $sensor->unique_id }}</td>
                <td>{{ $sensor->name_sensor }}</td>
                <td>{{ $sensor->api_key }}</td>
                <td>
                  @if ($sensor->status_device == 0)
                    <span class="badge bg-danger">Not Connected</span>
                  @else 
                    <span class="badge bg-success">Connected</span>
                  @endif

                </td>
                <td>
                  <form onsubmit="return confirm('Are You Sure ?');" action="{{ route('sensors.dashboard-deleted', $sensor->id) }}" method="POST">
                  @csrf
                  @method('DELETE')
                  <a href="{{ route('sensors.config', $sensor->unique_id) }}">
                  <i data-feather="eye" class="icon-sm me-2"></i> 
                    <span class="">Config</span>
                  </a>
                  <a href="{{ route('sensors.api', $sensor->unique_id) }}">
                    <i data-feather="edit-2" class="icon-sm me-2"></i> 
                    <span class="">Setup</span>
                  </a>                  
                  <i data-feather="trash" class="icon-sm me-2"></i> <span class=""><button type="submit" class="btn btn-sm btn-danger">Delete</button></span>
                </form>
                </td>
              </tr>
              @empty
              <tr>
                  <td class="text-center text-mute" colspan="5">Sensor Data Not Available</td>
              </tr>
              @endforelse
              
            </tbody>
          </table>
        </div>
      </div>
    </div>
	</div>
</div>
@endforeach
@endsection