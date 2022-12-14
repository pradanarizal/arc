<!-- Modal Hapus -->
@foreach ($peminjaman as $item)
    <div class="modal fade" id="tolak_peminjaman{{ $item->no_dokumen }}" tabindex="-1" role="dialog"
        aria-labelledby="delete_box" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable" role="document">
            <div class="modal-content">
                <div class="modal-header bg-danger">
                    <h5 class="modal-title text-white" id="nama_peminjaman">Reject peminjaman Dokumen</h5>
                    <button type="button" class="close text-white" data-bs-dismiss="modal"
                        aria-hidden="true">&times;</button>
                </div>
                <div class="modal-body">
                    Reject pengajuan peminjaman dokumen {{ $item->nama_dokumen }} ?
                </div>
                <form action="/peminjaman/{{ $item->no_dokumen }}" method="POST">
                    @csrf
                    @method('PUT')
                    <input name="jenis" type="text" value="tolak" hidden>

                    {{-- value untuk tolak peminjaman. - Update ke table peminjaman --}}
                    <input name="peminjaman" type="text" value="Tidak" hidden>

                    <div class="modal-footer">
                        <button class="btn btn-danger" type="button" data-bs-dismiss="modal">Batal</button>
                        <button class="btn btn-primary" type="submit">Reject</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endforeach
