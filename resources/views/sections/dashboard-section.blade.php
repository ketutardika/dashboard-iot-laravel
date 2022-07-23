@extends('layouts/master')

@section('content')
<nav class="page-breadcrumb">
	<ol class="breadcrumb">
		<li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
		<li class="breadcrumb-item active" aria-current="page">All Sections</li>
	</ol>
</nav>

<div class="row">
	<div class="col-md-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h6 class="card-title"></h6>
        <a href="{{ route('projects.create') }}" class="btn btn-primary me-2 mb-3">Add New Section</a>
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
                <th>Section Name</th>
                <th>Section Type</th>
                <th>Options</th>
              </tr>
            </thead>
            <tbody>
              @forelse ($sections as $section)
              <tr>
                <td>{{ $section->unique_id }}</td>
                <td>{{ $section->name_section }}</td>
                <td>{{ $section->type_section }}</td>
                <td>
                  <form onsubmit="return confirm('Are You Sure ?');" action="{{ route('sections.destroy', $section->id) }}" method="POST">
                  @csrf
                  @method('DELETE')
                  <i data-feather="trash" class="icon-sm me-2"></i> <span class=""><button type="submit" class="btn btn-sm btn-danger">Delete</button></span>
                </td>
              </tr>
              @empty
              <tr>
                  <td class="text-center text-mute" colspan="5">Section Data Not Available</td>
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