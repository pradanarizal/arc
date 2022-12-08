@foreach ($dokumen as $item)
    <div class="modal fade" id="pinjam_dokumen{{ $item->no_dokumen }}" tabindex="-1" aria-labelledby="pinjam_dokumen"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">

                <div class="modal-header">
                    <h5 class="modal-title">Form Peminjaman Dokumen</h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body">
                    <!--FORM PEMINJAMAN DOKUMEN-->
                    <form action="/input_peminjaman_dokumen/{{ $item->no_dokumen }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="nama_dokumen">Nama Dokumen</label>
                            <input type="text" class="form-control" id="nama_dokumen" name="nama_dokumen"
                                aria-describedby="emailHelp" value="{{ $item->nama_dokumen }}" readonly>
                        </div>
                        <div class="form-group">
                            <label for="deskripsi_dokumen">Deskripsi Dokumen</label>
                            <input type="deskripsi_dokumen" class="form-control" id="deskripsi_dokumen"
                                name="deskripsi_dokumen" value="{{ $item->deskripsi }}" readonly>
                        </div>
                        <div class="form-group">
                            <label for="tgl_ambil">Tanggal Ambil</label>
                            <input type="date" class="form-control" id="tgl_ambil" name="tgl_ambil"
                                aria-describedby="emailHelp" value="{{ old('tgl_ambil') }}">
                            @error('tgl_ambil')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div>
                            <label for="tgl_kembali">Tanggal Kembali</label>
                            <input type="date" class="form-control" id="tgl_kembali" name="tgl_kembali"
                                aria-describedby="emailHelp" value="{{ old('tgl_kembali') }}">
                            @error('tgl_kembali')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <input name="status_dokumen" type="text" value="Dipinjam" hidden>
                        <input name="peminjaman" type="text" value="Pending" hidden>

                        <button type="submit" class="btn btn-primary tombol-aksi float-right mt-3">Ajukan</button>
                        <button class="btn btn-danger tombol-aksi float-right mt-3" type="button"
                            data-bs-dismiss="modal">Batal</button>
                    </form>
                </div>
                <!--END FORM PEMINJAMAN DOKUMEN-->
            </div>

        </div>
    </div>
@endforeach

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
