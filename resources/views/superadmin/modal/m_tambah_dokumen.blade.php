<div class="modal fade" id="tambah_dokumen" tabindex="-1" aria-labelledby="tambah_dokumen" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">

            <div class="modal-header">
                <h5 class="modal-title">Form Pengarsipan Dokumen</h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body">
                <!--FORM TAMBAH-->
                <form action="/input_pengarsipan" method="post" enctype="multipart/form-data">
                    @csrf
                    <input name="jenis" type="text" value="Pengarsipan" hidden>
                    <div class="form-group">
                        <label for="nomor_dokumen"><b>Nomor Dokumen</b></label>
                        <input type="text" class="form-control" id="nomor_dokumen" name="nomor_dokumen"
                            aria-describedby="emailHelp" value="{{ old('nomor_dokumen') }}">
                        @error('nomor_dokumen')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="nama_dokumen"><b>Nama Dokumen</b></label>
                        <input type="text" class="form-control" id="nama_dokumen" name="nama_dokumen"
                            aria-describedby="emailHelp" value="{{ old('nama_dokumen') }}">
                        @error('nama_dokumen')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="tahun_dokumen"><b>Tahun Dokumen</b></label>
                        <select class="form-control custom-select" name="tahun_dokumen" id="tahun_dokumen">
                            <option selected disabled>--Pilih Tahun Dokumen--</option>
                            @for ($i = date('Y'); $i >= 2000; $i--)
                                <option value="{{ $i }}">{{ $i }}</option>
                            @endfor
                        </select>
                        @error('tahun_dokumen')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="divisi"><b>Divisi</b></label>
                        <select class="form-control custom-select" name="divisi" id="divisi">
                            <option selected disabled>--Pilih Divisi--</option>
                            @foreach ($divisi as $div)
                                <option value="{{ $div->id_departemen }}">{{ $div->kode_departemen }}</option>
                            @endforeach
                        </select>
                        @error('divisi')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="deskripsi_dokumen"><b>Deskripsi Dokumen</b></label>
                        <input type="text" class="form-control" id="deskripsi_dokumen" name="deskripsi_dokumen"
                            aria-describedby="emailHelp" value="{{ old('deskripsi_dokumen') }}">
                        @error('deskripsi_dokumen')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="jenis_dokumen">Jenis_Dokumen</label>
                        <select class="form-control" name="jenis_dokumen" id="jenis_dokumen">
                            <option selected disabled>--Pilih Jenis Dokumen--</option>
                            <option value="Terbuka">Terbuka</option>
                            <option value="Terbatas">Terbatas</option>
                        </select>
                    </div>
                    
                    <div class="row mt 3">
                        <div class="col-lg-8">
                            <div class="form-group">
                                <label for="kelengkapan_dokumen"><b>Kelengkapan Dokumen</b></label>
                                @foreach ($kelengkapan_dokumen as $item)
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox"
                                            value="{{ $item->nama_kel_dokumen }}"
                                            id="kelengkapan_dokumen{{ $item->id_kel_dokumen }}"
                                            name="kelengkapan_dokumen[]">
                                        <label class="form-check-label"
                                            for="kelengkapan_dokumen{{ $item->id_kel_dokumen }}">
                                            {{ $item->nama_kel_dokumen }}
                                        </label>
                                    </div>
                                @endforeach
                                @error('kelengkapan_dokumen')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="col-lg-4">
                            <div class="form-group">
                                <label for="ruangapp"><b>Ruang*</b></label>
                                <select class="form-control select2search" name="ruangTambahDokumen"
                                    id="ruangTambahDokumen">
                                    <option selected disabled>-Pilih Ruang-</option>
                                    @foreach ($ruang as $item1)
                                        <option value="{{ $item1->id_ruang }}">{{ $item1->nama_ruang }}</option>
                                    @endforeach
                                </select>
                                @error('ruangTambahDokumen')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group ">
                                <label><b>Rak*</b></label>
                                <select class="form-control" name="rakTambahDokumen" id="rakTambahDokumen"></select>

                                @error('rakTambahDokumen')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group ">
                                <label><b>Box*</b></label>
                                <select class="form-control" name="boxTambahDokumen" id="boxTambahDokumen"></select>

                                @error('boxTambahDokumen')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group ">
                                <label><b>Map*</b></label>
                                <select class="form-control" name="mapTambahDokumen" id="mapTambahDokumen"></select>

                                @error('mapTambahDokumen')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                        </div>
                    </div>

                    <div class="form-group">
                        <label for="file">Upload File</label>
                        <span class="text-danger" style="font-size: 12px">*Max file 50MB & Format dokumen harus
                            berformat PDF</span>
                        <div class="form-group">
                            <div class="">
                                <input type="file" name="file" id="file">
                                @error('file')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary tombol-aksi float-right">Ajukan</button>
                    <button class="btn btn-danger tombol-aksi float-right" type="button"
                        data-bs-dismiss="modal">Batal</button>
                </form>
                <!--END FORM TAMBAH-->
            </div>

        </div>
    </div>
</div>



{{-- Perulangan untuk cek error --}}
<?php $listError = ['nomor_dokumen', 'nama_dokumen', 'tahun_dokumen', 'deskripsi_dokumen', 'kelengkapan_dokumen', 'file']; ?>
@foreach ($listError as $err)
    @error($err)
        <script type="text/javascript">
            window.onload = function() {
                OpenBootstrapPopup();
            };

            function OpenBootstrapPopup() {
                $("#tambah_dokumen").modal('show');
            }
        </script>
    @break
@enderror
@endforeach

<script>
    window.onload = function() {
        // Select Ruang
        $('#ruangTambahDokumen').on('change', function() {
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
                            $('#rakTambahDokumen').empty();
                            $('#boxTambahDokumen').empty();
                            $('#mapTambahDokumen').empty();
                            $('#rakTambahDokumen').append(
                                '<option hidden>-Pilih Rak-</option>');
                            $.each(data, function(key, value) {
                                $('select[name="rakTambahDokumen"]').append(
                                    '<option value="' +
                                    value.id_rak + '">' + value.nama_rak +
                                    '</option>');
                            });
                        } else {
                            $('#rakTambahDokumen').empty();
                        }
                    }
                });
            } else {
                $('#rakTambahDokumen').empty();
                $('#boxTambahDokumen').empty();
                $('#mapTambahDokumen').empty();
            }
        });
        // Select Rak
        $('#rakTambahDokumen').on('change', function() {
            var boxID = $(this).val();
            if (boxID) {
                $.ajax({
                    url: '/getBox/' + boxID,
                    type: "GET",
                    data: {
                        "_token": "{{ csrf_token() }}"
                    },
                    dataType: "json",
                    success: function(data) {
                        if (data) {
                            $('#boxTambahDokumen').empty();
                            $('#mapTambahDokumen').empty();
                            $('#boxTambahDokumen').append(
                                '<option hidden>-Pilih Box-</option>');
                            $.each(data, function(key, value) {
                                $('select[name="boxTambahDokumen"]').append(
                                    '<option value="' +
                                    value.id_box + '">' + value.nama_box +
                                    '</option>');
                            });
                        } else {
                            $('#boxTambahDokumen').empty();
                        }
                    }
                });
            } else {
                $('#boxTambahDokumen').empty();
                $('#mapTambahDokumen').empty();
            }
        });

        // Select Box
        $('#boxTambahDokumen').on('change', function() {
            var mapID = $(this).val();
            if (mapID) {
                $.ajax({
                    url: '/getMap/' + mapID,
                    type: "GET",
                    data: {
                        "_token": "{{ csrf_token() }}"
                    },
                    dataType: "json",
                    success: function(data) {
                        if (data) {
                            $('#mapTambahDokumen').empty();
                            $('#mapTambahDokumen').append(
                                '<option hidden>-Pilih Map-</option>');
                            $.each(data, function(key, value) {
                                $('select[name="mapTambahDokumen"]').append(
                                    '<option value="' +
                                    value.id_map + '">' + value.nama_map +
                                    '</option>');
                            });
                        } else {
                            $('#mapTambahDokumen').empty();
                        }
                    }
                });
            } else {
                $('#mapTambahDokumen').empty();
            }
        });
    };
</script>
