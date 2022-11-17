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
                <form action="/data_user" method="post" enctype="multipart/form-data">
                    @csrf
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
                        <input type="email" class="form-control" id="nama_dokumen" name="nama_dokumen"
                            aria-describedby="emailHelp" value="{{ old('nama_dokumen') }}">
                        @error('nama_dokumen')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="tahun_dokumen">Tahun Dokumen</label>
                        <input type="tahun_dokumen" class="form-control" id="tahun_dokumen" name="tahun_dokumen"
                            aria-describedby="emailHelp" value="{{ old('tahun_dokumen') }}">
                        @error('tahun_dokumen')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="deskripsi_dokumen">Deskripsi Dokumen</label>
                        <input type="deskripsi_dokumen" class="form-control" id="deskripsi_dokumen"
                            name="deskripsi_dokumen" aria-describedby="emailHelp"
                            value="{{ old('deskripsi_dokumen') }}">
                        @error('deskripsi_dokumen')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="kelengkapan_dokumen">Kelengkapan Dokumen</label>
                        @foreach ($kelengkapan_dokumen as $item)
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="{{ $item->nama_kel_dokumen }}"
                                    id="kelengkapan_dokumen{{ $item->id_kel_dokumen }}">
                                <label class="form-check-label" for="kelengkapan_dokumen{{ $item->id_kel_dokumen }}">
                                    {{ $item->nama_kel_dokumen }}
                                </label>
                            </div>
                        @endforeach
                    </div>

                    <label for="file_dokumen">Upload File</label>
                    <div class="form-group">
                        <div class="">
                            <input type="file" name="file_dokumen" id="file_dokumen">
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary tombol-aksi float-right">Simpan</button>
                    <button class="btn btn-danger tombol-aksi float-right" type="button" data-bs-dismiss="modal">Batal</button>
                </form>
                <!--END FORM TAMBAH BARANG-->
            </div>

        </div>
    </div>
</div>

{{-- Perulangan untuk cek error --}}
<?php $listError = ['nama_user', 'email_user', 'password', 'divisi']; ?>
@foreach ($listError as $err)
    @error($err)
        <script type="text/javascript">
            window.onload = function() {
                OpenBootstrapPopup();
            };

            function OpenBootstrapPopup() {
                $("#tambah_user").modal('show');
            }
        </script>
    @break
@enderror
@endforeach
