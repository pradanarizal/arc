@extends('layout.template') @section('content')
    <div class="d-sm-flex align-items-center justify-content-between mb-3">
        <div class="d-flex align-items-center">
            <p class="h3 mb-0 text-gray-800 mr-1 font-weight-bold">Dokumen</p>
            <p class="mb-0 text-gray-800 text-small">Table Dokumen Terbatas</p>
        </div>

        <div class="d-none d-sm-inline-block justify-content-end p-2">
            <button class="d-none d-sm-inline-block btn btn-danger shadow-sm tombol" data-bs-toggle="modal"
                data-bs-target="#tambah_retensi">
                <i class="fas fa-plus fa-sm text-white-80 mr-2"></i>
                Add Retensi
            </button>
            <button class="d-none d-sm-inline-block btn btn-success shadow-sm tombol" data-bs-toggle="modal"
                data-bs-target="#tambah_dokumen">
                <i class="fas fa-plus fa-sm text-white-80 mr-2"></i>
                Add Arsip
            </button>
        </div>
    </div>

    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>No. Dokumen</th>
                            <th>Nama Dokumen</th>
                            <th>Deskripsi</th>
                            <th>Kelengkapan Dokumen</th>
                            <th>Jenis Dokumen</th>
                            <th>Tanggal Upload</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1; ?>
                        {{-- Ambil data dari controller --}}
                        @foreach ($dokumen as $item)
                            <tr>
                                <td>{{ $no++ }}</td>
                                <td>{{ $item->no_dokumen }}</td>
                                <td>{{ $item->nama_dokumen }}</td>
                                <td>{{ $item->deskripsi }}</td>
                                <td>{{ $item->nama_kel_dokumen }}</td>
                                <th>{{ $item->jenis_dokumen }}</th>
                                <td>{{ date('d-m-Y', strtotime($item->tgl_upload)) }}</td>
                                <td class="text-center">
                                    @if ($item->status_dokumen == 'Tersedia')
                                        <span title="Dokumen Tersedia"
                                            class="badge badge-success p-2">{{ $item->status_dokumen }}</span>
                                    @elseif ($item->status_dokumen == 'Menunggu Approval')
                                        <span title="Menunggu Approval"
                                            class="badge badge-warning p-2">{{ $item->status_dokumen }}</span>
                                    @else
                                        <span title="Dokumen sedang Dipinjam"
                                            class="badge badge-primary p-2">{{ $item->status_dokumen }}</span>
                                    @endif
                                </td>
                                <td class="text-center">
                                    @if ($item->status_dokumen == 'Tersedia')
                                        <button type="button" class="btn btn-sm btn-primary" data-bs-toggle="dropdown">
                                            <i class="fas fa-cog"></i>
                                        </button>
                                        <ul class="dropdown-menu">
                                            <a href="/detail_dokumen/{{ $item->id_dokumen }}"
                                                style="text-decoration: none;">
                                                <li>
                                                    <button class="dropdown-item text-warning">
                                                        <i class="fas fa-eye fa-warning"></i> Lihat
                                                    </button>
                                                </li>
                                            </a>
                                            <li><button class="dropdown-item text-primary" data-bs-toggle="modal"
                                                    data-bs-target="#editDokumen{{ $item->id_dokumen }}">
                                                    <i class="fas fa-edit fa-primary"></i> Edit</button>
                                            </li>
                                            <li>
                                                <button class="dropdown-item text-danger" data-bs-toggle="modal"
                                                    data-bs-target="#softdelete_dokumen{{ $item->id_dokumen }}">
                                                    <i class="fas fa-trash fa-danger"></i> Hapus
                                                </button>
                                            </li>
                                        </ul>
                                    @else
                                        <a href="/detail_dokumen/{{ $item->id_dokumen }}">
                                            <button type="button" class="btn btn-sm btn-primary">
                                                <i class="fas fa-eye"></i>
                                            </button>
                                        </a>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    {{--
</div> --}}

    <?php
    $listErrorPengarsipan = ['nomor_dokumen_pengarsipan', 'nama_dokumen_pengarsipan', 'tahun_dokumen_pengarsipan', 'deskripsi_dokumen_pengarsipan', 'kelengkapan_dokumen_pengarsipan', 'divisi_pengarsipan', 'file_pengarsipan', 'ruangTambahDokumen', 'rakTambahDokumen', 'boxTambahDokumen', 'mapTambahDokumen'];
    $listErrorRetensi = ['nomor_dokumen_retensi', 'nama_dokumen_retensi', 'tahun_dokumen_retensi', 'deskripsi_dokumen_retensi', 'kelengkapan_dokumen_retensi', 'divisi_retensi', 'file_retensi'];
    $listErrorEdit = ['nomor_dokumen_edit', 'nama_dokumen_edit', 'tahun_dokumen_edit', 'deskripsi_dokumen_edit', 'kelengkapan_dokumen_edit', 'divisi_edit', 'file_edit'];
    ?>
    <script>
        window.onload = function() {
            @foreach ($listErrorPengarsipan as $err)
                @error($err)
                    OpenBootstrapPopup();

                    function OpenBootstrapPopup() {
                        $("#tambah_dokumen").modal('show');
                    }
                    @break
                @enderror
            @endforeach
            @foreach ($listErrorRetensi as $err)
                @error($err)
                    OpenBootstrapPopup();

                    function OpenBootstrapPopup() {
                        $("#tambah_retensi").modal('show');
                    }
                    @break
                @enderror
            @endforeach
            @foreach ($listErrorEdit as $err)
                @error($err)
                    Swal.fire({
                        toast: true,
                        icon: 'error',
                        title: 'Edit Gagal!',
                        text: '{{ $message }}',

                        animation: true,
                        position: 'top-right',
                        showConfirmButton: false,
                        showCloseButton: true,
                        timer: 6000,
                        timerProgressBar: true,
                        didOpen: (toast) => {
                            toast.addEventListener('mouseenter', Swal.stopTimer)
                            toast.addEventListener('mouseleave', Swal.resumeTimer)
                        }
                    });
                    @break
                @enderror
            @endforeach
            @foreach ($dokumen as $dok)
                $('#editKelengkapan{{ $dok->id_dokumen }}').select2({
                    data: <?= json_encode($kelengkapan) ?>,
                    theme: "bootstrap-5",
                    width: $(this).data('width') ? $(this).data('width') : $(this).hasClass('w-100') ? '100%' :
                        'style'
                });
            @endforeach
            $('#retensi').select2({
                data: <?= json_encode($kelengkapan) ?>,
                theme: "bootstrap-5",
                width: $(this).data('width') ? $(this).data('width') : $(this).hasClass('w-100') ? '100%' :
                    'style'
            });
            $('#pengarsipan').select2({
                data: <?= json_encode($kelengkapan) ?>,
                theme: "bootstrap-5",
                width: $(this).data('width') ? $(this).data('width') : $(this).hasClass('w-100') ? '100%' :
                    'style'
            });
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
                                $('#fgRak').removeClass('d-none');
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
                                $('#fgBox').removeClass('d-none');
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
                                $('#fgMap').removeClass('d-none');
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

            @foreach ($dokumen as $item)
                $('#ruangEditDokumen{{ $item->id_dokumen }}').on('change', function() {
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
                                    $('#rakEditDokumen{{ $item->id_dokumen }}').empty();
                                    $('#boxEditDokumen{{ $item->id_dokumen }}').empty();
                                    $('#mapEditDokumen{{ $item->id_dokumen }}').empty();
                                    $('#rakEditDokumen{{ $item->id_dokumen }}').append(
                                        '<option hidden>-Pilih Rak-</option>');
                                    $.each(data, function(key, value) {
                                        $('select[id="rakEditDokumen{{ $item->id_dokumen }}"]')
                                            .append(
                                                '<option value="' +
                                                value.id_rak + '">' + value.nama_rak +
                                                '</option>');
                                    });
                                } else {
                                    $('#rakEditDokumen{{ $item->id_dokumen }}').empty();
                                }
                            }
                        });
                    } else {
                        $('#rakEditDokumen{{ $item->id_dokumen }}').empty();
                        $('#boxEditDokumen{{ $item->id_dokumen }}').empty();
                        $('#mapEditDokumen{{ $item->id_dokumen }}').empty();
                    }
                });
                // Select Rak
                $('#rakEditDokumen{{ $item->id_dokumen }}').on('change', function() {
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
                                    $('#boxEditDokumen{{ $item->id_dokumen }}').empty();
                                    $('#mapEditDokumen{{ $item->id_dokumen }}').empty();
                                    $('#boxEditDokumen{{ $item->id_dokumen }}').append(
                                        '<option hidden>-Pilih Box-</option>');
                                    $.each(data, function(key, value) {
                                        $('select[id="boxEditDokumen{{ $item->id_dokumen }}"]')
                                            .append(
                                                '<option value="' +
                                                value.id_box + '">' + value.nama_box +
                                                '</option>');
                                    });
                                } else {
                                    $('#boxEditDokumen{{ $item->id_dokumen }}').empty();
                                }
                            }
                        });
                    } else {
                        $('#boxEditDokumen{{ $item->id_dokumen }}').empty();
                        $('#mapEditDokumen{{ $item->id_dokumen }}').empty();
                    }
                });

                // Select Box
                $('#boxEditDokumen{{ $item->id_dokumen }}').on('change', function() {
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
                                    $('#mapEditDokumen{{ $item->id_dokumen }}').empty();
                                    $('#mapEditDokumen{{ $item->id_dokumen }}').append(
                                        '<option hidden>-Pilih Map-</option>');
                                    $.each(data, function(key, value) {
                                        $('select[id="mapEditDokumen{{ $item->id_dokumen }}"]')
                                            .append(
                                                '<option value="' +
                                                value.id_map + '">' + value.nama_map +
                                                '</option>');
                                    });
                                } else {
                                    $('#mapEditDokumen{{ $item->id_dokumen }}').empty();
                                }
                            }
                        });
                    } else {
                        $('#mapEditDokumen{{ $item->id_dokumen }}').empty();
                    }
                });
            @endforeach

        };
    </script>
    <!-- /.container-fluid -->
    @include('superadmin.modal.m_tambah_dokumen')
    @include('superadmin.modal.m_tambah_retensi')
    @include('superadmin.modal.m_edit_dokumen')
    @include('superadmin.modal.m_delete_dokumen')
    @include('sweetalert::alert')
@endsection
