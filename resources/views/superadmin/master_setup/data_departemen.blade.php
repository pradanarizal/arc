@extends('layout.template')
@section('content')
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-3">
        <div class="d-flex align-items-center">
            <p class="h3 mb-0 text-gray-800 mr-1 font-weight-bold">Master</p>
            <p class="mb-0 text-gray-800 text-small">Data Departemen</p>
        </div>

        <div class="d-none d-sm-inline-block justify-content-end p-2">
            <button class="d-none d-sm-inline-block btn btn-success shadow-sm" data-bs-toggle="modal"
                data-bs-target="#tambah_departemen">
                <i class="fas fa-plus fa-sm text-white-80 mr-2"></i>
                Add Departemen
            </button>
        </div>
    </div>

    <!-- Begin Page Content -->

    {{-- <div class="d-grid gap-2 d-md-flex justify-content-end p-2">
        <button class="d-none d-sm-inline-block btn btn-success shadow-sm" data-bs-toggle="modal"
            data-bs-target="#tambah_ruang">
            <i class="fas fa-plus fa-sm text-white-80 mr-2"></i>
            Add Ruang
        </button>
    </div> --}}

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>ID</th>
                            <th>Kode Departemen</th>
                            <th>Nama Departemen</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php $no = 1; ?>
                        {{-- Ambil data dari controller --}}
                        @foreach ($departemen as $item)
                            <tr>
                                <td>{{ $no++ }}</td>
                                <td>{{ $item->id_departemen }}</td>
                                <td>{{ $item->kode_departemen }}</td>
                                <td>{{ $item->nama_departemen }}</td>
                                <td class="text-center">
                                    <button class="btn btn-sm bg-warning text-white" data-bs-toggle="modal"
                                        data-bs-target="#edit_departemen{{ $item->id_departemen }}">
                                        <i class="fa fa-pen"></i>
                                    </button>
                                    <button class="btn btn-sm bg-danger text-white" data-bs-toggle="modal"
                                        data-bs-target="#delete_departemen{{ $item->id_departemen }}">
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

    @include('superadmin.modal.m_tambah_departemen')
    @include('superadmin.modal.m_delete_departemen')
    @include('superadmin.modal.m_edit_departemen')
    @include('sweetalert::alert')
@endsection
