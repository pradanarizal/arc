<div class="modal fade" id="tambah_box" tabindex="-1" aria-labelledby="tambah_box" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-header">
                <h5 class="modal-title">Tambah Box</h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body">
                <!--FORM TAMBAH BARANG-->
                <form action="/box" method="post" enctype="multipart/form-data">
                @csrf
                    <div class="form-group">
                        <label for="nama_box">Nama Box</label>
                        <input type="text" class="form-control" id="nama_box" name="nama_box"
                            aria-describedby="emailHelp" value="{{ old('nama_box') }}">
                            @error('nama_box')
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
<?php $listError = ['nama_box']; ?>
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
