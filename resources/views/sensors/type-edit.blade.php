@extends('layouts/master')
@section('content')
<nav class="page-breadcrumb">
	<ol class="breadcrumb">
		<li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
		<li class="breadcrumb-item active" aria-current="page">Edit Sensor Type</li>
	</ol>
</nav>
<div class="row">
<div class="col-md-12 grid-margin stretch-card">
<div class="card">
<div class="card-body">
	<h6 class="card-title">Create Sensor Type</h6>
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
	<form class="forms-sample" action="{{ route('sensors-type.update', $sensorstype->id) }}" method="POST">
    @csrf
    @method('PUT')
		<div class="mb-3">
            <div class="row">
            <div class="col">
			<label for="SensorTypeName" class="form-label">Sensor Type Name</label>
			<input type="text" class="form-control" id="SensorTypeName" name="sensor_type_name" autocomplete="off" placeholder="Sensor Type Name" value="{{ old('sensor_type_name', $sensorstype->sensor_type_name) }}">
			<!-- error message untuk title -->
            @error('sensor_type_name')
            <p class="mb-3">
                {{ $message }}
            </p>
            @enderror
            </div>
		

		    <div class="col">
			<label for="SensorTypeCode" class="form-label">Sensor Type Code</label>
			<input type="text" class="form-control" id="SensorTypeCode" name="sensor_type_code" autocomplete="off" placeholder="Sensor Type Code" value="{{ old('sensor_type_code', $sensorstype->sensor_type_code) }}">
			<!-- error message untuk title -->
            @error('sensor_type_code')
            <p class="mb-3">
                {{ $message }}
            </p>
            @enderror
            </div>
            </div>
		</div>


        <div class="mb-3">
            <div class="row">
            <div class="col">
            <label for="Measurement" class="form-label">Measurement</label>
            <input type="text" class="form-control" id="Measurement" name="sensor_type_measurement" autocomplete="off" placeholder="Measurement Sensor" value="{{ old('sensor_type_measurement', $sensorstype->sensor_type_measurement) }}">
            <!-- error message untuk title -->
            @error('sensor_type_measurement')
            <p class="mb-3">
                {{ $message }}
            </p>
            @enderror
            </div>
            <div class="col">
            <label for="MeasurementCode" class="form-label">Measurement Code</label>
            <input type="text" class="form-control" id="MeasurementCode" name="sensor_type_measurement_code" autocomplete="off" placeholder="Measurement Code" value="{{ old('sensor_type_measurement_code', $sensorstype->sensor_type_measurement_code) }}">
            <!-- error message untuk title -->
            @error('sensor_type_measurement_code')
            <p class="mb-3">
                {{ $message }}
            </p>
            @enderror
            </div>
            </div>
        </div>

		<div class="mb-3">
			<label for="SensorTypeDescription" class="form-label">Sensor Type Description</label>
			<textarea name="sensor_type_description" class="form-control" id="SensorTypeDescription" rows="5">{{ old('sensor_type_description', $sensorstype->sensor_type_description) }}</textarea>
			@error('sensor_type_description')
            <p class="mb-3">
                {{ $message }}
            </p>
            @enderror
		</div>
		<button type="submit" class="btn btn-primary me-2">Update Type</button>
		<button class="btn btn-secondary">Cancel</button>
	</form>
</div>
</div>
</div>

</div>
@endsection