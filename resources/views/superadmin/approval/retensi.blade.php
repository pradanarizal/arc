@extends('layout.template')
@section('content')
    <!-- Page Heading -->

    <div class="d-flex align-items-center">
        <p class="h3 mb-0 text-gray-800 mr-1 font-weight-bold">Transaksi</p>
        <p class="mb-0 text-gray-800 text-small">Data Approval Retensi</p>
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
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Data Approval Retensi</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>No. Dok</th>
                            <th>Nama Dokumen</th>
                            <th>Tahun Dokumen</th>
                            <th>Deskripsi</th>
                            <th>Tanggal Upload</th>
                            <th>Pemohon</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php $no = 1; ?>
                        {{-- Ambil data dari controller --}}
                        @foreach ($retensi as $item)
                            <tr>
                                <td>{{ $no++ }}</td>
                                <td>{{ $item->no_dokumen }}</td>
                                <td>{{ $item->nama_dokumen }}</td>
                                <td>{{ $item->tahun_dokumen }}</td>
                                <td>{{ $item->deskripsi }}</td>
                                <td>{{ date('d-m-Y', strtotime($item->tgl_upload)) }}</td>
                                <td>{{ $item->name }}</td>
                                <td class="text-center">
                                    @if ($item->status_retensi == 'Pending')
                                        <span title="Menunggu Approval"
                                            class="badge badge-warning p-2">{{ $item->status_retensi }}</span>
                                    @elseif ($item->status_retensi == 'Ya')
                                        <span title="Approved"
                                            class="badge badge-success p-2">{{ $item->status_retensi }}</span>
                                    @else
                                        <span title="Rejected"
                                            class="badge badge-danger p-2">{{ $item->status_retensi }}</span>
                                    @endif
                                </td>
                                <td class="text-center">
                                    @if ($item->status_retensi == 'Pending')
                                        <button title="View" class="btn btn-sm bg-warning text-white"
                                            data-bs-toggle="modal" data-bs-target="#">
                                            <i class="fa fa-eye"></i>
                                        </button>
                                        <button title="Approve" class="btn btn-sm bg-success text-white"
                                            data-bs-toggle="modal"
                                            data-bs-target="#approve_retensi{{ $item->no_dokumen }}">
                                            <i class="fa fa-check"></i>
                                        </button>
                                        <button title="Reject" class="btn btn-sm bg-danger text-white"
                                            data-bs-toggle="modal" data-bs-target="#tolak_retensi{{ $item->no_dokumen }}">
                                            <i class="fa fa-times"></i>
                                        </button>
                                    @else
                                        <button title="View" class="btn btn-sm bg-warning text-white"
                                            data-bs-toggle="modal" data-bs-target="#">
                                            <i class="fa fa-eye"></i>
                                        </button>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    @include('superadmin.modal.m_approve_retensi')
    @include('superadmin.modal.m_approve_tolak-retensi')
    @include('sweetalert::alert')
@endsection
