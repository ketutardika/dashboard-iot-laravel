@extends('layouts/master')
@section('content')
<nav class="page-breadcrumb">
	<ol class="breadcrumb">
		<li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
		<li class="breadcrumb-item active" aria-current="page">Create Projects</li>
	</ol>
</nav>
<div class="row">
<div class="col-md-12 grid-margin stretch-card">
<div class="card">
<div class="card-body">
	<h6 class="card-title">Create Project</h6>
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
	<form class="forms-sample" action="{{ route('projects.store') }}" method="POST">
    @csrf
		<div class="mb-3">
			<label for="ProjectName" class="form-label">Project Name</label>
			<input type="text" class="form-control" id="ProjectName" name="name_project" autocomplete="off" placeholder="Project Name">
			<!-- error message untuk title -->
            @error('name_project')
            <p class="mb-3">
                {{ $message }}
            </p>
            @enderror
		</div>
		<div class="mb-3">
			<label for="ProjectType" class="form-label">Project Type</label>
			<select class="form-select" id="ProjectType" name="type_project">
				<option selected="" disabled="">Select Project Type</option>
				<option value="Aquaponic">Aquaponic</option>
				<option value="Hidroponic">Hidroponic</option>
			</select>
			@error('type_project')
            <p class="mb-3">
                {{ $message }}
            </p>
            @enderror
		</div>

		<div class="mb-3">
			<label for="ProjectDescription" class="form-label">Project Description</label>
			<textarea name="description_project" class="form-control" id="ProjectDescription" rows="5"></textarea>
			@error('description_project')
            <p class="mb-3">
                {{ $message }}
            </p>
            @enderror
		</div>
		<button type="submit" class="btn btn-primary me-2">Submit</button>
		<button class="btn btn-secondary">Cancel</button>
	</form>
</div>
</div>
</div>

</div>
@endsection