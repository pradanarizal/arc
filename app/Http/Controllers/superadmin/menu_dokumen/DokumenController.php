<?php

namespace App\Http\Controllers\superadmin\menu_dokumen;

use App\Http\Controllers\Controller;
use App\Models\DokumenModel;
use Illuminate\Http\Request;
use Auth;

class DokumenController extends Controller
{
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
        // $data['component'] = array(
		// 	"Hardisk",
		// 	"Memory",
		// 	"Monitor",
		// 	"Keyboard",
		// 	"Mouse",
		// 	"Software",
		// 	"Adaptor/Power Supply",
		// 	"Processor",
		// 	"Fan/Heatsink",
		// 	"Lainnya"
		// );

        $data = [
            'dokumen' => $this->DokumenModel->allData(),
            'master_surat' => $this->DokumenModel->allMasterSurat(),

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
        // $this->validate(
        //     $request,
        //     [
        //         'kelengkapan' => 'required|unique:master_surat,nama_surat|min:4'
        //     ],
        //     [
        //         'kelengkapan.required' => 'Nama Dokumen wajib diisi!',
        //         'kelengkapan.unique' => 'Nama Dokumen sudah ada!',
        //         'kelengkapan.min' => 'Nama Dokumen minimal 4 huruf!'
        //     ]
        // );
        if ($request->input('jenis')=='Retensi') {
            $data = [
                'nama_dokumen' => $request->input('nama_dokumen'),
                'tahun_dokumen' => $request->input('tahun_dokumen'),
                'deskripsi' => $request->input('deskripsi_dokumen'),
                'divisi' => Auth::user()->divisi,
                'tgl_upload' => date('Y-m-d h:i:s'),
                'status_dokumen' => 'Retensi' ,
            ];
            if ($this->DokumenModel->insert_retensi($data)) {
                return redirect('/dokumen')->with('toast_success', 'Berhasil Tambah Opsi Dokumen');
            } else {
                return redirect('/dokumen');
            }
        }
        elseif ($request->input('jenis')=='Pengarsipan') {
            $data = [
                'nama_dokumen' => $request->input('nama_dokumen'),
                'tahun_dokumen' => $request->input('tahun_dokumen'),
                'deskripsi' => $request->input('deskripsi_dokumen'),
                'divisi' => Auth::user()->divisi,
                'tgl_upload' => date('Y-m-d h:i:s'),
                'status_dokumen' => 'Pengarsipan' ,
            ];
            $dataarsip = [
                'status_pengarsipan' => 'Pending',
                'no_dokumen' => $request->input('_dokumen'),
                'deskripsi' => $request->input('deskripsi_dokumen'),
                'divisi' => Auth::user()->divisi,
                'tgl_upload' => date('Y-m-d h:i:s'),
                'status_dokumen' => 'Pengarsipan' ,
            ];

            if ($this->DokumenModel->insert_dokumen($data)) {
                return redirect('/dokumen')->with('toast_success', 'Berhasil Tambah Opsi Dokumen');
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
