@extends('layout.template')
@section('content')
    {{-- Page Heading --}}
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
                            <div class="h2 mb-0 font-weight-bold text-gray-800">{{ $count_ruang }}
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-archive fa-2x text-gray-300"></i>
                        </div>
                    </div>
                    <hr class="divider">
                    <div class="text-sm text-gray-800">Total Ruang Penyimpanan Terpakai</div>
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
                            <div class="h2 mb-0 font-weight-bold text-gray-800">{{ $count_dokumen }}
                            </div>
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
        <div class="col-xl-12 col-md-12 mb-4">
            <div class="card shadow h-100 py-2">
                <div class="card-body">
                    <div id="container" style="padding: 30px;"></div>
                </div>
            </div>
        </div>
    </div>

    {{-- @if ((auth()->user()->level == 'superadmin') | (auth()->user()->level == 'admin')) --}}
@endsection
