<!-- Modal Hapus -->
@foreach ($retensi as $item)
    <div class="modal fade" id="tolak_retensi{{ $item->no_dokumen }}" tabindex="-1" role="dialog"
        aria-labelledby="delete_box" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable" role="document">
            <div class="modal-content">
                <div class="modal-header bg-danger">
                    <h5 class="modal-title text-white" id="nama_retensi">Reject Retensi Dokumen</h5>
                    <button type="button" class="close text-white" data-bs-dismiss="modal"
                        aria-hidden="true">&times;</button>
                </div>
                <div class="modal-body">
                    Reject pengajuan retensi dokumen {{ $item->nama_dokumen }} ?
                </div>
                <form action="/retensi/{{ $item->no_dokumen }}" method="POST">
                    @csrf
                    @method('PUT')
                    <input name="jenis" type="text" value="tolak" hidden>

                    {{-- value untuk tolak retensi. - Update ke table retensi --}}
                    <input name="retensi" type="text" value="Tidak" hidden>
                    {{-- value untuk ubah status dokumen. update ke table dokumen --}}
                    <input name="status_dok" type="text" value="Tersedia" hidden>

                    <div class="modal-footer">
                        <button class="btn btn-danger" type="button" data-bs-dismiss="modal">Batal</button>
                        <button class="btn btn-primary" type="submit">Reject</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endforeach
