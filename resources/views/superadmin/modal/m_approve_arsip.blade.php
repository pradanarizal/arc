<!-- Modal Hapus -->
@foreach ($pengarsipan as $item)
    <div class="modal fade" id="approve_pengarsipan{{ $item->no_dokumen }}" tabindex="-1" role="dialog"
        aria-labelledby="delete_box" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable" role="document">
            <div class="modal-content">
                <div class="modal-header bg-primary">
                    <h5 class="modal-title text-white" id="nama_retensi">Approve Pengarsipan Dokumen</h5>
                    <button type="button" class="close text-white" data-bs-dismiss="modal"
                        aria-hidden="true">&times;</button>
                </div>
                <div class="modal-body ml-2 mr-2">
                    <form action="/pengarsipan/{{ $item->no_dokumen }}" method="POST">
                        @csrf
                        @method('PUT')
                        {{-- Jenis input untuk memisahkan jenis update berdasarkan jenis --}}
                        <input name="jenis" type="text" value="approve" hidden>

                        {{-- value untuk approve pengarsipan. update ke table pengarsipan --}}
                        <input name="pengarsipan" type="text" value="Ya" hidden>

                        {{-- value untuk ubah status dokumen. update ke table dokumen --}}
                        <input name="status_dok" type="text" value="Tersedia" hidden>
                        <label class="" for="arsipRuang">Ruang</label>
                        <select class="form-control" name="arsipRuang" id="arsipRuang">
                            <option selected disabled>-- Pilih Ruang --</option>
                            @foreach ($ruang as $item1)
                                <option value="{{ $item1->id_ruang }}">{{ $item1->nama_ruang }}</option>
                            @endforeach
                        </select>

                        <label class="mt-3" for="arsipRak">Rak</label>
                        <select class="form-control" name="arsipRak" id="arsipRak">
                            <option selected disabled>-- Pilih Rak --</option>
                            @foreach ($rak as $item2)
                                <option value="{{ $item2->id_rak }}">{{ $item2->nama_rak }}</option>
                            @endforeach
                        </select>

                        <label class="mt-3" for="arsipBox">Box</label>
                        <select class="form-control" name="arsipBox" id="arsipBox">
                            <option selected disabled>-- Pilih Box --</option>
                            @foreach ($box as $item3)
                                <option value="{{ $item3->id_box }}">{{ $item3->nama_box }}</option>
                            @endforeach
                        </select>

                        <label class="mt-3" for="arsipMap">Map</label>
                        <select class="form-control" name="arsipMap" id="arsipMap">
                            <option selected disabled>-- Pilih Map --</option>
                            @foreach ($map as $item4)
                                <option value="{{ $item4->id_map }}">{{ $item4->nama_map }}</option>
                            @endforeach
                        </select>

                        <p class="mt-3">Approve pengajuan pengarsipan dokumen {{ $item->nama_dokumen }} ?</p>

                        <div class="modal-footer">
                            <button class="btn btn-danger" type="button" data-bs-dismiss="modal">Batal</button>
                            <button class="btn btn-primary" type="submit">Approve</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endforeach

<?php $listError = ['arsipRuang', 'arsipRak', 'arsipBox', 'arsipMap']; ?>
@foreach ($listError as $err)
    @error($err)
        <script type="text/javascript">
            Swal.fire(
                'Gagal Approve!',
                '{{ $message }}',
                'error'
            );
        </script>
    @break
@enderror
@endforeach
