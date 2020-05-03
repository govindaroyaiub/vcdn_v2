<ul class="navbar-nav bg-gradient-info sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" style="background: #ffffff" href="/home">
        <div class="sidebar-brand-text mx-3"><img class="dashboard-image" src="/logo/VCDN_Logo.jpg"
                style="width: 160px; height: 38px;"></div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">
    <!-- Nav Item - Dashboard -->
    <li class="nav-item {{ (request()->is('/')) || (request()->is('home')) ? 'active' : '' }}">
        <a class="nav-link" href="/home">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>

    <li
        class="nav-item {{ (request()->is('companylist')) || (request()->is('create/company')) || (request()->is('company/edit/*'))  ? 'active' : '' }}">
        <a class="nav-link" href="/companylist">
            <i class="fas fa-city"></i>
            <span>Companies</span></a>
    </li>

    <li
        class="nav-item {{ (request()->is('userlist')) || (request()->is('create/user')) || (request()->is('user/edit/*')) ? 'active' : '' }}">
        <a class="nav-link" href="/userlist">
            <i class="fas fa-user-friends"></i>
            <span>Users</span></a>
    </li>

    <li class="nav-item {{ (request()->is('assets-list')) ? 'active' : '' }}">
        <a class="nav-link" href="/assets-list">
            <i class="far fa-images"></i>
            <span>Assets</span></a>
    </li>


    <!-- <li class="nav-item {{ (request()->is('publisherlist')) ? 'active' : '' }}">
    <a class="nav-link" href="/publisherlist">
    <i class="fas fa-newspaper"></i>
      <span>Publishers</span></a>
  </li>

  <li class="nav-item {{ (request()->is('adlist')) ? 'active' : '' }}">
    <a class="nav-link" href="/adlist">
    <i class="fas fa-ad"></i>
      <span>Advertisers</span></a>
  </li>

  <li class="nav-item {{ (request()->is('websitelist')) ? 'active' : '' }}">
    <a class="nav-link" href="/websitelist">
    <i class="fas fa-align-justify"></i>
      <span>Websites</span></a>
  </li>

  <li class="nav-item  {{ (request()->is('feedlist')) ? 'active' : '' }}">
    <a class="nav-link" href="/feedlist">
    <i class="fas fa-align-justify"></i>
      <span>Feeds</span></a>
  </li> -->

    <li class="nav-item {{ (request()->is('vast-tag-admin')) ? 'active' : '' }}">
        <a class="nav-link" href="/vast-tag-admin">
            <i class="fas fa-terminal"></i>
            <span>Vast Tag Admin</span></a>
    </li>

    <li class="nav-item {{ (request()->is('create-vast-tag')) ? 'active' : '' }}">
        <a class="nav-link" href="/create-vast-tag">
            <i class="fas fa-code"></i>
            <span>Create VAST</span></a>
    </li>

    <li class="nav-item">
        <a href="#pageSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle nav-link"><i class="fas fa-list"></i> <span>ShortCuts</span></a>
        
        <ul class="collapse list-unstyled" id="pageSubmenu">
            <li>
                <a href="/create/user" target="_blank" class="nav-link"><i class="fas fa-users"></i> <span>Create User</span></a>
            </li>
            <li>
                <a href="/create/company" target="_blank" class="nav-link"><i class="fas fa-building"></i> <span>Create Client</span></a>
            </li>
        </ul>
    </li>

    <!-- Divider -->

</ul>
