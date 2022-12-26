@extends('layout.template')
@section('content')
    <!-- Page Heading -->

    <div class="d-flex align-items-center mb-3">
        <p class="h3 mb-0 text-gray-800 mr-1 font-weight-bold">Riwayat Retensi Arsip</p>
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
                            <th>No. Dokumen</th>
                            <th>Nama Dokumen</th>
                            <th>Deskripsi</th>
                            <th>Tanggal Upload</th>
                            <th>Approval</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>

                    <tbody>

                        <?php $no = 1; ?>

                        @foreach ($dokumen as $item)
                            <tr>
                                <td>{{ $no++ }}</td>
                                <td>{{ $item->no_dokumen }}</td>
                                <td>{{ $item->nama_dokumen }}</td>
                                <td>{{ $item->deskripsi }}</td>
                                <td>{{ date('d-m-Y', strtotime($item->tgl_upload)) }}</td>
                                <td class="text-center">
                                    @if ($item->status_retensi == 'Pending')
                                        <span class="badge badge-warning p-2" title="menunggu_approval">
                                            {{ $item->status_retensi }}
                                        </span>
                                    @elseif ($item->status_retensi == 'Ya')
                                        <span class="badge badge-success p-2" title="Approval">
                                            {{ $item->status_retensi }}
                                        </span>
                                    @else
                                        <span class="badge badge-danger p-2" title="Rejected">
                                            {{ $item->status_retensi }}
                                        </span>
                                    @endif
                                </td>
                                <td class="text-center">
                                    <a class="btn btn-sm bg-warning text-white"
                                        href="/d_riwayat_retensi/{{ $item->id_retensi }}">
                                        <i class="fa fa-eye"></i>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div>{{ $dokumen->links('pagination::bootstrap-4') }}</div>
        </div>
    </div>

    @include('sweetalert::alert')

@endsection
