<div class="modal fade" id="tambah_map" tabindex="-1" aria-labelledby="tambah_map" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-header">
                <h5 class="modal-title">Tambah Map</h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body">
                <!--FORM TAMBAH BARANG-->
                <form action="/map" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="ruang_2"><b>Ruang*</b></label>
                        <select class="form-control select2search" name="ruang_2" id="ruang_2">
                            <option selected disabled>-Pilih Ruang-</option>
                            @foreach ($ruang as $item1)
                                <option value="{{ $item1->id_ruang }}">{{ $item1->nama_ruang }}</option>
                            @endforeach
                        </select>
                        @error('ruang_2')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group d-none" id="form-select-rak">
                        <label for="rak_2"><b>Rak*</b></label>
                        <select disabled class="form-control select2search" name="rak_2" id="rak_2"></select>

                        @error('rak_2')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group d-none" id="form-select-box">
                        <label for="box_select"><b>Box*</b></label>
                        <select disabled class="form-control" name="box_select" id="box_select"></select>

                        @error('box_select')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group d-none" id="form-map">
                        <label for="map">Nama Map</label>
                        <input disabled type="text" class="form-control" id="map" name="map"
                            aria-describedby="emailHelp" value="{{ old('map') }}">
                        @error('map')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <button disabled id="btn-simpan" name="btn-simpan" type="submit"
                        class="btn btn-primary tombol-aksi float-right">Simpan</button>
                    <button class="btn btn-danger tombol-aksi float-right" type="reset"
                        data-bs-dismiss="modal">Batal</button>
                </form>
                <!--END FORM TAMBAH BARANG-->
            </div>

        </div>
    </div>
</div>

{{-- Perulangan untuk cek error --}}
<?php $listError = ['map']; ?>
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
