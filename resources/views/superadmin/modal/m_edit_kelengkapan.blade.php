@foreach ($kelengkapan_dokumen as $item)
<div class="modal fade" id="edit_surat{{ $item->id_kel_dokumen }}" tabindex="-1" aria-labelledby="edit_surat" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-header">
                <h5 class="modal-title">Edit Kelengkapan Dokumen</h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body">
                <!--FORM TAMBAH BARANG-->
                <form action="{{ '/kelengkapan/' . $item->id_kel_dokumen }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="kelengkapan">Nama Kelengkapan Dokumen</label>
                        <input type="text" value="{{$item->nama_kel_dokumen}}" class="form-control" id="kelengkapan" name="kelengkapan"
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
