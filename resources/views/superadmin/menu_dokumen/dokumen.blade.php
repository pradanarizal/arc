@extends('layout.template') @section('content')
    <div class="d-flex align-items-center">
        <p class="h3 mb-0 text-gray-800 mr-1 font-weight-bold">Dokumen</p>
        <p class="mb-0 text-gray-800 text-small">Table Dokumen</p>
    </div>

    <!-- Begin Page Content -->
    {{--
<div class="container-fluid"> --}}

    <div class="d-grid gap-2 d-md-flex justify-content-end p-2">
        <button class="d-none d-sm-inline-block btn btn-danger shadow-sm tombol" data-bs-toggle="modal"
            data-bs-target="#tambah_retensi">
            <i class="fas fa-plus fa-sm text-white-80 mr-2"></i>
            Add Retensi
        </button>
        <button class="d-none d-sm-inline-block btn btn-success shadow-sm tombol" data-bs-toggle="modal"
            data-bs-target="#tambah_dokumen">
            <i class="fas fa-plus fa-sm text-white-80 mr-2"></i>
            Add Arsip
        </button>
    </div>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Table Dokumen</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>No. Dokumen</th>
                            <th>Nama Dokumen</th>
                            <th>Deskripsi</th>
                            <th>Kelengkapan Dokumen</th>
                            <th>Tanggal Upload</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1; ?>
                        {{-- Ambil data dari controller --}}
                        @foreach ($dokumen as $item)
                            <tr>
                                <td>{{ $no++ }}</td>
                                <td>{{ $item->no_dokumen }}</td>
                                <td>{{ $item->nama_dokumen }}</td>
                                <td>{{ $item->deskripsi }}</td>
                                <td>{{ $item->nama_kel_dokumen }}</td>
                                <td>{{ date('d-m-Y', strtotime($item->tgl_upload)) }}</td>
                                <td>{{ $item->status_dokumen }}</td>
                                <td>
                                    <a title="Lihat Dokumen" class="btn btn-sm bg-primary text-white"
                                        href="/detail_dokumen/{{ $item->no_dokumen }}">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                    <button class="btn btn-sm bg-warning text-white" data-bs-toggle="modal"
                                        data-bs-target="#modaledit{{ $item->no_dokumen }}">
                                        <i class="fa fa-pen"></i>
                                    </button>
                                    <button class="btn btn-sm bg-danger text-white" data-bs-toggle="modal"
                                        data-bs-target="#modalhapus">
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
    {{--
</div> --}}
    <!-- /.container-fluid -->
    @include('superadmin.modal.m_tambah_dokumen')
    @include('superadmin.modal.m_tambah_retensi')
    @include('sweetalert::alert')
@endsection
