<nav class="navbar">
<a href="#" class="sidebar-toggler">
    <i data-feather="menu"></i>
</a>
<div class="navbar-content">
    <form class="search-form">
        <div class="input-group">
<div class="input-group-text">
<i data-feather="search"></i>
</div>
            <input type="text" class="form-control" id="navbarForm" placeholder="Search here...">
        </div>
    </form>
    <ul class="navbar-nav">
<!--         <li class="nav-item">
            <?php $user_id = Auth::user()->id; ?>
            @foreach(App\Models\FarmOrganization::where('user_id',$user_id)->get() as $menuItems)
            <a class="nav-link dropdown-toggle" href="#">
                <i class="link-icon" data-feather="command"></i>
                <span class="ms-1">
                    {{ $menuItems->name_organization }}
                </span>
                <i class="link-arrow" data-feather="chevron-down"></i>
            </a>
            @endforeach
        </li>
        <li class="nav-item dropdown">
            <?php $user_id = Auth::user()->id; ?>
            @foreach(App\Models\Projects::where('user_id',$user_id)->where('isactive','1')->get() as $menuItems)
            <a class="nav-link dropdown-toggle" href="#" id="languageDropdown" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="link-icon" data-feather="command"></i>
                <span class="ms-1">
                    {{ $menuItems->name_project }}
                </span>
                <i class="link-arrow" data-feather="chevron-down"></i>
            </a>
            @endforeach
            <div class="dropdown-menu" aria-labelledby="languageDropdown">
            <?php $user_id = Auth::user()->id; ?>
            @foreach(App\Models\Projects::where('user_id',$user_id)->where('isactive','0')->get() as $menuItem)
            <a href="javascript:;" class="dropdown-item py-2">
                <i class="link-icon" data-feather="command"></i>
                <span class="ms-1">
                    {{ $menuItem->name_project }}
                </span>
            </a>
            @endforeach
            <hr>
            <a href="javascript:;" class="dropdown-item py-2">
                <i class="link-icon" data-feather="plus-square"></i>
                <span class="ms-1">
                    Add Another Project
                </span>
            </a>
            </div>
</li> -->
 <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="languageDropdown" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="flag-icon flag-icon-us mt-1" title="us"></i> <span class="ms-1 me-1 d-none d-md-inline-block">English</span>
            </a>
            <div class="dropdown-menu" aria-labelledby="languageDropdown">
<a href="javascript:;" class="dropdown-item py-2"><i class="flag-icon flag-icon-us" title="us" id="us"></i> <span class="ms-1"> English </span></a>
<a href="javascript:;" class="dropdown-item py-2"><i class="flag-icon flag-icon-fr" title="fr" id="fr"></i> <span class="ms-1"> French </span></a>
<a href="javascript:;" class="dropdown-item py-2"><i class="flag-icon flag-icon-de" title="de" id="de"></i> <span class="ms-1"> German </span></a>
<a href="javascript:;" class="dropdown-item py-2"><i class="flag-icon flag-icon-pt" title="pt" id="pt"></i> <span class="ms-1"> Portuguese </span></a>
<a href="javascript:;" class="dropdown-item py-2"><i class="flag-icon flag-icon-es" title="es" id="es"></i> <span class="ms-1"> Spanish </span></a>
            </div>
</li>

        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="notificationDropdown" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i data-feather="bell"></i>
                <div class="indicator">
                    <div class="circle"></div>
                </div>
            </a>
            <div class="dropdown-menu p-0" aria-labelledby="notificationDropdown">
                <div class="px-3 py-2 d-flex align-items-center justify-content-between border-bottom">
                    <p>6 New Notifications</p>
                    <a href="javascript:;" class="text-muted">Clear all</a>
                </div>
<div class="p-1">
  <a href="javascript:;" class="dropdown-item d-flex align-items-center py-2">
    <div class="wd-30 ht-30 d-flex align-items-center justify-content-center bg-primary rounded-circle me-3">
                            <i class="icon-sm text-white" data-feather="gift"></i>
    </div>
    <div class="flex-grow-1 me-2">
                            <p>New Order Recieved</p>
                            <p class="tx-12 text-muted">30 min ago</p>
    </div>  
  </a>
  <a href="javascript:;" class="dropdown-item d-flex align-items-center py-2">
    <div class="wd-30 ht-30 d-flex align-items-center justify-content-center bg-primary rounded-circle me-3">
                            <i class="icon-sm text-white" data-feather="alert-circle"></i>
    </div>
    <div class="flex-grow-1 me-2">
                            <p>Server Limit Reached!</p>
                            <p class="tx-12 text-muted">1 hrs ago</p>
    </div>  
  </a>
  <a href="javascript:;" class="dropdown-item d-flex align-items-center py-2">
    <div class="wd-30 ht-30 d-flex align-items-center justify-content-center bg-primary rounded-circle me-3">
      <img class="wd-30 ht-30 rounded-circle" src="https://via.placeholder.com/30x30" alt="userr">
    </div>
    <div class="flex-grow-1 me-2">
                            <p>New customer registered</p>
                            <p class="tx-12 text-muted">2 sec ago</p>
    </div>  
  </a>
  <a href="javascript:;" class="dropdown-item d-flex align-items-center py-2">
    <div class="wd-30 ht-30 d-flex align-items-center justify-content-center bg-primary rounded-circle me-3">
                            <i class="icon-sm text-white" data-feather="layers"></i>
    </div>
    <div class="flex-grow-1 me-2">
                            <p>Apps are ready for update</p>
                            <p class="tx-12 text-muted">5 hrs ago</p>
    </div>  
  </a>
  <a href="javascript:;" class="dropdown-item d-flex align-items-center py-2">
    <div class="wd-30 ht-30 d-flex align-items-center justify-content-center bg-primary rounded-circle me-3">
                            <i class="icon-sm text-white" data-feather="download"></i>
    </div>
    <div class="flex-grow-1 me-2">
                            <p>Download completed</p>
                            <p class="tx-12 text-muted">6 hrs ago</p>
    </div>  
  </a>
</div>
                <div class="px-3 py-2 d-flex align-items-center justify-content-center border-top">
                    <a href="javascript:;">View all</a>
                </div>
            </div>
        </li>
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="profileDropdown" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <img class="wd-30 ht-30 rounded-circle" src="https://via.placeholder.com/30x30" alt="profile">
            </a>
            <div class="dropdown-menu p-0" aria-labelledby="profileDropdown">
                <div class="d-flex flex-column align-items-center border-bottom px-5 py-3">
                    <div class="mb-3">
                        <img class="wd-80 ht-80 rounded-circle" src="https://via.placeholder.com/80x80" alt="">
                    </div>
                    <div class="text-center">
                        <p class="tx-16 fw-bolder">{{ Auth::user()->name }}</p>
                        <p class="tx-12 text-muted">{{ Auth::user()->email}}</p>
                    </div>
                </div>
<ul class="list-unstyled p-1">
  <li class="dropdown-item py-2">
    <a href="pages/general/profile.html" class="text-body ms-0">
      <i class="me-2 icon-md" data-feather="user"></i>
      <span>Profile</span>
    </a>
  </li>
  <li class="dropdown-item py-2">
    <a href="javascript:;" class="text-body ms-0">
      <i class="me-2 icon-md" data-feather="edit"></i>
      <span>Edit Profile</span>
    </a>
  </li>
  <li class="dropdown-item py-2">
    <a href="javascript:;" class="text-body ms-0">
      <i class="me-2 icon-md" data-feather="repeat"></i>
      <span>Switch User</span>
    </a>
  </li>
  <li class="dropdown-item py-2">
    <a class="text-body ms-0" href="{{ route('logout') }}"
       onclick="event.preventDefault();
                     document.getElementById('logout-form').submit();">
        <i class="me-2 icon-md" data-feather="log-out"></i>
        {{ __('Logout') }}
    </a>
    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
        @csrf
    </form>

  </li>
</ul>
            </div>
        </li>
    </ul>
</div>
</nav>