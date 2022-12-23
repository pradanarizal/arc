<?php

namespace App\Http\Controllers\superadmin\menu_dokumen;

use App\Http\Controllers\Controller;
use App\Models\DokumenModel;
use App\Models\approval\RetensiModel;
use App\Models\approval\PengarsipanModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Response;
use App\Traits\notif_sidebar;

class DokumenController extends Controller
{
    use notif_sidebar;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->DokumenModel = new DokumenModel();
        $this->RetensiModel = new RetensiModel();
        $this->PengarsipanModel = new PengarsipanModel();
        $this->notif = $this->approval_pending();
    }

    public function showPdf($namaPDF)
    {
        return Response::make(file_get_contents('data_file/' . $namaPDF . '.pdf'), 200, [
            'content-type' => 'application/pdf',
        ]);
    }
    //Halaman Detail Dokumen
    public function detail_data($id)
    {

        $data = [
            'dokumen' => $this->DokumenModel->getDokumenById($id),
            'peminjaman'    => $this->DokumenModel->getNamaPeminjam($id),
        ];
        return view('superadmin.menu_dokumen.detail_dokumen', $data, $this->notif);
    }

    public function index()
    {
        $data = [
            'dokumen' => $this->DokumenModel->allDataTerbatas(),
            'divisi' => $this->DokumenModel->getDepartemen(),
            'kelengkapan_dokumen' => $this->DokumenModel->kelData(),
            'kelengkapan' => $this->DokumenModel->getKelengkapanMultiple(),
            'ruang' => $this->PengarsipanModel->getRuang(),
            'rak' => $this->PengarsipanModel->getRak(),
            'box' => $this->PengarsipanModel->getBox(),
            'map' => $this->PengarsipanModel->getMap()
        ];
        return view('superadmin.menu_dokumen.dokumen_terbatas', $data, $this->notif);
    }

    public function dokumen_terbuka()
    {
        $data = [
            'dokumen' => $this->DokumenModel->allDataTerbuka(),
            'kelengkapan_dokumen' => $this->DokumenModel->kelData(),
            'kelengkapan' => $this->DokumenModel->getKelengkapanMultiple(),
            'divisi' => $this->DokumenModel->getDepartemen(),
            'ruang' => $this->PengarsipanModel->getRuang(),
            'rak' => $this->PengarsipanModel->getRak(),
            'box' => $this->PengarsipanModel->getBox(),
            'map' => $this->PengarsipanModel->getMap()

        ];
        return view('superadmin.menu_dokumen.dokumen_terbuka', $data, $this->notif);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request)
    {
        // $kelengkapan_dokumen = "";
        // foreach ($request->kelengkapan_dokumen as $kel) {
        //     $kelengkapan_dokumen = $kelengkapan_dokumen.", $kel";
        // }
        // return redirect('/dokumen')->with('toast_success', substr($kelengkapan_dokumen, 2));

        // menyimpan data file yang diupload ke variabel $file


        // nama file
        // echo 'File Name: ' . $file->hashName();
        // echo '<br>';

        // ekstensi file
        // echo 'File Extension: ' . $file->getClientOriginalExtension();
        // echo '<br>';

        // real path
        // echo 'File Real Path: ' . $file->getRealPath();
        // echo '<br>';

        // ukuran file
        // echo 'File Size: ' . $file->getSize();
        // echo '<br>';
        // tipe mime
        // echo 'File Mime Type: ' . $file->getMimeType();


        // upload file

        $direktori_file = 'data_file';

        if ($request->input('jenis') == 'Retensi') {
            $request->validate(
                [
                    'file_retensi' => 'required|unique:dokumen,file_dokumen|max:50000|mimes:pdf',
                    'kelengkapan_dokumen_retensi' => 'required',
                    'divisi_retensi' => 'required',
                    'nama_dokumen_retensi' => 'required',
                    'nomor_dokumen_retensi' => 'required',
                    'tahun_dokumen_retensi' => 'required',
                    'deskripsi_dokumen_retensi' => 'required',
                ],
                [
                    'file_retensi.required' => 'File dokumen wajib diupload!',
                    'file_retensi.mimes' => 'File dokumen wajib berekstensi .pdf',
                    'file_retensi.max' => 'File dokumen tidak boleh lebih dari 50Mb',
                    'kelengkapan_dokumen_retensi.required' => 'Pilih kelengkapan dokumen!',
                    'divisi_retensi.required' => 'Pilih Divisi!',
                    'nama_dokumen_retensi.required' => 'Nama Dokumen wajib diisi!',
                    'nomor_dokumen_retensi.required' => 'Nomor Dokumen wajib diisi!',
                    'tahun_dokumen_retensi.required' => 'Pilih tahun dokumen!',
                    'deskripsi_dokumen_retensi.required' => 'Deskripsi wajib diisi!',
                ]
            );
            $file = $request->file('file_retensi');
            $dok = $request->input('nama_dokumen_retensi');
            $file_dokumen = $file->move($direktori_file, "$dok" . ".pdf");
            $kelengkapan_dokumen = implode(', ', $request->kelengkapan_dokumen_retensi);
            $data = [
                'no_dokumen' => $request->nomor_dokumen_retensi,
                'nama_dokumen' => $request->nama_dokumen_retensi,
                'tahun_dokumen' => $request->tahun_dokumen_retensi,
                'deskripsi' => $request->deskripsi_dokumen_retensi,
                'id_departemen' => $request->divisi_retensi,
                'tgl_upload' => \Carbon\Carbon::now(),
                'status_dokumen' => 'Retensi',
                'nama_kel_dokumen' => $kelengkapan_dokumen,
                'file_dokumen' => $file_dokumen,
                'created_at' => \Carbon\Carbon::now(),
                'id_ruang' => $request->ruangTambahDokumen,
                'id_rak' => $request->rakTambahDokumen,
                'id_box' => $request->boxTambahDokumen,
                'id_map' => $request->mapTambahDokumen
            ];

            if ($this->DokumenModel->addDokumen($data)) {
                $last_id_dokumen = $this->DokumenModel->getLastIdDokumen();
                if (count($last_id_dokumen) == 1) {
                    $idDokumen = $last_id_dokumen[0]->id_dokumen;
                    $data2 = [
                        // 'tgl_retensi' => \Carbon\Carbon::now(),
                        'status_retensi' => 'Ya',
                        'created_at' => \Carbon\Carbon::now(),
                        'id_dokumen' => $idDokumen,
                        'id' => Auth::user()->id,
                    ];
                    $this->DokumenModel->insert_retensi($data2);
                }
                return redirect('/approval/retensi')->with('toast_success', 'Berhasil Retensi Dokumen!');
            }else {
                return redirect('/approval/retensi')->with('toast_error', 'Gagal Retensi Dokumen!');
            }
        } elseif ($request->input('jenis') == 'Pengarsipan') {
            $request->validate(
                [
                    'file_pengarsipan' => 'required|unique:dokumen,file_dokumen|max:50000|mimes:pdf',
                    'kelengkapan_dokumen_pengarsipan' => 'required',
                    'divisi_pengarsipan' => 'required',
                    'jenis_dokumen' => 'required',
                    'nama_dokumen_pengarsipan' => 'required',
                    'nomor_dokumen_pengarsipan' => 'required',
                    'tahun_dokumen_pengarsipan' => 'required',
                    'deskripsi_dokumen_pengarsipan' => 'required',
                    'ruangTambahDokumen'=> 'required',
                    'rakTambahDokumen' => 'required',
                    'boxTambahDokumen' => 'required',
                    'mapTambahDokumen' => 'required'
                ],
                [
                    'file_pengarsipan.required' => 'File dokumen wajib diupload!',
                    'file_pengarsipan.mimes' => 'File dokumen wajib berekstensi .pdf',
                    'file_pengarsipan.max' => 'File dokumen tidak boleh lebih dari 50Mb',
                    'kelengkapan_dokumen_pengarsipan.required' => 'Pilih kelengkapan dokumen!',
                    'divisi_pengarsipan.required' => 'Divisi wajib diisi!',
                    'jenis_dokumen.required' => 'Pilih Jenis Dokumen!',
                    'nama_dokumen_pengarsipan.required' => 'Nama Dokumen wajib diisi!',
                    'nomor_dokumen_pengarsipan.required' => 'Nomor Dokumen wajib diisi!',
                    'tahun_dokumen_pengarsipan.required' => 'Pilih tahun dokumen!',
                    'deskripsi_dokumen_pengarsipan.required' => 'Deskripsi wajib diisi!',
                    'ruangTambahDokumen.required' => 'Ruang wajib diisi!',
                    'rakTambahDokumen.required' => 'Rak wajib diisi!',
                    'boxTambahDokumen.required' => 'Box wajib diisi!',
                    'mapTambahDokumen.required' => 'Map wajib diisi!'
                ]
            );
            $file = $request->file('file_pengarsipan');
            $dok = $request->input('nama_dokumen_pengarsipan');
            $file_dokumen = $file->move($direktori_file, "$dok" . ".pdf");
            $kelengkapan_dokumen = implode(', ', $request->kelengkapan_dokumen_pengarsipan);
            $data = [
                'no_dokumen' => $request->nomor_dokumen_pengarsipan,
                'nama_dokumen' => $request->nama_dokumen_pengarsipan,
                'tahun_dokumen' => $request->tahun_dokumen_pengarsipan,
                'deskripsi' => $request->deskripsi_dokumen_pengarsipan,
                'id_departemen' => $request->divisi_pengarsipan,
                'tgl_upload' => \Carbon\Carbon::now(),
                'status_dokumen' => 'Tersedia',
                'jenis_dokumen'     => $request->input('jenis_dokumen'),
                'nama_kel_dokumen' => $kelengkapan_dokumen,
                'file_dokumen' => $file_dokumen,
                'created_at' => \Carbon\Carbon::now(),
                'id_ruang' => $request->ruangTambahDokumen,
                'id_rak' => $request->rakTambahDokumen,
                'id_box' => $request->boxTambahDokumen,
                'id_map' => $request->mapTambahDokumen
            ];

            if ($this->DokumenModel->addDokumen($data)) {
                $last_id_dokumen = $this->DokumenModel->getLastIdDokumen();
                if (count($last_id_dokumen) == 1) {
                    $idDokumen = $last_id_dokumen[0]->id_dokumen;
                    $data2 = [
                        'status_pengarsipan' => 'Ya',
                        'created_at' => \Carbon\Carbon::now(),
                        'id_dokumen' => $idDokumen,
                        'id' => Auth::user()->id,
                    ];
                    $this->DokumenModel->insert_pengarsipan($data2);
                }

                return redirect('/approval/pengarsipan')->with('toast_success', 'Berhasil Arsip Dokumen!');
            }else {
                return redirect('/approval/pengarsipan')->with('toast_error', 'Gagal Arsip Dokumen!');
            }
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $no_dokumen)
    {
        if ($request->input('jenis') == 'softdelete') {
            //untuk pengajuan retensi dokumen, ubah status_dokumen - table dokumen
            $update_dokumen = [
                'status_dokumen' => $request->input('status_dok'),
                'updated_at' => \Carbon\Carbon::now(),
            ];
            if ($this->DokumenModel->softdelete_dokumen($update_dokumen, $no_dokumen)) {
                return redirect('/dokumen_terbuka')->with('toast_success', 'Dokumen telah dihapus!');
            } else {
                return redirect('/dokumen_terbuka');
            }
        } else {
            //untuk pengajuan retensi dokumen, ubah status_dokumen - table dokumen
            $update_dokumen = [
                'status_dokumen' => $request->input('status_dok'),
                'updated_at' => \Carbon\Carbon::now(),
            ];
            $update_retensi = [
                'status_retensi' =>  $request->input('retensi'),
                'updated_at' => \Carbon\Carbon::now(),
            ];
            if ($this->DokumenModel->pengajuan_retensi($update_dokumen, $update_retensi, $no_dokumen)) {
                return redirect('/dokumen_terbuka')->with('toast_success', 'Dokumen telah diteruskan ke menu Approval Retensi Arsip!');
            } else {
                return redirect('/dokumen_terbuka');
            }
        }
    }

    public function edit_dokumen(Request $request, $id_dokumen)
    {
        $jenis = strtolower($request->jenisDokumen);
        if ($request->file('file_edit') != null) {
            if ($request->oldNamaDokumen != $request->nama_dokumen_edit) {
                $request->validate([
                    'file_edit' => 'required',
                    'nomor_dokumen_edit' => 'required',
                    'nama_dokumen_edit' => 'required|unique:dokumen,nama_dokumen',
                    'tahun_dokumen_edit' => 'required',
                    'divisi_edit' => 'required',
                    'deskripsi_dokumen_edit' => 'required',
                    'kelengkapan_dokumen_edit' => 'required',
                    'ruangEditDokumen' => 'required',
                    'rakEditDokumen' => 'required',
                    'boxEditDokumen' => 'required',
                    'mapEditDokumen' => 'required',
                ],[
                    'file_edit.required' => 'Dokumen Tidak Boleh Kosong!',
                    'nomor_dokumen_edit.required' => 'Nomor Dokumen Tidak Boleh Kosong!',
                    'nama_dokumen_edit.required' => 'Nama Dokumen Tidak Boleh Kosong!',
                    'nama_dokumen_edit.unique' => 'Nama Dokumen Tidak Boleh Sama Dengan Dokumen Lain!',
                    'tahun_dokumen_edit.required' => 'Tahun Dokumen Tidak Boleh Kosong!',
                    'divisi_edit.required' => 'Divisi Tidak Boleh Kosong!',
                    'deskripsi_dokumen_edit.required' => 'Deskripsi Dokumen Tidak Boleh Kosong!',
                    'kelengkapan_dokumen_edit.required' => 'Kelengkapan Dokumen Tidak Boleh Kosong!',
                    'ruangEditDokumen.required' => 'Ruang Tidak Boleh Kosong!',
                    'rakEditDokumen.required' => 'Rak Tidak Boleh Kosong!',
                    'boxEditDokumen.required' => 'Box Tidak Boleh Kosong!',
                    'mapEditDokumen.required' => 'Map Tidak Boleh Kosong!',
                ]);
                $file = $request->file('file_edit');
                $dok = $request->input('nama_dokumen_edit');
                $file_dokumen = $file->move('data_file', "$dok" . ".pdf");
                unlink("data_file/".$request->oldNamaDokumen.".pdf");
                $kelengkapan_dokumen = implode(', ', $request->kelengkapan_dokumen_edit);
                $data = [
                    'no_dokumen' => $request->nomor_dokumen_edit,
                    'nama_dokumen' => $request->nama_dokumen_edit,
                    'tahun_dokumen' => $request->tahun_dokumen_edit,
                    'deskripsi' => $request->deskripsi_dokumen_edit,
                    'id_departemen' => $request->divisi_edit,
                    'nama_kel_dokumen' => $kelengkapan_dokumen,
                    'file_dokumen' => $file_dokumen,
                    'updated_at' => \Carbon\Carbon::now(),
                    'id_ruang' => $request->ruangEditDokumen,
                    'id_rak' => $request->rakEditDokumen,
                    'id_box' => $request->boxEditDokumen,
                    'id_map' => $request->mapEditDokumen
                ];
            } else {
                $request->validate([
                    'file_edit' => 'required',
                    'nomor_dokumen_edit' => 'required',
                    'tahun_dokumen_edit' => 'required',
                    'divisi_edit' => 'required',
                    'deskripsi_dokumen_edit' => 'required',
                    'kelengkapan_dokumen_edit' => 'required',
                    'ruangEditDokumen' => 'required',
                    'rakEditDokumen' => 'required',
                    'boxEditDokumen' => 'required',
                    'mapEditDokumen' => 'required',
                ],[
                    'file_edit.required' => 'Dokumen Tidak Boleh Kosong!',
                    'nomor_dokumen_edit.required' => 'Nomor Dokumen Tidak Boleh Kosong!',
                    'tahun_dokumen_edit.required' => 'Tahun Dokumen Tidak Boleh Kosong!',
                    'divisi_edit.required' => 'Divisi Tidak Boleh Kosong!',
                    'deskripsi_dokumen_edit.required' => 'Deskripsi Dokumen Tidak Boleh Kosong!',
                    'kelengkapan_dokumen_edit.required' => 'Kelengkapan Dokumen Tidak Boleh Kosong!',
                    'ruangEditDokumen.required' => 'Ruang Tidak Boleh Kosong!',
                    'rakEditDokumen.required' => 'Rak Tidak Boleh Kosong!',
                    'boxEditDokumen.required' => 'Box Tidak Boleh Kosong!',
                    'mapEditDokumen.required' => 'Map Tidak Boleh Kosong!',
                ]);
                $file = $request->file('file_edit');
                $dok = $request->input('nama_dokumen_edit');
                $file_dokumen = $file->move('data_file', "$dok" . ".pdf");
                $kelengkapan_dokumen = implode(', ', $request->kelengkapan_dokumen_edit);
                $data = [
                    'no_dokumen' => $request->nomor_dokumen_edit,
                    'nama_dokumen' => $request->nama_dokumen_edit,
                    'tahun_dokumen' => $request->tahun_dokumen_edit,
                    'deskripsi' => $request->deskripsi_dokumen_edit,
                    'id_departemen' => $request->divisi_edit,
                    'nama_kel_dokumen' => $kelengkapan_dokumen,
                    'file_dokumen' => $file_dokumen,
                    'updated_at' => \Carbon\Carbon::now(),
                    'id_ruang' => $request->ruangEditDokumen,
                    'id_rak' => $request->rakEditDokumen,
                    'id_box' => $request->boxEditDokumen,
                    'id_map' => $request->mapEditDokumen
                ];
            }


            if ($this->DokumenModel->update_dokumen($data, $id_dokumen)) {
                return redirect('/dokumen_'.$jenis)->with('toast_success', 'Berhasil Edit Dokumen!');
            } else {
                return redirect('/dokumen_'.$jenis)->with('toast_success', 'Gagal Edit Dokumen!');
            }

        } else {
            if ($request->oldNamaDokumen != $request->nama_dokumen_edit) {
                $request->validate([
                    'nomor_dokumen_edit' => 'required',
                    'nama_dokumen_edit' => 'required|unique:dokumen,nama_dokumen',
                    'tahun_dokumen_edit' => 'required',
                    'divisi_edit' => 'required',
                    'deskripsi_dokumen_edit' => 'required',
                    'kelengkapan_dokumen_edit' => 'required',
                    'ruangEditDokumen' => 'required',
                    'rakEditDokumen' => 'required',
                    'boxEditDokumen' => 'required',
                    'mapEditDokumen' => 'required',
                ],[
                    'nomor_dokumen_edit.required' => 'Nomor Dokumen Tidak Boleh Kosong!',
                    'nama_dokumen_edit.required' => 'Nama Dokumen Tidak Boleh Kosong!',
                    'nama_dokumen_edit.unique' => 'Nama Dokumen Tidak Boleh Sama Dengan Dokumen Lain!',
                    'tahun_dokumen_edit.required' => 'Tahun Dokumen Tidak Boleh Kosong!',
                    'divisi_edit.required' => 'Divisi Tidak Boleh Kosong!',
                    'deskripsi_dokumen_edit.required' => 'Deskripsi Dokumen Tidak Boleh Kosong!',
                    'kelengkapan_dokumen_edit.required' => 'Kelengkapan Dokumen Tidak Boleh Kosong!',
                    'ruangEditDokumen.required' => 'Ruang Tidak Boleh Kosong!',
                    'rakEditDokumen.required' => 'Rak Tidak Boleh Kosong!',
                    'boxEditDokumen.required' => 'Box Tidak Boleh Kosong!',
                    'mapEditDokumen.required' => 'Map Tidak Boleh Kosong!',
                ]);
                $kelengkapan_dokumen = implode(', ', $request->kelengkapan_dokumen_edit);
                $alamat_file = "data_file\\".$request->nama_dokumen_edit.".pdf";
                rename("data_file/".$request->oldNamaDokumen.".pdf", "data_file/".$request->nama_dokumen_edit.".pdf");
                $data = [
                    'no_dokumen' => $request->nomor_dokumen_edit,
                    'nama_dokumen' => $request->nama_dokumen_edit,
                    'tahun_dokumen' => $request->tahun_dokumen_edit,
                    'deskripsi' => $request->deskripsi_dokumen_edit,
                    'id_departemen' => $request->divisi_edit,
                    'nama_kel_dokumen' => $kelengkapan_dokumen,
                    'file_dokumen' => $alamat_file,
                    'updated_at' => \Carbon\Carbon::now(),
                    'id_ruang' => $request->ruangEditDokumen,
                    'id_rak' => $request->rakEditDokumen,
                    'id_box' => $request->boxEditDokumen,
                    'id_map' => $request->mapEditDokumen
                ];
            } else {
                $request->validate([
                    'nomor_dokumen_edit' => 'required',
                    'tahun_dokumen_edit' => 'required',
                    'divisi_edit' => 'required',
                    'deskripsi_dokumen_edit' => 'required',
                    'kelengkapan_dokumen_edit' => 'required',
                    'ruangEditDokumen' => 'required',
                    'rakEditDokumen' => 'required',
                    'boxEditDokumen' => 'required',
                    'mapEditDokumen' => 'required',
                ],[
                    'nomor_dokumen_edit.required' => 'Nomor Dokumen Tidak Boleh Kosong!',
                    'tahun_dokumen_edit.required' => 'Tahun Dokumen Tidak Boleh Kosong!',
                    'divisi_edit.required' => 'Divisi Tidak Boleh Kosong!',
                    'deskripsi_dokumen_edit.required' => 'Deskripsi Dokumen Tidak Boleh Kosong!',
                    'kelengkapan_dokumen_edit.required' => 'Kelengkapan Dokumen Tidak Boleh Kosong!',
                    'ruangEditDokumen.required' => 'Ruang Tidak Boleh Kosong!',
                    'rakEditDokumen.required' => 'Rak Tidak Boleh Kosong!',
                    'boxEditDokumen.required' => 'Box Tidak Boleh Kosong!',
                    'mapEditDokumen.required' => 'Map Tidak Boleh Kosong!',
                ]);
                $kelengkapan_dokumen = implode(', ', $request->kelengkapan_dokumen_edit);
                $data = [
                    'no_dokumen' => $request->nomor_dokumen_edit,
                    'tahun_dokumen' => $request->tahun_dokumen_edit,
                    'deskripsi' => $request->deskripsi_dokumen_edit,
                    'id_departemen' => $request->divisi_edit,
                    'nama_kel_dokumen' => $kelengkapan_dokumen,
                    'updated_at' => \Carbon\Carbon::now(),
                    'id_ruang' => $request->ruangEditDokumen,
                    'id_rak' => $request->rakEditDokumen,
                    'id_box' => $request->boxEditDokumen,
                    'id_map' => $request->mapEditDokumen
                ];
            }
            if ($this->DokumenModel->update_dokumen($data, $id_dokumen)) {
                return redirect('/dokumen_'.$jenis)->with('toast_success', 'Berhasil Edit Dokumen!');
            } else {
                return redirect('/dokumen_'.$jenis)->with('toast_success', 'Gagal Edit Dokumen!');
            }
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
