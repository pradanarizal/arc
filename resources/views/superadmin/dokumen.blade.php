@extends('layout.template') @section('content')
    <div class="d-flex align-items-center">
        <p class="h3 mb-0 text-gray-800 mr-1 font-weight-bold">Dokumen</p>
        <p class="mb-0 text-gray-800 text-small">Database Dokumen</p>
    </div>

    <!-- Begin Page Content -->
    {{--
<div class="container-fluid"> --}}

    <div class="d-grid gap-2 d-md-flex justify-content-end p-2">
        <button class="d-none d-sm-inline-block btn btn-danger shadow-sm tombol" data-bs-toggle="modal" data-bs-target="#">
            <i class="fas fa-plus fa-sm text-white-80 mr-2"></i>
            Add Retensi
        </button>
        <button class="d-none d-sm-inline-block btn btn-success shadow-sm tombol" data-bs-toggle="modal" data-bs-target="#">
            <i class="fas fa-plus fa-sm text-white-80 mr-2"></i>
            Add Arsip
        </button>
    </div>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6>
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
                            <th>Tanggal Upload</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <!-- <tfoot>
                                                    <tr>
                                                        <th>No</th>
                                                        <th>No. Dokumen</th>
                                                        <th>Nama Dokumen</th>
                                                        <th>Deskripsi</th>
                                                        <th>Tanggal Upload</th>
                                                        <th>Status</th>
                                                    </tr>
                                                </tfoot> -->
                    <tbody>
                        <tr>
                            <td>Tiger Nixon</td>
                            <td>System Architect</td>
                            <td>Edinburgh</td>
                            <td>61</td>
                            <td>2011/04/25</td>
                            <td>AKSI</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    {{--
</div> --}}
    <!-- /.container-fluid -->
@endsection
