<!-- Modal retensi dokumen pada halaman dokumen -->
@foreach ($dokumen as $item)
    <div class="modal fade" id="retensi_dokumen{{$item->no_dokumen}}" tabindex="-1" role="dialog"
        aria-labelledby="delete_box" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable" role="document">
            <div class="modal-content">
                <div class="modal-header bg-danger">
                    <h5 class="modal-title text-white" id="nama_retensi">Retensi Dokumen</h5>
                    <button type="button" class="close text-white" data-bs-dismiss="modal"
                        aria-hidden="true">&times;</button>
                </div>
                <div class="modal-body">
                    Ajukan retensi dokumen {{ $item->nama_dokumen }} ?
                </div>
                <form action="/retensi_dokumen/{{ $item->no_dokumen }}" method="POST">
                    @csrf
                    @method('PUT')
                     {{-- Jenis input untuk memisahkan jenis update berdasarkan jenis --}}
                    <input name="jenis" type="text" value="pengajuan_retensi" hidden>

                    {{-- value untuk ubah status retensi. update ke table retensi --}}
                    <input name="retensi" type="text" value="Pending" hidden>

                    {{-- value untuk ubah status dokumen. update ke table dokumen --}}
                    <input name="status_dok" type="text" value="Pending" hidden>

                    <div class="modal-footer">
                        <button class="btn btn-primary" type="button" data-bs-dismiss="modal">Batal</button>
                        <button class="btn btn-danger" type="submit">Ajukan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endforeach
