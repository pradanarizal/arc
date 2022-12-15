<div class="modal fade" id="tambah_dokumen" tabindex="-1" aria-labelledby="tambah_dokumen" aria-hidden="true">
    <div class="modal-dialog modal-lg">
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
                        <label for="nomor_dokumen">Nomor Dokumen</label>
                        <input type="text" class="form-control" id="nomor_dokumen" name="nomor_dokumen"
                            aria-describedby="emailHelp" value="{{ old('nomor_dokumen') }}">
                        @error('nomor_dokumen')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="nama_dokumen">Nama Dokumen</label>
                        <input type="text" class="form-control" id="nama_dokumen" name="nama_dokumen"
                            aria-describedby="emailHelp" value="{{ old('nama_dokumen') }}">
                        @error('nama_dokumen')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="tahun_dokumen">Tahun Dokumen</label>
                        <select class="form-control custom-select" name="tahun_dokumen" id="tahun_dokumen">
                            <option selected disabled>--Pilih Tahun Dokumen--</option>
                            @for ($i = date('Y'); $i >= 2000; $i--)
                                <option value="{{ $i }}">{{ $i }}</option>'
                            @endfor
                        </select>
                        @error('tahun_dokumen')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="deskripsi_dokumen">Deskripsi Dokumen</label>
                        <input type="text" class="form-control" id="deskripsi_dokumen" name="deskripsi_dokumen"
                            aria-describedby="emailHelp" value="{{ old('deskripsi_dokumen') }}">
                        @error('deskripsi_dokumen')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="kelengkapan_dokumen">Kelengkapan Dokumen</label>
                        @foreach ($kelengkapan_dokumen as $item)
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="{{ $item->nama_kel_dokumen }}"
                                    id="kelengkapan_dokumen{{ $item->id_kel_dokumen }}" name="kelengkapan_dokumen[]">
                                <label class="form-check-label" for="kelengkapan_dokumen{{ $item->id_kel_dokumen }}">
                                    {{ $item->nama_kel_dokumen }}
                                </label>
                            </div>
                        @endforeach
                        @error('kelengkapan_dokumen')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <label for="file">Upload File</label>
                    <span class="text-danger" style="font-size: 12px">*Max file 50MB & Format dokumen harus berformat PDF</span>
                    <div class="form-group">
                        <div class="">
                            <input type="file" name="file" id="file">
                            @error('file')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
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

{{-- Perulangan untuk cek error --}}
<?php $listError = ['nomor_dokumen', 'nama_dokumen', 'tahun_dokumen', 'deskripsi_dokumen', 'kelengkapan_dokumen', 'file']; ?>
@foreach ($listError as $err)
    @error($err)
        <script type="text/javascript">
            window.onload = function() {
                OpenBootstrapPopup();
            };

            function OpenBootstrapPopup() {
                $("#tambah_dokumen").modal('show');
            }
        </script>
    @break
@enderror
@endforeach
