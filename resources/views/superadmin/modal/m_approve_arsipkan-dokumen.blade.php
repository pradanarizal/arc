<!-- Modal Hapus -->
@foreach ($retensi as $item)
    <div class="modal fade" id="arsipkan{{ $item->no_dokumen }}" tabindex="-1" role="dialog" aria-labelledby="delete_box"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable" role="document">
            <div class="modal-content">
                <div class="modal-header bg-primary">
                    <h5 class="modal-title text-white" id="nama_retensi">Arsipkan Dokumen</h5>
                    <button type="button" class="close text-white" data-bs-dismiss="modal"
                        aria-hidden="true">&times;</button>
                </div>
                <div class="modal-body">
                    Arsipkan dokumen {{ $item->nama_dokumen }} ?
                    <p class="text-danger">*Dokumen akan diarsipkan dan status dokumen Tersedia.</p>

                </div>
                <form action="/retensi/{{ $item->no_dokumen }}" method="POST">
                    @csrf
                    @method('PUT')
                    {{-- Jenis input untuk memisahkan jenis update berdasarkan jenis --}}
                    <input name="jenis" type="text" value="arsipkan" hidden>

                    {{-- value untuk ubah status dokumen. update ke table dokumen --}}
                    <input name="status_dok" type="text" value="Tersedia" hidden>

                    <div class="modal-footer">
                        <button class="btn btn-danger" type="button" data-bs-dismiss="modal">Batal</button>
                        <button class="btn btn-primary" type="submit">Arsipkan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endforeach
