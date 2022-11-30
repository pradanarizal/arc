@extends('layout.template') @section('content')
    <div class="d-sm-flex align-items-center justify-content-between mb-3">
        <div class="d-flex align-items-center">
            <p class="h3 mb-0 text-gray-800 mr-1 font-weight-bold">Dokumen</p>
            <p class="mb-0 text-gray-800 text-small">Table Dokumen</p>
        </div>

        <div class="d-none d-sm-inline-block justify-content-end p-2">
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
    </div>

    <!-- Begin Page Content -->
    {{--
<div class="container-fluid"> --}}

    {{-- <div class="d-grid gap-2 d-md-flex justify-content-end p-2">
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
    </div> --}}

    <!-- DataTales Example -->
    <div class="card shadow mb-4 mt-2">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>No. Dokumen</th>
                            <th>Nama Dokumen</th>
                            <th>Deskripsi</th>
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
                                <td>{{ date('d-m-Y', strtotime($item->tgl_upload)) }}</td>
                                <td>{{ $item->status_dokumen }}</td>
                                <td class="text-center">
                                    <button type="button" class="btn btn-primary" data-bs-toggle="dropdown">
                                        <i class="fas fa-cog"></i>
                                    </button>
                                    <ul class="dropdown-menu">
                                        <li><a class="dropdown-item text-warning"
                                                href="/detail_dokumen_admin/{{ $item->no_dokumen }}"><i
                                                    class="fas fa-eye fa-warning"></i> Lihat</a>
                                        </li>
                                        <li><a class="dropdown-item text-primary" data-bs-toggle="modal"
                                                data-bs-target="#pinjam_dokumen{{ $item->no_dokumen }}"><i
                                                    class="fas fa-file-export fa-primary"></i>
                                                Pinjam</a></li>
                                        <li><a class="dropdown-item text-danger" href="#"><i
                                                    class="fas fa-trash fa-danger"></i> Retensi</a>
                                        </li>
                                    </ul>
                                    {{-- <a title="Lihat Dokumen" class="btn btn-sm bg-primary text-white"
                                        href="/detail_dokumen_admin/{{ $item->no_dokumen }}">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                    <button title="Pinjam Dokumen" class="btn btn-sm bg-success text-white"
                                        data-bs-toggle="modal" data-bs-target="#pinjam_dokumen{{ $item->no_dokumen }}">
                                        <i class="fas fa-file-export"></i>
                                    </button>
                                    <button title="Retensi Dokumen" class="btn btn-sm bg-danger text-white"
                                        data-bs-toggle="modal" data-bs-target="#">
                                        <i class="fas fa-trash"></i>
                                    </button> --}}
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
    @include('admin.modal.m_tambah_dokumen')
    @include('admin.modal.m_tambah_retensi')
    @include('admin.modal.m_pinjam_dokumen')
    @include('sweetalert::alert')
@endsection
