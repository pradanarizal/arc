<ul class="navbar-nav bg-sidebar sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <img src="{{ asset('templates/img/logo.png') }}" width="100px">
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
    @if (auth()->user()->level == 'user')
        <li
            class="nav-item {{ request()->is('pengguna/admin') | request()->is('pengguna/verifikator') ? 'active' : '' }}">
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
                        href="#">Admin</a>
                    <a class="collapse-item {{ request()->is('pengguna/verifikator') ? 'active' : '' }}"
                        href="#">Verifikator</a>
                </div>
            </div>
        </li>
    @endif


    {{-- UNTUK TAMPILAN SUPER ADMIN --}}

    @if (auth()->user()->level == 'superadmin')
        {{-- SIDEBAR MENU 1 SUPER ADMIN --}}
        <li
            class="nav-item {{ request()->is('pengguna/admin') | request()->is('pengguna/verifikator') ? 'active' : '' }}">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseOne"
                aria-expanded="true" aria-controls="collapseTwo">
                <i class="fas fa-fw fa-user"></i>
                <span>Master Setup</span>
            </a>

            <div id="collapseOne"
                class="collapse {{ request()->is('pengguna/admin') | request()->is('pengguna/verifikator') ? 'show' : '' }}"
                aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <a class="collapse-item {{ request()->is('pengguna/admin') ? 'active' : '' }}"
                        href="#">Ruang</a>
                    <a class="collapse-item {{ request()->is('pengguna/verifikator') ? 'active' : '' }}"
                        href="/pengguna/verifikator">Rak</a>
                    <a class="collapse-item {{ request()->is('pengguna/admin') ? 'active' : '' }}"
                        href="#">Box</a>
                    <a class="collapse-item {{ request()->is('pengguna/admin') ? 'active' : '' }}"
                        href="#">Map</a>
                    <a class="collapse-item {{ request()->is('pengguna/admin') ? 'active' : '' }}"
                        href="#">User</a>
                    <a class="collapse-item {{ request()->is('pengguna/admin') ? 'active' : '' }}"
                        href="#">Kelengkapan</a>
                </div>
            </div>
        </li>
        {{-- END OF SIDEBAR MENU 1 SUPER ADMIN --}}

        {{-- SIDEBAR MENU 2 SUPER ADMIN --}}
        <li class="nav-item">
            <a class="nav-link" href="dokumen">
                <i class="fas fa-fw fa-home"></i>
                <span>Dokumen</span></a>
        </li>
        {{-- END OF SIDEBAR MENU 2 SUPER ADMIN --}}

        {{-- SIDEBAR MENU 3 SUPER ADMIN --}}
        <li
            class="nav-item {{ request()->is('pengguna/admin') | request()->is('pengguna/verifikator') ? 'active' : '' }}">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
                aria-expanded="true" aria-controls="collapseTwo">
                <i class="fas fa-fw fa-user"></i>
                <span>Approval</span>
            </a>
            <div id="collapseTwo"
                class="collapse {{ request()->is('pengguna/admin') | request()->is('pengguna/verifikator') ? 'show' : '' }}"
                aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <a class="collapse-item {{ request()->is('pengguna/admin') ? 'active' : '' }}"
                        href="#">Pengarsipan</a>
                    <a class="collapse-item {{ request()->is('pengguna/verifikator') ? 'active' : '' }}"
                        href="/pengguna/verifikator">Retensi Arsip</a>
                    <a class="collapse-item {{ request()->is('pengguna/admin') ? 'active' : '' }}"
                        href="#">Peminjaman</a>
                    <a class="collapse-item {{ request()->is('pengguna/admin') ? 'active' : '' }}"
                        href="#">Pengembalian</a>
                </div>
            </div>
        </li>
    @endif
    {{-- END OF SIDEBAR MENU 3 SUPER ADMIN --}}

    {{-- END OF TAMPILAN SUPER ADMIN --}}



    <!-- Nav Item - Keluar -->
    {{-- <li class="nav-item {{ request()->is('keluar') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('logout') }}"> --}}
            {{-- <a class="nav-link" href="{{ route('logout') }}" data-bs-toggle="modal" data-bs-target="#modalkeluar"> --}}
            {{-- <i class="fas fa-fw fa-cog"></i>
            <span>Keluar</span></a>
    </li> --}}

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
