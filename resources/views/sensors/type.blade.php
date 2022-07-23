@extends('layouts/master')

@section('content')
<nav class="page-breadcrumb">
	<ol class="breadcrumb">
		<li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
		<li class="breadcrumb-item active" aria-current="page">All Sensors Type</li>
	</ol>
</nav>

<div class="row">
	<div class="col-md-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <a href="{{ route('sensors-type.create') }}" class="btn btn-primary me-2 mb-3">Add New Sensor Type</a>
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
                <th>Name Sensor Type</th>
                <th>Sensor Code</th>
                <th>Measurement</th>
                <th>Options</th>
              </tr>
            </thead>
            <tbody>
              @forelse ($typesensors as $typesensor)
              <tr>
                <td>{{ $typesensor->sensor_type_name }}</td>
                <td>{{ $typesensor->sensor_type_code }}</td>
                <td>{{ $typesensor->sensor_type_measurement }}</td>
                <td>
                  <form onsubmit="return confirm('Are You Sure ?');" action="{{ route('sensors-type.destroy', $typesensor->id) }}" method="POST">
                  <i data-feather="eye" class="icon-sm me-2"></i> 
                    <span class="">View</span>
                  <a href="{{ route('sensors-type.edit', $typesensor->id) }}">
                    <i data-feather="edit-2" class="icon-sm me-2"></i> 
                    <span class="">Edit</span>
                  </a>
                  @csrf
                  @method('DELETE')
                  <i data-feather="trash" class="icon-sm me-2"></i> <span class=""><button type="submit" class="btn btn-sm btn-danger">Delete</button></span>
                </td>
              </tr>
              @empty
              <tr>
                  <td class="text-center text-mute" colspan="5">Sensors Type Data Not Available</td>
              </tr>
              @endforelse
              
            </tbody>
          </table>
        </div>
      </div>
    </div>
	</div>
</div>

@endsection