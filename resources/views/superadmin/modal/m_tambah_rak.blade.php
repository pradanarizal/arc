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
                        <label for="nama_rak">Nama Rak</label>
                        <input type="text" class="form-control" id="nama_rak" name="nama_rak"
                            aria-describedby="emailHelp" value="{{ old('nama_rak') }}">
                            @error('nama_rak')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                    </div>
                    <button type="submit" class="btn btn-primary">Simpan</button>
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
            var myModal = new bootstrap.Modal(document.getElementById('tambah_rak'), {});
            myModal.toggle()
        </script>
    @break
    @enderror
@endforeach
