<div class="modal fade" id="tambah_surat" tabindex="-1" aria-labelledby="tambah_surat" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-header">
                <h5 class="modal-title">Tambah Kelengkapan Dokumen</h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body">
                <!--FORM TAMBAH BARANG-->
                <form action="/kelengkapan" method="post" enctype="multipart/form-data">
                @csrf
                    <div class="form-group">
                        <label for="kelengkapan">Nama Kelengkapan Dokumen</label>
                        <input type="text" class="form-control" id="kelengkapan" name="kelengkapan"
                            aria-describedby="emailHelp" value="{{ old('nama_kel_dokumen') }}">
                            @error('kelengkapan')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                    </div>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </form>
                <!--END FORM TAMBAH BARANG-->
            </div>

        </div>
    </div>
</div>

{{-- Perulangan untuk cek error --}}
<?php $listError = ['kelengkapan']; ?>
@foreach ($listError as $err)
    @error($err)
        <script type="text/javascript">
            var myModal = new bootstrap.Modal(document.getElementById('tambah_surat'), {});
            myModal.toggle()
        </script>
    @break
    @enderror
@endforeach
