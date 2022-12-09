<div class="modal fade" id="tambah_rak" tabindex="-1" aria-labelledby="tambah_rak" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-header">
                <h5 class="modal-title">Tambah Rak</h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body">
                <!--FORM TAMBAH Rak-->
                <form action="/rak" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="id_ruang"><b>Ruang*</b></label>
                        <select onchange="enableForm()" class="form-control select2search" name="id_ruang" id="id_ruang">
                            <option selected disabled>-Pilih Ruang-</option>
                            @foreach ($ruang as $item1)
                                <option value="{{ $item1->id_ruang }}">{{ $item1->nama_ruang }}</option>
                            @endforeach
                        </select>
                        @error('id_ruang')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="nama_rak"><b>Nama Rak*</b></label>
                        <input type="text" class="form-control" id="nama_rak" name="nama_rak"
                            value="{{ old('nama_rak') }}" disabled>

                            @error('nama_rak')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <button disabled type="submit" class="btn btn-primary tombol-aksi float-right">Simpan</button>
                    <button class="btn btn-danger tombol-aksi float-right" type="button"
                        data-bs-dismiss="modal">Batal</button>
                </form>
                <!--END FORM TAMBAH Rak-->
            </div>

        </div>
    </div>
</div>
{{-- Perulangan untuk cek error --}}
<?php $listError = ['nama_rak']; ?>
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
