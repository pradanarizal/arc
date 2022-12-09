@extends('layout.template') @section('content')
    <div class="d-sm-flex align-items-center justify-content-between mb-3">
        <div class="d-flex align-items-center">
            <p class="h3 mb-0 text-gray-800 mr-1 font-weight-bold">Master</p>
            <p class="mb-0 text-gray-800 text-small">Rak Penyimpanan</p>
        </div>

        <div class="d-none d-sm-inline-block justify-content-end p-2">
            <button class="d-none d-sm-inline-block btn btn-success shadow-sm" data-bs-toggle="modal"
                data-bs-target="#tambah_rak">
                <i class="fas fa-plus fa-sm text-white-80 mr-2"></i>
                Add Rak
            </button>
        </div>
    </div>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>ID</th>
                            <th>Nama Rak</th>
                            <th>Ruang</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php $no = 1; ?>
                        {{-- Ambil data dari controller --}}
                        @foreach ($rak as $item)
                            <tr>
                                <td>{{ $no++ }}</td>
                                <td>{{ $item->id_rak }}</td>
                                <td>{{ $item->nama_rak }}</td>
                                <td>{{ $item->nama_ruang }}</td>
                                <td class="text-center">
                                    <button class="btn btn-sm bg-warning text-white pt-2 pb-2" data-bs-toggle="modal"
                                        data-bs-target="#edit_rak{{ $item->id_rak }}">
                                        <i class="fa fa-pen"></i>
                                    </button>
                                    <button class="btn btn-sm bg-danger text-white pt-2 pb-2" data-bs-toggle="modal"
                                        data-bs-target="#delete_rak{{ $item->id_rak }}">
                                        <i class="fa fa-trash"></i>
                                    </button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    @include('superadmin.modal.m_tambah_rak')
    @include('superadmin.modal.m_edit_rak')
    @include('superadmin.modal.m_delete_rak')
    @include('sweetalert::alert')
@endsection
<script>
    window.onload = function() {
        $('.select2search').select2({
            theme: "bootstrap-5",
            dropdownParent: $('#tambah_rak'),
            width: $(this).data('width') ? $(this).data('width') : $(this).hasClass('w-100') ? '100%' :
                'style'
        });
        @foreach ($rak as $item2)
            $('.select2searchEdit' + {{ $item2->id_rak }}).select2({
                theme: "bootstrap-5",
                dropdownParent: $('#edit_rak' + {{ $item2->id_rak }}),
                width: $(this).data('width') ? $(this).data('width') : $(this).hasClass('w-100') ?
                    '100%' : 'style'
            });
        @endforeach
    };

    function enableForm() {
        document.getElementById("nama_rak").disabled = false;
    }
</script>
