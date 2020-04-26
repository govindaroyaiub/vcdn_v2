<ul class="navbar-nav bg-gradient-secondary sidebar sidebar-dark accordion" id="accordionSidebar">

  <!-- Sidebar - Brand -->
  <a class="sidebar-brand d-flex align-items-center justify-content-center" style="background: #ffffff" href="/home">
    <div class="sidebar-brand-text mx-3"><img class="dashboard-image" src="/logo/VCDN_Logo.jpg" style="width: 160px; height: 38px;"></div>
  </a>

  <!-- Divider -->
  <hr class="sidebar-divider my-0">

  <!-- Nav Item - Dashboard -->
  <li class="nav-item {{ (request()->is('client')) ? 'active' : '' }}">
    <a class="nav-link" href="/home">
      <i class="fas fa-fw fa-tachometer-alt"></i>
      <span>Dashboard</span></a>
  </li>

  <!-- <li class="nav-item {{ (request()->is('campaigns')) || (request()->is('addcampaigns')) ? 'active' : '' }}">
    <a class="nav-link" href="/campaigns">
    <i class="fas fa-flag-usa"></i>
      <span>Campaigns</span></a>
  </li>

  <li class="nav-item {{ (request()->is('feedbrowser')) ? 'active' : '' }}">
    <a class="nav-link" href="/feedbrowser">
    <i class="fas fa-window-maximize"></i>
      <span>Feed Browser</span></a>
  </li>

  <li class="nav-item {{ (request()->is('imagelibrary')) ? 'active' : '' }}">
    <a class="nav-link" href="/imagelibrary">
    <i class="fas fa-photo-video"></i>
      <span>Image Library</span></a>
  </li> -->

  <li class="nav-item {{ (request()->is('request-vast-tag')) ? 'active' : '' }}">
    <a class="nav-link" href="/request-vast-tag">
    <i class="fas fa-code"></i>
      <span>Request VAST Tag</span></a>
  </li>

  <!-- <li class="nav-item {{ (request()->is('vast-tag')) ? 'active' : '' }}">
    <a class="nav-link" href="/vast-tag">
    <i class="fas fa-code"></i>
      <span>Vast Tag</span></a>
  </li> -->

  <!-- Divider -->

</ul>
