@extends('layouts/master')
@section('content')
<nav class="page-breadcrumb">
	<ol class="breadcrumb">
		<li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
		<li class="breadcrumb-item active" aria-current="page">Setting General</li>
	</ol>
</nav>
<div class="row">
<div class="col-md-12 grid-margin stretch-card">
<div class="card">
<div class="card-body">
	<h6 class="card-title">Setting General</h6>
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
	<form class="forms-sample" action="" method="POST">
    @csrf
    @method('PUT')
		<div class="mb-3">
			<label for="SiteTitle" class="form-label">Site Title</label>
			<input type="text" class="form-control" id="SiteTitle" name="title" autocomplete="off" placeholder="Site Title" value="{{ old('title', $settinggeneral-title) }}">
			<!-- error message untuk title -->
            @error('title')
            <p class="mb-3">
                {{ $message }}
            </p>
            @enderror
		</div>
		<button type="submit" class="btn btn-primary me-2">Change Project</button>
		<button class="btn btn-secondary">Cancel</button>
	</form>
</div>
</div>
</div>

</div>
@endsection