<!-- Modal Hapus -->
@foreach ($pengembalian as $item)
    <div class="modal fade" id="tolak_pengarsipan{{ $item->id_dokumen }}" tabindex="-1" role="dialog"
        aria-labelledby="delete_box" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable" role="document">
            <div class="modal-content">
                <div class="modal-header bg-danger">
                    <h5 class="modal-title text-white" id="nama_retensi">Reject Pengarsipan Dokumen</h5>
                    <button type="button" class="close text-white" data-bs-dismiss="modal"
                        aria-hidden="true">&times;</button>
                </div>
                <div class="modal-body">
                    Reject pengajuan pengembalian dokumen {{ $item->nama_dokumen }} ?
                </div>
                <form action="/pengarsipan/{{ $item->id_dokumen }}" method="POST">
                    @csrf
                    @method('PUT')
                    {{-- Jenis input untuk memisahkan jenis update berdasarkan jenis --}}
                    <input name="jenis" type="text" value="tolak" hidden>

                    {{-- Value untuk Reject pengarsipan - update ke table pengarsipan --}}
                    <input name="pengarsipan" type="text" value="Tidak" hidden>

                    {{-- value untuk ubah status dokumen. update ke table dokumen --}}
                    <input name="status_dok" type="text" value="Rejected" hidden>

                    <div class="modal-footer">
                        <button class="btn btn-danger" type="button" data-bs-dismiss="modal">Batal</button>
                        <button class="btn btn-primary" type="submit">Reject</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endforeach
