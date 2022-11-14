<?php

namespace App\Http\Controllers\superadmin\master_setup;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\master_setup\KelengkapanDokumenModel;

class KelengkapanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->KelengkapanDokumenModel = new KelengkapanDokumenModel();
    }


    public function index()
    {
        $data7 = [
            'kelengkapan_dokumen' => $this->KelengkapanDokumenModel->keldokData()
        ];
        return view('superadmin.master_setup.kelengkapan', $data7);
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
        $this->validate(
            $request,
            [
                'kelengkapan' => 'required|unique:kelengkapan_dokumen,nama_kel_dokumen|min:4'
            ],
            [
                'kelengkapan.required' => 'Nama Dokumen wajib diisi',
                'kelengkapan.unique' => 'Nama Dokumen sudah ada',
                'kelengkapan.min' => 'Nama Dokumen minimal 4 Kata/Digit'
            ]
        );

        $data = [
            'nama_kel_dokumen' => $request->input('kelengkapan'),
        ];
        if ($this->KelengkapanDokumenModel->insert_surat($data)) {
            return redirect('/master_setup/kelengkapan_dokumen')->with('toast_success', 'Berhasil Tambah Opsi Dokumen');
        } else {
            return redirect('/master_setup/kelengkapan_dokumen')->with('toast_error', 'Gagal Tambah Opsi Dokumen');
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
        $data = [
            'nama_kel_dokumen' => $request->input('kelengkapan')
        ];
        if ($this->KelengkapanDokumenModel->update_surat($data, $id)) {
            return redirect('/master_setup/kelengkapan_dokumen')->with('toast_success', 'Berhasil Edit Kelengkapan Dokumen');
        } else {
            return redirect('/master_setup/kelengkapan_dokumen');
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
        $this->KelengkapanDokumenModel->delete_surat($id);
        return redirect('/master_setup/kelengkapan_dokumen')->with('toast_success', 'Berhasil Hapus Kelengkapan');
    }
}
