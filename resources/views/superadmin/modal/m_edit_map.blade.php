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
                    <div class="form-group">
                        <label for="nama_map">Nama Map</label>
                        <input type="text" value="{{$item->nama_map}}" class="form-control" id="nama_map" name="nama_map"
                            aria-describedby="emailHelp">
                    </div>
                    <button type="submit" class="btn btn-primary tombol-aksi float-right">Simpan</button>
                    <button class="btn btn-danger tombol-aksi float-right" type="button" data-bs-dismiss="modal">Batal</button>
                </form>
                <!--END FORM TAMBAH BARANG-->
            </div>

        </div>
    </div>
</div>
@endforeach
