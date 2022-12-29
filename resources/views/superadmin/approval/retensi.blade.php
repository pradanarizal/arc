@extends('layout.template')
@section('content')
    <!-- Page Heading -->

    <div class="d-flex align-items-center mb-3">
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
                                        <span title="Dokumen telah diretensi!"
                                            class="badge badge-success p-2">{{ $item->status_retensi }}</span>
                                    @else
                                        <span title="Rejected"
                                            class="badge badge-danger p-2">{{ $item->status_retensi }}</span>
                                    @endif
                                </td>
                                <td class="text-center">
                                    @if ($item->status_retensi == 'Pending')
                                        <button type="button" class="btn bg-primary text-white"
                                            data-bs-toggle="dropdown">
                                            <i class="fas fa-cog"></i>
                                        </button>
                                        <ul class="dropdown-menu">
                                            <li><a type="button" class="dropdown-item text-warning btn-sm"
                                                    href="/detail_dokumen_retensi/{{ $item->id_dokumen }}"><i
                                                        class="fas fa-eye fa-warning"></i> View</a>
                                            </li>
                                            <li><a type="button" class="dropdown-item text-success" data-bs-toggle="modal"
                                                    data-bs-target="#approve_retensi{{ $item->id_dokumen }}"><i
                                                        class="fa fa-check"></i>
                                                    Approve</a></li>
                                            <li><a type="button" class="dropdown-item text-danger" data-bs-toggle="modal"
                                                    data-bs-target="#tolak_retensi{{ $item->id_dokumen }}"><i
                                                        class="fa fa-times"></i> Reject</a>
                                            </li>
                                        </ul>
                                    @else
                                        <a type="button" class="btn btn-warning btn-sm"
                                            href="/detail_dokumen_retensi/{{ $item->id_dokumen }}"><i class="fas fa-eye"></i></a>
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
    @include('superadmin.modal.m_approve_tolak_retensi')
    @include('sweetalert::alert')
@endsection
