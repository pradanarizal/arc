<!-- Modal Hapus -->
@foreach ($pengarsipan as $item)
    <div class="modal fade" id="approve_pengarsipan{{ $item->id_dokumen }}" tabindex="-1" role="dialog"
        aria-labelledby="delete_box" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable" role="document">
            <div class="modal-content">
                <div class="modal-header bg-primary">
                    <h5 class="modal-title text-white" id="nama_retensi">Approve Pengarsipan Dokumen</h5>
                    <button type="button" class="close text-white" data-bs-dismiss="modal"
                        aria-hidden="true">&times;</button>
                </div>
                <div class="modal-body ml-2 mr-2">
                    <form action="/pengarsipan/{{ $item->id_dokumen }}" method="POST">
                        @csrf
                        @method('PUT')

                        {{-- Jenis input untuk memisahkan jenis update berdasarkan jenis --}}
                        <input name="jenis" type="text" value="approve" hidden>

                        {{-- value untuk approve pengarsipan. update ke table pengarsipan --}}
                        <input name="pengarsipan" type="text" value="Ya" hidden>

                        {{-- value untuk ubah status dokumen. update ke table dokumen --}}
                        <input name="status_dok" type="text" value="Tersedia" hidden>

                        <div class="form-group">
                            <label for="ruangapp"><b>Ruang*</b></label>
                            <select class="form-control select2search" name="ruangapp"
                                id="ruangapp{{ $item->id_dokumen }}">
                                <option selected disabled>-Pilih Ruang-</option>
                                @foreach ($ruang as $item1)
                                    <option value="{{ $item1->id_ruang }}">{{ $item1->nama_ruang }}</option>
                                @endforeach
                            </select>
                            @error('ruang_3')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group d-none" id="fgRak{{ $item->id_dokumen }}">
                            <label for="rakApp{{ $item->id_dokumen }}"><b>Rak*</b></label>
                            <select class="form-control" name="rakApp" id="rakApp{{ $item->id_dokumen }}"></select>

                            @error('rakApp')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group d-none" id="fgBox{{ $item->id_dokumen }}">
                            <label for="box_3{{ $item->id_dokumen }}"><b>Box*</b></label>
                            <select class="form-control" name="box_3" id="box_3{{ $item->id_dokumen }}"></select>

                            @error('box_3')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group  d-none" id="fgMap{{ $item->id_dokumen }}">
                            <label for="map_3{{ $item->id_dokumen }}"><b>Map*</b></label>
                            <select class="form-control" name="map_3" id="map_3{{ $item->id_dokumen }}"></select>

                            @error('map_3')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
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
    <script type="text/javascript">
        window.onload = function() {

            // Pilih Rak
            $('#ruangapp{{ $item->id_dokumen }}').on('change', function() {
                var ruangID = $(this).val();
                if (ruangID) {
                    $.ajax({
                        url: '/getRak/' + ruangID,
                        type: "GET",
                        data: {
                            "_token": "{{ csrf_token() }}"
                        },
                        dataType: "json",
                        success: function(data) {
                            if (data) {
                                $('#fgRak{{ $item->id_dokumen }}').removeClass('d-none');
                                $('#rakApp{{ $item->id_dokumen }}').empty();
                                $('#rakApp{{ $item->id_dokumen }}').append(
                                    '<option hidden>-Pilih Rak-</option>');
                                $.each(data, function(key, value) {
                                    $('select[name="rakApp"]').append('<option value="' +
                                        value.id_rak + '">' + value.nama_rak +
                                        '</option>');
                                });
                            } else {
                                $('#rakApp').empty();
                            }
                        }
                    });
                } else {
                    $('#rakApp').empty();
                }
            });

            // Pilih Box
            $('#rakApp{{ $item->id_dokumen }}').on('change', function() {
                var ruangID = $(this).val();
                if (ruangID) {
                    $.ajax({
                        url: '/getBox/' + ruangID,
                        type: "GET",
                        data: {
                            "_token": "{{ csrf_token() }}"
                        },
                        dataType: "json",
                        success: function(data) {
                            if (data) {
                                $('#fgBox{{ $item->id_dokumen }}').removeClass('d-none');
                                $('#box_3{{ $item->id_dokumen }}').empty();
                                $('#box_3{{ $item->id_dokumen }}').append(
                                    '<option hidden>-Pilih Box-</option>');
                                $.each(data, function(key, value) {
                                    $('select[name="box_3"]').append('<option value="' +
                                        value.id_box + '">' + value.nama_box +
                                        '</option>');
                                });
                            } else {
                                $('#box_3').empty();
                            }
                        }
                    });
                } else {
                    $('#box_3').empty();
                }
            });

            // Pilih Map
            $('#box_3{{ $item->id_dokumen }}').on('change', function() {
                var ruangID = $(this).val();
                if (ruangID) {
                    $.ajax({
                        url: '/getMap/' + ruangID,
                        type: "GET",
                        data: {
                            "_token": "{{ csrf_token() }}"
                        },
                        dataType: "json",
                        success: function(data) {
                            if (data) {
                                $('#fgMap{{ $item->id_dokumen }}').removeClass('d-none');
                                $('#map_3{{ $item->id_dokumen }}').empty();
                                $('#map_3{{ $item->id_dokumen }}').append(
                                    '<option hidden>-Pilih Map-</option>');
                                $.each(data, function(key, value) {
                                    $('select[name="map_3"]').append('<option value="' +
                                        value.id_map + '">' + value.nama_map +
                                        '</option>');
                                });
                            } else {
                                $('#map_3').empty();
                            }
                        }
                    });
                } else {
                    $('#map_3').empty();
                }
            });
        };
    </script>
@endforeach

<?php $listError = ['ruangapp', 'rakapp', 'box_3', 'map_3']; ?>
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
