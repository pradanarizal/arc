@extends('layout.template')
@section('content')
    <!-- Page Heading -->

    <div class="d-flex align-items-center">
        <p class="h3 mb-0 text-gray-800 mr-1 font-weight-bold">Transaksi</p>
        <p class="mb-0 text-gray-800 text-small">Data Approval Retensi Arsip</p>
    </div>

    <!-- Begin Page Content -->

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Data Approval Retensi Arsip</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>No. Dok</th>
                            <th>Nama Dokumen</th>
                            <th>Deskripsi</th>
                            <th>Tanggal Upload</th>
                            <th>Pemohon</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>

                    <tbody>

                        {{-- Ambil data dari controller --}}

                        <tr>
                            <td>1</td>
                            <td>2019/SOP/Sarana</td>
                            <td>Dokumen sarana</td>
                            <td>SOP Kerja</td>
                            <td>2019</td>
                            <td>Doly Prahoro</td>
                            <td class="text-center">
                                <button class="btn btn-sm bg-warning text-white" data-bs-toggle="modal"
                                    data-bs-target="#edit_ruang">
                                    <i class="fa fa-pen"></i>
                                </button>
                                <button class="btn btn-sm bg-danger text-white" data-bs-toggle="modal" data-bs-target="#">
                                    <i class="fa fa-trash"></i>
                                </button>
                            </td>
                        </tr>

                    </tbody>
                </table>
            </div>
        </div>
    </div>

    {{-- @include('superadmin.modal.m_tambah_ruang')
    @include('superadmin.modal.m_edit_ruang') --}}
@endsection
