<?php

namespace App\Http\Controllers\admin\riwayat;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\approval\PeminjamanModel;
use Auth;

class RiwayatpeminjamanController extends Controller
{
    public function __construct()
    {
        $this->Model = new PeminjamanModel();
    }

    public function index()
    {
        $data = [
            'dokumen' => $this->Model->getPeminjamanByDivisi(Auth::user()->id_departemen),
        ];
        return view('admin.riwayat.riwayat-peminjaman', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show_detail($id)
    {
        $data = [
            'peminjaman' => $this->Model->getDataById($id)
        ];

        return view('admin.riwayat.d_riwayat_peminjaman', $data);
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
