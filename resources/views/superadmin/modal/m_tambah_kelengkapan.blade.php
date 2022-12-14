<div class="modal fade" id="tambah_kelengkapan" tabindex="-1" aria-labelledby="tambah_surat" aria-hidden="true">
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
                            aria-describedby="emailHelp" value="{{ old('kelengkapan') }}">
                        @error('kelengkapan')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary tombol-aksi float-right">Simpan</button>
                    <button class="btn btn-danger tombol-aksi float-right" type="button"
                        data-bs-dismiss="modal">Batal</button>
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
            Swal.fire({
                toast: true,
                icon: 'error',
                title: 'Input Gagal!',
                text: '{{ $message }}',

                animation: true,
                position: 'top-right',
                showConfirmButton: false,
                showCloseButton: true,
                timer: 6000,
                timerProgressBar: true,
                didOpen: (toast) => {
                    toast.addEventListener('mouseenter', Swal.stopTimer)
                    toast.addEventListener('mouseleave', Swal.resumeTimer)
                }
            });
        </script>
    @break
@enderror
@endforeach
