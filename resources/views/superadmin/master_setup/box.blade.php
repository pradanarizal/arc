@extends('layout.template') @section('content')
    <div class="d-sm-flex align-items-center justify-content-between mb-3">
        <div class="d-flex align-items-center">
            <p class="h3 mb-0 text-gray-800 mr-1 font-weight-bold">Master</p>
            <p class="mb-0 text-gray-800 text-small">Box Penyimpanan</p>
        </div>

        <div class="d-none d-sm-inline-block justify-content-end p-2">
            <button class="d-none d-sm-inline-block btn btn-success shadow-sm" data-bs-toggle="modal"
                data-bs-target="#tambah_box">
                <i class="fas fa-plus fa-sm text-white-80 mr-2"></i>
                Add Box
            </button>
        </div>
    </div>

    <!-- DataTables Example -->
    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>ID</th>
                            <th>Nama Box</th>
                            <th>Nama Rak</th>
                            <th>Nama Ruang</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php $no = 1; ?>
                        {{-- Ambil data dari controller --}}
                        @foreach ($box as $item)
                            <tr>
                                <td>{{ $no++ }}</td>
                                <td>{{ $item->id_box }}</td>
                                <td>{{ $item->nama_box }}</td>
                                <td>{{ $item->nama_rak }}</td>
                                <td>{{ $item->nama_ruang }}</td>
                                <td class="text-center">
                                    <button class="btn btn-sm bg-warning text-white" data-bs-toggle="modal"
                                        data-bs-target="#edit_box{{ $item->id_box }}">
                                        <i class="fa fa-pen"></i>
                                    </button>
                                    <button class="btn btn-sm bg-danger text-white" data-bs-toggle="modal"
                                        data-bs-target="#delete_box{{ $item->id_box }}">
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
    @include('superadmin.modal.m_tambah_box')
    @include('superadmin.modal.m_edit_box')
    @include('superadmin.modal.m_delete_box')
    @include('sweetalert::alert')
@endsection
