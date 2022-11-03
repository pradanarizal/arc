<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <img src="{{ asset('image/logo-white.png') }}" width="100px">
    </a>
    <!-- Divider -->
    <hr class="sidebar-divider">
    <!-- Heading -->

    <div class="sidebar-heading">
        Menu
    </div>

    <!-- Nav Item - Beranda -->
    <li class="nav-item {{ request()->is('beranda') ? 'active' : '' }}">
        <a class="nav-link" href="/dashboard">
            <i class="fas fa-fw fa-home"></i>
            <span>Dashboard</span></a>
    </li>


    <!-- Nav Item - Pengguna -->
    @if (auth()->user()->level=='user')
    <li class="nav-item {{ request()->is('pengguna/admin') | request()->is('pengguna/verifikator') ? 'active' : '' }}">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseOne"
            aria-expanded="true" aria-controls="collapseTwo">
            <i class="fas fa-fw fa-user"></i>
            <span>Pengguna</span>
        </a>
        <div id="collapseOne"
            class="collapse {{ request()->is('pengguna/admin') | request()->is('pengguna/verifikator') ? 'show' : '' }}"
            aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item {{ request()->is('pengguna/admin') ? 'active' : '' }}"
                    href="/pengguna/admin">Admin</a>
                <a class="collapse-item {{ request()->is('pengguna/verifikator') ? 'active' : '' }}"
                    href="/pengguna/verifikator">Verifikator</a>
            </div>
        </div>
    </li>
    @endif
    <!-- Nav Item - Keluar -->
    <li class="nav-item {{ request()->is('keluar') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('logout') }}">
        {{-- <a class="nav-link" href="{{ route('logout') }}" data-bs-toggle="modal" data-bs-target="#modalkeluar"> --}}
            <i class="fas fa-fw fa-cog"></i>
            <span>Keluar</span></a>
    </li>

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>

