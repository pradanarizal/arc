@extends('layout.template') @section('content')
    <div class="d-flex align-items-center">
        <p class="h3 mb-0 text-gray-800">Master</p>
        <p class="mb-0 text-gray-800 text-small">Lokasi Penyimpanan</p>
    </div>

    <!-- Begin Page Content -->
    {{--
<div class="container-fluid"> --}}

    <div class="d-grid gap-2 d-md-flex justify-content-center p-2">
        <a href="#" type="button" class="btn btn-primary tombol">Add Ruang</a>
        <a href="#" type="button" class="btn btn-primary tombol">Add Rak</a>
        <a href="#" type="button" class="btn btn-primary tombol">Add Box</a>
        <a href="#" type="button" class="btn btn-primary tombol">Add Map</a>
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
                            <th>Nama Ruang</th>
                            <th>Nama Rak</th>
                            <th>Nama Box</th>
                            <th>Nama Map</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>

                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>Ruang Arsip SDM</td>
                            <td>Rak 2</td>
                            <td>33A</td>
                            <td>KRL</td>
                            <td>TOMBOL AKSI INI NTAR</td>
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
