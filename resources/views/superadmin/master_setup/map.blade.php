@extends('layout.template') @section('content')
    <div class="d-flex align-items-center">
        <p class="h3 mb-0 text-gray-800 mr-1 font-weight-bold">Master</p>
        <p class="mb-0 text-gray-800 text-small">Map Penyimpanan</p>
    </div>

    <!-- Begin Page Content -->

    <div class="d-grid gap-2 d-md-flex justify-content-end p-2">
        <button class="d-none d-sm-inline-block btn btn-success shadow-sm" data-bs-toggle="modal" data-bs-target="#tambah_map">
            <i class="fas fa-plus fa-sm text-white-80 mr-2"></i>
            Add Map
        </button>
    </div>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Statistik Map Penyimpanan</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>ID</th>
                            <th>Nama Map</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php $no = 1; ?>
                        {{-- Ambil data dari controller --}}
                        @foreach ($map as $item)
                        <tr>
                            <td>{{ $no++ }}</td>
                            <td>{{ $item->id_map }}</td>
                            <td>{{ $item->nama_map }}</td>
                            <td class="text-center">
                                <button class="btn btn-sm bg-warning text-white" data-bs-toggle="modal" data-bs-target="#edit_map">
                                    <i class="fa fa-pen"></i>
                                </button>
                                <button class="btn btn-sm bg-danger text-white" data-bs-toggle="modal" data-bs-target="#">
                                    <i class="fa fa-trash"></i>
                                </button>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    @include('superadmin.modal.m_tambah_map')
    @include('superadmin.modal.m_edit_map')
@endsection
