@extends('layout.template')

@section('content')
    <!-- Page Heading -->
    <div class="d-flex align-items-center">
        <p class="h3 mb-0 text-gray-800 mr-1 font-weight-bold">Dokumen</p>
        <p class="mb-0 text-gray-800 text-small">Detail Data</p>
    </div>
    @foreach ($dokumen as $item)
        <div class="container row mt-3">
            <div class="col-lg-6 bg-white p-4 mb-2 rounded">
                <div class="form-group row">
                    <label for="staticEmail" class="col-sm-5 col-form-label">No Dokumen</label>
                    <div class="col-sm-6">
                        <label class="col-form-label">{{ $item->no_dokumen }}</label>
                    </div>
                </div>
                <hr>
                <div class="form-group row">
                    <label for="staticEmail" class="col-sm-5 col-form-label">Nama Dokumen</label>
                    <div class="col-sm-6">
                        <label class=" col-form-label">{{ $item->nama_dokumen }}</label>
                    </div>
                </div>
                <hr>
                <div class="form-group row">
                    <label for="staticEmail" class="col-sm-5 col-form-label">Tahun Dokumen</label>
                    <div class="col-sm-6">
                        <label class=" col-form-label">{{ $item->tahun_dokumen }}</label>
                    </div>
                </div>
                <hr>
                <div class="form-group row">
                    <label for="staticEmail" class="col-sm-5 col-form-label">Deskripsi</label>
                    <div class="col-sm-6">
                        <label class=" col-form-label">{{ $item->deskripsi }}</label>
                    </div>
                </div>
                <hr>
                <div class="form-group row">
                    <label for="staticEmail" class="col-sm-5 col-form-label">Kelengkapan Dokumen</label>
                    <div class="col-sm-6">
                        <label class=" col-form-label">{{ $item->nama_kel_dokumen }}</label>
                    </div>
                </div>
                <hr>
                <div class="form-group row">
                    <label for="staticEmail" class="col-sm-5 col-form-label">Tanggal Upload</label>
                    <div class="col-sm-6">
                        <label class=" col-form-label">{{ date('d-m-Y', strtotime($item->tgl_upload)) }}</label>
                    </div>
                </div>
                <hr>
            </div>
            <div class="col-lg-6">
                {{-- <iframe src="http://docs.google.com/gview?url={{ URL::to('/') }}/data_file/retensi/pIeUUMHjMNiLzoKz4PF25TKQqL0eq41SBluTv6zl.pdf&embedded=true"
                style="width:600px; height:500px;" frameborder="0"></iframe>  --}}
                <iframe src="{{ URL::to('/') }}/showPdfAdmin/{{ $item->no_dokumen }}" width="100%" height="500"
                    frameborder="0">
                </iframe>
            </div>
        </div>
    @endforeach
@endsection
