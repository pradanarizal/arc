@extends('layout.template') @section('content')
    <div class="d-sm-flex align-items-center justify-content-between mb-3">
        <div class="d-flex align-items-center">
            <p class="h3 mb-0 text-gray-800 mr-1 font-weight-bold">Master</p>
            <p class="mb-0 text-gray-800 text-small">User</p>
        </div>

        <div class="d-none d-sm-inline-block justify-content-end p-2">
            <button class="d-none d-sm-inline-block btn btn-success shadow-sm" data-bs-toggle="modal"
                data-bs-target="#tambah_user">
                <i class="fas fa-plus fa-sm text-white-80 mr-2"></i>
                Add User
            </button>
        </div>
    </div>

    <!-- Begin Page Content -->

    {{-- <div class="d-grid gap-2 d-md-flex justify-content-end p-2">
        <button class="d-none d-sm-inline-block btn btn-success shadow-sm" data-bs-toggle="modal" data-bs-target="#tambah_user">
            <i class="fas fa-plus fa-sm text-white-80 mr-2"></i>
            Add User
        </button>
    </div> --}}

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>ID</th>
                            <th>Nama User</th>
                            <th>Email</th>
                            <th>Departemen</th>
                            <th>Status</th>
                            <th>Roles</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php $no = 1; ?>
                        {{-- Ambil data dari controller --}}
                        @foreach ($users as $item)
                            <tr>
                                <td>{{ $no++ }}</td>
                                <td>{{ $item->id }}</td>
                                <td>{{ $item->name }}</td>
                                <td>{{ $item->email }}</td>
                                <td>{{ $item->kode_departemen }}</td>
                                <td><?php if ($item->status_user == 'aktif') {
                                    echo '<span class="badge badge-success">Aktif</span>';
                                } else {
                                    echo '<span class="badge badge-danger">Tidak Aktif</span>';
                                }
                                ?></td>
                                <td>{{ $item->level }}</td>
                                <td class="text-center">
                                    <button class="btn btn-sm bg-warning text-white" data-bs-toggle="modal"
                                        data-bs-target="#edit_user{{ $item->id }}">
                                        <i class="fa fa-pen"></i>
                                    </button>
                                    <button class="btn btn-sm bg-primary text-white" data-bs-toggle="modal"
                                        data-bs-target="#modaleditPassword_user{{ $item->id }}">
                                        <i class="fa fa-key"></i>
                                    </button>
                                    <button class="btn btn-sm bg-danger text-white" data-bs-toggle="modal"
                                        data-bs-target="#delete_user{{ $item->id }}">
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
    @include('superadmin.modal.m_tambah_user')
    @include('superadmin.modal.m_edit_user')
    @include('superadmin.modal.m_edit_password_user')
    @include('superadmin.modal.m_delete_user')
    @include('sweetalert::alert')
@endsection

<script>
    window.onload = function() {
        $('.select2search').select2({
            theme: "bootstrap-5",
            dropdownParent: $('#tambah_user'),
            width: $(this).data('width') ? $(this).data('width') : $(this).hasClass('w-100') ? '100%' :
                'style'
        });
    };
</script>


