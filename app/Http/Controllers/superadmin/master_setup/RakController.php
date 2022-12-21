<?php

namespace App\Http\Controllers\superadmin\master_setup;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\master_setup\RakModel;
use App\Traits\notif_sidebar;
use Illuminate\Validation\Rule;

class RakController extends Controller
{

    use notif_sidebar;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->RakModel = new RakModel();
    }

    public function detail_rak($id_ruang)
    {
        $rak = $this->RakModel->get_rak_by_ruang($id_ruang);
        return response()->json($rak);
    }

    public function index()
    {
        $data = [
            'rak' => $this->RakModel->rakData(),
            'ruang' => $this->RakModel->getRuang()
        ];
        return view('superadmin.master_setup.rak', $data, $this->approval_pending());
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
                // 'nama_rak' => 'required|unique:rak,nama_rak'
                'nama_rak' => ['required', Rule::unique('rak')
                    ->where('id_ruang', $request->id_ruang)],
            ],
            [
                'id_ruang.required' => 'Ruang wajib dipilih!',
                'nama_rak.required' => 'Nama Rak wajib diisi!',
                'nama_rak.unique' => ['Nama rak pada ruang ini sudah ada!'],
            ]
        );

        $data = [
            'id_ruang' => $request->input('id_ruang'),
            'nama_rak' => $request->input('nama_rak'),
            'created_at' => \Carbon\Carbon::now(),
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
                'nama_rak' => "required|unique:rak,nama_rak,NULL,ruang,id_ruang,{$request->input('ruang')}",
            ],
            [
                'nama_rak.required' => 'Nama Rak wajib diisi!',
                'nama_rak.unique' => 'Nama Rak di ruang ini sudah ada!'
            ]
        );

        $data = [
            'nama_rak' => $request->input('nama_rak'),
            'updated_at' => \Carbon\Carbon::now()
        ];
        if ($this->RakModel->update_rak($data, $id)) {
            return redirect('/master_setup/rak')->with('toast_success', 'Berhasil Edit Rak!');
        } else {
            return redirect('/master_setup/rak')->with('toast_error', 'Gagal Edit Rak!');;
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
