<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DokumenModel;

class SuperadminController extends Controller
{
    // public function dokumen()
    // {
    //     return view('superadmin.dokumen');
    // }
    public function __construct()
    {
        $this->DokumenModel = new DokumenModel();
    }

    public function dokumen()
    {
        $data = [
            'dokumen' => $this->DokumenModel->allData()
        ];
        return view('superadmin.dokumen', $data);
    }

    public function ruang()
    {
        return view('superadmin.ruang');
    }

    public function rak()
    {
        return view('superadmin.rak');
    }

    public function box()
    {
        return view('superadmin.box');
    }

    public function map()
    {
        return view('superadmin.map');
    }

    public function data_user()
    {
        return view('superadmin.data_user');
    }

    public function kelengkapan_dokumen()
    {
        return view('superadmin.kelengkapan');
    }
}
