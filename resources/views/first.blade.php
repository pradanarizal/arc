<!DOCTYPE html>
<html lang="en">

<head>
    <title>Document Archive</title>
    @include('layout.head')
</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-sidebar sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="dashboard">
                <img src="{{ asset('templates/img/logo.webp') }}" width="100px">
            </a>
            <!-- Divider -->
            <hr class="sidebar-divider">
            <!-- Heading -->

            <div class="sidebar-heading">
                Menu
            </div>

            <!-- Nav Item - Beranda -->
            <li class="nav-item {{ request()->is('/') ? 'active' : '' }}">
                <a class="nav-link" href="/">
                    <i class="fas fa-fw fa-home"></i>
                    <span>Dashboard</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/login">
                    <i class="fas fa-fw fa-sign-in-alt"></i>
                    <span>Login</span></a>
            </li>

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="/profil">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Profile
                                </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="{{ route('logout') }}">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        </li>
                    </ul>
                </nav>

                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->

                    <div class="d-flex align-items-center">
                        <p class="h3 text-gray-800 mb-0 mr-1 font-weight-bold">Dashboard</p>
                        <p class="mb-0 text-gray-800 text-small">Overview & Statistics</p>
                        {{-- <p class="mb-0 bg-primary rounded text-white p-2"><i class="far fa-calendar"></i>{{ date(' j F Y') }}</p> --}}
                    </div>

                    <div class="row">
                        <!-- Card  -->
                        <div class="col-xl-4  mb-3 mt-2">
                            <div class="card border-left-danger shadow h-100">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-s font-weight-bold text-danger mb-2">
                                                Storage</div>
                                            <div class="h2 mb-0 font-weight-bold text-gray-800">32</div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-archive fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                    <hr class="divider">
                                    <div class="text-sm text-gray-800">Total Ruang Penyimpanan</div>
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-4  mb-3 mt-2">
                            <div class="card border-left-success shadow h-100">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-s font-weight-bold text-success mb-2">
                                                Dokumen</div>
                                            <div class="h2 mb-0 font-weight-bold text-gray-800">90</div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-file fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                    <hr class="divider">
                                    <div class="text-gray-800 text-sm">Total Dokumen</div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <!-- Bar Chart -->
                        <div class="col">
                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">Statistik Ruang Penyimpanan</h6>
                                </div>
                                <div class="card-body">
                                    <div class="text-gray-800 text-sm-center">
                                        Statistik Penyimpanan
                                    </div>
                                    <div class="chart-bar">
                                        <canvas id="chart_penyimpanan"></canvas>
                                    </div>
                                    <hr>
                                    <div class="d-flex justify-content-center text-gray-800">
                                        <div class="d-flex border rounded">
                                            <div class="p-1"><button class="d-inline-flex p-2 border-0 r-01"
                                                    disabled="disabled"></button> R.01</div>
                                            <div class="p-1"><button class="d-inline-flex p-2 border-0 r-02"
                                                    disabled="disabled"></button> R.02</div>
                                            <div class="p-1"><button class="d-inline-flex p-2 border-0 r-03"
                                                    disabled="disabled"></button> R.03</div>
                                            <div class="p-1"><button class="d-inline-flex p-2 border-0 r-04"
                                                    disabled="disabled"></button> R.04</div>
                                            <div class="p-1"><button class="d-inline-flex p-2 border-0 r-05"
                                                    disabled="disabled"></button> R.05</div>
                                            <div class="p-1"><button class="d-inline-flex p-2 border-0 r-06"
                                                    disabled="disabled"></button> R.06</div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            @include('layout.footer')
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    {{-- Modal Keluar --}}
    {{-- @include('admin.keluar.m_keluar') --}}

    {{-- @include('sweetalert::alert') --}}

    {{-- Script --}}
    @include('layout.script')
    {{-- End Script --}}

</body>

</html>
