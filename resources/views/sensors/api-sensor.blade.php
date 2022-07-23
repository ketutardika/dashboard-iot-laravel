@extends('layouts/master')

@section('content')
<nav class="page-breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
        <li class="breadcrumb-item active" aria-current="page">API Device {{ $sensor->unique_id }}</li>
    </ol>
</nav>

<div class="row">
    <div class="col-md-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h6 class="card-title">API Device {{ $sensor->unique_id }}</h6>
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
        <div class="row">
            <div class="col-md-2 grid-margin stretch-card">
                Sensor ID
            </div>
            <div class="col-md-10 grid-margin stretch-card">
                {{ $sensor->unique_id }}
            </div>
            <div class="col-md-2 grid-margin stretch-card">
                Sensor Type
            </div>
            <div class="col-md-10 grid-margin stretch-card">
                @foreach ($typesensors as $typesensor)
                <?php if($typesensor->id==$sensor->id_sensor_type) echo $typesensor->sensor_type_name; ?>
                @endforeach
            </div>
            <div class="col-md-2 grid-margin stretch-card">
                Sensor Name
            </div>
            <div class="col-md-10 grid-margin stretch-card">
                {{ $sensor->name_sensor }}
            </div>
            <div class="col-md-2 grid-margin stretch-card">
                API Key
            </div>
            <div class="col-md-10 grid-margin stretch-card">
                {{ $sensor->api_key }}
            </div>
            <div class="col-md-2 grid-margin stretch-card">
                Method
            </div>
            <div class="col-md-10 grid-margin stretch-card">
                GET
            </div>            
             <div class="col-md-2 grid-margin stretch-card">
                Parameter
            </div>
            <div class="col-md-10 grid-margin">
                <p class="form-control-static"><code>id</code> (sensor ID)</p>
                                <p class="form-control-static"><code>v</code> (value sensor reading)</p>
                                <p class="form-control-static"><code>api_key</code> (unique API key)</p>
                                <p class="form-control-static"><code>response_type</code> (optional) (empty or <i>basic</i>)</p>
            </div>
            <hr>
            <div class="col-md-2 grid-margin stretch-card">
                URL
            </div>
            <div class="col-md-10 grid-margin stretch-card">
                {{ 'http://'.$_SERVER['HTTP_HOST'].'/os/api/data/push' }}
            </div>
            <div class="col-md-2 grid-margin stretch-card">
                Example request
            </div>
            <div class="col-md-10 grid-margin stretch-card">
                <p class="form-control-static">{{ 'http://'.$_SERVER['HTTP_HOST'].'/os/api/data/push?id='.$sensor->unique_id.'&v=30.15&api_key='.$sensor->api_key }}</p>
            </div>
            <hr>
            <div class="col-md-2 grid-margin stretch-card">
                Example Response
            </div>
            <div class="col-md-10 grid-margin">
                <p class="form-control-static">
                    <code>{"status":"success","read_every":15}</code>
                </p>
                <p class="form-control-static">
                    <code>{"status":"error","reason":"Invalid temperature or humidity readings. Must be numeric value."}</code>
                </p>
                <p class="form-control-static">
                    <code>{"status":"error","reason":"Invalid API key."}</code>
                </p>
                <p class="form-control-static">
                    <code>{"status":"error","reason":"Invalid sensor unique ID."}</code>
                </p>
                <br>
                <p class="form-control-static">
                    With <code>&response_type=basic</code> server returns plain text with either <code>success</code> or <code>fail</code>.
                </p>
            </div>

            
        </div>

      </div>
    </div>
    </div>
</div>
@endsection
