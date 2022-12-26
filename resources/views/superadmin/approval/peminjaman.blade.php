@extends('layout.template')
@section('content')
    <!-- Page Heading -->

    <div class="d-flex align-items-center mb-3">
        <p class="h3 mb-0 text-gray-800 mr-1 font-weight-bold">Transaksi</p>
        <p class="mb-0 text-gray-800 text-small">Data Approval Peminjaman</p>
    </div>

    <!-- Begin Page Content -->

    {{-- <div class="d-grid gap-2 d-md-flex justify-content-end p-2">
        <button class="d-none d-sm-inline-block btn btn-success shadow-sm" data-bs-toggle="modal" data-bs-target="#">
            <i class="fas fa-plus fa-sm text-white-80 mr-2"></i>
            Add Ruang
        </button>
    </div> --}}

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="table-responsive">
                <div class="d-flex align-items-center justify-content-between mb-1 p-1">
                    <div></div>
                    <div></div>
                    <div class="d-flex align-items-center justify-content-between">
                        <form action="/approval/peminjaman" method="GET"
                            class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                            <div class="input-group">
                                <input type="text" name="keyword" id="peminjamanSearch"
                                    class="form-control bg-light border-0 small" placeholder="Search" aria-label="Search"
                                    aria-describedby="basic-addon2" value="{{ request('keyword') }}">
                                <div class="input-group-append">
                                    <button class="btn btn-primary" type="submit">
                                        <i class="fas fa-search fa-sm"></i>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <table class="table table-bordered" id="peminjamanSearch" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>No. Dok</th>
                            <th>Nama Dokumen</th>
                            <th>Tanggal Ambil</th>
                            <th>Tanggal Kembali</th>
                            <th>Peminjam</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php $no = 1; ?>
                        {{-- Ambil data dari controller --}}
                        @foreach ($peminjaman as $item)
                            <tr>
                                <td>{{ $no++ }}</td>
                                <td>{{ $item->no_dokumen }}</td>
                                <td>{{ $item->nama_dokumen }}</td>
                                <td>{{ date('d-m-Y', strtotime($item->tgl_ambil)) }}</td>
                                <td>{{ date('d-m-Y', strtotime($item->tgl_kembali)) }}</td>
                                <td>{{ $item->name }}</td>
                                <td class="text-center">
                                    @if ($item->status_peminjaman == 'Pending')
                                        <button title="Setuju" class="btn btn-sm bg-success text-white" data-bs-toggle="modal"
                                            data-bs-target="#approve_peminjaman{{$item->id_peminjaman}}">
                                            <i class="fa fa-check"></i>
                                        </button>
                                        <button class="btn btn-sm bg-danger text-white" data-bs-toggle="modal"
                                            data-bs-target="#tolak_peminjaman{{$item->id_peminjaman}}">
                                            <i class="fa fa-times"></i>
                                        </button>
                                    @else
                                    <span title="Dokumen Tersedia"
                                            class="badge badge-success p-2">Selesai</span>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <div>{{ $peminjaman->links('pagination::bootstrap-5') }}</div>
            </div>
        </div>
    </div>

    {{-- @include('superadmin.modal.m_tambah_ruang')
    @include('superadmin.modal.m_edit_ruang') --}}

    @include('superadmin.modal.m_approve_peminjaman')
    @include('superadmin.modal.m_approve_tolak_peminjaman')
    @include('sweetalert::alert')

@endsection
