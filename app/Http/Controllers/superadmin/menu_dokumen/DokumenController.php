<?php

namespace App\Http\Controllers\superadmin\menu_dokumen;

use App\Http\Controllers\Controller;
use App\Models\DokumenModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class DokumenController extends Controller
{
    //Halaman Detail Dokumen
    public function detail_data($id)
    {
        $data = [
            'dokumen' => $this->DokumenModel->getDokumenById($id)
        ];
        return view('superadmin.menu_dokumen.detail_dokumen', $data);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->DokumenModel = new DokumenModel();
    }

    public function index()
    {
        $data = [
            'dokumen' => $this->DokumenModel->allData(),
            'kelengkapan_dokumen' => $this->DokumenModel->kelData(),
        ];
        return view('superadmin.menu_dokumen.dokumen', $data);
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
        $request->validate([
            'file' => 'required|unique:dokumen,file_dokumen',
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

        if ($request->input('jenis')  == 'Retensi') {
            $direktori_file = 'data_file/retensi';
        } elseif ($request->input('jenis') == 'Pengarsipan') {
            $direktori_file = 'data_file/pengarsipan';
        }

        // upload file
        $file_dokumen = $file->move($direktori_file, $file->hashName());

        if ($request->input('jenis') == 'Retensi') {
            $data = [
                'no_dokumen' => $request->input('nomor_dokumen'),
                'nama_dokumen' => $request->input('nama_dokumen'),
                'tahun_dokumen' => $request->input('tahun_dokumen'),
                'deskripsi' => $request->input('deskripsi_dokumen'),
                'divisi' => Auth::user()->divisi,
                'tgl_upload' => \Carbon\Carbon::now(),
                'status_dokumen' => 'Pending',
                'nama_kel_dokumen' => $kelengkapan_dokumen,
                'file_dokumen' => $file_dokumen,
                'created_at' => \Carbon\Carbon::now(),
            ];
            $data2 = [
                // 'tgl_retensi' => \Carbon\Carbon::now(),
                'status_retensi' => 'Pending',
                'created_at' => \Carbon\Carbon::now(),
                'no_dokumen' => $request->input('nomor_dokumen'),
                'id' => Auth::user()->id,
            ];

            if ($this->DokumenModel->insert_retensi($data, $data2)) {
                return redirect('/dokumen')->with('toast_success', 'Pengajuan Retensi diteruskan ke Approval Retensi!');
            } else {
                return redirect('/dokumen');
            }
        }
        elseif ($request->input('jenis')=='Pengarsipan') {
            $data = [
                'no_dokumen' => $request->input('nomor_dokumen'),
                'nama_dokumen' => $request->input('nama_dokumen'),
                'tahun_dokumen' => $request->input('tahun_dokumen'),
                'deskripsi' => $request->input('deskripsi_dokumen'),
                'divisi' => Auth::user()->divisi,
                'tgl_upload' => \Carbon\Carbon::now(),
                'status_dokumen' => 'Pengarsipan',
                'nama_kel_dokumen' => $kelengkapan_dokumen,
                'file_dokumen' => $file_dokumen,
                'created_at' => \Carbon\Carbon::now(),
            ];
            $data2 = [
                'status_pengarsipan' => 'Pending',
                'created_at' => \Carbon\Carbon::now(),
                'no_dokumen' => $request->input('nomor_dokumen'),
                'id' => Auth::user()->id,
            ];

            if ($this->DokumenModel->insert_dokumen($data, $data2)) {
                return redirect('/dokumen')->with('toast_success', 'Pengajuan Pengarsipan diteruskan ke menu Approval Pengarsipan!');
            } else {
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
    public function update(Request $request, $id)
    {
        //
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
