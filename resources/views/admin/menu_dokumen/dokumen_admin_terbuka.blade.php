@extends('layout.template') @section('content')
    <div class="d-sm-flex align-items-center justify-content-between mb-3">
        <div class="d-flex align-items-center">
            <p class="h3 mb-0 text-gray-800 mr-1 font-weight-bold">Dokumen</p>
            <p class="mb-0 text-gray-800 text-small">Table Dokumen Terbuka</p>
        </div>

        <div class="d-none d-sm-inline-block justify-content-end p-2">
            <button class="d-none d-sm-inline-block btn btn-danger shadow-sm tombol" data-bs-toggle="modal"
                data-bs-target="#tambah_retensi_admin">
                <i class="fas fa-plus fa-sm text-white-80 mr-2"></i>
                Add Retensi
            </button>
            <button class="d-none d-sm-inline-block btn btn-success shadow-sm tombol" data-bs-toggle="modal"
                data-bs-target="#tambah_dokumen_admin">
                <i class="fas fa-plus fa-sm text-white-80 mr-2"></i>
                Add Arsip
            </button>
        </div>
    </div>

    <!-- DataTales Example -->
    <div class="card shadow mb-4 mt-2">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>No. Dokumen</th>
                            <th>Nama Dokumen</th>
                            <th>Deskripsi</th>
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
                                <td>{{ $item->jenis_dokumen }}</td>
                                <td>{{ date('d-m-Y', strtotime($item->tgl_upload)) }}</td>
                                <td class="text-center">
                                    @if ($item->status_dokumen == 'Tersedia')
                                        <span title="Dokumen Tersedia"
                                            class="badge badge-success p-2">{{ $item->status_dokumen }}</span>
                                    @elseif ($item->status_dokumen == 'Menunggu Approval')
                                        <span title="Menunggu Approval Superadmin"
                                            class="badge badge-warning p-2">{{ $item->status_dokumen }}</span>
                                    @else
                                        <span title="Dokumen sedang Dipinjam"
                                            class="badge badge-primary p-2">{{ $item->status_dokumen }}</span>
                                    @endif
                                </td>
                                <td class="text-center">
                                    @if ($item->status_dokumen == 'Dipinjam')
                                        <a title="Lihat Dokumen" class="btn btn-sm bg-primary text-white"
                                            href="/detail_dokumen_admin/{{ $item->id_dokumen }}">
                                            <i class="fas fa-eye"></i>
                                        </a>
                                    @elseif($item->status_dokumen == 'Menunggu Approval')
                                        <a title="Lihat Dokumen" class="btn btn-sm bg-primary text-white"
                                            href="/detail_dokumen_admin/{{ $item->id_dokumen }}">
                                            <i class="fas fa-eye"></i>
                                        </a>
                                    @else
                                        <a title="Lihat Dokumen" class="btn btn-sm bg-primary text-white"
                                            href="/detail_dokumen_admin/{{ $item->id_dokumen }}">
                                            <i class="fas fa-eye"></i>
                                        </a>
                                        <button title="Pinjam Dokumen" class="btn btn-sm bg-success text-white"
                                            data-bs-toggle="modal" data-bs-target="#pinjam_dokumen{{ $item->id_dokumen }}">
                                            <i class="fas fa-file-export"></i>
                                        </button>
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
    <script>
        <?php $listErrorPengarsipanAdmin = ['nomor_dokumen_pengarsipan_admin', 'nama_dokumen_pengarsipan_admin', 'tahun_dokumen_pengarsipan_admin', 'deskripsi_dokumen_pengarsipan_admin', 'kelengkapan_dokumen_pengarsipan', 'file_pengarsipan_admin'];
        $listErrorRetensiAdmin = ['nomor_dokumen_ret_admin', 'nama_dokumen_ret_admin', 'tahun_dokumen_ret_admin', 'deskripsi_dokumen_ret_admin', 'kelengkapan_dokumen_retensi', 'file_ret_admin'];
        $listErrorPeminjamanAdmin = ['tgl_ambil', 'tgl_kembali'];
        ?>
        window.onload = function() {
            @foreach ($listErrorPengarsipanAdmin as $err)
                @error($err)
                    OpenBootstrapPopup();

                    function OpenBootstrapPopup() {
                        $("#tambah_dokumen_admin").modal('show');
                    }
                    @break
                @enderror
            @endforeach
            @foreach ($listErrorRetensiAdmin as $err)
                @error($err)
                    OpenBootstrapPopup();

                    function OpenBootstrapPopup() {
                        $("#tambah_retensi_admin").modal('show');
                    }
                    @break
                @enderror
            @endforeach
            $('#retensi_admin').select2({
                data: <?= json_encode($kelengkapan) ?>,
                theme: "bootstrap-5",
                width: $(this).data('width') ? $(this).data('width') : $(this).hasClass('w-100') ? '100%' :
                    'style'
            });
            $('#pengarsipan_admin').select2({
                data: <?= json_encode($kelengkapan) ?>,
                theme: "bootstrap-5",
                width: $(this).data('width') ? $(this).data('width') : $(this).hasClass('w-100') ? '100%' :
                    'style'
            });
        };
    </script>
    <!-- /.container-fluid -->
    @include('admin.modal.m_tambah_dokumen')
    @include('admin.modal.m_tambah_retensi')
    @include('admin.modal.m_pinjam_dokumen')
    @include('sweetalert::alert')
@endsection
