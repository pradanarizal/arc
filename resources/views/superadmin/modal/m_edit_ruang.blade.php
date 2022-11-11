@foreach ($ruang as $item)
    <div class="modal fade" id="edit_ruang{{ $item->id_ruang }}" tabindex="-1" aria-labelledby="edit_ruang" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">

                <div class="modal-header">
                    <h5 class="modal-title">Edit Ruang</h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body">
                    <!--FORM TAMBAH BARANG-->
                    <form action="{{ '/ruang/' . $item->id_ruang }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="nama_ruang">Nama Ruang</label>
                            <input type="text" value="{{$item->nama_ruang}}" class="form-control" id="nama_ruang" name="nama_ruang"
                                aria-describedby="emailHelp">
                        </div>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </form>
                    <!--END FORM TAMBAH BARANG-->
                </div>

            </div>
        </div>
    </div>
@endforeach
