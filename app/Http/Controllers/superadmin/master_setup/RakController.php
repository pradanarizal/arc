<?php

namespace App\Http\Controllers\superadmin\master_setup;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\master_setup\RakModel;
use App\Models\GeneralModel;

class RakController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->RakModel = new RakModel();
        $this->model2 = new GeneralModel();
    }

    public function index()
    {
        $data3 = [
            'count_all_pending' => $this->model2->get_all_pending(),
            'count_pengarsipan_pending' => $this->model2->get_pengarsipan_pending(),
            'count_retensi_pending' => $this->model2->get_retensi_pending(),
            'rak' => $this->RakModel->rakData(),
            'ruang' => $this->RakModel->getRuang()
        ];
        return view('superadmin.master_setup.rak', $data3);
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
                'id_ruang' => 'required',
                'nama_rak' => 'required|unique:rak,nama_rak'
            ],
            [
                'id_ruang.required' => 'Ruang wajib dipilih!',
                'nama_rak.required' => 'Nama Rak wajib diisi!',
                'nama_rak.unique' => 'Nama Rak sudah ada!'
            ]
        );

        $data = [
            'id_ruang' => $request->input('id_ruang'),
            'nama_rak' => $request->input('nama_rak'),
        ];
        if ($this->RakModel->insert_rak($data)) {
            return redirect('/master_setup/rak')->with('toast_success', 'Berhasil Tambah rak');
        } else {
            return redirect('/master_setup/rak')->with('toast_error', 'Gagal Tambah rak');
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
        $this->validate(
            $request,
            [
                'edit_id_ruang' => 'required',
                'edit_nama_rak' => 'required|unique:rak,nama_rak'
            ],
            [
                'edit_id_ruang.required' => 'Ruang wajib dipilih!',
                'edit_nama_rak.required' => 'Nama Rak wajib diisi!',
                'edit_nama_rak.unique' => 'Nama Rak sudah ada!'
            ]
        );
        if ($request->input('old_edit_nama_rak') != $request->input('edit_nama_rak')) {
            $data = [
                'nama_rak' => $request->input('edit_nama_rak'),
                'id_ruang' => $request->input('edit_id_ruang')
            ];
            if ($this->RakModel->update_rak($data, $id)) {
                return redirect('/master_setup/rak')->with('toast_success', 'Berhasil Edit Rak');
            } else {
                return redirect('/master_setup/rak');
            }
        } else {
            $data = [
                'id_ruang' => $request->input('id_ruang')
            ];
            if ($this->RakModel->update_rak($data, $id)) {
                return redirect('/master_setup/rak')->with('toast_success', 'Berhasil Edit Rak');
            } else {
                return redirect('/master_setup/rak');
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
        $this->RakModel->delete_rak($id);
        return redirect('/master_setup/rak')->with('toast_success', 'Berhasil Hapus Rak');
    }
}
