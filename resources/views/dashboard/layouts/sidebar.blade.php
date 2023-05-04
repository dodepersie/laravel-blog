<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="/dashboard">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-bolt"></i>
        </div>
        <div class="sidebar-brand-text mx-3">MSB <sup>1.0</sup></div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item {{ Request::is('dashboard') ? 'active' : '' }}">
        <a class="nav-link" href="/dashboard">
            <i class="fas fa-home"></i>
            <span>Dashboard</span></a>
    </li>

    @can('admin')
    <li class="nav-item {{ Request::is('dashboard/posts*') ? 'active' : '' }}">
            <a class="nav-link" href="/dashboard/posts">
                <i class="fas fa-fw fa-edit"></i>
                <span>My Posts</span></a>
        </a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <div class="sidebar-heading">
        Admin
    </div>

    <li class="nav-item {{ Request::is('dashboard/categories*') ? 'active' : '' }}">
        <a class="nav-link" href="/dashboard/categories">
            <i class="fas fa-fw fa-list"></i>
            <span>Post Categories</span></a>
        </a>
    </li>
    @endcan

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>