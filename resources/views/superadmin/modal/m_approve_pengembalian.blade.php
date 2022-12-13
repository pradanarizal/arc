<!-- Modal Hapus -->
@foreach ($pengembalian as $item)
    <div class="modal fade" id="approve_pengembalian{{ $item->no_dokumen }}" tabindex="-1" role="dialog"
        aria-labelledby="delete_box" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable" role="document">
            <div class="modal-content">
                <div class="modal-header bg-primary">
                    <h5 class="modal-title text-white" id="id_pengembalian">Approve pengembalian Dokumen</h5>
                    <button type="button" class="close text-white" data-bs-dismiss="modal"
                        aria-hidden="true">&times;</button>
                </div>
                <div class="modal-body">
                    Approve pengajuan pengembalian dokumen {{ $item->nama_dokumen }} ?
                </div>
                <form action="/pengembalian/{{ $item->no_dokumen }}" method="POST">
                    @csrf
                    @method('PUT')
                     {{-- Jenis input untuk memisahkan jenis update berdasarkan jenis --}}
                    <input name="jenis" type="text" value="approve" hidden>
                    <input name="tgl_pengembalian" type="text" value="{{ $item->tgl_pengembalian }}" hidden>
                    <input name="status_dokumen" type="text" value="Tersedia" hidden>
                    {{-- value untuk ubah status pengembalian. update ke table pengembalian --}}
                    <input name="pengembalian" type="text" value="Ya" hidden>

                    <div class="modal-footer">
                        <button class="btn btn-danger" type="button" data-bs-dismiss="modal">Batal</button>
                        <button class="btn btn-primary" type="submit">Approve</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endforeach
