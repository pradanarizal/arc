@extends('layout.template')

@section('content')
    <!-- Page Heading -->
    <div class="d-flex align-items-center">
        <p class="h3 mb-0 text-gray-800 mr-1 font-weight-bold">Dokumen</p>
        <p class="mb-0 text-gray-800 text-small">Detail Data</p>
    </div>
    @foreach ($dokumen as $item)
        <div class="container row mt-3">
            <div class="col-lg-5 bg-white p-4 mb-2 rounded">
                <div class="form-group row">
                    <label for="staticEmail" class="col-sm-5 col-form-label">No Dokumen</label>
                    <div class="col-sm-6">
                        <input type="text" readonly class="form-control-plaintext" value="{{ $item->no_dokumen }}">
                    </div>
                </div>
                <hr>
                <div class="form-group row">
                    <label for="staticEmail" class="col-sm-5 col-form-label">Nama Dokumen</label>
                    <div class="col-sm-6">
                        <input type="text" readonly class="form-control-plaintext" value="{{ $item->nama_dokumen }}">
                    </div>
                </div>
                <hr>
                <div class="form-group row">
                    <label for="staticEmail" class="col-sm-5 col-form-label">Deskripsi</label>
                    <div class="col-sm-6">
                        <input type="text" readonly class="form-control-plaintext" value="{{ $item->deskripsi }}">
                    </div>
                </div>
                <hr>
                <div class="form-group row">
                    <label for="staticEmail" class="col-sm-5 col-form-label">Tahun Dokumen</label>
                    <div class="col-sm-6">
                        <input type="text" readonly class="form-control-plaintext" value="{{ $item->tahun_dokumen }}">
                    </div>
                </div>
                <hr>
                <div class="form-group row">
                    <label for="staticEmail" class="col-sm-5 col-form-label">Nama Kelengkapan</label>
                    <div class="col-sm-6">
                        <input type="text" readonly class="form-control-plaintext" value="{{ $item->nama_kel_dokumen }}">
                    </div>
                </div>
                <hr>
                <div class="form-group row">
                    <label for="staticEmail" class="col-sm-5 col-form-label">Tanggal Upload</label>
                    <div class="col-sm-6">
                        <input type="text" readonly class="form-control-plaintext"
                            value="{{ date('d-m-yy', strtotime($item->tgl_upload)) }}">
                    </div>
                </div>
                <hr>
            </div>
            <div class="col-lg-6">
                <iframe src="public/data_file/retensi/pIeUUMHjMNiLzoKz4PF25TKQqL0eq41SBluTv6zl.pdf" height="auto" width="auto"></iframe>
            </div>
        </div>
    @endforeach
@endsection
