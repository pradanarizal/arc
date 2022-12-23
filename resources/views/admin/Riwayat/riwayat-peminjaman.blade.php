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
                            <th>Tanggal Upload</th>
                            <th>Tanggal Kembali</th>
                            <th>Approval</th>
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
                                <td>{{ $item->jenis_dokumen }}</td>
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
                                    <div class="btn-group btn-group-sm">
                                        @if (count($pengembalian) != 0)
                                            <?php $counter = 0; ?>
                                            @foreach ($pengembalian as $item1)
                                                @if ($item1->id_peminjaman == $item->id_peminjaman)
                                                    @if ($item1->status_pengembalian == 'Pending' || $item1->status_pengembalian == 'Ya')
                                                        <a class="btn btn-sm bg-warning text-white"
                                                            href="/d_riwayat_peminjaman/{{ $item->id_peminjaman }}">
                                                            <i class="fa fa-eye"></i>
                                                        </a>
                                                    @else
                                                        <a class="btn btn-sm bg-warning text-white"
                                                            href="/d_riwayat_peminjaman/{{ $item->id_peminjaman }}">
                                                            <i class="fa fa-eye"></i>
                                                        </a>
                                                        <button title="Kembali" class="btn btn-sm btn-primary text-white"
                                                            data-bs-toggle="modal"
                                                            data-bs-target="#pengembalian_dokumen{{ $item->id_peminjaman }}">
                                                            <i class="fa fa-undo"></i>
                                                    @endif
                                                    <?php $counter++; ?>
                                                @break
                                            @endif
                                        @endforeach
                                        @if ($counter == 0)
                                            @if ($item->status_peminjaman != 'Pending')
                                                <a class="btn btn-sm bg-warning text-white"
                                                    href="/d_riwayat_peminjaman/{{ $item->id_peminjaman }}">
                                                    <i class="fa fa-eye"></i>
                                                </a>
                                                <button title="Kembali" class="btn btn-sm btn-primary text-white"
                                                    data-bs-toggle="modal"
                                                    data-bs-target="#pengembalian_dokumen{{ $item->id_peminjaman }}">
                                                    <i class="fa fa-undo"></i>
                                            @endif
                                        @endif
                                    @else
                                        <!-- Kosong -->
                                        <a class="btn btn-sm bg-warning text-white"
                                            href="/d_riwayat_peminjaman/{{ $item->id_peminjaman }}">
                                            <i class="fa fa-eye"></i>
                                        </a>
                                        @if ($item->status_peminjaman != 'Pending')
                                            <button title="Kembali" class="btn btn-sm btn-primary text-white"
                                                data-bs-toggle="modal"
                                                data-bs-target="#pengembalian_dokumen{{ $item->id_peminjaman }}">
                                                <i class="fa fa-undo"></i>
                                            </button>
                                        @endif
                                    @endif
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            {{-- {{ json_encode($dokumen) }}
            <hr>
            {{ json_encode($pengembalian) }} --}}
        </div>
    </div>
</div>

@include('admin.modal.m_pengembalian_dokumen')
@include('sweetalert::alert')
@endsection
