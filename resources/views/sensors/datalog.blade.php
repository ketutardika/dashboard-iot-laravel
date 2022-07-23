@extends('layouts/master')

@section('content')
<nav class="page-breadcrumb">
	<ol class="breadcrumb">
		<li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
		<li class="breadcrumb-item active" aria-current="page">Sensors Datalog {{$unique_id}}</li>
	</ol>
</nav>

<div class="row">
  <div class="col-lg-12 col-xl-12 grid-margin grid-margin-xl-0 stretch-card">
<div class="card">
  <div class="card-body">
  <div class="d-flex justify-content-between align-items-baseline mb-4 mb-md-3">
    <h6 class="card-title mb-0">Sensors</h6>
  </div>
  <div class="row align-items-start">
    <div id="live_container_datalog" style="min-width: 310px; height: 400px; margin: 0 auto; text-align:center;"><h4><span style="padding-top: 50px;">Loading...</span></h4>
    </div>
  </div>
  </div>
  </div>
</div>
</div>

<div class="row">
	<div class="col-md-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
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
                <th>#</th>
                <th>Unique ID</th>
                <th>Data Reading</th>
                <th>Data Check</th>
              </tr>
            </thead>
            <tbody>
              <?php $i=1; ?>
              @forelse ($sensordatalogs as $datalog)
              <tr>
                <td><?php echo $i; ?></td>
                <td>{{ $datalog->name_sensor }}</td>
                <td>{{ $datalog->unique_id }}</td>
                <td>{{ $datalog->data_reading }}</td>
                <td>{{ $datalog->updated_at }}</td>
              </tr>
              <?php $i++; ?>
              @empty
              <tr>
                  <td class="text-center text-mute" colspan="5">Sensor Data Not Available</td>
              </tr>              
              @endforelse
              
            </tbody>
          </table>
          {!! $sensordatalogs->links() !!}
        </div>
      </div>
    </div>
	</div>

</div>
@endsection