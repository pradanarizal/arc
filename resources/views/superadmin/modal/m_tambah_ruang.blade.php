<div class="modal fade" id="tambah_ruang" tabindex="-1" aria-labelledby="tambah_ruang" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-header">
                <h5 class="modal-title">Tambah Ruang</h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body">
                <!--FORM TAMBAH BARANG-->
                <form action="/ruang" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="nama_ruang">Nama Ruang</label>
                        <input type="text" class="form-control" id="nama_ruang" name="nama_ruang"
                            aria-describedby="emailHelp" value="{{ old('nama_ruang') }}">
                        @error('nama_ruang')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <button disabled type="submit" class="btn btn-primary tombol-aksi float-right">Simpan</button>
                    <button class="btn btn-danger tombol-aksi float-right" type="button"
                        data-bs-dismiss="modal">Batal</button>
                </form>
                <!--END FORM TAMBAH BARANG-->
            </div>

        </div>
    </div>
</div>

{{-- Perulangan untuk cek error --}}
<?php $listError = ['nama_ruang']; ?>
@foreach ($listError as $err)
    @error($err)
        {{-- Script untuk alert --}}
        <script>
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
