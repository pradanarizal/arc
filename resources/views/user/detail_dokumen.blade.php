@extends('layout.template')

@section('content')
<!-- Page Heading -->
    <div class="d-flex align-items-center">
        <p class="h3 mb-0 text-gray-800 mr-1 font-weight-bold">Dokumen</p>
        <p class="mb-0 text-gray-800 text-small">Table Dokumen</p>
    </div>
$foreach ($dokumen as $item)
    
    
    <div class="container">
        
        <div class="row justify-content-row">
            <div class="modal-content">
                <div class="modal-body">
                    $csrf
                    <div class="form-grup mt-2">
                        <label for="#"><b>No Dokumen</b></label>
                        <input type="text" value="{{ $item->no_dokumen }}"
                            class="form-control">
                    </div>
                    <div class="form-grup mt-4">
                        <label for="#"><b>Nama Dokumen</b></label>
                        <input type="text" value="{{ $item->nama_dokumen }}"
                            class="form-control">
                    </div>
                    <div class="form-grup mt-4">
                        <label for="#"><b>Deskripsi</b></label>
                        <input type="text" value="{{ $item->deskripsi }}"
                            class="form-control">
                    </div>
                    <div class="form-grup mt-4">
                        <label for="#"><b>Tanggal Upload</b></label>
                        <input type="text" value="{{ $item->tgl_upload }}"
                            class="form-control">
                    </div>
                    <div class="form-grup mt-4">
                        <label for="#"><b>Status</b></label>
                        <input type="text" value="{{ $item->status_dokumen }}"
                            class="form-control">
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endforeach
@endsection
