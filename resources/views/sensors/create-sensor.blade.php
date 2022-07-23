@extends('layouts/master')
@section('content')
<nav class="page-breadcrumb">
	<ol class="breadcrumb">
		<li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
		<li class="breadcrumb-item active" aria-current="page">Create Sensor</li>
	</ol>
</nav>
<div class="row">
<div class="col-md-12 grid-margin stretch-card">
<div class="card">
<div class="card-body">
	<h6 class="card-title">Create Sensor</h6>
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
	<form class="forms-sample" action="{{ route('sensors.store') }}" method="POST">
    @csrf
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
            <label for="unique_id_section" class="form-label">Unique ID Section</label>
            @foreach ($sections as $section)
            <input type="text" class="form-control" id="unique_id_section" name="unique_id_section" autocomplete="off" readonly value="{{ $section->unique_id }}">
            @endforeach
            <!-- error message untuk title -->
            @error('unique_id_section')
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
		<button type="submit" class="btn btn-primary me-2">Create Device</button>
		<button class="btn btn-secondary">Cancel</button>
	</form>
</div>
</div>
</div>

</div>
@endsection