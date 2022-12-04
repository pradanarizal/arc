<?php

namespace App\Http\Controllers\superadmin\master_setup;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\master_setup\BoxModel;
use App\Models\GeneralModel;

class BoxController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->BoxModel = new BoxModel();
        $this->model2 = new GeneralModel();
    }


    public function index()
    {
        $data4 = [
            'count_all_pending' => $this->model2->get_all_pending(),
            'count_pengarsipan_pending' => $this->model2->get_pengarsipan_pending(),
            'count_retensi_pending' => $this->model2->get_retensi_pending(),
            'box' => $this->BoxModel->boxData()
        ];
        return view('superadmin.master_setup.box', $data4);
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
                'nama_box' => 'required|unique:box,nama_box'
            ],
            [
                'nama_box.required' => 'Nama Box wajib diisi!',
                'nama_box.unique' => 'Nama Box sudah ada!'
            ]
        );

        $data = [
            'nama_box' => $request->input('nama_box'),
        ];
        if ($this->BoxModel->insert_box($data)) {
            return redirect('/master_setup/box')->with('toast_success', 'Berhasil Tambah box');
        } else {
            return redirect('/master_setup/box')->with('toast_error', 'Gagal Tambah box');
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
                'nama_box' => 'required|unique:box,nama_box'
            ],
            [
                'nama_box.required' => 'Nama Box wajib diisi!',
                'nama_box.unique' => 'Nama Box sudah ada!',
            ]
        );

        $data = [
            'nama_box' => $request->input('nama_box')
        ];
        if ($this->BoxModel->update_box($data, $id)) {
            return redirect('/master_setup/box')->with('toast_success', 'Berhasil Edit Box');
        } else {
            return redirect('/master_setup/box');
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
        $this->BoxModel->delete_box($id);
        return redirect('/master_setup/box')->with('toast_success', 'Berhasil Hapus Rak');
    }
}
