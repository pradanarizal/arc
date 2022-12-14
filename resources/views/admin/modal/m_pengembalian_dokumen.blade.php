<!-- Modal Pengembalian Dokumen -->
@foreach ($dokumen as $item)
    <div class="modal fade" id="pengembalian_dokumen{{$item->id_dokumen}}" tabindex="-1" role="dialog"
        aria-labelledby="undo_dokumen" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable" role="document">
            <div class="modal-content">
                <div class="modal-header bg-primary">
                    <h5 class="modal-title text-white" id="undo_dokumen">Pengembalian Dokumen</h5>
                    <button type="button" class="close text-white" data-bs-dismiss="modal"
                        aria-hidden="true">&times;</button>
                </div>
                <div class="modal-body">
                    Yakin Ingin Mengembalikan Dokumen <b>{{ $item->nama_dokumen }}</b>?
                </div>
                <form action="/input_pengembalian_dokumen/{{ $item->id_dokumen }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input type="text" class="form-control" id="id_dokumen" name="id_dokumen" value="{{ $item->id_dokumen }}" hidden>
                    <input name="id_peminjaman" type="text" value="{{ $item->id_peminjaman }}" hidden>
                    <!-- <input name="status_pengembalian" type="text" value="Pending" hidden> -->
                    <input name="tgl_kembali" type="text" value="{{$item->tgl_kembali}}" hidden>

                    <div class="modal-footer">
                        <button class="btn btn-danger" type="button" data-bs-dismiss="modal">Batal</button>
                        <button class="btn btn-success" type="submit">Ajukan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    @endforeach
