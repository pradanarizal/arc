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
                        <label for="ruang"><b>Ruang*</b></label>
                        <select class="form-control select2search" name="ruang" id="ruang">
                            <option selected disabled>-Pilih Ruang-</option>
                            @foreach ($ruang as $item1)
                                <option value="{{ $item1->id_ruang }}">{{ $item1->nama_ruang }}
                                </option>
                            @endforeach
                        </select>
                        @error('ruang')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group d-none" id="form-rak">
                        <label for="rak"><b>Rak*</b></label>
                        <select disabled class="form-control select2search" name="rak" id="rak"></select>

                        @error('rak')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group d-none" id="form-box">
                        <label for="nama_box">Nama Box*</label>
                        <input type="text" class="form-control" id="nama_box" name="nama_box"
                            value="{{ old('nama_box') }}" disabled>
                        @error('nama_box')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <button disabled id="btn-simpan" type="submit"
                        class="btn btn-primary tombol-aksi float-right">Simpan</button>
                    <button class="btn btn-danger tombol-aksi float-right" type="button"
                        data-bs-dismiss="modal">Batal</button>
                </form>
                <!--END FORM TAMBAH BARANG-->
            </div>

        </div>
    </div>
</div>

{{-- Perulangan untuk cek error --}}
<?php $listError = ['nama_box', 'rak', 'ruang']; ?>
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
