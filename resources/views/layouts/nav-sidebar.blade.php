<nav class="sidebar">
      <div class="sidebar-header">
        <a href="#" class="sidebar-brand">
          <img class="logo" src="{{ url('assets/images/'.get_setting('logo')) }}" height="50px">
        </a>
        <div class="sidebar-toggler not-active">
          <span></span>
          <span></span>
          <span></span>
        </div>
      </div>
      <div class="sidebar-body">
        <ul class="nav">
          <li class="nav-item nav-category">Main</li>
          <li class="nav-item">
            <a href="{{ route('dashboard') }}" class="nav-link">
              <i class="link-icon" data-feather="box"></i>
              <span class="link-title">Dashboard</span>
            </a>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="link-icon" data-feather="activity"></i>
              <span class="link-title">Realtime Monitor</span>
            </a>
          </li>
          <li class="nav-item nav-category">Section</li>
          <?php $j=1; 
          $user_id = Auth::user()->id;
          ?>
          @foreach ($navbars as $menuItem)
            <li class="nav-item">
            <a href="{{ route('sensors.dashboard', $menuItem->section_unique_id) }}" class="nav-link">
               <i class="link-icon" data-feather="inbox"></i>
              <span class="link-title">{{ $menuItem->name_section }}</span>
            </a>
          </li>
          <?php $j++; ?>
          @endforeach
          <li class="nav-item nav-category">Crop</li>
          <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#crop" role="button" aria-expanded="false" aria-controls="forms">
              <i class="link-icon" data-feather="compass"></i>
              <span class="link-title">Manage Crop</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#" role="button" aria-expanded="false" aria-controls="forms">
              <i class="link-icon" data-feather="grid"></i>
              <span class="link-title">Category</span>
            </a>
          </li>
          <li class="nav-item nav-category">Fish</li>
          <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#fish" role="button" aria-expanded="false" aria-controls="forms">
              <i class="link-icon" data-feather="compass"></i>
              <span class="link-title">Manage Fish</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#" role="button" aria-expanded="false" aria-controls="forms">
              <i class="link-icon" data-feather="grid"></i>
              <span class="link-title">Category</span>
            </a>
          </li>
          <li class="nav-item nav-category">Users</li>
          <li class="nav-item">
            <a href="{{ route('users.index') }}" class="nav-link">
              <i class="link-icon" data-feather="users"></i>
              <span class="link-title">Manage User's</span>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('roles.index') }}" class="nav-link">
              <i class="link-icon" data-feather="list"></i>
              <span class="link-title">Manage Role</span>
            </a>            
          </li> 
          <li class="nav-item nav-category">Setting</li>
          <li class="nav-item">
            <a href="{{ route('settings.dashboard-general') }}" class="nav-link">
              <i class="link-icon" data-feather="globe"></i>
              <span class="link-title">General</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#farm" role="button" aria-expanded="false" aria-controls="forms">
              <i class="link-icon" data-feather="inbox"></i>
              <span class="link-title">Setup</span>
              <i class="link-arrow" data-feather="chevron-down"></i>
            </a>
            <div class="collapse" id="farm">
              <ul class="nav sub-menu">
                <li class="nav-item">
                  <a href="{{ route('farms.index') }}" class="nav-link">Manage Farm</a>
                </li>
                <li class="nav-item">
                  <a href="{{ route('projects.index') }}" class="nav-link">Manage Project</a>
                </li>
                <li class="nav-item">
                  <a href="{{ route('sections.index') }}" class="nav-link">Manage Sections</a>
                </li>
              </ul>
            </div>
          </li>                    
        </ul>
      </div>
    </nav>