<ul class="navbar-nav bg-sidebar sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="/dashboard">
        <img src="{{ asset('templates/img/logo.webp') }}" width="100px">
    </a>
    <!-- Divider -->
    <hr class="sidebar-divider">
    <!-- Heading -->

    <div class="sidebar-heading">
        Menu
    </div>

    <!-- Nav Item - Beranda -->
    <li class="nav-item {{ request()->is('dashboard') ? 'active' : '' }}">
        <a class="nav-link" href="/dashboard">
            <i class="fas fa-fw fa-home"></i>
            <span>Dashboard</span></a>
    </li>

    <!-- Nav Item - Pengguna -->
    @if (auth()->user()->level == 'user')
        <li
            class="nav-item {{ request()->is('dokumen_terbuka_user') | request()->is('dokumen_terbatas_user') ? 'active' : '' }}">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseSuperadmin"
                aria-controls="collapseTwo">
                <i class="fas fa-fw fa-file-alt"></i>
                <span>Dokumen</span>
            </a>
            <div id="collapseSuperadmin" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <a class="collapse-item {{ request()->is('dokumen_terbuka_user') ? 'active' : '' }}"
                        href="/dokumen_terbuka_user">
                        <i class="fas fa-fw fa-square fa-xs"></i>
                        <span>Terbuka</span>
                    </a>
                    <a class="collapse-item {{ request()->is('dokumen_terbatas_user') ? 'active' : '' }}"
                        href="/dokumen_terbatas_user">
                        <i class="fas fa-fw fa-square fa-xs"></i>
                        <span>Terbatas</span>
                    </a>
                </div>
            </div>
        </li>
    @endif


    {{-- UNTUK TAMPILAN SUPER ADMIN --}}

    @if (auth()->user()->level == 'superadmin')
        {{-- SIDEBAR MENU 1 SUPER ADMIN --}}
        <li
            class="nav-item {{ request()->is('master_setup/ruang') | request()->is('master_setup/rak') | request()->is('master_setup/box') | request()->is('master_setup/map') | request()->is('master_setup/data_user') | request()->is('master_setup/kelengkapan_dokumen') ? 'active' : '' }}">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseOne"
                aria-expanded="true" aria-controls="collapseTwo">
                <i class="fas fa-fw fa-tools"></i>
                <span>Master Setup</span>
            </a>

            <div id="collapseOne" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <a class="collapse-item {{ request()->is('master_setup/ruang') ? 'active' : '' }}"
                        href="/master_setup/ruang">
                        <i class="fas fa-fw fa-square fa-xs"></i>
                        <Span>Ruang</Span>
                    </a>
                    <a class="collapse-item {{ request()->is('master_setup/rak') ? 'active' : '' }}"
                        href="/master_setup/rak">
                        <i class="fas fa-fw fa-square fa-xs"></i>
                        <span>Rak</span>
                    </a>
                    <a class="collapse-item {{ request()->is('master_setup/box') ? 'active' : '' }}"
                        href="/master_setup/box">
                        <i class="fas fa-fw fa-square fa-xs"></i>
                        <span>Box</span>
                    </a>
                    <a class="collapse-item {{ request()->is('master_setup/map') ? 'active' : '' }}"
                        href="/master_setup/map">
                        <i class="fas fa-fw fa-square fa-xs"></i>
                        <span>Map</span>
                    </a>

                    <a class="collapse-item {{ request()->is('master_setup/data_departemen') ? 'active' : '' }}"
                        href="/master_setup/data_departemen">
                        <i class="fas fa-fw fa-square fa-xs"></i>
                        <span>Divisi</span>
                    </a>

                    <a class="collapse-item {{ request()->is('master_setup/data_user') ? 'active' : '' }}"
                        href="/master_setup/data_user">
                        <i class="fas fa-fw fa-square fa-xs"></i>
                        <span>User</span>
                    </a>
                    <a class="collapse-item {{ request()->is('master_setup/kelengkapan_dokumen') ? 'active' : '' }}"
                        href="/master_setup/kelengkapan_dokumen">
                        <i class="fas fa-fw fa-square fa-xs"></i>
                        <span>Kelengkapan</span>
                    </a>
                </div>
            </div>
        </li>
        {{-- END OF SIDEBAR MENU 1 SUPER ADMIN --}}

        {{-- SIDEBAR MENU 2 SUPER ADMIN --}}
        <li
            class="nav-item {{ request()->is('dokumen_terbuka') | request()->is('dokumen_terbatas') ? 'active' : '' }}">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseSuperadmin"
                aria-controls="collapseTwo">
                <i class="fas fa-fw fa-file-alt"></i>
                <span>Dokumen</span>
            </a>
            <div id="collapseSuperadmin" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <a class="collapse-item {{ request()->is('dokumen_terbuka') ? 'active' : '' }}"
                        href="/dokumen_terbuka">
                        <i class="fas fa-fw fa-square fa-xs"></i>
                        <span>Terbuka</span>
                    </a>
                    <a class="collapse-item {{ request()->is('dokumen_terbatas') ? 'active' : '' }}"
                        href="/dokumen_terbatas">
                        <i class="fas fa-fw fa-square fa-xs"></i>
                        <span>Terbatas</span>
                    </a>
                </div>
            </div>
        </li>
        {{-- END OF SIDEBAR MENU 2 SUPER ADMIN --}}

        {{-- SIDEBAR MENU 3 SUPER ADMIN --}}
        <li
            class="nav-item {{ request()->is('approval/pengarsipan') | request()->is('approval/retensi') | request()->is('approval/peminjaman') | request()->is('approval/pengembalian') ? 'active' : '' }} ">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
                aria-expanded="true" aria-controls="collapseTwo">
                <i class="fas fa-fw fa-signature "></i>
                <span class="mr-5">Approval</span>
                {{-- Untuk count all pengajuan pending --}}
                <p class="d-none">
                    {{ $a = $count_pengarsipan_pending + $count_retensi_pending + $count_peminjaman_pending + $count_pengembalian_pending }}
                </p>
                {{-- end of count all --}}
                @if ($a == 0)
                @else
                    <i class="float-center badge badge-danger ">{{ $a }}</i>
                @endif
            </a>
            <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <a class="collapse-item {{ request()->is('approval/pengarsipan') ? 'active' : '' }}"
                        href="/approval/pengarsipan">
                        <i class="fas fa-fw fa-square fa-xs"></i>
                        <span>Pengarsipan</span>
                        @if ($count_pengarsipan_pending == 0)
                        @else
                            <i class="badge badge-danger float-right">
                                {{ $count_pengarsipan_pending }}
                            </i>
                        @endif
                    </a>
                    <a class="collapse-item {{ request()->is('approval/retensi') ? 'active' : '' }}"
                        href="/approval/retensi">
                        <i class="fas fa-fw fa-square fa-xs"></i>
                        <span>Retensi Arsip</span>
                        @if ($count_retensi_pending == 0)
                        @else
                            <i class="float-right badge badge-danger ">{{ $count_retensi_pending }}</i>
                        @endif
                    </a>
                    <a class="collapse-item {{ request()->is('approval/peminjaman') ? 'active' : '' }}"
                        href="/approval/peminjaman">
                        <i class="fas fa-fw fa-square fa-xs"></i>
                        <span>Peminjaman</span>
                        @if ($count_peminjaman_pending == 0)
                        @else
                            <i class="float-right badge badge-danger ">{{ $count_peminjaman_pending }}</i>
                        @endif
                    </a>
                    <a class="collapse-item {{ request()->is('approval/pengembalian') ? 'active' : '' }}"
                        href="/approval/pengembalian">
                        <i class="fas fa-fw fa-square fa-xs"></i>
                        <span>Pengembalian</span>
                        @if ($count_pengembalian_pending == 0)
                        @else
                            <i class="float-right badge badge-danger ">{{ $count_pengembalian_pending }}</i>
                        @endif
                    </a>
                </div>
            </div>
        </li>
    @endif
    {{-- END OF SIDEBAR MENU 3 SUPER ADMIN --}}

    {{-- END OF TAMPILAN SUPER ADMIN --}}


    {{-- UNTUK TAMPILAN ADMIN --}}
    @if (auth()->user()->level == 'admin')
        <li
            class="nav-item {{ request()->is('dokumen_terbuka_admin') | request()->is('dokumen_terbatas_admin') ? 'active' : '' }}">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseOne"
                aria-controls="collapseTwo">
                <i class="fas fa-fw fa-file-alt"></i>
                <span>Dokumen</span>
            </a>
            <div id="collapseOne" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <a class="collapse-item {{ request()->is('dokumen_terbuka_admin') ? 'active' : '' }}"
                        href="/dokumen_terbuka_admin">
                        <i class="fas fa-fw fa-square fa-xs"></i>
                        <span>Terbuka</span>
                    </a>
                    <a class="collapse-item {{ request()->is('dokumen_terbatas_admin') ? 'active' : '' }}"
                        href="/dokumen_terbatas_admin">
                        <i class="fas fa-fw fa-square fa-xs"></i>
                        <span>Terbatas</span>
                    </a>
                </div>
            </div>
        </li>

        <li
            class="nav-item {{ request()->is('riwayat/riwayat_pengarsipan') | request()->is('riwayat/riwayat_retensi') | request()->is('riwayat/riwayat_peminjaman') | request()->is('riwayat/riwayat_pengembalian') ? 'active' : '' }}">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
                aria-expanded="true" aria-controls="collapseTwo">
                <i class="fas fa-fw fa-history"></i>
                <span  class="mr-5">Riwayat</span>
                {{-- Untuk count all pengajuan pending --}}
                <p class="d-none">
                    {{ $a = $count_pengarsipan_pending_admin + $count_retensi_pending_admin + $count_peminjaman_pending_admin + $count_pengembalian_pending_admin }}
                </p>
                {{-- end of count all --}}
                @if ($a == 0)
                @else
                    <i class="float-center badge badge-danger ">{{ $a }}</i>
                @endif
            </a>
            <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <a class="collapse-item {{ request()->is('riwayat/riwayat_pengarsipan') ? 'active' : '' }}"
                        href="/riwayat/riwayat_pengarsipan">
                        <i class="fas fa-fw fa-square fa-xs"></i>
                        <span>Pengarsipan</span>
                        @if ($count_pengarsipan_pending_admin == 0)
                        @else
                            <i class="badge badge-danger float-right">
                                {{ $count_pengarsipan_pending_admin }}
                            </i>
                        @endif
                    </a>
                    <a class="collapse-item {{ request()->is('riwayat/riwayat_retensi') ? 'active' : '' }}"
                        href="/riwayat/riwayat_retensi">
                        <i class="fas fa-fw fa-square fa-xs"></i>
                        <span>Retensi Arsip</span>
                        @if ($count_retensi_pending_admin == 0)
                        @else
                            <i class="float-right badge badge-danger ">{{ $count_retensi_pending_admin }}</i>
                        @endif
                    </a>
                    <a class="collapse-item {{ request()->is('riwayat/riwayat_peminjaman') ? 'active' : '' }}"
                        href="/riwayat/riwayat_peminjaman">
                        <i class="fas fa-fw fa-square fa-xs"></i>
                        <span>Peminjaman</span>
                        @if ($count_peminjaman_pending_admin == 0)
                        @else
                            <i class="float-right badge badge-danger ">{{ $count_peminjaman_pending_admin }}</i>
                        @endif
                    </a>
                    <a class="collapse-item {{ request()->is('riwayat/riwayat_pengembalian') ? 'active' : '' }}"
                        href="/riwayat/riwayat_pengembalian">
                        <i class="fas fa-fw fa-square fa-xs"></i>
                        <span>Pengembalian</span>
                        @if ($count_pengembalian_pending_admin == 0)
                        @else
                            <i class="float-right badge badge-danger ">{{ $count_pengembalian_pending_admin }}</i>
                        @endif
                    </a>
                </div>
            </div>
        </li>
    @endif
    {{-- END OF SIDEBAR MENU 3 ADMIN --}}
    {{-- END OF TAMPILAN ADMIN --}}


    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
