@extends('layouts/master')
@section('content')
<nav class="page-breadcrumb">
	<ol class="breadcrumb">
		<li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
		<li class="breadcrumb-item active" aria-current="page">Sensor Config</li>
	</ol>
</nav>
<div class="row">
<div class="col-md-12 grid-margin stretch-card">
<div class="card">
<div class="card-body">
	<h6 class="card-title">Config</h6>
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
	<form class="forms-sample" action="{{ route('sensors.update', $sensor->unique_id) }}" method="POST">
    @csrf
    @method('PUT')        

        <div class="mb-3">
            <label for="SensorName" class="form-label">Sensor Name</label>
            <input type="text" class="form-control" id="SensorName" name="name_sensor" autocomplete="off" placeholder="Sensor Name" value="{{ old('name_sensor', $sensor->name_sensor) }}">
            <!-- error message untuk title -->
            @error('name_sensor')
            <p class="mb-3">
                {{ $message }}
            </p>
            @enderror
        </div>

		<div class="mb-3">
			<div class="row">
			<div class="col">
				<label for="UniqueID" class="form-label">Unique ID</label>
				<input type="text" class="form-control" id="UniqueID" name="unique_id" autocomplete="off" placeholder="Unique ID" value="{{ old('unique_id', $sensor->unique_id) }}" readonly="readonly">
        	</div>
        	<div class="col">
				<label for="UniqueID" class="form-label">MAC Address</label>
				<input type="text" class="form-control" id="UniqueID" name="unique_id2" autocomplete="off" placeholder="Unique ID" value="Unknown" readonly="readonly">
        	</div>
        	<div class="col">
				<label for="UniqueID" class="form-label">Firmware</label>
				<input type="text" class="form-control" id="UniqueID" name="unique_id3" autocomplete="off" placeholder="Unique ID" value="Unknown" readonly="readonly">
        	</div>
        	</div>
		</div>

        <div class="mb-3">
            <label for="SensorType" class="form-label">Sensor Type</label>
            <select class="form-select" id="SensorType" name="sensor_type_id">
                @foreach ($typesensors as $typesensor)
                <option value ="{{$typesensor->id}}" <?php if($typesensor->id==$sensor->id_sensor_type) echo "selected"; ?>> {{$typesensor->sensor_type_name }} ( {{$typesensor->sensor_type_code }} )</option>
                @endforeach
            </select>
            @error('sensor_type_code')
            <p class="mb-3">
                {{ $message }}
            </p>
            @enderror
        </div>

		<div class="mb-3">
			<label for="SensorPin" class="form-label">Sensor Pin</label>
			<input type="text" class="form-control" id="SensorPin" name="pin" autocomplete="off" placeholder="Pin Number Device" value="{{ old('pin', $sensor->pin) }}">
			<!-- error message untuk title -->
            @error('pin')
            <p class="mb-3">
                {{ $message }}
            </p>
            @enderror
		</div>

		<div class="mb-3">
			<label for="ReadEvery" class="form-label">Read Every</label>
			<select class="form-select" id="ReadEvery" name="deepsleep_time">
				<option selected="" disabled="">Select Time</option>
				<option value="1" <?php if($sensor->sensorconfig->deepsleep_time==1) echo "selected"; ?>>1 Minutes</option>
                <option value="5" <?php if($sensor->sensorconfig->deepsleep_time==5) echo "selected"; ?>>5 Minutes</option>
                <option value="10" <?php if($sensor->sensorconfig->deepsleep_time==10) echo "selected"; ?>>10 Minutes</option>
                <option value="15" <?php if($sensor->sensorconfig->deepsleep_time==15) echo "selected"; ?>>15 Minutes</option>
                <option value="20" <?php if($sensor->sensorconfig->deepsleep_time==20) echo "selected"; ?>>20 Minutes</option>
                <option value="30" <?php if($sensor->sensorconfig->deepsleep_time==30) echo "selected"; ?>>30 Minutes</option>
                <option value="60" <?php if($sensor->sensorconfig->deepsleep_time==60) echo "selected"; ?>>60 Minutes</option>
			</select>
			@error('deepsleep_time')
            <p class="mb-3">
                {{ $message }}
            </p>
            @enderror
		</div>

		<hr>

		<div class="mb-3">
			<div class="row">
			<div class="col">
			<label for="AlertMin" class="form-label">Min</label>
			<input type="number" class="form-control" id="AlertMin" name="min_temp" autocomplete="off" placeholder="Min Alert" value="{{ old('min_temp', $sensor->sensorconfig->min_temp) }}">
			<!-- error message untuk title -->
            @error('min_temp')
            <p class="mb-3">
                {{ $message }}
            </p>
            @enderror
        	</div>

        	<div class="col">
			<label for="AlertMax" class="form-label">Max</label>
			<input type="number" class="form-control" id="AlertMax" name="max_temp" autocomplete="off" placeholder="Max Alert" value="{{ old('max_temp', $sensor->sensorconfig->max_temp) }}">
			<!-- error message untuk title -->
            @error('max_temp')
            <p class="mb-3">
                {{ $message }}
            </p>
            @enderror
        	</div>

        	</div>
		</div>

        
        <div class="mb-3">
            <label for="Notes" class="form-label">Notes</label>
            <textarea name="notes" class="form-control" id="Notes" rows="5">{{ old('notes', $sensor->notes) }}</textarea>
            @error('notes')
            <p class="mb-3">
                {{ $message }}
            </p>
            @enderror
        </div>
		
		<button type="submit" class="btn btn-primary me-2">Save</button>
		<button class="btn btn-secondary">Cancel</button>
	</form>
</div>
</div>
</div>

</div>
@endsection