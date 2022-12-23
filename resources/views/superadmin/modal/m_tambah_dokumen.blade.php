<div class="modal fade" id="tambah_dokumen" tabindex="-1" aria-labelledby="tambah_dokumen" aria-hidden="true">
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
                <form action="/input_pengarsipan" method="post" enctype="multipart/form-data">
                    @csrf
                    <input name="jenis" type="text" value="Pengarsipan" hidden>
                    <div class="form-group">
                        <label for="nomor_dokumen_pengarsipan"><b>Nomor Dokumen</b></label>
                        <input type="text" class="form-control" id="nomor_dokumen_pengarsipan"
                            name="nomor_dokumen_pengarsipan" value="{{ old('nomor_dokumen_pengarsipan') }}">
                        @error('nomor_dokumen_pengarsipan')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="nama_dokumen_pengarsipan"><b>Nama Dokumen</b></label>
                        <input type="text" class="form-control" id="nama_dokumen_pengarsipan"
                            name="nama_dokumen_pengarsipan" value="{{ old('nama_dokumen_pengarsipan') }}">
                        @error('nama_dokumen_pengarsipan')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="tahun_dokumen_pengarsipan"><b>Tahun Dokumen</b></label>
                        <input type="text" id="tahun-dokumen" placeholder="--Tahun Dokumen--" class="form-control"
                            name="tahun_dokumen_pengarsipan" value="{{ old('tahun_dokumen_pengarsipan') }}">
                        @error('tahun_dokumen_pengarsipan')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="divisi_pengarsipan"><b>Divisi</b></label>
                        <select class="form-control" name="divisi_pengarsipan" id="divisi_pengarsipan">
                            <option selected disabled>--Pilih Divisi--</option>
                            @foreach ($divisi as $div)
                                <option
                                    value="{{ $div->id_departemen }}"@if (old('divisi_pengarsipan') == $div->id_departemen) selected @endif>
                                    {{ $div->kode_departemen }}</option>
                            @endforeach
                        </select>
                        @error('divisi_pengarsipan')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="deskripsi_dokumen_pengarsipan"><b>Deskripsi Dokumen</b></label>
                        <input type="text" class="form-control" id="deskripsi_dokumen_pengarsipan"
                            name="deskripsi_dokumen_pengarsipan" value="{{ old('deskripsi_dokumen_pengarsipan') }}">
                        @error('deskripsi_dokumen_pengarsipan')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="jenis_dokumen"><b>Jenis Dokumen</b></label>
                        <select class="form-control" name="jenis_dokumen" id="jenis_dokumen">
                            <option selected disabled>--Pilih Jenis Dokumen--</option>
                            <option value="Terbuka" @if (old('jenis_dokumen') == 'Terbuka') selected @endif>Terbuka</option>
                            <option value="Terbatas" @if (old('jenis_dokumen') == 'Terbatas') selected @endif>Terbatas</option>
                        </select>
                        @error('jenis_dokumen')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="pengarsipan"><b>Kelengkapan Dokumen</b></label>
                        <select class="form-control" id="pengarsipan" name="kelengkapan_dokumen_pengarsipan[]" multiple>
                        </select>
                        @error('kelengkapan_dokumen_pengarsipan')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="ruangapp"><b>Ruang*</b></label>
                        <select class="form-control" name="ruangTambahDokumen" id="ruangTambahDokumen">
                            <option selected disabled>-Pilih Ruang-</option>
                            @foreach ($ruang as $item1)
                                <option value="{{ $item1->id_ruang }}">{{ $item1->nama_ruang }}</option>
                            @endforeach
                        </select>
                        @error('ruangTambahDokumen')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group d-none" id="fgRak">
                        <label><b>Rak*</b></label>
                        <select class="form-control" name="rakTambahDokumen" id="rakTambahDokumen"></select>

                        @error('rakTambahDokumen')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group d-none" id="fgBox">
                        <label><b>Box*</b></label>
                        <select class="form-control" name="boxTambahDokumen" id="boxTambahDokumen"></select>

                        @error('boxTambahDokumen')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group d-none" id="fgMap">
                        <label><b>Map*</b></label>
                        <select class="form-control" name="mapTambahDokumen" id="mapTambahDokumen"></select>

                        @error('mapTambahDokumen')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="file_pengarsipan">Upload File</label>
                        <span class="text-danger" style="font-size: 12px">*Max file 50MB & Format dokumen harus
                            berformat PDF</span>
                        <div class="form-group">
                            <div class="">
                                <input type="file" name="file_pengarsipan" id="file_pengarsipan">
                                @error('file_pengarsipan')
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
