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
                <form action="/input_map" method="post" enctype="multipart/form-data">
                @csrf
                    <div class="form-group">
                        <label for="nama_map">Nama Map</label>
                        <input type="text" class="form-control" id="nama_map" name="nama_map"
                            aria-describedby="emailHelp">
                    </div>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </form>
                <!--END FORM TAMBAH BARANG-->
            </div>

        </div>
    </div>
</div>
