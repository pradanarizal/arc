@foreach ($departemen as $item)
    <div class="modal fade" id="edit_departemen{{ $item->id_departemen }}" tabindex="-1" aria-labelledby="edit_ruang" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">

                <div class="modal-header">
                    <h5 class="modal-title">Edit Departemen</h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body">
                    <!--FORM Edit Departemen-->
                    <form action="{{ '/data_departemen/' . $item->id_departemen }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="kode_departemen">Kode Departemen</label>
                            <input type="text" value="{{$item->kode_departemen}}" class="form-control" id="kode_departemen" name="kode_departemen_edit"
                                aria-describedby="emailHelp">
                            <input type="text" name="old_kode_departemen_edit" class="form-control"
                                value="{{ $item->kode_departemen }}" hidden>

                            @error('kode_departemen_edit')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="nama_departemen">Nama Departemen</label>
                            <input type="text" value="{{$item->nama_departemen}}" class="form-control" id="nama_departemen" name="nama_departemen_edit"
                                aria-describedby="emailHelp">
                            @error('nama_departemen_edit')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary tombol-aksi float-right">Simpan</button>
                        <button class="btn btn-danger tombol-aksi float-right" type="button" data-bs-dismiss="modal">Batal</button>
                    </form>
                    <!--END FORM Edit Departemen-->
                </div>

            </div>
        </div>
    </div>
@endforeach

<?php $listError = ['kode_departemen_edit', 'nama_departemen_edit']; ?>
@foreach ($listError as $err)
    @error($err)
        <script type="text/javascript">
             window.onload = function() {
                OpenBootstrapPopup();
            };

            function OpenBootstrapPopup() {
                $("#edit_departemen{{ $item->id_departemen }}").modal('show');
            }
        </script>
    @break
    @enderror
@endforeach
