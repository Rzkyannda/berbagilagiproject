<ul class="navbar-nav bg-gradient-success sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-solid fa-hand-holding-heart"></i>
        </div>
        <div class="sidebar-brand-text mx-3">BerbagiLagi</div>
    </a>

    <!-- Divider -->

    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item">
        <a class="nav-link" href="{{ route('backend.dashboard') }}">
            <i class="fas fa-solid fa-house-user"></i>
            <span>Dashboard</span>
        </a>
    </li>

    @if (auth()->user()->role === 'admin')
        <li class="nav-item">
            <a class="nav-link" href="{{ route('backend.users.index') }}">
                <i class="fas fa-solid fa-users"></i>
                <span>Users</span>
            </a>
        </li>
    @endif

    <li class="nav-item">
        <a class="nav-link" href="{{ route('backend.penerima.index') }}">
            <i class="fas fa-solid fa-users"></i>
            <span>Penerima</span>
        </a>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="{{ route('backend.categories.index') }}">
            <i class="fas fa-solid fa-layer-group"></i>
            <span>Category</span>
        </a>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="{{ route('backend.items.index') }}">
            <i class="fas fa-solid fa-gift"></i>
            <span>Items</span>
        </a>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="{{ route('backend.claims.index') }}">
            <i class="fas fa-solid fa-check-double"></i>
            <span>Claims</span>
        </a>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="{{ route('backend.showStatusLogs') }}">
            <i class="fas fa-regular fa-clock"></i>
            <span>Logs</span>
        </a>
    </li>

    @if (auth()->user()->role === 'admin')
        <li class="nav-item">
            <a class="nav-link" href="{{ route('backend.messages.index') }}">
                <i class="fas fa-solid fa-comments"></i>
                <span>Feedback</span>
            </a>
        </li>
    @endif


    <!-- Divider -->

    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>


</ul>
