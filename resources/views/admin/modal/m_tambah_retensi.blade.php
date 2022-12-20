<div class="modal fade" id="tambah_retensi_admin" tabindex="-1" aria-labelledby="tambah_user" aria-hidden="true">
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
                <form action="/input_retensi_admin" method="post" enctype="multipart/form-data">
                    @csrf
                    <input name="jenis" type="text" value="Retensi" hidden>
                    <div class="form-group">
                        <label for="nomor_dokumen_ret_admin">Nomor Dokumen</label>
                        <input type="text" class="form-control" id="nomor_dokumen_ret_admin" name="nomor_dokumen_ret_admin"
                            aria-describedby="emailHelp" value="{{ old('nomor_dokumen_ret_admin') }}">
                        @error('nomor_dokumen_ret_admin')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="nama_dokumen_ret_admin">Nama Dokumen</label>
                        <input type="text" class="form-control" id="nama_dokumen_ret_admin" name="nama_dokumen_ret_admin"
                            aria-describedby="emailHelp" value="{{ old('nama_dokumen_ret_admin') }}">
                        @error('nama_dokumen_ret_admin')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="tahun_dokumen_ret_admin">Tahun Dokumen</label>
                        <select class="form-control custom-select" name="tahun_dokumen_ret_admin" id="tahun_dokumen_ret_admin">
                            <option selected disabled>--Pilih Tahun Dokumen--</option>
                            @for ($i = date('Y'); $i >= 2000; $i--)
                                <option value="{{ $i }}">{{ $i }}</option>'
                            @endfor
                        </select>
                        @error('tahun_dokumen_ret_admin')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="deskripsi_dokumen_ret_admin">Deskripsi Dokumen</label>
                        <input type="deskripsi_dokumen_ret_admin" class="form-control" id="deskripsi_dokumen_ret_admin"
                            name="deskripsi_dokumen_ret_admin" aria-describedby="emailHelp"
                            value="{{ old('deskripsi_dokumen_ret_admin') }}">
                        @error('deskripsi_dokumen_ret_admin')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="retensi_admin">Kelengkapan Dokumen*</label>
                        <select class="form-control" id="retensi_admin" name="kelengkapan_dokumen_retensi[]" multiple>
                        </select>
                        @error('kelengkapan_dokumen_retensi')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>


                    <label for="file_ret_admin">Upload File</label>
                    <span class="text-danger" style="font-size: 12px">*Max file 50MB</span>
                    <div class="form-group">
                        <div class="">
                            <input type="file" name="file_ret_admin" id="file_ret_admin">
                            @error('file_red_admin')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary tombol-aksi float-right">Ajukan</button>
                    <button class="btn btn-danger tombol-aksi float-right" type="button"
                        data-bs-dismiss="modal">Batal</button>
                </form>
            </div>

        </div>
    </div>
</div>

