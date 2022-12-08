<div class="modal fade" id="tambah_user" tabindex="-1" aria-labelledby="tambah_user" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-header">
                <h5 class="modal-title">Tambah User</h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body">
                <!--FORM TAMBAH BARANG-->
                <form action="/data_user" method="post" enctype="multipart/form-data">
                @csrf
                    <div class="form-group">
                        <label for="nama_user">Nama User</label>
                        <input type="text" class="form-control" id="nama_user" name="nama_user"
                            aria-describedby="emailHelp" value="{{ old('nama_user') }}">
                            @error('nama_user')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                    </div>
                    <div class="form-group">
                        <label for="email_user">Email</label>
                        <input type="email" class="form-control" id="email_user" name="email_user"
                            aria-describedby="emailHelp" value="{{ old('email_user') }}">
                            @error('email_user')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" id="password" name="password"
                            aria-describedby="emailHelp" value="{{ old('password') }}">
                            @error('password')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                    </div>
                    <div class="form-group">
                        <label for="id_departemen">Divisi</label>

                        <select class="form-control select2search" name="id_departemen"
                            id="id_departemen">

                            <option selected disabled>-Pilih Departemen-</option>
                            @foreach ($departemen as $item)
                                <option value="{{ $item->kode_departemen }}" 
                                @error('departemen')
                                    <?php 
                                        if(old('departemen') == $item->id_departemen ) {echo "selected" ; } ?> 
                                @enderror > {{ $item->kode_departemen }}
                                </option>
                            @endforeach
                        </select>
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
                            <option value="user">User</option>
                            <option value="admin">Admin</option>
                            <option value="super admin">Super Admin</option>
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

{{-- Perulangan untuk cek error --}}
<?php $listError = ['nama_user', 'email_user','password','id_departemen']; ?>
@foreach ($listError as $err)
    @error($err)
        <script type="text/javascript">
             window.onload = function() {
                OpenBootstrapPopup();
            };

            function OpenBootstrapPopup() {
                $("#tambah_user").modal('show');
            }
        </script>
    @break
    @enderror
@endforeach
