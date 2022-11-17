<?php

namespace App\Http\Controllers\superadmin\master_setup;

use App\Http\Controllers\Controller;
use App\Models\master_setup\RuangModel;
use Illuminate\Http\Request;

class RuangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->RuangModel = new RuangModel();
    }

    public function index()
    {
        $data2 = [
            'ruang' => $this->RuangModel->ruangData()
        ];
        return view('superadmin.master_setup.ruang', $data2);
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
                'nama_ruang' => 'required|unique:ruang,nama_ruang|min:4'
            ],
            [
                'nama_ruang.required' => 'Nama Ruang wajib diisi!',
                'nama_ruang.unique' => 'Nama Ruang sudah ada!',
                'nama_ruang.min' => 'Nama Ruang minimal 4 huruf!'
            ]
        );

        $data = [
            'nama_ruang' => $request->input('nama_ruang'),
        ];
        if ($this->RuangModel->insert_ruang($data)) {
            return redirect('/master_setup/ruang')->with('toast_success', 'Berhasil tambah ruang!');
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
                'nama_ruang' => 'required|unique:ruang,nama_ruang|min:4'
            ],
            [
                'nama_ruang.required' => 'Nama Ruang wajib diisi!',
                'nama_ruang.unique' => 'Nama Ruang sudah ada!',
                'nama_ruang.min' => 'Nama Ruang minimal 4 huruf!'
            ]
        );

        $data = [
            'nama_ruang' => $request->input('nama_ruang')
        ];

        if ($this->RuangModel->update_ruang($data, $id)) {
            return redirect('/master_setup/ruang')->with('toast_success', 'Berhasil Edit Ruang');
        } else {
            return redirect('/master_setup/ruang');
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
        $this->RuangModel->delete_ruang($id);
        return redirect('/master_setup/ruang')->with('toast_success', 'Hapus data ruang berhasil!');
    }
}
