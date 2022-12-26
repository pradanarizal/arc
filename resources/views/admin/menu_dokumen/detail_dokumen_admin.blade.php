@extends('layout.template')

@section('content')
    <!-- Page Heading -->
    @foreach ($dokumen as $item)

    <div class="d-flex align-items-center">
        <p class="h3 mb-0 text-gray-800 mr-1 font-weight-bold">Dokumen</p>
        <p class="mb-0 text-gray-800 text-small">Detail Dokumen {{ $item->jenis_dokumen }}</p>
    </div>
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
                    <label for="staticEmail" class="col-sm-5 col-form-label">Nama Peminjam</label>
                    <div class="col-sm-6">
                        <label class=" col-form-label">{{ json_encode($peminjaman) }}</label>
                    </div>
                </div>
                <hr>

                {{--<div class="form-group row">
                    <label for="staticEmail" class="col-sm-5 col-form-label">Nama Peminjam</label>
                    @foreach ($peminjaman as $data)
                        @if ($item->id_dokumen == $data->id_dokumen)
                            @if ($item->status_dokumen == 'Dipinjam')
                                <div class="col-sm-6">
                                    <label class=" col-form-label">{{ $data->name }}</label>
                                </div>
                            @else
                                <div class="col-sm-6">
                                    <label class=" col-form-label"> - </label>
                                </div>
                            @endif
                        @endif
                    @endforeach
                </div>
                <hr>

                <div class="form-group row">
                    <label for="staticEmail" class="col-sm-5 col-form-label">Tanggal Kembali</label>
                    @foreach ($peminjaman as $data)
                        @if ($item->id_dokumen == $data->id_dokumen)
                            @if ($item->status_dokumen == 'Dipinjam')
                            
                                <div class="col-sm-6">
                                    <label class=" col-form-label">{{ $data->tgl_kembali }}</label>
                                </div>
                            @else
                                <div class="col-sm-6">
                                    <label class=" col-form-label"> - </label>
                                </div>
                            @endif
                        @endif
                    @endforeach
                </div>
                <hr>--}}
                
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
                @if ($item->file_dokumen == '')
                    <div class="row justify-content-md-center w-100">- File Dokumen Tidak Ada -</div>
                @else
                    <iframe src="{{ URL::to('/') }}/showPdfAdmin/{{ $item->nama_dokumen }}" width="100%" height="500"
                        frameborder="0">
                    </iframe>
                @endif
            </div>
        </div>
    @endforeach
@endsection
