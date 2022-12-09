<div class="modal fade" id="tambah_departemen" tabindex="-1" aria-labelledby="tambah_departemen" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-header">
                <h5 class="modal-title">Tambah Departemen</h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body">
                <!--FORM TAMBAH Departemen-->
                <form action="/data_departemen" method="post" enctype="multipart/form-data">
                @csrf
                    <div class="form-group">
                        <label for="nama_user">Kode Departemen</label>
                        <input type="text" class="form-control" id="kode_departemen" name="kode_departemen"
                            aria-describedby="emailHelp" value="{{ old('kode_departemen') }}">
                            @error('kode_departemen')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                    </div>
                    <div class="form-group">
                        <label for="nama_departemen">Nama Departemen</label>
                        <input type="text" class="form-control" id="email_user" name="nama_departemen"
                            aria-describedby="emailHelp" value="{{ old('nama_departemen') }}">
                            @error('nama_departemen')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                    </div>

                    <button type="submit" class="btn btn-primary tombol-aksi float-right">Simpan</button>
                    <button class="btn btn-danger tombol-aksi float-right" type="button" data-bs-dismiss="modal">Batal</button>
                </form>
                <!--END FORM TAMBAH DEPARTEMEN-->
            </div>

        </div>
    </div>
</div>

{{-- Perulangan untuk cek error --}}
<?php $listError = ['kode_departemen', 'nama_departemen']; ?>
@foreach ($listError as $err)
    @error($err)
        <script type="text/javascript">
             window.onload = function() {
                OpenBootstrapPopup();
            };

            function OpenBootstrapPopup() {
                $("#tambah_departemen").modal('show');
            }
        </script>
    @break
    @enderror
@endforeach
