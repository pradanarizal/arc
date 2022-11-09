<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SuperadminController extends Controller
{
    public function dokumen()
    {
        return view('superadmin.dokumen');
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
