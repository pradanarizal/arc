<?php

namespace App\Http\Controllers\superadmin\master_setup;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\RakModel;

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
    }

    public function index()
    {
        $data3 = [
            'rak' => $this->RakModel->rakData()
        ];
        return view('superadmin.rak', $data3);
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
            'nama_rak' => $request->input('nama_rak'),
        ];
        if ($this->RakModel->insert_rak($data)) {
            return redirect('rak')->with('toast_success', 'Berhasil Tambah rak');
        } else {
            return redirect('rak')->with('toast_error', 'Gagal Tambah rak');
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
            'nama_rak' => $request->input('nama_rak')
        ];
        if ($this->RakModel->update_rak($data, $id)) {
            return redirect('rak')->with('toast_success', 'Berhasil Edit Rak');
        } else {
            return redirect('rak');
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
