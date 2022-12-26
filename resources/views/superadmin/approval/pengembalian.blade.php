@extends('layout.template')
@section('content')
    <!-- Page Heading -->

    <div class="d-flex align-items-center mb-3">
        <p class="h3 mb-0 text-gray-800 mr-1 font-weight-bold">Transaksi</p>
        <p class="mb-0 text-gray-800 text-small">Data Approval Pengembalian</p>
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
                            <th>Tanggal Peminjaman</th>
                            <!-- <th>Tanggal Kembali</th> -->
                            <th>Tanggal Pengembalian</th>
                            <th>Peminjam</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php $no = 1; ?>
                        {{-- Ambil data dari controller --}}
                        @foreach ($pengembalian as $item)
                            <tr>
                                <td>{{ $no++ }}</td>
                                <td>{{ $item->no_dokumen }}</td>
                                <td>{{ $item->nama_dokumen }}</td>
                                <td>{{ date('d-m-Y', strtotime($item->tgl_ambil)) }}</td>
                                {{--<td>{{ date('d-m-Y', strtotime($item->tgl_kembali)) }}</td>--}}
                                <td>{{ date('d-m-Y', strtotime($item->tgl_pengembalian)) }}</td>
                                <td>{{ $item->name }}</td>
                                <td class="text-center">
                                    <div class="btn-group btn-group-sm">
                                        @if ($item->status_pengembalian == 'Pending')
                                            <button class="btn btn-sm bg-success text-white" data-bs-toggle="modal"
                                                data-bs-target="#approve_pengembalian{{ $item->id_pengembalian }}">
                                                <i class="fa fa-check"></i>
                                            </button>
                                            <button class="btn btn-sm bg-danger text-white" data-bs-toggle="modal"
                                                data-bs-target="#tolak_pengembalian{{ $item->id_pengembalian }}">
                                                <i class="fa fa-times"></i>
                                            </button>
                                        @else
                                            <span title="Dokumen Tersedia" class="badge badge-success p-2">Selesai</span>
                                        @endif
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    {{-- @include('superadmin.modal.m_tambah_ruang')
    @include('superadmin.modal.m_edit_ruang') --}}

    @include('superadmin.modal.m_approve_pengembalian')
    @include('superadmin.modal.m_approve_tolak_pengembalian')
    @include('sweetalert::alert')
@endsection
<?php
$listErrorEdit = ['catatan_tolak_pengembalian'];
?>
<script>
    window.onload = function() {
        @foreach ($listErrorEdit as $err)
            @error($err)
                Swal.fire({
                    toast: true,
                    icon: 'error',
                    title: 'Tolak Pengembalian Gagal!',
                    text: '{{ $message }}',

                    animation: true,
                    position: 'top-right',
                    showConfirmButton: false,
                    showCloseButton: true,
                    timer: 6000,
                    timerProgressBar: true,
                    didOpen: (toast) => {
                        toast.addEventListener('mouseenter', Swal.stopTimer)
                        toast.addEventListener('mouseleave', Swal.resumeTimer)
                    }
                });
                @break
            @enderror
        @endforeach
    };
</script>
