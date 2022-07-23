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
	<form class="forms-sample" action="{{ route('settings.general-update', $settinggeneral->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
		<div class="mb-3">
			<div class="row">
			<div class="col">
				<label for="SiteTitle" class="form-label">Site Title</label>
				<input type="text" class="form-control" id="SiteTitle" name="title" autocomplete="off" placeholder="Site Title" value="{{ old('title', $settinggeneral->title) }}">
				<!-- error message untuk title -->
	            @error('title')
	            <p class="mb-3">
	                {{ $message }}
	            </p>
	            @enderror
	        </div>
	        <div class="col">
	        	<label for="Tagline" class="form-label">Tagline</label>
				<input type="text" class="form-control" id="Tagline" name="tagline" autocomplete="off" placeholder="Tagline" value="{{ old('tagline', $settinggeneral->tagline) }}">
				<!-- error message untuk title -->
	            @error('title')
	            <p class="mb-3">
	                {{ $message }}
	            </p>
	            @enderror
	        </div>
	    	</div>
		</div>
		<div class="mb-3">
            <label for="Description" class="form-label">Description</label>
            <textarea name="description" class="form-control" id="description" rows="5">{{ old('description', $settinggeneral->description) }}</textarea>
            @error('description')
            <p class="mb-3">
                {{ $message }}
            </p>
            @enderror
        </div>
        <div class="mb-3">
			<div class="row">
			<div class="col">
				<label for="Email" class="form-label">Email</label>
				<input type="text" class="form-control" id="Email" name="email" autocomplete="off" placeholder="Email" value="{{ old('email', $settinggeneral->email) }}">
				<!-- error message untuk title -->
	            @error('email')
	            <p class="mb-3">
	                {{ $message }}
	            </p>
	            @enderror
	        </div>
	        <div class="col">
	        	<label for="Phone" class="form-label">Phone</label>
				<input type="text" class="form-control" id="Phone" name="phone" autocomplete="off" placeholder="Phone" value="{{ old('phone', $settinggeneral->phone) }}">
				<!-- error message untuk title -->
	            @error('phone')
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
				<label for="Theme" class="form-label">Theme</label>
				<select class="form-select" id="Theme" name="theme">
					<option selected="" disabled="">Select Theme</option>
					<option value="dark" {{ $settinggeneral->theme == "dark" ? 'selected':'' }}>Dark</option>
	                <option value="light" {{ $settinggeneral->theme == "light" ? 'selected':'' }}>Light</option>
				</select>
				<!-- error message untuk title -->
	            @error('theme')
	            <p class="mb-3">
	                {{ $message }}
	            </p>
	            @enderror
	        </div>
	        <div class="col">
				<label for="Language" class="form-label">Language</label>
				<select class="form-select" id="Language" name="language">
					<option selected="" disabled="">Select Language</option>
					<option value="english" {{ $settinggeneral->language == "english" ? 'selected':'' }}>English</option>
	                <option value="indonesia" {{ $settinggeneral->language == "indonesia" ? 'selected':'' }}>Indonesia</option>
				</select>
	            @error('language')
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
	        	<label for="Logo" class="form-label">Logo</label>
	        	<div class="align-items-start">
					<img src="{{ url('assets/images/'.$settinggeneral->logo) }}" class="wd-300 wd-sm-200 me-3" alt="{{ $settinggeneral->title }}" >
				</div>
				<input type="file" class="form-control" id="Logo" name="logo" autocomplete="off" placeholder="Logo" value="{{ old('logo', $settinggeneral->logo) }}" accept=".jpg,.png">
				<input type="hidden" value="{{ old('logo', $settinggeneral->logo) }}" name="oldlogo">
				<!-- error message untuk title -->
	            @error('logo')
	            <p class="mb-3">
	                {{ $message }}
	            </p>
	            @enderror
	        </div>
	        <div class="col">
	        	<label for="Favicon" class="form-label">Favicon</label>
	        	<div class="align-items-start">
					<img src="{{ url('assets/images/'.$settinggeneral->favicon) }}" class="wd-50 wd-sm-50 me-3" alt="{{ $settinggeneral->title }}" >
				</div>
				<input type="file" class="form-control" id="Favicon" name="favicon" autocomplete="off" placeholder="Favicon" value="{{ old('favicon', $settinggeneral->favicon) }}" accept=".jpg,.png">
				<input type="hidden" value="{{ old('logo', $settinggeneral->favicon) }}" name="oldfavicon">
				<!-- error message untuk title -->
	            @error('favicon')
	            <p class="mb-3">
	                {{ $message }}
	            </p>
	            @enderror
	        </div>
	    	</div>
		</div>
		<button type="submit" class="btn btn-primary me-2">Save</button>
		<button class="btn btn-secondary">Cancel</button>
	</form>
</div>
</div>
</div>

</div>
@endsection