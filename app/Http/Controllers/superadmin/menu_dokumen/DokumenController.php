<?php

namespace App\Http\Controllers\superadmin\menu_dokumen;

use App\Http\Controllers\Controller;
use App\Models\DokumenModel;
use App\Models\approval\RetensiModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Response;
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
            'peminjaman'    => $this->DokumenModel->getNamaPeminjam($id)
        ];
        return view('superadmin.menu_dokumen.detail_dokumen', $data, $this->notif);
    }

    public function index()
    {
        $data = [
            'dokumen' => $this->DokumenModel->allDataTerbatas(),
            'kelengkapan_dokumen' => $this->DokumenModel->kelData(),
        ];
        return view('superadmin.menu_dokumen.dokumen', $data, $this->notif);
    }

    public function dokumen_terbuka()
    {
        $data = [
            'dokumen' => $this->DokumenModel->allDataTerbuka(),
            'kelengkapan_dokumen' => $this->DokumenModel->kelData(),
        ];
        return view('superadmin.menu_dokumen.dokumen', $data, $this->notif);

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
        $request->validate(
            [
                'file' => 'required|unique:dokumen,file_dokumen|max:50000',
                'kelengkapan_dokumen' => 'required',
                'nama_dokumen' => 'required',
                'nomor_dokumen' => 'required',
                'tahun_dokumen' => 'required',
                'deskripsi_dokumen' => 'required',
            ],
            [
                'file.required' => 'File dokumen wajib diupload!',
                'kelengkapan_dokumen.required' => 'Pilih kelengkapan dokumen!',
                'nama_dokumen.required' => 'Nama Dokumen wajib diisi!',
                'nomor_dokumen.required' => 'Nomor Dokumen wajib diisi!',
                'tahun_dokumen.required' => 'Pilih tahun dokumen!',
                'deskripsi_dokumen.required' => 'Deskripsi wajib diisi!',
            ]
        );

        $kelengkapan_dokumen = implode(", ", $request->input('kelengkapan_dokumen'));


        // menyimpan data file yang diupload ke variabel $file
        $file = $request->file('file');

        // nama file
        echo 'File Name: ' . $file->hashName();
        echo '<br>';

        // ekstensi file
        echo 'File Extension: ' . $file->getClientOriginalExtension();
        echo '<br>';

        // real path
        echo 'File Real Path: ' . $file->getRealPath();
        echo '<br>';

        // ukuran file
        echo 'File Size: ' . $file->getSize();
        echo '<br>';
        // tipe mime
        echo 'File Mime Type: ' . $file->getMimeType();
        $direktori_file = 'data_file';
        $dok = $request->input('nama_dokumen');

        // upload file
        $file_dokumen = $file->move($direktori_file, "$dok" . ".pdf");

        if ($request->input('jenis') == 'Retensi') {
            $data = [
                'no_dokumen' => $request->input('nomor_dokumen'),
                'nama_dokumen' => $request->input('nama_dokumen'),
                'tahun_dokumen' => $request->input('tahun_dokumen'),
                'deskripsi' => $request->input('deskripsi_dokumen'),
                'id_departemen' => Auth::user()->id_departemen,
                'tgl_upload' => \Carbon\Carbon::now(),
                'status_dokumen' => 'Retensi',
                'nama_kel_dokumen' => $kelengkapan_dokumen,
                'file_dokumen' => $file_dokumen,
                'created_at' => \Carbon\Carbon::now(),
            ];

            if ($this->DokumenModel->addDokumen($data)) {
                $last_id_dokumen = $this->DokumenModel->getLastIdDokumen();
                if (count($last_id_dokumen) == 1) {
                    $idDokumen = $last_id_dokumen[0]->id_dokumen;
                    $data2 = [
                        // 'tgl_retensi' => \Carbon\Carbon::now(),
                        'status_retensi' => 'Pending',
                        'created_at' => \Carbon\Carbon::now(),
                        'id_dokumen' => $idDokumen,
                        'id' => Auth::user()->id,
                    ];
                    $this->DokumenModel->insert_retensi($data2);
                }
                return redirect('/dokumen')->with('toast_success', 'Pengajuan Retensi diteruskan ke Approval Retensi Arsip!');
            }else {
                return redirect('/dokumen');
            }  
        } elseif ($request->input('jenis') == 'Pengarsipan') {
            $data = [
                'no_dokumen' => $request->input('nomor_dokumen'),
                'nama_dokumen' => $request->input('nama_dokumen'),
                'tahun_dokumen' => $request->input('tahun_dokumen'),
                'deskripsi' => $request->input('deskripsi_dokumen'),
                'id_departemen' => Auth::user()->id_departemen,
                'tgl_upload' => \Carbon\Carbon::now(),
                'status_dokumen' => 'Pengarsipan',
                'nama_kel_dokumen' => $kelengkapan_dokumen,
                'file_dokumen' => $file_dokumen,
                'created_at' => \Carbon\Carbon::now(),
            ];

            if ($this->DokumenModel->addDokumen($data)) {
                $last_id_dokumen = $this->DokumenModel->getLastIdDokumen();
                if (count($last_id_dokumen) == 1) {
                    $idDokumen = $last_id_dokumen[0]->id_dokumen;
                    $data2 = [
                        'status_pengarsipan' => 'Pending',
                        'created_at' => \Carbon\Carbon::now(),
                        'id_dokumen' => $idDokumen,
                        'id' => Auth::user()->id,
                    ];
                    $this->DokumenModel->insert_pengarsipan($data2);
                }
            
                return redirect('/dokumen')->with('toast_success', 'Pengajuan Retensi diteruskan ke Approval Retensi Arsip!');
            }else {
                return redirect('/dokumen');
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
                return redirect('/dokumen')->with('toast_success', 'Dokumen telah dihapus!');
            } else {
                return redirect('/dokumen');
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
                return redirect('/dokumen')->with('toast_success', 'Dokumen telah diteruskan ke menu Approval Retensi Arsip!');
            } else {
                return redirect('/dokumen');
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
