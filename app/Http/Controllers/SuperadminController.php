<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DokumenModel;
use App\Models\RuangModel;
use App\Models\RakModel;
use App\Models\boxModel;
use App\Models\mapModel;
use App\Models\KelengkapanDokumenModel;
use App\Models\User;

class SuperadminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->DokumenModel = new DokumenModel();
        $this->RuangModel = new RuangModel();
        $this->RakModel = new RakModel();
        $this->BoxModel = new BoxModel();
        $this->MapModel = new MapModel();
        $this->User = new User();
        $this->KelengkapanDokumenModel = new KelengkapanDokumenModel();
    }

    public function dokumen()
    {
        $data1 = [
            'dokumen' => $this->DokumenModel->allData()
        ];
        return view('superadmin.dokumen', $data1);
    }

    public function ruang()
    {
        $data2 = [
            'ruang' => $this->RuangModel->ruangData()
        ];
        return view('superadmin.ruang', $data2);
    }

    public function rak()
    {
        $data3 = [
            'rak' => $this->RakModel->rakData()
        ];
        return view('superadmin.rak', $data3);
    }

    public function box()
    {
        $data4 = [
            'box' => $this->BoxModel->boxData()
        ];
        return view('superadmin.box', $data4);
    }

    public function map()
    {
        $data5 = [
            'map' => $this->MapModel->mapData()
        ];
        return view('superadmin.map', $data5);
    }

    public function data_user()
    {
        $data6 = [
            'users' => $this->User->userData()
        ];
        return view('superadmin.data_user', $data6);
    }

    public function kelengkapan_dokumen()
    {
        $data7 = [
            'kelengkapan_dokumen' => $this->KelengkapanDokumenModel->keldokData()
        ];
        return view('superadmin.kelengkapan', $data7);
    }


    public function index()
    {
        //
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
        //
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
