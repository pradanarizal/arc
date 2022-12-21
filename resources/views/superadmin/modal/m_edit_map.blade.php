@foreach ($map as $item)
    <div class="modal fade" id="edit_map{{ $item->id_map }}" tabindex="-1" aria-labelledby="edit_map" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">

                <div class="modal-header">
                    <h5 class="modal-title">Edit Map</h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body">
                    <!--FORM TAMBAH BARANG-->
                    <form action="{{ '/map/' . $item->id_map }}" method="POST">
                        @csrf
                        @method('PUT')
                        {{-- Mengambil value id_rak untuk fungsi unique --}}
                        <input hidden type="text" name="box" id="box" value="{{ $item->id_box }}" >

                        <div class="form-group">
                            <label for="nama_map">Nama Map</label>
                            <input type="text" value="{{ $item->nama_map }}" class="form-control" id="nama_map"
                                name="nama_map" aria-describedby="emailHelp">
                            @error('nama_map')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <button type="submit" name="btn-simpan"
                            class="btn btn-primary tombol-aksi float-right">Simpan</button>
                        <button class="btn btn-danger tombol-aksi float-right" type="button"
                            data-bs-dismiss="modal">Batal</button>
                    </form>
                    <!--END FORM TAMBAH BARANG-->
                </div>

            </div>
        </div>
    </div>
@endforeach


{{-- Perulangan untuk cek error --}}
<?php $listError = ['nama_map']; ?>
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
