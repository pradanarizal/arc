<div class="modal fade" id="tambah_dokumen_admin" tabindex="-1" aria-labelledby="tambah_dokumen_admin" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-header">
                <h5 class="modal-title">Form Pengarsipan Dokumen</h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body">
                <!--FORM TAMBAH-->
                <form action="/input_pengarsipan_admin" method="post" enctype="multipart/form-data">
                    @csrf
                    <input name="jenis" type="text" value="Pengarsipan" hidden>
                    <div class="form-group">
                        <label for="nomor_dokumen_pengarsipan_admin"><b>Nomor Dokumen</b></label>
                        <input type="text" class="form-control" id="nomor_dokumen_pengarsipan_admin"
                            name="nomor_dokumen_pengarsipan_admin" value="{{ old('nomor_dokumen_pengarsipan_admin') }}">
                        @error('nomor_dokumen_pengarsipan_admin')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="nama_dokumen_pengarsipan_admin"><b>Nama Dokumen</b></label>
                        <input type="text" class="form-control" id="nama_dokumen_pengarsipan_admin"
                            name="nama_dokumen_pengarsipan_admin" value="{{ old('nama_dokumen_pengarsipan_admin') }}">
                        @error('nama_dokumen_pengarsipan_admin')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="tahun_dokumen_pengarsipan_admin"><b>Tahun Dokumen</b></label>
                        <select class="form-control custom-select" name="tahun_dokumen_pengarsipan_admin"
                            id="tahun_dokumen_pengarsipan_admin">
                            <option selected disabled>--Pilih Tahun Dokumen--</option>
                            @for ($i = date('Y'); $i >= 2000; $i--)
                                <option value="{{ $i }}" @if (old('tahun_dokumen_pengarsipan_admin') == $i) selected @endif>
                                    {{ $i }}</option>
                            @endfor
                        </select>
                        @error('tahun_dokumen_pengarsipan_admin')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="deskripsi_dokumen_pengarsipan_admin"><b>Deskripsi Dokumen</b></label>
                        <input type="text" class="form-control" id="deskripsi_dokumen_pengarsipan_admin"
                            name="deskripsi_dokumen_pengarsipan_admin" value="{{ old('deskripsi_dokumen_pengarsipan_admin') }}">
                        @error('deskripsi_dokumen_pengarsipan_admin')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                            <label for="jenis_dokumen_admin">Jenis Dokumen</label>
                            <input type="text" class="form-control" id="jenis_dokumen_admin" name="jenis_dokumen_admin"
                                aria-describedby="emailHelp" value="Terbatas" readonly>
                    </div>
                    
                            <div class="form-group">
                                <label for="pengarsipan_admin"><b>Kelengkapan Dokumen</b></label>
                                <select class="form-control" id="pengarsipan_admin" name="kelengkapan_dokumen_pengarsipan[]" multiple>
                                </select>
                                @error('kelengkapan_dokumen_pengarsipan')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                    <div class="form-group">
                        <label for="file_pengarsipan_admin">Upload File</label>
                        <span class="text-danger" style="font-size: 12px">*Max file 50MB & Format dokumen harus
                            berformat PDF</span>
                        <div class="form-group">
                            <div class="">
                                <input type="file" name="file_pengarsipan_admin" id="file_pengarsipan_admin">
                                @error('file_pengarsipan_admin')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary tombol-aksi float-right">Ajukan</button>
                    <button class="btn btn-danger tombol-aksi float-right" type="button"
                        data-bs-dismiss="modal">Batal</button>
                </form>
                <!--END FORM TAMBAH-->
            </div>

        </div>
    </div>
</div>


