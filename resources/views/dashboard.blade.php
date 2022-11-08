@extends('layout.template')
@section('content')
    <!-- Page Heading -->

    <div class="d-flex align-items-center">
        <p class="h3 text-gray-800 mb-0">Dashboard</p>
        <p class="mb-0 text-gray-800 text-small">Overview & Statistics</p>
        {{-- <p class="mb-0 bg-primary rounded text-white p-2"><i class="far fa-calendar"></i>{{ date(' j F Y') }}</p> --}}
    </div>

    <div class="row">
        {{-- UNTUK TAMPILAN ADMIN --}}
        <!-- Card  -->
        @if (auth()->user()->level == 'admin')
            <div class="col-xl-4 col-md-6 mb-4">
                <div class="card border-left-danger shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-s font-weight-bold text-danger mb-2">
                                    Punya Admin</div>
                                <div class="h2 mb-0 font-weight-bold text-gray-800">10</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-users fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endif {{-- END OF TAMPILAN ADMIN --}} {{-- UNTUK TAMPILAN USER --}}
        <!-- Card  -->
        @if (auth()->user()->level == 'user')
            <div class="col-xl-4 col-md-6 mb-4">
                <div class="card border-left-danger shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-s font-weight-bold text-danger mb-2">
                                    Punya User</div>
                                <div class="h2 mb-0 font-weight-bold text-gray-800">11</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-users fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endif {{-- END OF TAMPILAN USER --}} {{-- UNTUK TAMPILAN SUPER ADMIN --}}

        <!-- Card -->
        @if (auth()->user()->level == 'superadmin')
            <div class="col-xl-4 col-md-6 mb-4">
                <div class="card border-left-danger shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-s font-weight-bold text-danger mb-2">
                                    Storage</div>
                                <div class="h2 mb-0 font-weight-bold text-gray-800">12</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-users fa-2x text-gray-300"></i>
                            </div>
                        </div>
                        <hr class="divider">
                        <div class="text-sm text-gray-800">Total Ruang Penyimpanan</div>
                    </div>
                </div>
            </div>

            <div class="col-xl-4 col-md-6 mb-4">
                <div class="card border-left-danger shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-s font-weight-bold text-danger mb-2">
                                    Dokumen</div>
                                <div class="h2 mb-0 font-weight-bold text-gray-800">12</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-users fa-2x text-gray-300"></i>
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
        @endif
    </div>
@endsection
