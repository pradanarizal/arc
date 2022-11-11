<?php

namespace App\Http\Controllers\superadmin\master_setup;

use App\Http\Controllers\Controller;
use App\Models\RuangModel;
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
        return view('superadmin.ruang', $data2);
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
        $data = [
            'nama_ruang' => $request->input('nama_ruang'),

        ];
        if ($this->RuangModel->insert_ruang($data)) {
            return redirect('ruang')->with('toast_success', 'Berhasil Tambah Ruang');
        } else {
            return redirect('ruang')->with('toast_error', 'Gagal Tambah Admin');
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
            'nama_ruang' => $request->input('nama_ruang')
        ];
        if ($this->RuangModel->update_ruang($data, $id)) {
            return redirect('ruang')->with('toast_success', 'Berhasil Edit Ruang');
        } else {
            return redirect('ruang');
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
        return redirect('ruang')->with('toast_success', 'Berhasil Hapus Ruang');
    }
}
