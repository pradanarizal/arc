@extends('layout.template')

<<<<<<< Updated upstream
@section('content')
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Dokumen</h1>
    </div>
=======
<!-- Begin Page Content -->
{{--
<div class="container-fluid"> --}}

    <div class="d-grid gap-2 d-md-flex justify-content-end p-2">
        <a href="#" type="button" class="btn btn-danger tombol">Add Retensi</a>
        <a href="#" type="button" class="btn btn-primary tombol">Add Arsip</a>
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

                    <tbody>
                        <?php $no=1; ?>
                        {{-- Ambil data dari controller --}}
                        @foreach ($dokumen as $item)
                        <tr>
                            <td>{{ $no++ }}</td>
                            <td>{{ $item->no_dokumen }}</td>
                            <td>{{ $item->nama_dokumen }}</td>
                            <td>{{ $item->deskripsi }}</td>
                            <td>{{ $item->tgl_upload }}</td>
                            <td>{{ $item->status_dokumen }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    {{--
</div> --}}
<!-- /.container-fluid -->
>>>>>>> Stashed changes
@endsection
