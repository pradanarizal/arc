<!-- Modal Hapus -->
@foreach ($retensi as $item)
    <div class="modal fade" id="tolak_retensi{{ $item->id_dokumen }}" tabindex="-1" role="dialog"
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
                <form action="/retensi/{{ $item->id_dokumen }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="modal-body">
                        <input name="jenis" type="text" value="tolak" hidden>
                        {{-- value untuk tolak retensi. - Update ke table retensi --}}
                        <input name="retensi" type="text" value="Tidak" hidden>
                        <div class="form-group">
                            <label for="catatan_retensi_tolak">Catatan</label>
                            <input type="text" cols="30" class="form-control" id="catatan_retensi_tolak" name="catatan_retensi_tolak">
                        </div>
                        @error('catatan_retensi_tolak')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="modal-footer">
                        <button class="btn btn-danger" type="button" data-bs-dismiss="modal">Batal</button>
                        <button class="btn btn-primary" type="submit">Reject</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endforeach

{{-- Perulangan untuk cek error --}}
<?php $listError = ['catatan_retensi_tolak']; ?>
@foreach ($listError as $err)
    @error($err)
        <script type="text/javascript">
             window.onload = function() {
                OpenBootstrapPopup();
            };

            function OpenBootstrapPopup() {
                $("#tolak_retensi{{ $item->id_dokumen }}").modal('show');
            }
        </script>
    @break
    @enderror
@endforeach
