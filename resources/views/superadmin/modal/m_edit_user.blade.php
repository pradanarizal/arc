@foreach ($users as $item)
<div class="modal fade" id="edit_user{{ $item->id }}" tabindex="-1" aria-labelledby="edit_user" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-header">
                <h5 class="modal-title">Tambah Surat</h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body">
                <!--FORM TAMBAH BARANG-->
                <form action="{{ '/data_user/' . $item->id }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="nama_user">Nama User</label>
                        <input type="text" value="{{$item->name}}" class="form-control" id="nama_user" name="nama_user"
                            aria-describedby="emailHelp">
                    </div>
                    <div class="form-group">
                        <label for="email_user">Email</label>
                        <input type="email" value="{{$item->email}}" class="form-control" id="email_user" name="email_user"
                            aria-describedby="emailHelp">
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" value="{{$item->password}}" class="form-control" id="password" name="password"
                            aria-describedby="emailHelp">
                    </div>
                    <div class="form-group">
                        <label for="divisi">Divisi</label>
                        <input type="divisi" value="{{$item->divisi}}" class="form-control" id="divisi" name="divisi"
                            aria-describedby="emailHelp">
                    </div>
                    <div class="form-group">
                        <label for="status_user">Status</label>
                        <select class="form-control" name="status_user" id="status_user">
                            <option value="Aktif">Aktif</option>
                            <option value="Tidak Aktif">Tidak Aktif</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="role">Roles</label>
                        <select class="form-control" name="role" id="role">
                            <option value="User">User</option>
                            <option value="Admin">Admin</option>
                            <option value="Super Admin">Super Admin</option>
                        </select>
                    </div>

                    <button type="submit" class="btn btn-primary tombol-aksi float-right">Simpan</button>
                    <button class="btn btn-danger tombol-aksi float-right" type="button" data-bs-dismiss="modal">Batal</button>
                </form>
                <!--END FORM TAMBAH BARANG-->
            </div>

        </div>
    </div>
</div>
@endforeach
