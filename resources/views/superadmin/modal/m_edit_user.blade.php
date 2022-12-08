@foreach ($users as $item)
    <div class="modal fade" id="edit_user{{ $item->id }}" tabindex="-1" aria-labelledby="edit_user" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">

                <div class="modal-header">
                    <h5 class="modal-title">Edit User</h5>
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
                            <input type="text" value="{{ $item->name }}" class="form-control" id="nama_user"
                                name="nama_user" aria-describedby="emailHelp">
                        </div>
                        <div class="form-group">
                            <label for="email_user">Email</label>
                            <input type="email" value="{{ $item->email }}" class="form-control" id="email_user"
                                name="email_user" aria-describedby="emailHelp">
                        </div>
                        <div class="form-group">
                            <label for="id_departemen">Departemen</label>
                            <select class="form-control" name="id_departemen"
                                id="id_departemen">
                                <option selected disabled>-Pilih Departemen-</option>
                                @foreach ($departemen as $data)
                                    <option value="{{ $data->id_departemen }}" <?php if ($item->id_departemen == $data->id_departemen) {
                                        echo "selected";
                                    } ?> > 
                                         {{ $data->kode_departemen }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="status_user">Status</label>
                            <select class="form-control" name="status_user" id="status_user" value="{{ $item->status_user }}">
                                <option value="aktif" <?php if($item->status_user == 'aktif') {
                                    echo 'selected';
                                } ?> >Aktif</option>
                                <option value="nonaktif" <?php if($item->status_user == 'nonaktif') {
                                    echo 'selected';
                                } ?> >Tidak Aktif</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="role">Roles</label>
                            <select class="form-control" name="role" id="role" value="{{ $item->level }}">
                                <option value="user" <?php if($item->level == 'user') {
                                    echo 'selected';
                                } ?> >User</option>
                                <option value="admin" <?php if($item->level == 'admin') {
                                    echo 'selected';
                                } ?> >Admin</option>
                                <option value="superadmin" <?php if($item->level == 'superadmin') {
                                    echo 'selected';
                                } ?> >Super Admin</option>
                            </select>
                        </div>

                        <button type="submit" class="btn btn-primary tombol-aksi float-right">Simpan</button>
                        <button class="btn btn-danger tombol-aksi float-right" type="button"
                            data-bs-dismiss="modal">Batal</button>
                    </form>
                    <!--END FORM TAMBAH BARANG-->
                </div>

            </div>
        </div>
    </div>
@endforeach
