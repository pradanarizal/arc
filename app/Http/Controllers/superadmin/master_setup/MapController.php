<?php

namespace App\Http\Controllers\superadmin\master_setup;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\master_setup\mapModel;

use App\Traits\notif_sidebar;

class MapController extends Controller
{

use notif_sidebar;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->MapModel = new MapModel();
    }


    public function index()
    {
        $data = [
            'map' => $this->MapModel->mapData(),
            'ruang' => $this->MapModel->getRuang()
        ];
        return view('superadmin.master_setup.map', $data, $this->approval_pending());
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
                'box_select' =>'required',
                'map' => 'required|unique:map,nama_map',
            ],
            [
                'nama_map.required' => 'Nama Map wajib diisi!',
                'nama_map.unique' => 'Nama Map sudah ada!',
            ]
        );

        $data = [
            'nama_map' => $request->input('map'),
            'id_box' => $request->input('box_select'),
        ];
        if ($this->MapModel->insert_map($data)) {
            return redirect('/master_setup/map')->with('toast_success', 'Berhasil Tambah map');
        } else {
            return redirect('/master_setup/map')->with('toast_error', 'Gagal Tambah map');
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
                'nama_map' => 'required|unique:map,nama_map'
            ],
            [
                'nama_map.required' => 'Nama Map wajib diisi!',
                'nama_map.unique' => 'Nama Map sudah ada!'
            ]
        );

        $data = [
            'nama_map' => $request->input('nama_map')
        ];
        if ($this->MapModel->update_map($data, $id)) {
            return redirect('/master_setup/map')->with('toast_success', 'Berhasil Edit Map');
        } else {
            return redirect('/master_setup/map');
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
        $this->MapModel->delete_map($id);
        return redirect('/master_setup/map')->with('toast_success', 'Berhasil Hapus Kereta');
    }
}
