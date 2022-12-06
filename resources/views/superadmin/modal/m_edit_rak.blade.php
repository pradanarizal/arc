@foreach ($rak as $item)
    <div class="modal fade" id="edit_rak{{ $item->id_rak }}" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">

                <div class="modal-header">
                    <h5 class="modal-title">Edit Rak</h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body">
                    <!--FORM TAMBAH Rak-->
                    <form action="{{ '/rak/' . $item->id_rak }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for=""><b>Ruang*</b></label>
                            <select class="select2searchEdit{{ $item->id_rak }} form-control" name="edit_id_ruang">
                                <option disabled>-Pilih Ruang-</option>
                                @foreach ($ruang as $item3)
                                    <option value="<?= $item3->id_ruang ?>" <?php if ($item->nama_ruang == $item3->nama_ruang) {
                                        echo 'selected';
                                    } ?>>
                                        <?= $item3->nama_ruang ?></option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="nama_rak">Nama Rak</label>
                            <input type="text" value="{{ $item->nama_rak }}" class="form-control" id="edit_nama_rak"
                                name="edit_nama_rak">
                            <input type="text" value="{{ $item->nama_rak }}" class="form-control"
                                name="old_edit_nama_rak" hidden>
                        </div>
                        <button type="submit" class="btn btn-primary tombol-aksi float-right">Simpan</button>
                        <button class="btn btn-danger tombol-aksi float-right" type="button"
                            data-bs-dismiss="modal">Batal</button>
                    </form>
                    <!--END FORM TAMBAH Rak-->
                </div>

            </div>
        </div>
    </div>
@endforeach
<?php $listError = ['old_nama_rak', 'old_id_ruang']; ?>
@foreach ($listError as $err)
    @error($err)
        <script type="text/javascript">
            Swal.fire({
                toast: true,
                icon: 'error',
                title: 'Input Gagal!',
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
        </script>
    @break
@enderror
@endforeach
