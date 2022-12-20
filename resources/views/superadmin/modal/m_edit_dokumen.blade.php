@foreach ($dokumen as $item)
    <div class="modal fade" id="editDokumen{{ $item->id_dokumen }}" tabindex="-1" aria-labelledby="tambah_dokumen"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">

                <div class="modal-header">
                    <h5 class="modal-title">Form Edit Dokumen</h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body">
                    <!--FORM TAMBAH-->
                    <form action="/dokumen/edit/{{ $item->id_dokumen }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <input name="jenisDokumen" type="text" value="{{ $item->jenis_dokumen }}" hidden>
                        <input name="oldNamaDokumen" type="text" value="{{ $item->nama_dokumen }}" hidden>
                        <div class="form-group">
                            <label for="nomor_dokumen_edit"><b>Nomor Dokumen</b></label>
                            <input type="text" class="form-control" id="nomor_dokumen_edit" name="nomor_dokumen_edit"
                                value="{{ $item->no_dokumen }}">
                            @error('nomor_dokumen_edit')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="nama_dokumen_edit"><b>Nama Dokumen</b></label>
                            <input type="text" class="form-control" id="nama_dokumen_edit" name="nama_dokumen_edit"
                                value="{{ $item->nama_dokumen }}">
                            @error('nama_dokumen_edit')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="tahun_dokumen_edit"><b>Tahun Dokumen</b></label>
                            <select class="form-control custom-select" name="tahun_dokumen_edit"
                                id="tahun_dokumen_edit">
                                <option selected disabled>--Pilih Tahun Dokumen--</option>
                                @for ($i = date('Y'); $i >= 2000; $i--)
                                    <option value="{{ $i }}"
                                        @if ($item->tahun_dokumen == $i) selected @endif>
                                        {{ $i }}</option>
                                @endfor
                            </select>
                            @error('tahun_dokumen_edit')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="divisi_edit"><b>Divisi</b></label>
                            <select class="form-control" name="divisi_edit" id="divisi_edit">
                                <option selected disabled>--Pilih Divisi--</option>
                                @foreach ($divisi as $div)
                                    <option value="{{ $div->id_departemen }}"
                                        @if ($item->id_departemen == $div->id_departemen) selected @endif>{{ $div->kode_departemen }}
                                    </option>
                                @endforeach
                            </select>
                            @error('divisi_edit')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="deskripsi_dokumen_edit"><b>Deskripsi Dokumen</b></label>
                            <input type="text" class="form-control" id="deskripsi_dokumen_edit"
                                name="deskripsi_dokumen_edit" value="{{ $item->deskripsi }}">
                            @error('deskripsi_dokumen_edit')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="pengarsipan"><b>Kelengkapan Dokumen</b></label>
                            <select class="form-control" id="editKelengkapan{{ $item->id_dokumen }}"
                                name="kelengkapan_dokumen_edit[]" multiple>
                                @foreach (explode(', ', $item->nama_kel_dokumen) as $kel)
                                    <option value="{{ $kel }}" selected>{{ $kel }}</option>
                                @endforeach
                            </select>
                            @error('kelengkapan_dokumen_pengarsipan')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="ruangEditDokumen"><b>Ruang*</b></label>
                            <select class="form-control" name="ruangEditDokumen"
                                id="ruangEditDokumen{{ $item->id_dokumen }}">
                                <option selected disabled>-Pilih Ruang-</option>
                                @foreach ($ruang as $item1)
                                    <option value="{{ $item1->id_ruang }}"
                                        @if ($item->id_ruang == $item1->id_ruang) selected @endif>{{ $item1->nama_ruang }}
                                    </option>
                                @endforeach
                            </select>
                            @error('ruangEditDokumen')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group ">
                            <label><b>Rak*</b></label>
                            <select class="form-control" name="rakEditDokumen"
                                id="rakEditDokumen{{ $item->id_dokumen }}">
                                <option value="{{ $item->id_rak }}">{{ $item->nama_rak }}</option>
                            </select>

                            @error('rakEditDokumen')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group ">
                            <label><b>Box*</b></label>
                            <select class="form-control" name="boxEditDokumen"
                                id="boxEditDokumen{{ $item->id_dokumen }}">
                                <option value="{{ $item->id_box }}">{{ $item->nama_box }}</option>
                            </select>

                            @error('boxEditDokumen')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group ">
                            <label><b>Map*</b></label>
                            <select class="form-control" name="mapEditDokumen"
                                id="mapEditDokumen{{ $item->id_dokumen }}">
                                <option value="{{ $item->id_map }}">{{ $item->nama_map }}</option>
                            </select>

                            @error('mapEditDokumen')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="file_edit">Upload File</label>
                            <span class="text-danger" style="font-size: 12px">*Max file 50MB & Format dokumen harus
                                berformat PDF</span>
                            <div class="form-group">
                                <div class="">
                                    {{-- <label for="file_edit"></label> --}}
                                    <input type="file" name="file_edit" id="file_edit"
                                        value="{{ $item->file_dokumen }}">
                                    @error('file_edit')
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
@endforeach
