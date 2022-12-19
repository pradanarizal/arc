@extends('layout.template')
@section('content')
    <!-- Page Heading -->

    <div class="d-flex align-items-center mb-3">
        <p class="h3 mb-0 text-gray-800 mr-1 font-weight-bold">Riwayat Peminjaman</p>
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
                            <th>Jenis Dokumen</th>
                            <th>Deskripsi</th>
                            <th>Tanggal Upload</th>
                            <th>Approval</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1 ?>
                        {{-- Ambil data dari controller --}}
                        @foreach ($dokumen as $item)
                        <tr>
                            <td>{{ $no++ }}</td>
                            <td>{{ $item->no_dokumen }}</td>
                            <td>{{ $item->nama_dokumen }}</td>
                            <td>{{ $item->jenis_dokumen}}</td>
                            <td>{{ date('d-m-Y', strtotime($item->tgl_ambil)) }} </td>
                            <td>{{ date('d-m-Y', strtotime($item->tgl_kembali)) }}</td>
                            <td class="text-center">
                                @if ($item->status_peminjaman == 'Pending')
                                    <span class="badge badge-warning p-2" title="menunggu_approval">
                                        {{ $item->status_peminjaman }}
                                    </span>
                                @elseif ($item->status_peminjaman == 'Ya')
                                    <span class="badge badge-success p-2" title="Approval">
                                        {{ $item->status_peminjaman }}
                                    </span>
                                @else
                                    <span class="badge badge-danger p-2" title="Rejected">
                                        {{ $item->status_peminjaman }}
                                    </span>
                                @endif
                            </td>

                            <td class="text-center">
                            @foreach ($pengembalian as $data)

                                @if ($item->id_dokumen == $data->id_dokumen)
                                    @if ($item->status_peminjaman == 'Ya' && $data->status_pengembalian == '')
                                        <a class="btn btn-sm bg-warning text-white" href="/d_riwayat_peminjaman/{{ $item->id_peminjaman }}">
                                            <i class="fa fa-eye"></i>
                                        </a>
                                        <button title="Kembali" class="btn btn-sm btn-primary text-white"
                                            data-bs-toggle="modal" data-bs-target="#pengembalian_dokumen{{ $item ->id_dokumen }}">
                                            <i class="fa fa-undo"></i>
                                        </button>
                                    @elseif ($data->status_pengembalian == 'Pending')
                                        <a class="btn btn-sm bg-warning text-white"
                                            href="/d_riwayat_peminjaman/{{ $item->id_peminjaman }}">
                                            <i class="fa fa-eye"></i>
                                        </a>
                                    @else 
                                        <a class="btn btn-sm bg-warning text-white"
                                            href="/d_riwayat_peminjaman/{{ $item->id_peminjaman }}">
                                            <i class="fa fa-eye"></i>
                                        </a>
                                    @endif
                                @endif
                            @endforeach
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    @include('admin.modal.m_pengembalian_dokumen')
@endsection
