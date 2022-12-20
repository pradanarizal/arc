<div class="modal fade" id="tambah_retensi" tabindex="-1" aria-labelledby="tambah_user" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-header">
                <h5 class="modal-title">Form Retensi Dokumen</h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body">
                <!--FORM TAMBAH BARANG-->
                <form action="/input_retensi" method="post" enctype="multipart/form-data">
                    @csrf
                    <input name="jenis" type="text" value="Retensi" hidden>
                    <div class="form-group">
                        <label for="nomor_dokumen_retensi">Nomor Dokumen</label>
                        <input type="text" class="form-control" id="nomor_dokumen_retensi"
                            name="nomor_dokumen_retensi" aria-describedby="emailHelp"
                            value="{{ old('nomor_dokumen_retensi') }}">
                        @error('nomor_dokumen_retensi')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="nama_dokumen_retensi">Nama Dokumen</label>
                        <input type="text" class="form-control" id="nama_dokumen_retensi" name="nama_dokumen_retensi"
                            aria-describedby="emailHelp" value="{{ old('nama_dokumen_retensi') }}">
                        @error('nama_dokumen_retensi')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    {{-- <div class="form-group">
                        <label for="tahun_dokumen_retensi">Tahun Dokumen</label>
                        <input type="tahun_dokumen_retensi" class="form-control" id="tahun_dokumen_retensi" name="tahun_dokumen_retensi"
                            aria-describedby="emailHelp" value="{{ old('tahun_dokumen_retensi') }}">
                        @error('tahun_dokumen_retensi')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div> --}}
                    <div class="form-group">
                        <label for="tahun_dokumen_retensi">Tahun Dokumen</label>
                        <select class="form-control custom-select" name="tahun_dokumen_retensi"
                            id="tahun_dokumen_retensi">
                            <option selected disabled>--Pilih Tahun Dokumen--</option>
                            @for ($i = date('Y'); $i >= 2000; $i--)
                                <option value="{{ $i }}">{{ $i }}</option>'
                            @endfor
                        </select>
                        @error('tahun_dokumen_retensi')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="deskripsi_dokumen_retensi">Deskripsi Dokumen</label>
                        <input type="deskripsi_dokumen_retensi" class="form-control" id="deskripsi_dokumen_retensi"
                            name="deskripsi_dokumen_retensi" value="{{ old('deskripsi_dokumen_retensi') }}">
                        @error('deskripsi_dokumen_retensi')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="divisi_retensi"><b>Divisi</b></label>
                        <select class="form-control" name="divisi_retensi" id="divisi_retensi">
                            <option selected disabled>--Pilih Divisi--</option>
                            @foreach ($divisi as $div)
                                <option value="{{ $div->id_departemen }}">{{ $div->kode_departemen }}</option>
                            @endforeach
                        </select>
                        @error('divisi_retensi')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="retensi">Kelengkapan Dokumen*</label>
                        <select class="form-control" id="retensi" name="kelengkapan_dokumen_retensi[]" multiple>
                        </select>
                        @error('kelengkapan_dokumen_retensi')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <label for="file_retensi">Upload File</label>
                    <span class="text-danger" style="font-size: 12px">*Max file 50MB & Format dokumen harus
                        berformat PDF</span>
                    <div class="form-group">
                        <div class="">
                            <input type="file" name="file_retensi" id="file">
                            @error('file_retensi')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary tombol-aksi float-right">Ajukan</button>
                    <button class="btn btn-danger tombol-aksi float-right" type="button"
                        data-bs-dismiss="modal">Batal</button>
                </form>
                <!--END FORM TAMBAH BARANG-->
            </div>

        </div>
    </div>
</div>
