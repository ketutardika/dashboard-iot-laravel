<div class="row w-100 mx-0 auth-page">
<div class="col-md-8 col-xl-6 mx-auto d-flex flex-column align-items-center">
	<h4 class="mb-2">Welcome to Aquamonia Project</h4>
	<h6 class="text-muted mb-3 text-center">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's.</h6>
					

<div class="card">
	<div class="card-body">
		<h4 class="card-title">Hi {{ Auth::user()->name }}</h4>
		<p class="text-muted mb-3">Please Fill this Information to Continue the APP.</p>

<div class="">
    @if(!empty($successMessage))
    <div class="alert alert-success">
        {{ $successMessage }}
    </div>
    @endif

    <div class="row pt-3">
        {{-- Step 1 --}}
        <div id="step1" class="needs-validation" style="display: {{ $currentStep != 1 ? 'none' : '' }}">
            <div class="mb-3">
                <label for="farm_name" class="form-label">Farm Name</label>
                <input type="text" wire:model="farm_name" class="form-control {{$errors->first('farm_name') ? "is-invalid" : "" }}" id="farm_name" aria-describedby="farm_name">
                @error('farm_name')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <button class="btn btn-primary" wire:click="firstStepSubmit"
                type="button">Next</button>
        </div>

        {{-- Step 2 --}}
        <div id="step2" style="display: {{ $currentStep != 2 ? 'none' : '' }}">
            <div class="mb-3">
                <label for="projects_type" class="form-label">Projects Type</label>
                <select wire:model="projects_type" class="form-control form-select {{$errors->first('projects_type') ? "is-invalid" : "" }}">>
                    <option value="">Select Type</option>
                    <option value="Aquaponic">Aquaponic</option>
                    <option value="Hidroponic">Hidroponic</option>
                </select>
                @error('projects_type')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="projects_name" class="form-label">Projects Name</label>
                <input type="text" wire:model="projects_name" class="form-control {{$errors->first('projects_name') ? "is-invalid" : "" }}" id="projects_name" aria-describedby="projects_name">
                @error('projects_name')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="projects_description" class="form-label">Projects Description</label>
                <input type="text" wire:model="projects_description" class="form-control {{$errors->first('projects_description') ? "is-invalid" : "" }}" id="projects_description" aria-describedby="projects_description">
                @error('projects_description')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <button class="btn btn-danger" type="button" wire:click="back(1)">Back</button>
            <button class="btn btn-primary" type="button" wire:click="secondStepSubmit">Next</button>
        </div>

        {{-- Step 3 --}}
        <div id="step3" style="display: {{ $currentStep != 3 ? 'none' : '' }}">
            <div class="mb-3">
            	<div class="card my-3">
                <div class="card-body">
                    <form class="row g-3 justify-content-center">
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        {{-- Add Form --}}
                        @foreach ($section_names as $key => $value)
                        
                        <div class="col-10">
                            <input type="text" class="form-control" wire:model="section_names.{{ $key }}" value="{{ $value }}" placeholder="Section Name">
                            @error('section_names.{{ $key }}') <span class="text-danger error" required>{{ $message }}</span>@enderror
                        </div>
                        <div class="col-2">
                            <button class="btn btn-light mb-3" wire:click.prevent="remove({{$key}})"><i class="bi bi-x"></i>Delete</button>
                        </div>
                        @endforeach
                        <div class="col-12">
                            <button class="btn btn-primary mb-3" wire:click.prevent="add({{$i}})"><i class="bi bi-plus"></i>ADD</button>
                        </div>
                    </form>
                </div>
            </div>
            @if (session()->has('message'))
                <div class="alert alert-success">
                {{ session('message') }}
                </div>
            @endif
            </div>
            <button class="btn btn-danger" type="button" wire:click="back(2)">Back</button>
            <button class="btn btn-primary" type="button" wire:click="thirdStepSubmit">Next</button>
        </div>

        {{-- Step 4 --}}
        <div id="step4" style="display: {{ $currentStep != 4 ? 'none' : '' }}">
            <ul class="list-group list-group-flush">
                <li class="list-group-item">Farm Name: {{$farm_name}}</li>
                <li class="list-group-item">Farm Desctription: {{ $farm_description}}</li>
                <li class="list-group-item">Project Name: {{ $projects_name }}</li>
                <li class="list-group-item">Project Type: {{ $projects_type }}</li>
                <li class="list-group-item">Project Description: {{ $projects_description }}</li>
                <?php $count = 1; ?>
                @foreach ($section_names as $key => $value)
                 <li class="list-group-item">Section {{$count}}: {{ $value}}</li>
                <?php $count++; ?> 
                @endforeach
            </ul>
            <button class="btn btn-danger" type="button" wire:click="back(3)">Back</button>
            <button class="btn btn-success" wire:click="submitForm" type="button">Finish</button>
        </div>
    </div>
</div>

</div>
</div>